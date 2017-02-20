<div class="produtos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
					<li><a href="../../gerentes/home">Início</a></li>
				    <li><a href="../../produtos">Produtos</a></li>
				    <?php echo '<li><a href="../../produtos/view/' . $this->Form->value('Produto.id') . '">Detalhe Produto</a></li>'; ?>
				    <li class="active">Editar</li>
				</ul>
				<h1><?php echo __('Editar Produto'); ?></h1>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('action' => 'view', $this->Form->value('Produto.id')), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir'), array('action' => 'delete', $this->Form->value('Produto.id')), array('escape' => false), __('Tem certeza que deseja excluir: %s?', $this->Form->value('Produto.nome'))); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Produto', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('tipo', array('class' => 'form-control', 'placeholder' => 'Tipo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Tinymce->input('Produto.descricao', $options = array('label' => 'Descrição'), $tinyoptions = array(), $preset = null) ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('foto', array('class' => 'form', 'type' => 'file'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('preco', array('class' => 'form-control', 'placeholder' => 'Preco'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('qtd_max_complemento', array('class' => 'form-control', 'placeholder' => 'Qtd Max Complemento'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('restaurante_id', array('class' => 'form-control', 'placeholder' => 'Restaurante Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
