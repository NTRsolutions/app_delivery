<div class="container col-lg-4 col-lg-offset-4 col-md-8 col-md-offset-2" style="margin-top: 10%">

	<legend><h2>Esqueceu sua senha?</h2></legend>

	Informe o seu email no campo abaixo. Caso o email informado esteja cadastrado em nosso site, uma senha provisória será enviada para o mesmo. <br><br>

	Obs.: <b><i>Por segurança, acesse o sistema e altere a senha !</i></b> <br><br>

	<?php 
		echo $this->Form->create('Admin', array('action' => 'verifica_email'));

		echo $this->Form->input('email', array('class' => 'form-control', 'type' => 'email', 'autofocus')) . '<br />';

		//botões
		echo $this->Form->button('Enviar', array('type' => 'submit', 'class' => 'btn btn-primary', 'label' => '')) . ' ';
	
		echo $this->Html->link('Voltar', array('action' => 'index_login'), array('class' => 'btn btn-danger', 'target' => '_self'));
	?>

</div>