<?php
App::uses('AppController', 'Controller');
/**
 * Admins Controller
 *
 * @property Admin $Admin
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class AdminsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function afterFilter() {
        if ($this->action != 'index_login') {
            $this->autenticarAdmin();
        }
    }

    public function autenticarAdmin() {        
        if (!$this->Session->check('Admin')) {
            $this->redirect(array('controller' => 'admins',
                                    'action' => 'index_login'));
            exit();
        } 
    }

    /**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Admin->recursive = 0;
		$this->set('admins', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Admin->exists($id)) {
			throw new NotFoundException(__('Invalid admin'));
		}
		$options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
		$this->set('admin', $this->Admin->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Admin->create();
			if ($this->Admin->save($this->request->data)) {
				$this->Session->setFlash(__('The admin has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Admin->exists($id)) {
			throw new NotFoundException(__('Invalid admin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Admin->save($this->request->data)) {
				$this->Session->setFlash(__('The admin has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
			$this->request->data = $this->Admin->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Admin->id = $id;
		if (!$this->Admin->exists()) {
			throw new NotFoundException(__('Invalid admin'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Admin->delete()) {
			$this->Session->setFlash(__('The admin has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The admin could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function index_login() {
		
	}

	public function login() {
		if (!empty($this->data['Admin']['login']) and
        	!empty($this->data['Admin']['senha'])) {
        	$this->validar();        	
        } else {
        	$this->redirect(array('action' => 'index_login'));
        	exit();
        }
	}

	public function validar(){
		$this->loadModel('Franqueado');
		$this->loadModel('Atendente');
		$this->loadModel('Gerente');

    	$admin = $this->Admin->findAllByLoginAndSenha(
    								$this->data['Admin']['login'],
    								md5($this->data['Admin']['senha']));

    	$franq = $this->Franqueado->findAllByEmailAndSenha(
    								$this->data['Admin']['login'],
    								md5($this->data['Admin']['senha']));

    	$ger = $this->Gerente->findAllByEmailAndSenha(
    								$this->data['Admin']['login'],
    								md5($this->data['Admin']['senha']));

    	$at = $this->Atendente->findAllByEmailAndSenha(
    								$this->data['Admin']['login'],
    								md5($this->data['Admin']['senha']));
    	if (!empty($admin)) {
    		$this->setSession($admin, 1);
    	} else if (!empty($franq)) {
    		$this->setSession($franq, 2);
    	} else if (!empty($ger)) {
    		$this->setSession($ger, 3);
    	} else if (!empty($at)) {
    		$this->setSession($at, 4);
    	} else { 
    		$this->Session->setFlash(__('Login e/ou senha inválidos!'), 'default', 
    			array('class' => 'text-center alert alert-danger'));
    		$this->redirect(array('action' => 'index_login'));
    		exit();
    	}
    }

    public function setSession($user = null, $tipo = null) {
    	switch ($tipo) {
    		case 1:
    			$this->Session->write('Admin', $user);
        		$this->set('admin', $user);
        		$this->redirect(array('controller' => 'admins', 'action' => 'index', $user['0']['Admin']['id']));
    			break;
    		case 2:
    			$this->Session->write('Franqueado', $user);
        		$this->set('admin', $user);
        		$this->redirect(array('controller' => 'franqueados', 'action' => 'index', $user['0']['Franqueado']['id']));
    			break;
    		case 3:
    			$this->Session->write('Gerente', $user);
        		$this->set('admin', $user);
        		$this->redirect(array('controller' => 'gerentes', 'action' => 'index', $user['0']['Gerente']['id']));
    			break;
    		case 4:
    			$this->Session->write('Atendente', $user);
        		$this->set('admin', $user);
        		$this->redirect(array('controller' => 'atendentes', 'action' => 'index', $user['0']['Atendente']['id']));
    			break;
    		default:
    			$this->Session->setFlash(__('Login e/ou senha inválidos!'), 'default', 
    			array('class' => 'text-center alert alert-danger'));
    			$this->redirect(array('action' => 'index_login'));
    			break;
    	}
    }

    public function logout(){
    	$this->Session->destroy();
    	$this->redirect('index_login');
    	exit();
    }
}
