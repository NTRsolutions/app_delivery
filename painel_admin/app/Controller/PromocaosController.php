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

			if(!empty($this->data['Promocao']['produto'])){
				
				$save = false;

				foreach ($this->data['Promocao']['produto'] as $pp) {

	        		$promo = array('data_ini' => $this->request->data['Promocao']['data_ini'], 
	        			           'data_fim' => $this->request->data['Promocao']['data_fim'], 
	        			           'desconto' => $this->request->data['Promocao']['desconto'],
	        			           'produto_id' => $pp,
	        			           'restaurante_id' => $this->request->data['Promocao']['restaurante_id']);
	            	$this->Promocao->create();
	            	$this->Promocao->save($promo);
	            	$save = true;
	        	}
	        }
		    
			if ($save == true) {
				$this->Session->setFlash(__('A promoção para o(s) produto(s) selecionado(s) foi salva com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A promoção para o(s) produto(s) selecionado(s) não foi salva. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}

		$gerente = $this->Session->read('Gerente');

		$options = array('fields' => 'Produto.nome', 'conditions' => array('Produto.restaurante_id' => $gerente['0']['Restaurante']['0']['id']));
		$produtos = $this->Promocao->Produto->find('list', $options);
		$this->set(compact('produtos'));
		
		$options = array('fields' => 'Restaurante.nome', 'conditions' => array('Restaurante.id' => $gerente['0']['Restaurante']['0']['id']));
		$restaurantes = $this->Promocao->Restaurante->find('list', $options);
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
		if (!$this->Promocao->exists($id)) {
			throw new NotFoundException(__('Invalid promocao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Promocao->save($this->request->data)) {
				$this->Session->setFlash(__('A promoção para o(s) produto(s) selecionado(s) foi salva com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A promoção para o(s) produto(s) selecionado(s) não foi salva. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Promocao.' . $this->Promocao->primaryKey => $id));
			$this->request->data = $this->Promocao->find('first', $options);
		}

		$gerente = $this->Session->read('Gerente');

		$options = array('fields' => 'Produto.nome', 'conditions' => array('Produto.restaurante_id' => $gerente['0']['Restaurante']['0']['id']));
		$produtos = $this->Promocao->Produto->find('list', $options);

		$options = array('fields' => 'Restaurante.nome', 'conditions' => array('Restaurante.id' => $gerente['0']['Restaurante']['0']['id']));
		$restaurantes = $this->Promocao->Restaurante->find('list', $options);
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
			$this->Session->setFlash(__('A promoção foi excluída com sucesso.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The promocao could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
