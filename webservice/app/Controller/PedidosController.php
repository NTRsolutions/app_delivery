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

	public function get($cliente_id = null) {
		if ($cliente_id != null) {
			$options = array(
				'contain' => array(
					'Endereco',
					'Cliente',
					'Pagamento',
					'PedidoProduto' => array(
						'Produto' => array(
							'ProdutoComplemento' => array(
								'Complemento'
							)
						)
					)
				),
				'conditions' => array(
					'Pedido.cliente_id' => $cliente_id
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
