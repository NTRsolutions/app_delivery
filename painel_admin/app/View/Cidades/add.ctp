<div class="cidades form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
				    <li><a href="../gerentes/home">Início</a></li>
				    <li><a href="../gerentes/meu_restaurante">Meu Restaurante</a></li>
				    <li><a href="../enderecos/add">Adicionar Endereço</a></li>
				    <li class="active">Adicionar Cidade</li>
				</ul> 
				<h1><?php echo __('Adicionar Cidade'); ?></h1>
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
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Novo Estado'), array('controller' => 'estados', 'action' => 'add'), array('escape' => false)); ?> </li>
								<?php } ?>							
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Cidade', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('estado_id', array('class' => 'form-control', 'placeholder' => 'Estado Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
