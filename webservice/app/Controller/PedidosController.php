<?php
App::uses('AppController', 'Controller');
/**
 * Pedidos Controller
 *
 * @property Pedido $Pedido
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PedidosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function get() {
		if ($this->request->is('post')) {
			$options = array(
				'conditions' => array(
					'Pedido.cliente_id' => $this->data['cliente_id']
				)
			);
			
			$pedidos = $this->Pedido->find('all', $options);

			$this->set(array(
	            'message' => $pedidos,
	            '_serialize' => array('message')
	        ));
		}
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->loadModel('PedidoProduto');

			$pedido = array(
						'cliente_id' => $this->data['Pedido']['cliente_id'],
						'pagamento_id' => $this->data['Pedido']['pagamento_id'],
						'restaurante_id' => $this->data['Pedido']['restaurante_id'],
						'status' => $this->data['Pedido']['status'],
						'total' => $this->data['Pedido']['total'],
						'troco' => $this->data['Pedido']['troco'],
						'endereco_id' => $this->data['Pedido']['endereco_id'],
						'data' =>  date("Y-m-d H:i:s")
					);

			$ped = $this->data['Pedido'];
			
			$this->Pedido->create();

			if($this->Pedido->save($pedido)) {
				$id_ped = $this->Pedido->getLastInsertId();

				$x = array();
				for ($i = 0; $i < sizeof($ped['produtos']); $i++) {
					$p = $ped['produtos'][$i];
					$qtd = $ped['qtd'][$i];

					$pp = array('pedido_id' => $id_ped, 'produto_id' => $p['id'], 'qtd' => $qtd);

					$this->PedidoProduto->create();
					$this->PedidoProduto->save($pp);
				}

				$this->set(array(
		            'message' => 1,
		            '_serialize' => array('message')
		        ));
			} else {				
				$this->set(array(
		            'message' => -10,
		            '_serialize' => array('message')
		        ));
			}
		}
	}
}
