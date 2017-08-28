<?php
App::uses('AppController', 'Controller');
/**
 * PedidoProdutos Controller
 *
 * @property PedidoProduto $PedidoProduto
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PedidoProdutosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function get() {
		if ($this->request->is('post')) {
			$pedidos = array();
			$ids = $this->data['ids'];

			foreach ($ids as $id) {
				$options = array(
					'conditions' => array(
						'PedidoProduto.pedido_id' => $id
					)
				);
				$r = $this->PedidoProduto->find('first', $options);
				array_push($pedidos, $r);
			}

			$this->set(array(
	            'message' => $pedidos,
	            '_serialize' => array('message')
	        ));
		}
	}
}
