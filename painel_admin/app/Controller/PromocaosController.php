<?php
App::uses('AppController', 'Controller');
/**
 * Promocaos Controller
 *
 * @property Promocao $Promocao
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PromocaosController extends AppController {

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
		$this->Promocao->recursive = 0;
		$this->set('promocaos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Promocao->exists($id)) {
			throw new NotFoundException(__('Invalid promocao'));
		}
		$options = array('conditions' => array('Promocao.' . $this->Promocao->primaryKey => $id));
		$this->set('promocao', $this->Promocao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Promocao->create();
			if ($this->Promocao->save($this->request->data)) {
				$this->Session->setFlash(__('The promocao has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promocao could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$produtos = $this->Promocao->Produto->find('list');

		$options = array('fields' => 'Restaurante.nome');
		$restaurantes = $this->Promocao->Restaurante->find('list', $options);
		$this->set(compact('produtos', 'restaurantes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Promocao->exists($id)) {
			throw new NotFoundException(__('Invalid promocao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Promocao->save($this->request->data)) {
				$this->Session->setFlash(__('The promocao has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promocao could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Promocao.' . $this->Promocao->primaryKey => $id));
			$this->request->data = $this->Promocao->find('first', $options);
		}
		$produtos = $this->Promocao->Produto->find('list');
		$restaurantes = $this->Promocao->Restaurante->find('list');
		$this->set(compact('produtos', 'restaurantes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Promocao->id = $id;
		if (!$this->Promocao->exists()) {
			throw new NotFoundException(__('Invalid promocao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Promocao->delete()) {
			$this->Session->setFlash(__('The promocao has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The promocao could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
