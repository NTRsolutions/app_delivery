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
		$this->loadModel('Endereco');
		$this->loadModel('FranqueadoEndereco');

		$options = array('fields' => 'Cidade.nome');
		$this->set('cidades', $this->Endereco->Cidade->find('list', $options));

		if ($this->request->is('post')) {
			$this->Franqueado->create();
			if ($this->Franqueado->save($this->request->data['Franqueado'])) {
				$id_franq = $this->Franqueado->getLastInsertId();

				$this->Endereco->create();
				if ($this->Endereco->save($this->request->data['Endereco'])) {
					$id_end = $this->Endereco->getLastInsertId();

					$franq_end = array('endereco_id' => $id_end, 'franqueado_id' => $id_franq);
					$this->FranqueadoEndereco->create();
					if ($this->FranqueadoEndereco->save($franq_end)) {
						$this->Session->setFlash(__('The franqueado has been saved.'), 'default', array('class' => 'alert alert-success'));
						return $this->redirect(array('action' => 'index'));
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
			if ($this->Franqueado->save($this->request->data['Franqueado']) /*&& $this->Endereco->save($this->request->data['Endereco'])*/) {
				$this->Session->setFlash(__('The franqueado has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The franqueado could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Franqueado.' . $this->Franqueado->primaryKey => $id));
			$this->request->data = $this->Franqueado->find('first', $options);

			//$endereco = $this->Endereco->findById($this->request->data['FranqueadoEndereco']['0']['endereco_id']);
			//$this->request->data = array_merge($this->request->data, $endereco);
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
		$this->Franqueado->recursive = 0;
		$this->set('franqueados', $this->Paginator->paginate());
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
	}	

	public function relatorios() {
		
	}
}
