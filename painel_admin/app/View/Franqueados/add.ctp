<div class="franqueados form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Franqueado'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Actions'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">

																<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Franqueados'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Restaurante'), array('controller' => 'restaurantes', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Franqueado', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('Franqueado.nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Franqueado.email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Franqueado.senha', array('class' => 'form-control', 'placeholder' => 'Senha'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Franqueado.telefone1', array('class' => 'form-control', 'placeholder' => 'Telefone1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Franqueado.telefone2', array('class' => 'form-control', 'placeholder' => 'Telefone2'));?>
				</div>

				<div class="form-group">
					<?php echo $this->Form->input('Endereco.rua', array('class' => 'form-control', 'placeholder' => 'Rua'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Endereco.numero', array('class' => 'form-control', 'placeholder' => 'Numero'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Endereco.bairro', array('class' => 'form-control', 'placeholder' => 'Bairro'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Endereco.complemento', array('class' => 'form-control', 'placeholder' => 'Complemento'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Endereco.cep', array('class' => 'form-control', 'placeholder' => 'Cep'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Endereco.tipo', array('class' => 'form-control', 'placeholder' => 'Tipo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Endereco.cidade_id', array('class' => 'form-control', 'empty' => 'Selecione a cidade', 'options' => $cidades));?>
				</div>

				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
