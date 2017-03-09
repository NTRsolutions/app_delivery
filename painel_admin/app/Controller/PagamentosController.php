<?php
App::uses('AppController', 'Controller');
/**
 * Pagamentos Controller
 *
 * @property Pagamento $Pagamento
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PagamentosController extends AppController {

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
		$this->Pagamento->recursive = 0;
		$this->set('pagamentos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pagamento->exists($id)) {
			throw new NotFoundException(__('Invalid pagamento'));
		}
		$options = array('conditions' => array('Pagamento.' . $this->Pagamento->primaryKey => $id));
		$this->set('pagamento', $this->Pagamento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		$tipo = array(
            'Cartão de Crédito - Visa',
            'Cartão de Crédito - MasterCard',
            'Cartão de Crédito - American Express',
            'Cartão de Crédito - Diners',
            'Cartão de Crédito - HiperCard',
            'Cartão de Crédito - Aura ',
            'Cartão de Crédito - Elo',
            'Cartão de Débito - Visa Electron',
            'Cartão de Débito - MasterCard Maestro',
            'Cartão de Débito - Elo',
            'Cartão Refeição - Ticket',
            'Cartão Refeição - Sodexo',
            'Cartão Refeição - Cabal',
            'Dinheiro',
            'Boleto Bancário',
            'PayPal',
            'PagSeguro'
        );
        $this->set(compact('tipo'));

		if ($this->request->is('post')) {

			if(!empty($this->data['Pagamento']['descricao'])){

                foreach ($this->data['Pagamento']['descricao'] as $pd) {

                	$save = false;

                	$pgto = array('descricao' => $pd, 'restaurante_id' => $this->request->data['Pagamento']['restaurante_id']); 
                	
                	$this->Pagamento->create();
                	$this->Pagamento->save($pgto);
                	$save = true;
                }
            }
			
			if ($save == true) {
				$this->Session->setFlash(__('Os pagamentos selecionados foram salvos com sucesso'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'gerentes', 'action' => 'meu_restaurante'));
			} else {
				$this->Session->setFlash(__('Os pagamentos selecionados não foram salvos. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}

		if($this->Session->check('Gerente')){
			$gerente = $this->Session->read('Gerente');
			$options = array('fields' => 'Restaurante.nome', 'conditions' => array('Restaurante.id' => $gerente['0']['Restaurante']['0']['id']));
			$restaurantes = $this->Pagamento->Restaurante->find('list', $options);
			$this->set(compact('restaurantes'));
		} else {
			$options = array('fields' => 'Restaurante.nome');
			$restaurantes = $this->Pagamento->Restaurante->find('list', $options);
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
		if (!$this->Pagamento->exists($id)) {
			throw new NotFoundException(__('Invalid pagamento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pagamento->save($this->request->data)) {
				$this->Session->setFlash(__('The pagamento has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pagamento could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Pagamento.' . $this->Pagamento->primaryKey => $id));
			$this->request->data = $this->Pagamento->find('first', $options);
		}
		$restaurantes = $this->Pagamento->Restaurante->find('list');
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
		$this->Pagamento->id = $id;
		if (!$this->Pagamento->exists()) {
			throw new NotFoundException(__('Invalid pagamento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pagamento->delete()) {
			$this->Session->setFlash(__('The pagamento has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The pagamento could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
