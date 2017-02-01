<?php
App::uses('AppController', 'Controller');
/**
 * ClienteEnderecos Controller
 *
 * @property ClienteEndereco $ClienteEndereco
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ClienteEnderecosController extends AppController {

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
		$this->ClienteEndereco->recursive = 0;
		$this->set('clienteEnderecos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClienteEndereco->exists($id)) {
			throw new NotFoundException(__('Invalid cliente endereco'));
		}
		$options = array('conditions' => array('ClienteEndereco.' . $this->ClienteEndereco->primaryKey => $id));
		$this->set('clienteEndereco', $this->ClienteEndereco->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClienteEndereco->create();
			if ($this->ClienteEndereco->save($this->request->data)) {
				$this->Session->setFlash(__('The cliente endereco has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cliente endereco could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$clientes = $this->ClienteEndereco->Cliente->find('list');
		$enderecos = $this->ClienteEndereco->Endereco->find('list');
		$this->set(compact('clientes', 'enderecos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ClienteEndereco->exists($id)) {
			throw new NotFoundException(__('Invalid cliente endereco'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ClienteEndereco->save($this->request->data)) {
				$this->Session->setFlash(__('The cliente endereco has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cliente endereco could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('ClienteEndereco.' . $this->ClienteEndereco->primaryKey => $id));
			$this->request->data = $this->ClienteEndereco->find('first', $options);
		}
		$clientes = $this->ClienteEndereco->Cliente->find('list');
		$enderecos = $this->ClienteEndereco->Endereco->find('list');
		$this->set(compact('clientes', 'enderecos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ClienteEndereco->id = $id;
		if (!$this->ClienteEndereco->exists()) {
			throw new NotFoundException(__('Invalid cliente endereco'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ClienteEndereco->delete()) {
			$this->Session->setFlash(__('The cliente endereco has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The cliente endereco could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
