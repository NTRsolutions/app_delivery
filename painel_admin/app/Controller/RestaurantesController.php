<?php
App::uses('AppController', 'Controller');
/**
 * Restaurantes Controller
 *
 * @property Restaurante $Restaurante
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class RestaurantesController extends AppController {

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
		$this->Restaurante->recursive = 0;
		$this->set('restaurantes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Restaurante->exists($id)) {
			throw new NotFoundException(__('Invalid restaurante'));
		}
		$options = array('conditions' => array('Restaurante.' . $this->Restaurante->primaryKey => $id), 'recursive' => 2);
		$this->set('restaurante', $this->Restaurante->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->loadModel('Cidade');
		$this->loadModel('Estado');
		$this->loadModel('Endereco');
		$this->loadModel('RestauranteEndereco');

		$cidades = $this->Cidade->find('all');
		$estados = $this->Estado->find('all');

		$options = array('fields' => 'Gerente.nome');
		$gerentes = $this->Restaurante->Gerente->find('list', $options);

		$options = array('fields' => 'Franqueado.nome');
		$franqueados = $this->Restaurante->Franqueado->find('list', $options);
		$this->set(compact('gerentes', 'franqueados'));
		
		if ($this->request->is('post')) {

			$this->Restaurante->create();
			if ($this->Restaurante->save($this->request->data['Restaurante'])) {
				$id_rest = $this->Restaurante->getLastInsertId();
				
				debug($this->request->data);

				$existe = false;

				foreach ($estados as $e) {
					if($e['Estado']['nome'] == $this->request->data['Estado']['nome']) {
						$id_est = $e['Estado']['id'];
						$existe = true;
					}
				}

				if($existe == false) {

					$est = array('nome' => $this->request->data['Estado']['nome']); 

					$this->Estado->create();
					if ($this->Estado->save($est)) {
						$id_est = $this->Estado->getLastInsertId();
					}
				
				}

				$existe = false;

				foreach ($cidades as $c) {
					if($c['Cidade']['nome'] == $this->request->data['Cidade']['nome']) {
						$id_city = $c['Cidade']['id'];
						$existe = true;
					}
				}

				if($existe == false) {

					$city = array('nome' => $this->request->data['Cidade']['nome'], 'estado_id' => $id_est); 

					$this->Cidade->create();
					if ($this->Cidade->save($city)) {
						$id_city = $this->Cidade->getLastInsertId();
					}
				}

				$end = array('rua' => $this->request->data['Endereco']['rua'], 
					'numero' => $this->request->data['Endereco']['numero'], 
					'bairro' => $this->request->data['Endereco']['bairro'],
					'complemento' => $this->request->data['Endereco']['complemento'],
					'cep' => $this->request->data['Endereco']['cep'],
					'cidade_id' => $id_city);
				
				$this->Endereco->create();
				if ($this->Endereco->save($end)) {
					$id_end = $this->Endereco->getLastInsertId();

					$rest_end = array('endereco_id' => $id_end, 'restaurante_id' => $id_rest);

					$this->RestauranteEndereco->create();
					if ($this->RestauranteEndereco->save($rest_end)) {
						$this->Session->setFlash(__('The restaurante has been saved.'), 'default', array('class' => 'alert alert-success'));
						return $this->redirect(array('controller' => 'franqueados', 'action' => 'home'));
					} else {
						$this->Session->setFlash(__('The restaurante could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
					}			
				} else {
					$this->Session->setFlash(__('The restaurante could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
			} else {
				$this->Session->setFlash(__('The restaurante could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Restaurante->exists($id)) {
			throw new NotFoundException(__('Invalid restaurante'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Restaurante->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurante has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurante could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Restaurante.' . $this->Restaurante->primaryKey => $id));
			$this->request->data = $this->Restaurante->find('first', $options);
		}
		
		$options = array('fields' => 'Gerente.nome');
		$gerentes = $this->Restaurante->Gerente->find('list', $options);

		$options = array('fields' => 'Franqueado.nome');
		$franqueados = $this->Restaurante->Franqueado->find('list', $options);
		$this->set(compact('gerentes', 'franqueados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Restaurante->id = $id;
		if (!$this->Restaurante->exists()) {
			throw new NotFoundException(__('Invalid restaurante'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Restaurante->delete()) {
			$this->Session->setFlash(__('The restaurante has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The restaurante could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function delete_foto($id = null, $idCity = null) {
		$this->Restaurante->id = $id;
		if (!$this->Restaurante->exists()) {
			throw new NotFoundException(__('Invalid restaurante'));
		}
		$this->Restaurante->updateAll(array('foto' => null), array('Restaurante.id' => $id));
		return $this->redirect(array('controller' => 'gerentes', 'action' => 'meu_restaurante'));
	}
}
