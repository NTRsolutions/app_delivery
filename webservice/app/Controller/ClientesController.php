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
	        	 
	        	if ($this->validar()) {

	        		$message = 'Logou';

	        	} else {

	        		$message = 'Não Logou';

			    	$user1 = $this->Cliente->findAllByEmail($this->data['Cliente']['email']);

					if (empty($user1)) {
						$message = 'Usuário não existe !';
					} else {
						$message = 'Login e/ou senha inválidos !';
					}
			    }

			} else {
				$message = 'Ocorreu algum erro. Tente novamente.';
			}

			$this->set(array(
	            'message' => $message,
	            '_serialize' => array('message')
	        ));
		}
	}

	public function validar(){
		
		$user = $this->Cliente->findAllByEmailAndSenha(
    				$this->data['Cliente']['email'],
    				md5($this->data['Cliente']['senha']));
		if (!empty($user)) {
			return true;
		} else {
			return false;
		}
	}


	public function add() {
		
		$message = '';

		if ($this->request->is('post')) {

			$this->request->data['Cliente']['senha'] = md5($this->request->data['Cliente']['senha']);

			$this->Cliente->create();
			if ($this->Cliente->save($this->request->data)) {
	            $message = 'Saved';
	        } else {
	            $message = 'Error';
	        }
	        $this->set(array(
	            'message' => $message,
	            '_serialize' => array('message')
	        ));
	    }
	}
}
