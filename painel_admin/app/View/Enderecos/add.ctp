<div class="enderecos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Endereco'); ?></h1>
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

																<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Enderecos'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('List Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Endereco', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('rua', array('class' => 'form-control', 'placeholder' => 'Rua'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('numero', array('class' => 'form-control', 'placeholder' => 'Numero'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('bairro', array('class' => 'form-control', 'placeholder' => 'Bairro'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('complemento', array('class' => 'form-control', 'placeholder' => 'Complemento'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('cep', array('class' => 'form-control', 'placeholder' => 'Cep'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tipo', array('class' => 'form-control', 'placeholder' => 'Tipo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('cidade_id', array('class' => 'form-control', 'placeholder' => 'Cidade Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
