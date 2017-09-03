<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
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

	public function edit() {
		$message = "0";
		if ($this->request->is('post')) {
			$this->Cliente->create();
			$this->Cliente->id = $this->data['id'];
			if ($this->data['senha'] == "") {
				if($this->Cliente->saveField('nome', $this->data['nome']) &&
					$this->Cliente->saveField('email', $this->data['email']) &&
					$this->Cliente->saveField('telefone1', $this->data['telefone1']) &&
					$this->Cliente->saveField('telefone2', $this->data['telefone2'])) {
					$message = "1";
				}
			} else {
				$this->request->data['senha'] = md5($this->data['senha']);
				if($this->Cliente->save($this->request->data)){
					$message = "1";
				}
			}

	        $this->set(array(
	        	'message' => $message,
	            '_serialize' => array('message')
	        ));
	    }
	}

	function geraSenha($tamanho, $maiusculas, $numeros, $simbolos) {
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';

        $retorno = '';
        $caracteres = '';
        $caracteres .= $lmin;

        if ($maiusculas) 
            $caracteres .= $lmai;
        if ($numeros) 
            $caracteres .= $num;
        if ($simbolos) 
            $caracteres .= $simb;

        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand-1];
        }

        return $retorno;
    }

    public function recupera() {

        if ($this->request->is('post')) {

            $user = $this->Cliente->findAllByEmail($this->data['email']);

            if (!empty($user)) {
                if($this->envia_email($user)){                	
	                $this->set(array(
			        	'message' => 1,
			            '_serialize' => array('message')
			        ));
                } else {
                	$this->set(array(
			        	'message' => -10,
			            '_serialize' => array('message')
			        ));	
                }

            } else { 
                $this->set(array(
		        	'message' => -1,
		            '_serialize' => array('message')
		        ));
            }
        }
    }

    public function envia_email($user = null) {
        $senha;
        $nome;

        $senha = $this->geraSenha(6,true,true,true);
        $nome = $user['0']['Cliente']['nome'];

        $data = array('id' => $user['0']['Cliente']['id'], 'senha' => md5($senha));
        $this->Cliente->save($data);

        $Email = new CakeEmail('smtp');
        $Email->emailFormat('html');   
        $Email->to($user['0']['Cliente']['email']);
        $Email->subject('Solicitação de troca de senha');
        if($Email->send('Olá, ' . $nome . ', <br><br>
        Sua senha provisória é : ' . $senha . ' <br><br>
        Por segurança, acesse o app e altere esta senha! <br><br>
        <i>Sistema deliveryAll.<i><br>')){
        	return 1;
        } else {
        	return 0;
        }

    }

    public function delete() {
    	$this->Cliente->id = $this->data['id'];
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cliente->delete()) {
			$this->set(array(
	        	'message' => 1,
	            '_serialize' => array('message')
	        ));
		} else {
			$this->set(array(
	        	'message' => -10,
	            '_serialize' => array('message')
	        ));
		}
    }
}
