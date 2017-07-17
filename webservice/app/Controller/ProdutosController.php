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

	public function get($id = null) {
		if ($id != null) {
			$produtos = $this->Produto->findById($id);
			
			$this->set(array(
	            'message' => $produtos,
	            '_serialize' => array('message')
	        ));
		}

	}
}
