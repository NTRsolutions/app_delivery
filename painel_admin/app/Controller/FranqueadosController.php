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
		$franq = $this->Franqueado->find('first', $options);
		$this->set('franqueado', $franq);

		$ends = array();
		$this->loadModel('Endereco');
		$this->loadModel('Estado');
		foreach ($franq['FranqueadoEndereco'] as $franq_end) {
			$options = array(
				'conditions' => array(
					'Endereco.id' => $franq_end['endereco_id']
				),
				'recursive' => 2
			);

			array_push($ends, $this->Endereco->find('first', $options));
		}
		$this->set('ends', $ends);
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
		$this->loadModel('FranqueadoEndereco');

		$cidades = $this->Cidade->find('all');
		$estados = $this->Estado->find('all');

		if ($this->request->is('post')) {

			$this->Franqueado->create();
			if ($this->Franqueado->save($this->request->data['Franqueado'])) {
				$id_franq = $this->Franqueado->getLastInsertId();

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
					'tipo' => $this->request->data['Endereco']['tipo'],
					'cidade_id' => $id_city);

				$this->Endereco->create();
				if ($this->Endereco->save($end)) {
					$id_end = $this->Endereco->getLastInsertId();

					$franq_end = array('endereco_id' => $id_end, 'franqueado_id' => $id_franq);

					$this->FranqueadoEndereco->create();
					if ($this->FranqueadoEndereco->save($franq_end)) {
						$this->Session->setFlash(__('O franqueado foi salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
						return $this->redirect(array('controller' => 'admins', 'action' => 'home'));	
					} else {
						$this->Session->setFlash(__('The franqueado could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
					}			
				} else {
					$this->Session->setFlash(__('The franqueado could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
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

		$this->loadModel('Endereco');

		$options = array('fields' => 'Cidade.nome');
		$this->set('cidades', $this->Endereco->Cidade->find('list', $options));

		if ($this->request->is(array('post', 'put'))) {
			if($this->Session->check('Admin')) {
				if ($this->Franqueado->save($this->request->data['Franqueado'])) {
					$this->Session->setFlash(__('The franqueado has been saved.'), 'default', array('class' => 'alert alert-success'));
					return $this->redirect(array('controller' => 'admins', 'action' => 'home'));
				} else {
					$this->Session->setFlash(__('The franqueado could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
			} else {
				if ($this->Franqueado->save($this->request->data['Franqueado']) && $this->Endereco->save($this->request->data['Endereco'])) {
					$this->Session->setFlash(__('The franqueado has been saved.'), 'default', array('class' => 'alert alert-success'));
					return $this->redirect(array('action' => 'meu_perfil', $id));
				} else {
					$this->Session->setFlash(__('The franqueado could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
			}
		} else {
			$options = array('conditions' => array('Franqueado.' . $this->Franqueado->primaryKey => $id));
			$this->request->data = $this->Franqueado->find('first', $options);

			$endereco = $this->Endereco->findById($this->request->data['FranqueadoEndereco']['0']['endereco_id']);
			$this->request->data = array_merge($this->request->data, $endereco);
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
		if ($this->Session->check('Admin')) {
			return $this->redirect(array('controller' => 'admins', 'action' => 'home'));	
		}
		return $this->redirect(array('controller' => 'admins', 'action' => 'index_login'));
	}

	public function home() {
		$this->loadModel('Restaurante');
		$franq = $this->Session->read('Franqueado');
		$options = array(
			'conditions' => array(
				'Restaurante.franqueado_id' => $franq['0']['Franqueado']['id']
			)
		);
		$this->set('restaurantes', $this->Restaurante->find('all', $options));
	}

	public function recuperar_senha() {
		
	}

	public function altera_senha() {
		$franqueado = $this->Session->read('Franqueado');
	    $franqueado = $this->Franqueado->findById($franqueado['0']['Franqueado']['id']); 
		$this->set('franqueado', $franqueado);
	}

	public function altera(){
		$franqueado = $this->Session->read('Franqueado');
		$franqueado = $this->Franqueado->findById($franqueado['0']['Franqueado']['id']);
		$this->set('franqueado', $franqueado);

		if (!empty($this->data))  {

			if((md5($this->data['Franqueado']['old_password']) == $franqueado['Franqueado']['senha'])) {

				if ($this->data['Franqueado']['new_password'] == $this->data['Franqueado']['confirm_password']){

					$data = array('id' => $franqueado['Franqueado']['id'], 'senha' => md5($this->data['Franqueado']['new_password']));

					if ($this->Franqueado->save($data)){

						$this->Session->setFlash(__('Senha alterada com sucesso.'), 'default', array('class' => 'alert alert-success'));
						//erro aki. reiniciar sessão, sei lá
						$this->redirect(array('action' => 'edit', $franqueado['Franqueado']['id']));
						exit();
					}
					else{
						$this->Session->setFlash(__('Ocorreu um problema, e não foi possível alterar a sua senha. Tente novamente mais tarde.'), 'default', array('class'=>'alert alert-danger'));
						$this->redirect(array('action' => 'edit', $franqueado['Franqueado']['id']));
						exit();
					}
				}
				else{
					$this->Session->setFlash(__('A confirmação da nova senha está incorreta!'), 'default', array('class'=>'alert alert-danger'));
					$this->redirect(array('action' => 'altera_senha', $franqueado['Franqueado']['id']));
					exit();
				}
			}
			else{
				$this->Session->setFlash('A senha atual informada está incorreta!', 'default', array('class'=>'alert alert-danger'));
				$this->redirect(array('action' => 'altera_senha', $franqueado['Franqueado']['id']));
				exit();
			}
		} 
	}

	public function meu_perfil() {
		
		$franqueado = $this->Session->read('Franqueado');
	    $franqueado = $this->Franqueado->findById($franqueado['0']['Franqueado']['id']); 
		$this->set('franqueado', $franqueado);

		$ends = array();
		$this->loadModel('Endereco');
		$this->loadModel('Estado');
		foreach ($franqueado['FranqueadoEndereco'] as $franq_end) {
			$options = array(
				'conditions' => array(
					'Endereco.id' => $franq_end['endereco_id']
				),
				'recursive' => 2
			);

			array_push($ends, $this->Endereco->find('first', $options));
		}
		$this->set('ends', $ends);
	}	

	public function relatorios() {
		
	}
}
