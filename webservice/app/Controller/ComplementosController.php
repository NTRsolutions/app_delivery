<?php
App::uses('AppController', 'Controller');
/**
 * Complementos Controller
 *
 * @property Complemento $Complemento
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ComplementosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function get($produto_id = null) {
		if ($produto_id != null) {
			$complementos = $this->Complemento->findAllByProdutoId($produto_id);
			
			$this->set(array(
	            'message' => $complementos,
	            '_serialize' => array('message')
	        ));
		}

	}
}
