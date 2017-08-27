<?php
App::uses('AppController', 'Controller');
/**
 * Estados Controller
 *
 * @property Estado $Estado
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class EstadosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function get() {
		$id = $this->request->data['id'];
		$e = $this->Estado->findById($id);

		$this->set(array(
            'message' => $e,
            '_serialize' => array('message')
        ));
	}
}
