<?php
App::uses('AppController', 'Controller');
/**
 * Enderecos Controller
 *
 * @property Endereco $Endereco
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class EnderecosController extends AppController {

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
		$this->Endereco->recursive = 0;
		$this->set('enderecos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Endereco->exists($id)) {
			throw new NotFoundException(__('Invalid endereco'));
		}
		$options = array('conditions' => array('Endereco.' . $this->Endereco->primaryKey => $id));
		$this->set('endereco', $this->Endereco->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Endereco->create();
			if ($this->Endereco->save($this->request->data)) {
				$this->Session->setFlash(__('The endereco has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The endereco could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$cidades = $this->Endereco->Cidade->find('list');
		$this->set(compact('cidades'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Endereco->exists($id)) {
			throw new NotFoundException(__('Invalid endereco'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Endereco->save($this->request->data)) {
				$this->Session->setFlash(__('The endereco has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The endereco could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Endereco.' . $this->Endereco->primaryKey => $id));
			$this->request->data = $this->Endereco->find('first', $options);
		}
		$cidades = $this->Endereco->Cidade->find('list');
		$this->set(compact('cidades'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Endereco->id = $id;
		if (!$this->Endereco->exists()) {
			throw new NotFoundException(__('Invalid endereco'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Endereco->delete()) {
			$this->Session->setFlash(__('The endereco has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The endereco could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
