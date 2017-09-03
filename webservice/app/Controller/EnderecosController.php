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
 * add method
 *
 * @return void
 */
	public function add() {

		$this->loadModel('Cidade');
		$this->loadModel('Estado');
		$this->loadModel('Cliente');
		$this->loadModel('ClienteEndereco');

		$cidades = $this->Cidade->find('all');
		$estados = $this->Estado->find('all');

		if ($this->request->is('post')) {

			$existe = false;

			$cliente_id = $this->request->data['Endereco']['cliente_id'];

			foreach ($estados as $e) {
				if($e['Estado']['nome'] == $this->request->data['Endereco']['estado']) {
					$id_est = $e['Estado']['id'];
					$existe = true;
				}
			}

			if($existe == false) {

				$est = array('nome' => $this->request->data['Endereco']['estado']); 

				$this->Estado->create();
				if ($this->Estado->save($est)) {
					$id_est = $this->Estado->getLastInsertId();
				}			
			}

			$existe = false;

			foreach ($cidades as $c) {
				if($c['Cidade']['nome'] == $this->request->data['Endereco']['cidade']) {
					$id_city = $c['Cidade']['id'];
					$existe = true;
				}
			}

			if($existe == false) {

				$city = array('nome' => $this->request->data['Endereco']['cidade'], 'estado_id' => $id_est); 

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

				$cliente_end = array('endereco_id' => $id_end, 'cliente_id' => $cliente_id);

				$this->ClienteEndereco->create();
				if ($this->ClienteEndereco->save($cliente_end)) {
					$message = $id_end;
				} else {
					$message = -10;	
				}
			} else {
				$message = -10;
			}

			$this->set(array(
	            'message' => $message,
	            '_serialize' => array('message')
	        ));
		}		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit() {
		$this->loadModel('Cidade');
		$this->loadModel('Estado');
		$this->loadModel('Cliente');
		$this->loadModel('ClienteEndereco');

		$cidades = $this->Cidade->find('all');
		$estados = $this->Estado->find('all');

		if ($this->request->is('post')) {

			$existe = false;
			$cliente_id = $this->request->data['Endereco']['cliente_id'];

			foreach ($estados as $e) {
				if($e['Estado']['nome'] == $this->request->data['Endereco']['estado']) {
					$id_est = $e['Estado']['id'];
					$existe = true;
				}
			}

			if($existe == false) {

				$est = array('nome' => $this->request->data['Endereco']['estado']); 

				$this->Estado->create();
				if ($this->Estado->save($est)) {
					$id_est = $this->Estado->getLastInsertId();
				}			
			}

			$existe = false;

			foreach ($cidades as $c) {
				if($c['Cidade']['nome'] == $this->request->data['Endereco']['cidade']) {
					$id_city = $c['Cidade']['id'];
					$existe = true;
				}
			}

			if($existe == false) {

				$city = array('nome' => $this->request->data['Endereco']['cidade'], 'estado_id' => $id_est); 

				$this->Cidade->create();
				if ($this->Cidade->save($city)) {
					$id_city = $this->Cidade->getLastInsertId();
				}
			}

			$end = array('id' => $this->request->data['Endereco']['id'],
				'rua' => $this->request->data['Endereco']['rua'], 
				'numero' => $this->request->data['Endereco']['numero'], 
				'bairro' => $this->request->data['Endereco']['bairro'],
				'complemento' => $this->request->data['Endereco']['complemento'],
				'cep' => $this->request->data['Endereco']['cep'],
				'lat' => $this->request->data['Endereco']['lat'],
				'lng' => $this->request->data['Endereco']['lng'],
				'cidade_id' => $id_city);

			$this->Endereco->create();

			if ($this->Endereco->save($end)) {
				$message = 1;
			} else {
				$message = -10;	
			}

			$this->set(array(
	            'message' => $message,
	            '_serialize' => array('message')
	        ));
		}		
	}


	public function get() {
		$ids = $this->request->data['ids'];
		$enderecos = array();
		for ($i=0; $i < count($ids); $i++) {
			$e = $this->Endereco->findById($ids[$i]);
			array_push($enderecos, $e);
		}

		$this->set(array(
            'message' => $enderecos,
            '_serialize' => array('message')
        ));
	}
}
