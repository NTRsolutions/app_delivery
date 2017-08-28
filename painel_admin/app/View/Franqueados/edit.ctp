<div class="franqueados form">

<script type="text/javascript">
	jQuery(function($){
		$("#FranqueadoTelefone1").mask("(99)99999-9999",{autoclear: false});  	
		$("#FranqueadoTelefone2").mask("(99)99999-9999",{autoclear: false});  	
	 
		$('#FranqueadoTelefone1').blur(function() {
		  if ($('#FranqueadoTelefone1').val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#FranqueadoTelefone1").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});

		$('#FranqueadoTelefone2').blur(function() {
		  if ($("#FranqueadoTelefone2").val().endsWith('_') && $(this).val().search('_') == 13) {
		  	$("#FranqueadoTelefone2").unmask().mask("(99)9999-9999",{autoclear: false});
		  }
		});

		$("#EnderecoCep").mask("99999-999",{autoclear: false});
  });
</script>

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Franqueado')){ ?>
					<ul class="breadcrumb" id="bread">
						<li><a href="../../franqueados/home">Início</a></li>
			    		<li><a href="../../franqueados/meu_perfil/">Meu Perfil</a></li>
			    		<li class="active">Editar</li>			    
					</ul>
				<?php } ?>
				<h1><?php echo __('Editar Franqueado'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Ações'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<?php
									if($this->Session->check('Admin')){
										echo '<li>'.$this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('action' => 'view', $this->Form->value('Franqueado.id')), array('escape' => false)).'</li>';
									} else {
										echo '<li>'.$this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('action' => 'meu_perfil', $this->Form->value('Franqueado.id')), array('escape' => false)).'</li>';
										echo '<li>'.$this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Nova Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('escape' => false)).'</li>';
										echo '<li>'. $this->Html->link('<span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;'.__('Alterar senha'), array('action' => 'altera_senha', $this->Form->value('Franqueado.id')), array('escape' => false)).'</li>';
									}
									?>
								<li><?php //echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir conta'), array('action' => 'delete', $this->Form->value('Franqueado.id')), array('escape' => false), __('Você realmente deseja excluir: %s?', $this->Form->value('Franqueado.nome'))); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Franqueado', array('role' => 'form')); ?>

				<?php echo $this->Form->input('Franqueado.id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Franqueado.nome', array('class' => 'form-control', 'placeholder' => 'Nome Completo', 'required' => 'true'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Franqueado.email', array('class' => 'form-control', 'placeholder' => 'Email', 'required' => 'true'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Franqueado.telefone1', array('class' => 'form-control', 'placeholder' => 'Telefone principal', 'required' => 'true'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Franqueado.telefone2', array('class' => 'form-control', 'placeholder' => 'Telefone opcional')) . '<br>';?>
				</div>

				<?php if ($this->Session->check('Franqueado')) {

					echo $this->Form->input('Endereco.id', array('class' => 'form-control')); ?>
				
					<div class="col-md-3 pad form-group">
						<?php echo $this->Form->input('Endereco.cep', array('class' => 'form-control', 'placeholder' => 'CEP', 'required' => 'true'));?>
					</div>
					<div class="col-md-7 pad form-group">
						<?php echo $this->Form->input('Endereco.rua', array('class' => 'form-control', 'placeholder' => 'Rua', 'required' => 'true'));?>
					</div>
					<div class="col-md-2 pad form-group">
						<?php echo $this->Form->input('Endereco.numero', array('class' => 'form-control', 'placeholder' => 'Número'));?>
					</div>
					<div class="col-md-6 pad form-group">
						<?php echo $this->Form->input('Endereco.bairro', array('class' => 'form-control', 'placeholder' => 'Bairro', 'required' => 'true'));?>
					</div>
					<div class="col-md-6 pad form-group">
						<?php echo $this->Form->input('Endereco.complemento', array('class' => 'form-control', 'placeholder' => 'Complemento'));?>
					</div>
					<div class="col-md-12 pad form-group">
						<?php echo $this->Form->input('Endereco.cidade_id', array('class' => 'form-control', 'required' => 'true'));?>
					</div>

				<?php } ?>

				<div class="col-md-12 pad form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
