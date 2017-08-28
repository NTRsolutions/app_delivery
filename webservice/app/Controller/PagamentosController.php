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

	public function get() {
		if ($this->request->is('post')) {
			$options = array(
				'conditions' => array(
					'Pagamento.restaurante_id' => $this->data['id']
				)
			);
			
			$pags = $this->Pagamento->find('all', $options);

			$this->set(array(
	            'message' => $pags,
	            '_serialize' => array('message')
	        ));
		}
	}
}
