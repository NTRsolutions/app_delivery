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

		$gerente = $this->Session->read('Gerente');
		$options = array('fields' => 'Pagamento.idDescricao', 'conditions' => array('Pagamento.restaurante_id' => $gerente['0']['Restaurante']['0']['id']));
		$pgtos = $this->Pagamento->find('list', $options);

		$tipo = array(
            1  => 'Cartão de Crédito - Visa',
            2  => 'Cartão de Crédito - MasterCard',
            3  => 'Cartão de Crédito - American Express',
            4  => 'Cartão de Crédito - Diners',
            5  => 'Cartão de Crédito - HiperCard',
            6  => 'Cartão de Crédito - Aura ',
            7  => 'Cartão de Crédito - Elo',
            8  => 'Cartão de Débito - Visa Electron',
            9  => 'Cartão de Débito - MasterCard Maestro',
            10 => 'Cartão de Débito - Elo',
            11 => 'Cartão Refeição - Ticket',
            12 => 'Cartão Refeição - Sodexo',
            13 => 'Cartão Refeição - Cabal',
            14 => 'Dinheiro',
            15 => 'Boleto Bancário',
            16 => 'PayPal',
            17 => 'PagSeguro'
        );
        $this->set(compact('tipo'));

		if ($this->request->is('post')) {

			if(!empty($this->data['Pagamento']['descricao'])){
                	
                $tamPgto = count($pgtos);
				$tamData = count($this->data['Pagamento']['descricao']);

				if($tamData > $tamPgto) {

					$save = $this->addPagamento($this->data['Pagamento']['descricao'], $tipo);

					if ($save == true) {
						$this->Session->setFlash(__('Os pagamentos selecionados foram salvos com sucesso!'), 'default', array('class' => 'alert alert-success'));
						return $this->redirect(array('controller' => 'gerentes', 'action' => 'meu_restaurante'));
					} else {
						$this->Session->setFlash(__('Os pagamentos selecionados não foram salvos. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
					}

 				} else if ($tamData < $tamPgto) {

                	$this->excluirPagamento($this->data['Pagamento']['descricao'], $pgtos, $tipo);

                } else {

                	$save = $this->addPagamento($this->data['Pagamento']['descricao'], $tipo);
                	$this->excluirPagamento($this->data['Pagamento']['descricao'], $pgtos, $tipo);
                }
            }

		} else {
			$gerente = $this->Session->read('Gerente');
			$options = array('fields' => 'Pagamento.idDescricao', 'conditions' => array('Pagamento.restaurante_id' => $gerente['0']['Restaurante']['0']['id']));
			$this->request->data['Pagamento']['descricao'] = $this->Pagamento->find('list', $options);
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

	public function addPagamento($data, $tipo) {

		$save = false;

		foreach ($data as $pd) {

        	$pgtoDesc = $this->Pagamento->findByDescricao($tipo[$pd]);

        	if(empty($pgtoDesc)) {
            	$pgto = array('idDescricao' => $pd, 'descricao' => $tipo[$pd], 'restaurante_id' => $this->request->data['Pagamento']['restaurante_id']); 
            	$this->Pagamento->create();
            	$this->Pagamento->save($pgto);
            	$save = true;
            }
        }

        return $save;
	}

	public function excluirPagamento($data1, $data2, $tipo) {

		$existe = false;

    	foreach ($data2 as $p) {

    		$existe = false;

    		$type2 = $this->Pagamento->findByDescricao($tipo[$p]);

    		foreach ($data1 as $pd) {

        		$type = $this->Pagamento->findByDescricao($tipo[$pd]);

        		if($type2['Pagamento']['descricao'] == $type['Pagamento']['descricao']) {
        			$existe = true;
        		} 
        	}

        	if($existe == false) {
        		$this->delete2($type2['Pagamento']['id']);
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
			$this->Session->setFlash(__('O pagamento foi excluído com sucesso!'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The pagamento could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function delete2($id = null) {
		$this->Pagamento->id = $id;
		if (!$this->Pagamento->exists()) {
			throw new NotFoundException(__('Invalid pagamento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pagamento->delete()) {
			$this->Session->setFlash(__('O pagamento marcado e/ou desmarcado foi adicionado e/ou excluído com sucesso!'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The pagamento could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('controller' => 'gerentes', 'action' => 'meu_restaurante'));
	}
}
