<div class="franqueados form">

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
										echo '<li>'. $this->Html->link('<span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;'.__('Alterar senha'), array('action' => 'altera_senha', $this->Form->value('Franqueado.id')), array('escape' => false)).'</li>';
									}
									?>
								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir conta'), array('action' => 'delete', $this->Form->value('Franqueado.id')), array('escape' => false), __('Você realmente deseja excluir: %s?', $this->Form->value('Franqueado.nome'))); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Franqueado', array('role' => 'form')); ?>

				<?php echo $this->Form->input('Franqueado.id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Franqueado.nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Franqueado.email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Franqueado.telefone1', array('class' => 'form-control', 'placeholder' => 'Telefone1'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Franqueado.telefone2', array('class' => 'form-control', 'placeholder' => 'Telefone2')) . '<br>';?>
				</div>

				<?php if ($this->Session->check('Franqueado')) {

					echo $this->Form->input('Endereco.id', array('class' => 'form-control')); ?>
				
					<div class="col-md-9 pad form-group">
						<?php echo $this->Form->input('Endereco.rua', array('class' => 'form-control', 'placeholder' => 'Rua'));?>
					</div>
					<div class="col-md-3 pad form-group">
						<?php echo $this->Form->input('Endereco.numero', array('class' => 'form-control', 'placeholder' => 'Número'));?>
					</div>
					<div class="col-md-6 pad form-group">
						<?php echo $this->Form->input('Endereco.bairro', array('class' => 'form-control', 'placeholder' => 'Bairro'));?>
					</div>
					<div class="col-md-6 pad form-group">
						<?php echo $this->Form->input('Endereco.complemento', array('class' => 'form-control', 'placeholder' => 'Complemento'));?>
					</div>
					<div class="col-md-4 pad form-group">
						<?php echo $this->Form->input('Endereco.cep', array('class' => 'form-control', 'placeholder' => 'CEP'));?>
					</div>
					<div class="col-md-4 pad form-group">
						<?php echo $this->Form->input('Endereco.tipo', array('class' => 'form-control', 'placeholder' => 'Tipo'));?>
					</div>
					<div class="col-md-4 pad form-group">
						<?php echo $this->Form->input('Endereco.cidade_id', array('class' => 'form-control'));?>
					</div>

				<?php } ?>

				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
