<?php
App::uses('AppController', 'Controller');
/**
 * Pagamentos Controller
 *
 * @property Pagamento $Pagamento
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PagamentosController extends AppController {

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
		$this->Pagamento->recursive = 0;
		$this->set('pagamentos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pagamento->exists($id)) {
			throw new NotFoundException(__('Invalid pagamento'));
		}
		$options = array('conditions' => array('Pagamento.' . $this->Pagamento->primaryKey => $id));
		$this->set('pagamento', $this->Pagamento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pagamento->create();
			if ($this->Pagamento->save($this->request->data)) {
				$this->Session->setFlash(__('The pagamento has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagamento could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$restaurantes = $this->Pagamento->Restaurante->find('list');
		$this->set(compact('restaurantes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pagamento->exists($id)) {
			throw new NotFoundException(__('Invalid pagamento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pagamento->save($this->request->data)) {
				$this->Session->setFlash(__('The pagamento has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagamento could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Pagamento.' . $this->Pagamento->primaryKey => $id));
			$this->request->data = $this->Pagamento->find('first', $options);
		}
		$restaurantes = $this->Pagamento->Restaurante->find('list');
		$this->set(compact('restaurantes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pagamento->id = $id;
		if (!$this->Pagamento->exists()) {
			throw new NotFoundException(__('Invalid pagamento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pagamento->delete()) {
			$this->Session->setFlash(__('The pagamento has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The pagamento could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
