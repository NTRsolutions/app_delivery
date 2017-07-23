<?php
App::uses('AppController', 'Controller');
/**
 * Sugestaos Controller
 *
 * @property Sugestao $Sugestao
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class SugestaosController extends AppController {

	public function afterFilter() {
        $this->autenticar();
    }

    public function autenticar() {     	
        if (empty($this->Session->check('Franqueado')) and
        	empty($this->Session->check('Admin'))) {
            $this->Session->setFlash(__('Erro de permissão!'), 'default',
                array('class' => 'text-center alert alert-danger'));
            $this->redirect('../'.$this->Session->read('redirectUrl'));
        } 
    }

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {

		if($this->Session->check('Admin')) {

			$this->Sugestao->recursive = 0;
			$this->set('sugestaos', $this->Paginator->paginate());

		} else {

			$this->set('sugestaos', $this->Sugestao->find('all'));

			$this->loadModel('Franqueado');
			$franq = $this->Session->read('Franqueado');
		    $franq = $this->Franqueado->findById($franq['0']['Franqueado']['id']); 
			$this->set('franq', $franq);
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sugestao->exists($id)) {
			throw new NotFoundException(__('Invalid sugestao'));
		}
		$options = array('conditions' => array('Sugestao.' . $this->Sugestao->primaryKey => $id));
		$this->set('sugestao', $this->Sugestao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sugestao->create();
			if ($this->Sugestao->save($this->request->data)) {
				$this->Session->setFlash(__('The sugestao has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sugestao could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$clientes = $this->Sugestao->Cliente->find('list');
		$this->set(compact('clientes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Sugestao->exists($id)) {
			throw new NotFoundException(__('Invalid sugestao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Sugestao->save($this->request->data)) {
				$this->Session->setFlash(__('The sugestao has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sugestao could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Sugestao.' . $this->Sugestao->primaryKey => $id));
			$this->request->data = $this->Sugestao->find('first', $options);
		}
		$clientes = $this->Sugestao->Cliente->find('list');
		$this->set(compact('clientes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Sugestao->id = $id;
		if (!$this->Sugestao->exists()) {
			throw new NotFoundException(__('Invalid sugestao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Sugestao->delete()) {
			$this->Session->setFlash(__('The sugestao has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The sugestao could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
