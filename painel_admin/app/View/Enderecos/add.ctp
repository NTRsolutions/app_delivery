<div class="enderecos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
				    <li><a href="../gerentes/home">Início</a></li>
				    <li><a href="../gerentes/meu_restaurante">Meu Restaurante</a></li>
				    <li class="active">Adicionar Endereço</li>
				</ul> 
				<h1><?php echo __('Adicionar Endereco'); ?></h1>
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
								<?php if($this->Session->check('Gerente')) { ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;'.__('Detalhes Restaurante'), array('controller' => 'gerentes', 'action' => 'meu_restaurante'), array('escape' => false)); ?> </li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Nova Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('escape' => false)); ?> </li>
								<?php } ?>	
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Endereco', array('role' => 'form')); ?>

				<div class="col-md-9 pad form-group">
					<?php echo $this->Form->input('rua', array('class' => 'form-control', 'placeholder' => 'Rua'));?>
				</div>
				<div class="col-md-3 pad form-group">
					<?php echo $this->Form->input('numero', array('class' => 'form-control', 'placeholder' => 'Numero'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('bairro', array('class' => 'form-control', 'placeholder' => 'Bairro'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('complemento', array('class' => 'form-control', 'placeholder' => 'Complemento'));?>
				</div>
				<div class="col-md-4 pad form-group">
					<?php echo $this->Form->input('cep', array('class' => 'form-control', 'placeholder' => 'Cep'));?>
				</div>
				<div class="col-md-4 pad form-group">
					<?php echo $this->Form->input('tipo', array('class' => 'form-control', 'placeholder' => 'Tipo'));?>
				</div>
				<div class="col-md-4 pad form-group">
					<?php echo $this->Form->input('cidade_id', array('class' => 'form-control', 'placeholder' => 'Cidade Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
