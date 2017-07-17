<?php
App::uses('AppController', 'Controller');
/**
 * Sugestaos Controller
 *
 * @property Sugestao $Sugestao
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class SugestaosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function add() {
		if ($this->request->is('post')) {
			
			$message = '';

			$this->Sugestao->create();
			if ($this->Sugestao->save($this->request->data)) {
	            $message = 1;
	        } else {
	            $message = -10;
	        }    

	        $this->set(array(
	            'message' => $message,
	            '_serialize' => array('message')
	        ));
	    }
	}
}
