<?php
App::uses('AppController', 'Controller');
/**
 * Atendentes Controller
 *
 * @property Atendente $Atendente
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class AtendentesController extends AppController {

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
		$this->Atendente->recursive = 0;
		$this->set('atendentes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Atendente->exists($id)) {
			throw new NotFoundException(__('Invalid atendente'));
		}
		$options = array('conditions' => array('Atendente.' . $this->Atendente->primaryKey => $id));
		$this->set('atendente', $this->Atendente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Atendente->create();
			if ($this->Atendente->save($this->request->data)) {
				$this->Session->setFlash(__('The atendente has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The atendente could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$restaurantes = $this->Atendente->Restaurante->find('list');
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
		if (!$this->Atendente->exists($id)) {
			throw new NotFoundException(__('Invalid atendente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Atendente->save($this->request->data)) {
				$this->Session->setFlash(__('The atendente has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The atendente could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Atendente.' . $this->Atendente->primaryKey => $id));
			$this->request->data = $this->Atendente->find('first', $options);
		}
		$restaurantes = $this->Atendente->Restaurante->find('list');
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
		$this->Atendente->id = $id;
		if (!$this->Atendente->exists()) {
			throw new NotFoundException(__('Invalid atendente'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Atendente->delete()) {
			$this->Session->setFlash(__('The atendente has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The atendente could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function home() {
		$this->Atendente->recursive = 0;
		$this->set('atendentes', $this->Paginator->paginate());
	}

	public function recuperar_senha() {
		
	}

	public function altera_senha() {
		$atendente = $this->Session->read('Atendente');
	    $atendente = $this->Atendente->findById($atendente['0']['Atendente']['id']); 
		$this->set('atendente', $atendente);
	}

	public function altera(){
		$atendente = $this->Session->read('Atendente');
		$atendente = $this->Atendente->findById($atendente['0']['Atendente']['id']);
		$this->set('atendente', $atendente);

		if (!empty($this->data))  {

			if((md5($this->data['Atendente']['old_password']) == $atendente['Atendente']['senha'])) {

				if ($this->data['Atendente']['new_password'] == $this->data['Atendente']['confirm_password']){

					$data = array('id' => $atendente['Atendente']['id'], 'senha' => md5($this->data['Atendente']['new_password']));

					if ($this->Atendente->save($data)){

						$this->Session->setFlash(__('Senha alterada com sucesso.'), 'default', array('class' => 'alert alert-success'));
						//erro aki. reiniciar sessão, sei lá
						$this->redirect(array('action' => 'edit', $atendente['Atendente']['id']));
						exit();
					}
					else{
						$this->Session->setFlash(__('Ocorreu um problema, e não foi possível alterar a sua senha. Tente novamente mais tarde.'), 'default', array('class'=>'alert alert-danger'));
						$this->redirect(array('action' => 'edit', $atendente['Atendente']['id']));
						exit();
					}
				}
				else{
					$this->Session->setFlash(__('A confirmação da nova senha está incorreta!'), 'default', array('class'=>'alert alert-danger'));
					$this->redirect(array('action' => 'altera_senha', $atendente['Atendente']['id']));
					exit();
				}
			}
			else{
				$this->Session->setFlash('A senha atual informada está incorreta!', 'default', array('class'=>'alert alert-danger'));
				$this->redirect(array('action' => 'altera_senha', $atendente['Atendente']['id']));
				exit();
			}
		} 
	}

	public function meu_perfil() {
		$atendente = $this->Session->read('Atendente');
	    $atendente = $this->Atendente->findById($atendente['0']['Atendente']['id']); 
		$this->set('atendente', $atendente);
	}	
}
