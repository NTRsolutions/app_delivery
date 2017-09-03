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

			$pedido = $this->data['pedido'];

			if($this->Pedido->save($pedido['Pedido'])) {
				$id_ped = $this->Pedido->getLastInsertId();

				foreach ($pedido['produtos'] as $p) {
					$pp = array('pedido_id' => $id_ped, 'produto_id' => $p['id'], 'qtd' => $p['qtd']);
				}
			}
		}

	}
}
