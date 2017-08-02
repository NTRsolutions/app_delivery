<?php
App::uses('AppController', 'Controller');
/**
 * Gerentes Controller
 *
 * @property Gerente $Gerente
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class GerentesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function afterFilter() {
        if ($this->action == 'meu_perfil' or
            ($this->params['controller'] == 'gerentes' and $this->action == 'home') or
            $this->action == 'altera_senha' or
            $this->action == 'meu_restaurante') {
            $this->autenticar();
        }

        else if ($this->action == 'edit' and empty($this->Session->check('Gerente')) and empty($this->Session->check('Franqueado')) and empty($this->Session->check('Admin'))) {
			$this->Session->setFlash(__('Erro de permissão!'), 'default',
                array('class' => 'text-center alert alert-danger'));
            $this->redirect('../'.$this->Session->read('redirectUrl'));
		}

		else if ($this->params['controller'] == 'gerentes' and $this->action != 'home' and $this->action != 'edit' and empty($this->Session->check('Franqueado')) and empty($this->Session->check('Admin'))) {
         	$this->Session->setFlash(__('Erro de permissão!'), 'default',
                array('class' => 'text-center alert alert-danger'));
            $this->redirect('../'.$this->Session->read('redirectUrl'));   
        }
    }

    public function autenticar() {     	
        if (empty($this->Session->check('Gerente'))) {
            $this->Session->setFlash(__('Erro de permissão!'), 'default',
                array('class' => 'text-center alert alert-danger'));
            $this->redirect('../'.$this->Session->read('redirectUrl'));
        } 
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->Gerente->recursive = 0;
		$this->set('gerentes', $this->Gerente->Restaurante->find('all', $this->Paginator->paginate()));

		if($this->Session->check('Franqueado')) {	
			$franq = $this->Session->read('Franqueado');

			$options = array(
				'contain' => array(
					'Gerente'
				),
				'conditions' => array(
					'Restaurante.franqueado_id'	=>  $franq['0']['Franqueado']['id']
				)
			);

			$this->set('gerentes', $this->Gerente->Restaurante->find('all', $options, $this->Paginator->paginate()));
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Gerente->exists($id)) {
			throw new NotFoundException(__('Invalid gerente'));
		}
		$options = array('conditions' => array('Gerente.' . $this->Gerente->primaryKey => $id));
		$this->set('gerente', $this->Gerente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Gerente->create();
			if ($this->Gerente->save($this->request->data)) {
				$this->Session->setFlash(__('The gerente has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gerente could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Gerente->exists($id)) {
			throw new NotFoundException(__('Invalid gerente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Gerente->save($this->request->data)) {
				$this->Session->setFlash(__('The gerente has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gerente could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Gerente.' . $this->Gerente->primaryKey => $id));
			$this->request->data = $this->Gerente->find('first', $options);
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
		$this->Gerente->id = $id;
		if (!$this->Gerente->exists()) {
			throw new NotFoundException(__('Invalid gerente'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Gerente->delete()) {
			$this->Session->setFlash(__('The gerente has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The gerente could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function home() {
		if (!empty($this->Session->check('Gerente'))) {
			$this->Session->write('redirectUrl', $this->params['controller'].'/'.$this->action);
		}

		$gerente = $this->Session->read('Gerente');

		$this->loadModel('Pedido');
		$options = array(
			'contain' => array(
				'Endereco',
				'Cliente',
				'Pagamento',
				'PedidoProduto' => array(
					'Produto'
				)
			),
			'conditions' => array(
				'Pedido.restaurante_id'	=> $gerente['0']['Restaurante']['0']['id']
			),
			'order' => array(
				'Pedido.status',
				'Pedido.id'
			)
		);

		$pedidos = $this->Pedido->find('all', $options);
		$this->set(compact('pedidos'));
	}

	public function recuperar_senha() {
		
	}

	public function altera_senha() {
		$gerente = $this->Session->read('Gerente');
	    $gerente = $this->Gerente->findById($gerente['0']['Gerente']['id']); 
		$this->set('gerente', $gerente);
	}

	public function altera(){
		$gerente = $this->Session->read('Gerente');
		$gerente = $this->Gerente->findById($gerente['0']['Gerente']['id']);
		$this->set('gerente', $gerente);

		if (!empty($this->data))  {

			if((md5($this->data['Gerente']['old_password']) == $gerente['Gerente']['senha'])) {

				if ($this->data['Gerente']['new_password'] == $this->data['Gerente']['confirm_password']){

					$data = array('id' => $gerente['Gerente']['id'], 'senha' => md5($this->data['Gerente']['new_password']));

					if ($this->Gerente->save($data)){

						$this->Session->setFlash(__('Senha alterada com sucesso.'), 'default', array('class' => 'alert alert-success'));
						//erro aki. reiniciar sessão, sei lá
						$this->redirect(array('action' => 'edit', $gerente['Gerente']['id']));
						exit();
					}
					else{
						$this->Session->setFlash(__('Ocorreu um problema, e não foi possível alterar a sua senha. Tente novamente mais tarde.'), 'default', array('class'=>'alert alert-danger'));
						$this->redirect(array('action' => 'edit', $gerente['Gerente']['id']));
						exit();
					}
				}
				else{
					$this->Session->setFlash(__('A confirmação da nova senha está incorreta!'), 'default', array('class'=>'alert alert-danger'));
					$this->redirect(array('action' => 'altera_senha', $gerente['Gerente']['id']));
					exit();
				}
			}
			else{
				$this->Session->setFlash('A senha atual informada está incorreta!', 'default', array('class'=>'alert alert-danger'));
				$this->redirect(array('action' => 'altera_senha', $gerente['Gerente']['id']));
				exit();
			}
		} 
	}

	public function meu_perfil() {
		$gerente = $this->Session->read('Gerente');
	    $gerente = $this->Gerente->findById($gerente['0']['Gerente']['id']); 
		$this->set('gerente', $gerente);
	}

	public function meu_restaurante() {
		
		$gerente = $this->Session->read('Gerente');
	    $gerente = $this->Gerente->findById($gerente['0']['Gerente']['id']); 
		$this->set('gerente', $gerente);

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

		$ends = array();
		$this->loadModel('Endereco');
		foreach ($rest['0']['RestauranteEndereco'] as $rest_end) {
			$options = array(
				'conditions' => array(
					'Endereco.id' => $rest_end['endereco_id']
				),
				'recursive' => 2
			);

			array_push($ends, $this->Endereco->find('first', $options));
		}
		$this->set('ends', $ends);
	}	

	public function relatorios() {
		
	}

	public function status($id, $status) {
		$this->loadModel('Pedido');
		$this->Pedido->id = $id;
		$this->Pedido->saveField('status', $status+1);
		switch ($status) {
			case 0:
				$this->set('data', 'Em preparo');
				break;
			
			case 1:
				$this->set('data', 'À caminho');
				break;

			case 2:
				$this->set('data', 'Entregue');
				break;
		}        
    }
}
