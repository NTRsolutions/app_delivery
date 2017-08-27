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
		if ($this-$request->is('post')) {
			$options = array(
				'conditions' => array(
					'Pedido.cliente_id' => $this->data['cliente_id'];
				)
			);
			
			$pedidos = $this->Pedido->find('all', $options);

			$this->set(array(
	            'message' => $pedidos,
	            '_serialize' => array('message')
	        ));
		}
	}
}
