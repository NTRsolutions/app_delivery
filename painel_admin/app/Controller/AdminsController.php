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
    			# code...
    			break;
    	}
    }

    public function logout(){
    	$this->Session->destroy();
    	$this->redirect('index_login');
    	exit();
    }
}
