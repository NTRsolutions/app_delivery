<?php
App::uses('AppController', 'Controller');
/**
 * Produtos Controller
 *
 * @property Produto $Produto
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ProdutosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function get() {
		if ($this->request->is('post')) {
			$produto = $this->Produto->findById($this->data['id']);
			
			$this->set(array(
	            'message' => $produto,
	            '_serialize' => array('message')
	        ));
		}
	}
}
