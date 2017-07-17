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

		$this->loadModel('Cidade');
		$this->loadModel('Estado');
		$this->loadModel('Gerente');
		$this->loadModel('RestauranteEndereco');

		$cidades = $this->Cidade->find('all');
		$estados = $this->Estado->find('all');

		$gerente = $this->Session->read('Gerente');
    $gerente = $this->Gerente->findById($gerente['0']['Gerente']['id']); 

		if ($this->request->is('post')) {

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
					'lat' => $this->request->data['Endereco']['lat'],
					'lng' => $this->request->data['Endereco']['lng'],
					'cidade_id' => $id_city);

			$this->Endereco->create();
			if ($this->Endereco->save($end)) {

				$id_end = $this->Endereco->getLastInsertId();

				$existe = false;

				foreach ($cidades as $c) {
					if($c['Cidade']['nome'] == $this->request->data['Cidade']['nome']) {
						$id_city = $c['Cidade']['id'];
						$existe = true;
					}
				}

				$rest_end = array('endereco_id' => $id_end, 'restaurante_id' => $gerente['Restaurante']['0']['id']);

				$this->RestauranteEndereco->create();
				if ($this->RestauranteEndereco->save($rest_end)) {
					$this->Session->setFlash(__('O endereço foi salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
					return $this->redirect(array('controller' => 'gerentes', 'action' => 'meu_restaurante'));
				}
			} else {
				$this->Session->setFlash(__('The endereco could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Endereco->exists($id)) {
			throw new NotFoundException(__('Invalid endereco'));
		}

		$this->loadModel('Cidade');
		$this->loadModel('Estado');

		$cidades = $this->Cidade->find('all');
		$estados = $this->Estado->find('all');

		if ($this->request->is(array('post', 'put'))) {
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
					'lat' => $this->request->data['Endereco']['lat'],
					'lng' => $this->request->data['Endereco']['lng'],
					'cidade_id' => $id_city);

			if ($this->Endereco->save($end)) {
				$this->Session->setFlash(__('O endereço foi salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'gerentes', 'action' => 'meu_restaurante'));
			} else {
				$this->Session->setFlash(__('The endereco could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Endereco.' . $this->Endereco->primaryKey => $id));
			$this->request->data = $this->Endereco->find('first', $options);		
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
		$this->Endereco->id = $id;
		if (!$this->Endereco->exists()) {
			throw new NotFoundException(__('Invalid endereco'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Endereco->delete()) {
			$this->Session->setFlash(__('O endereço foi excluído com sucesso.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The endereco could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		if($this->Session->check('Gerente')){
			return $this->redirect(array('controller' => 'gerentes', 'action' => 'meu_restaurante'));	
		} else{
			return $this->redirect(array('action' => 'index'));	
		}
	}
}
