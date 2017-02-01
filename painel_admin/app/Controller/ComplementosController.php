<?php
App::uses('AppController', 'Controller');
/**
 * Complementos Controller
 *
 * @property Complemento $Complemento
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ComplementosController extends AppController {

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
		$this->Complemento->recursive = 0;
		$this->set('complementos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Complemento->exists($id)) {
			throw new NotFoundException(__('Invalid complemento'));
		}
		$options = array('conditions' => array('Complemento.' . $this->Complemento->primaryKey => $id));
		$this->set('complemento', $this->Complemento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Complemento->create();
			if ($this->Complemento->save($this->request->data)) {
				$this->Session->setFlash(__('The complemento has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The complemento could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$produtos = $this->Complemento->Produto->find('list');
		$this->set(compact('produtos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Complemento->exists($id)) {
			throw new NotFoundException(__('Invalid complemento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Complemento->save($this->request->data)) {
				$this->Session->setFlash(__('The complemento has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The complemento could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Complemento.' . $this->Complemento->primaryKey => $id));
			$this->request->data = $this->Complemento->find('first', $options);
		}
		$produtos = $this->Complemento->Produto->find('list');
		$this->set(compact('produtos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Complemento->id = $id;
		if (!$this->Complemento->exists()) {
			throw new NotFoundException(__('Invalid complemento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Complemento->delete()) {
			$this->Session->setFlash(__('The complemento has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The complemento could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
