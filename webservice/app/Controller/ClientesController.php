<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ClientesController extends AppController {

	public function login() {

		$message = '';

		if ($this->request->is('post')) {

			if (!empty($this->data['Cliente']['email']) and
	        	!empty($this->data['Cliente']['senha'])) {
	        	 
	        	$user = $this->Cliente->findAllByEmailAndSenha(
    				$this->data['Cliente']['email'],
    				md5($this->data['Cliente']['senha']));

	        	if (!empty($user)) {	        		

	        		$message = $user;

	        	} else {

	        		$message = -1;
			    }

			} else {
				$message = -10;
			}

			$this->set(array(
	            'message' => $message,
	            '_serialize' => array('message')
	        ));
		}
	}


	public function add() {
		
		$message = '';		
		
		if ($this->request->is('post')) {
			
			if ($this->user_duplicado()) {
				$message = -2;
			} else {
				$this->request->data['Cliente']['senha'] = md5($this->request->data['Cliente']['senha']);

				$this->Cliente->create();
				if ($this->Cliente->save($this->request->data)) {
					$user = $this->Cliente->findAllById($this->Cliente->getLastInsertId());
		            $message = $user;
		        } else {
		            $message = -10;
		        }
		    }

	        $this->set(array(
	            'message' => $message,
	            '_serialize' => array('message')
	        ));
	    }
	}

	public function user_duplicado(){
		
		$user = $this->Cliente->findAllByEmail(
    				$this->data['Cliente']['email']);
		
		if (count($user) > 1) {
			return true;
		} else {
			return false;
		}
	}

	public function get($id = null) {
		if ($this->request->is('post')) {
			
			$user = $this->Cliente->findAllById($this->data['id']);

	        $this->set(array(
	            'message' => $user,
	            '_serialize' => array('message')
	        ));
	    }
	}

	public function check_senha() {
		$message = "0";
		if ($this->request->is('post')) {
			if (md5($this->data['senha1']) == $this->data['senha2']) {
				$message = "1";
			}

	        $this->set(array(
	        	'message' => $message,
	            '_serialize' => array('message')
	        ));
	    }
	}
}
