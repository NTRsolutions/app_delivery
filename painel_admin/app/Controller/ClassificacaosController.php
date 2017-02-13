<?php
App::uses('AppController', 'Controller');
/**
 * Classificacaos Controller
 *
 * @property Classificacao $Classificacao
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ClassificacaosController extends AppController {

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
		$this->loadModel('Gerente');
		$gerente = $this->Session->read('Gerente');
	    $gerente = $this->Gerente->findById($gerente['0']['Gerente']['id']); 
		$this->set('gerente', $gerente);

		$this->set('classificacaos', $this->Classificacao->find('all'));

		$rest = array();
		$this->loadModel('Restaurante');
		foreach ($gerente['Restaurante'] as $geRest) {
			$options = array(
				'conditions' => array(
					'Gerente.id' => $geRest['gerente_id']
				),
				'recursive' => 2
			);
			array_push($rest, $this->Restaurante->find('first', $options));
		}
		$this->set('rest', $rest);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Classificacao->exists($id)) {
			throw new NotFoundException(__('Invalid classificacao'));
		}
		$options = array('conditions' => array('Classificacao.' . $this->Classificacao->primaryKey => $id));
		$this->set('classificacao', $this->Classificacao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Classificacao->create();
			if ($this->Classificacao->save($this->request->data)) {
				$this->Session->setFlash(__('The classificacao has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The classificacao could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$restaurantes = $this->Classificacao->Restaurante->find('list');
		$clientes = $this->Classificacao->Cliente->find('list');
		$this->set(compact('restaurantes', 'clientes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Classificacao->exists($id)) {
			throw new NotFoundException(__('Invalid classificacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Classificacao->save($this->request->data)) {
				$this->Session->setFlash(__('The classificacao has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The classificacao could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Classificacao.' . $this->Classificacao->primaryKey => $id));
			$this->request->data = $this->Classificacao->find('first', $options);
		}
		$restaurantes = $this->Classificacao->Restaurante->find('list');
		$clientes = $this->Classificacao->Cliente->find('list');
		$this->set(compact('restaurantes', 'clientes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Classificacao->id = $id;
		if (!$this->Classificacao->exists()) {
			throw new NotFoundException(__('Invalid classificacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Classificacao->delete()) {
			$this->Session->setFlash(__('The classificacao has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The classificacao could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
