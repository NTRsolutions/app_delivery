<?php
App::uses('AppController', 'Controller');
/**
 * Franqueados Controller
 *
 * @property Franqueado $Franqueado
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class FranqueadosController extends AppController {

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
		$this->Franqueado->recursive = 0;
		$this->set('franqueados', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Franqueado->exists($id)) {
			throw new NotFoundException(__('Invalid franqueado'));
		}
		$options = array('conditions' => array('Franqueado.' . $this->Franqueado->primaryKey => $id));
		$this->set('franqueado', $this->Franqueado->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Franqueado->create();
			if ($this->Franqueado->save($this->request->data)) {
				$this->Session->setFlash(__('The franqueado has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The franqueado could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Franqueado->exists($id)) {
			throw new NotFoundException(__('Invalid franqueado'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Franqueado->save($this->request->data)) {
				$this->Session->setFlash(__('The franqueado has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The franqueado could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Franqueado.' . $this->Franqueado->primaryKey => $id));
			$this->request->data = $this->Franqueado->find('first', $options);
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
		$this->Franqueado->id = $id;
		if (!$this->Franqueado->exists()) {
			throw new NotFoundException(__('Invalid franqueado'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Franqueado->delete()) {
			$this->Session->setFlash(__('The franqueado has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The franqueado could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function home() {

	}

	public function recuperar_senha() {
		
	}

	public function altera_senha() {
		
	}

	public function meu_perfil() {
		
	}	

	public function relatorios() {
		
	}
}
