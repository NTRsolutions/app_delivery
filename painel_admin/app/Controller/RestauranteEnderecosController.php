<?php
App::uses('AppController', 'Controller');
/**
 * RestauranteEnderecos Controller
 *
 * @property RestauranteEndereco $RestauranteEndereco
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class RestauranteEnderecosController extends AppController {

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
		$this->RestauranteEndereco->recursive = 0;
		$this->set('restauranteEnderecos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RestauranteEndereco->exists($id)) {
			throw new NotFoundException(__('Invalid restaurante endereco'));
		}
		$options = array('conditions' => array('RestauranteEndereco.' . $this->RestauranteEndereco->primaryKey => $id));
		$this->set('restauranteEndereco', $this->RestauranteEndereco->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RestauranteEndereco->create();
			if ($this->RestauranteEndereco->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurante endereco has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurante endereco could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$enderecos = $this->RestauranteEndereco->Endereco->find('list');
		$restaurantes = $this->RestauranteEndereco->Restaurante->find('list');
		$this->set(compact('enderecos', 'restaurantes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RestauranteEndereco->exists($id)) {
			throw new NotFoundException(__('Invalid restaurante endereco'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RestauranteEndereco->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurante endereco has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurante endereco could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('RestauranteEndereco.' . $this->RestauranteEndereco->primaryKey => $id));
			$this->request->data = $this->RestauranteEndereco->find('first', $options);
		}
		$enderecos = $this->RestauranteEndereco->Endereco->find('list');
		$restaurantes = $this->RestauranteEndereco->Restaurante->find('list');
		$this->set(compact('enderecos', 'restaurantes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RestauranteEndereco->id = $id;
		if (!$this->RestauranteEndereco->exists()) {
			throw new NotFoundException(__('Invalid restaurante endereco'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RestauranteEndereco->delete()) {
			$this->Session->setFlash(__('The restaurante endereco has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The restaurante endereco could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
