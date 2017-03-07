<?php
App::uses('AppController', 'Controller');
/**
 * Culinarias Controller
 *
 * @property Culinaria $Culinaria
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class CulinariasController extends AppController {

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
		$this->Culinaria->recursive = 0;
		$this->set('culinarias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Culinaria->exists($id)) {
			throw new NotFoundException(__('Invalid culinaria'));
		}
		$options = array('conditions' => array('Culinaria.' . $this->Culinaria->primaryKey => $id));
		$this->set('culinaria', $this->Culinaria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		$tipo = array(
            'Brasileira',
            'Japonesa',
            'Italiana',
            'Chinesa',
            'Protuguesa',
            'Mexicana',
            'Espanhola',
            'Francesa',
            'Alemã',
            'Colombiana',
            'Grega',
            'Irlandesa',
            'Marroquina',
            'Polonesa',
            'Tailandesa',
            'Argentina',
            'Africana',
            'Australiana',
            'Americana',
            'Chilena',
            'Peruana',
            'Sueca',
            'Suíça',
            'Uruguaia',
            'Havaiana',
            'Húngara',
  			'Árabe'
        );
        $this->set(compact('tipo'));

		if ($this->request->is('post')) {
			$this->Culinaria->create();
			if ($this->Culinaria->save($this->request->data)) {
				$this->Session->setFlash(__('The culinaria has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The culinaria could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}

		if($this->Session->check('Gerente')){
			$gerente = $this->Session->read('Gerente');
			$options = array('fields' => 'Restaurante.nome', 'conditions' => array('Restaurante.id' => $gerente['0']['Restaurante']['0']['id']));
			$restaurantes = $this->Culinaria->Restaurante->find('list', $options);
			$this->set(compact('restaurantes'));
		} else {
			$options = array('fields' => 'Restaurante.nome');
			$restaurantes = $this->Culinaria->Restaurante->find('list', $options);
			$this->set(compact('restaurantes'));
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
		if (!$this->Culinaria->exists($id)) {
			throw new NotFoundException(__('Invalid culinaria'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Culinaria->save($this->request->data)) {
				$this->Session->setFlash(__('The culinaria has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The culinaria could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Culinaria.' . $this->Culinaria->primaryKey => $id));
			$this->request->data = $this->Culinaria->find('first', $options);
		}
		$restaurantes = $this->Culinaria->Restaurante->find('list');
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
		$this->Culinaria->id = $id;
		if (!$this->Culinaria->exists()) {
			throw new NotFoundException(__('Invalid culinaria'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Culinaria->delete()) {
			$this->Session->setFlash(__('The culinaria has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The culinaria could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
