<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Admins Controller
 *
 * @property Admin $Admin
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class AdminsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function afterFilter() {
        if ($this->action != 'index_login' and
            $this->action != 'recuperar_senha') {
            $this->autenticarAdmin();
        }
    }

    public function autenticarAdmin() {        
        if (!$this->Session->check('Admin')) {
            $this->redirect(array('controller' => 'admins',
                                    'action' => 'index_login'));
            exit();
        } 
    }


    public function home() {
		
	}

	public function index_login() {
		
	}

	public function login() {
		if (!empty($this->data['Admin']['login']) and
        	!empty($this->data['Admin']['senha'])) {
        	$this->validar();        	
        } else {
        	$this->redirect(array('action' => 'index_login'));
        	exit();
        }
	}

	public function validar(){
		$this->loadModel('Franqueado');
		$this->loadModel('Atendente');
		$this->loadModel('Gerente');

    	$admin = $this->Admin->findAllByLoginAndSenha(
    								$this->data['Admin']['login'],
    								md5($this->data['Admin']['senha']));

    	$franq = $this->Franqueado->findAllByEmailAndSenha(
    								$this->data['Admin']['login'],
    								md5($this->data['Admin']['senha']));

    	$ger = $this->Gerente->findAllByEmailAndSenha(
    								$this->data['Admin']['login'],
    								md5($this->data['Admin']['senha']));

    	$at = $this->Atendente->findAllByEmailAndSenha(
    								$this->data['Admin']['login'],
    								md5($this->data['Admin']['senha']));
    	if (!empty($admin)) {
    		$this->setSession($admin, 1);
    	} else if (!empty($franq)) {
    		$this->setSession($franq, 2);
    	} else if (!empty($ger)) {
    		$this->setSession($ger, 3);
    	} else if (!empty($at)) {
    		$this->setSession($at, 4);
    	} else { 
    		$this->Session->setFlash(__('Login e/ou senha inválidos!'), 'default', 
    			array('class' => 'text-center alert alert-danger'));
    		$this->redirect(array('action' => 'index_login'));
    		exit();
    	}
    }

    public function setSession($user = null, $tipo = null) {
    	switch ($tipo) {
    		case 1:
    			$this->Session->write('Admin', $user);
        		$this->set('admin', $user);
        		$this->redirect(array('controller' => 'admins', 'action' => 'home', $user['0']['Admin']['id']));
    			break;
    		case 2:
    			$this->Session->write('Franqueado', $user);
        		$this->set('admin', $user);
        		$this->redirect(array('controller' => 'franqueados', 'action' => 'home', $user['0']['Franqueado']['id']));
    			break;
    		case 3:
    			$this->Session->write('Gerente', $user);
        		$this->set('admin', $user);
        		$this->redirect(array('controller' => 'gerentes', 'action' => 'home', $user['0']['Gerente']['id']));
    			break;
    		case 4:
    			$this->Session->write('Atendente', $user);
        		$this->set('admin', $user);
        		$this->redirect(array('controller' => 'atendentes', 'action' => 'home', $user['0']['Atendente']['id']));
    			break;
    		default:
    			$this->Session->setFlash(__('Login e/ou senha inválidos!'), 'default', 
    			array('class' => 'text-center alert alert-danger'));
    			$this->redirect(array('action' => 'index_login'));
    			break;
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

    public function verifica_email() {

        if (!empty($this->data)) {

            //$email_informado =  $this->request->data['Admin']['login'];

            $this->loadModel('Franqueado');
            $this->loadModel('Atendente');
            $this->loadModel('Gerente');

            $admin = $this->Admin->findAllByLogin($this->data['Admin']['email']);

            $franq = $this->Franqueado->findAllByEmail($this->data['Admin']['email']);

            $ger = $this->Gerente->findAllByEmail($this->data['Admin']['email']);

            $at = $this->Atendente->findAllByEmail($this->data['Admin']['email']);

            if (!empty($franq)) {
                $this->recupera($franq, 1);
            } else if (!empty($ger)) {
                $this->recupera($ger, 2);
            } else if (!empty($at)) {
                $this->recupera($at, 3);
            } else { 
                $this->Session->setFlash(__('Email não cadastrado em nosso sistema!'), 'default', 
                    array('class' => 'text-center alert alert-danger'));
                $this->redirect(array('action' => 'recuperar_senha'));
                exit();
            }
        }
    }

    public function recupera($user = null, $tipo = null) {

        $this->loadModel('Franqueado');
        $this->loadModel('Atendente');
        $this->loadModel('Gerente');

        $senha;
        $nome;

        switch ($tipo) {
            
            case 1:
                $this->Session->write('Franqueado', $user);
                $this->set('admin', $user);

                $senha = $this->geraSenha(6,true,true,true);
                $nome = $user['0']['Franqueado']['nome'];

                $data = array('id' => $user['0']['Franqueado']['id'], 'senha' => $senha);
                $this->Franqueado->save($data);

                $Email = new CakeEmail('smtp');
                $Email->emailFormat('html');   
                $Email->to($user['0']['Franqueado']['email']);
                $Email->subject('Solicitação de troca de senha');
                $Email->send('Olá franqueado ' . $nome . ', <br><br>
                Sua senha provisória é : ' . $senha . ' <br><br>
                Por segurança, acesse o sistema e altere esta senha ! <br><br>
                <i>Sistema deliveryAll.<i><br>');

                $this->Session->setFlash(__('Uma senha provisória foi enviada para o email informado !'), 'default', 
                    array('class' => 'text-center alert alert-success'));
                $this->redirect(array('action' => 'recuperar_senha'));

                break;

            case 2:
                $this->Session->write('Gerente', $user);
                $this->set('admin', $user);

                $senha = $this->geraSenha(6,true,true,true);
                $nome = $user['0']['Gerente']['nome'];

                $data = array('id' => $user['0']['Gerente']['id'], 'senha' => md5($senha));
                $this->Gerente->save($data);

                $Email = new CakeEmail('smtp');
                $Email->emailFormat('html');   
                $Email->to($user['0']['Gerente']['email']);
                $Email->subject('Solicitação de troca de senha');
                $Email->send('Olá gerente ' . $nome . ', <br><br>
                Sua senha provisória é : ' . $senha . ' <br><br>
                Por segurança, acesse o sistema e altere esta senha ! <br><br>
                <i>Sistema deliveryAll.<i><br>');

                $this->Session->setFlash(__('Uma senha provisória foi enviada para o email informado !'), 'default', 
                    array('class' => 'text-center alert alert-success'));
                $this->redirect(array('action' => 'recuperar_senha'));

                break;

            case 3:
                $this->Session->write('Atendente', $user);
                $this->set('admin', $user);

                $senha = $this->geraSenha(6,true,true,true);
                $nome = $user['0']['Atendente']['nome'];

                $data = array('id' => $user['0']['Atendente']['id'], 'senha' => $senha);
                $this->Atendente->save($data);

                $Email = new CakeEmail('smtp');
                $Email->emailFormat('html');   
                $Email->to($user['0']['Atendente']['email']);
                $Email->subject('Solicitação de troca de senha');
                $Email->send('Olá atendente ' . $nome . ', <br><br>
                Sua senha provisória é : ' . $senha . ' <br><br>
                Por segurança, acesse o sistema e altere esta senha ! <br><br>
                <i>Sistema deliveryAll.<i><br>');

                $this->Session->setFlash(__('Uma senha provisória foi enviada para o email informado !'), 'default', 
                    array('class' => 'text-center alert alert-success'));
                $this->redirect(array('action' => 'recuperar_senha'));

                break;

            default:
                $this->Session->setFlash(__('Email não cadastrado em nosso sistema!'), 'default', 
                    array('class' => 'text-center alert alert-danger'));
                $this->redirect(array('action' => 'recuperar_senha'));
                break;
        }
    }

    public function altera(){
        $aluno = $this->Session->read('Aluno');
        $aluno = $this->Aluno->findById($aluno['0']['Aluno']['id']);
        $this->set('aluno', $aluno);

        if (!empty($this->data))  {

            if((md5($this->data['Aluno']['old_password']) == $aluno['Aluno']['senha'])){

                if ($this->data['Aluno']['new_password'] == $this->data['Aluno']['confirm_password']){

                    $data = array('id' => $aluno['Aluno']['id'], 'senha' => $this->data['Aluno']['new_password']);

                    if ($this->Aluno->save($data)){

                        $this->Session->setFlash('Senha alterada com sucesso!', 'alert-box', array('class'=>'alert-success'));
                        //erro aki. reiniciar sessão, sei lá
                        $this->redirect(array('action' => 'editar'));
                        exit();
                    }
                    else{
                        $this->Session->setFlash('Ocorreu um problema, e não foi possível alterar a sua senha. Tente novamente mais tarde.', 'alert-box', array('class'=>'alert-danger'));
                        $this->redirect(array('action' => 'editar'));
                        exit();
                    }
                }
                else{
                    $this->Session->setFlash('A confirmação da nova senha está incorreta!', 'alert-box', array('class'=>'alert-danger'));
                    $this->redirect(array('action' => 'altera_senha'));
                    exit();
                }
            }
            else{
                $this->Session->setFlash('A senha atual informada está incorreta!', 'alert-box', array('class'=>'alert-danger'));
                $this->redirect(array('action' => 'altera_senha'));
                exit();
            }
        } 
    }

    public function altera_senha(){
        $aluno = $this->Session->read('Aluno');
        $aluno = $this->Aluno->findById($aluno['0']['Aluno']['id']);
        $this->set('aluno', $aluno);
    }

    public function recuperar_senha(){

    }

    public function logout(){
    	$this->Session->destroy();
    	$this->redirect('index_login');
    	exit();
    }
}
