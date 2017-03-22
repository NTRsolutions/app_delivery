<div class="promocaos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
					<?php if($this->Session->check('Gerente')) { ?>
				    	<li><a href="gerentes/home">Início</a></li>
				    	<li><a href="../../promocaos/index">Promoções</a></li>
				    	<li class="active">Editar Promoção</li>
				    <?php } else { ?>
				    	<li><a href="../../franqueados/home">Início</a></li>
					    <li><?php echo $this->Html->link(__('Detalhe Restaurante'), array('controller' => 'restaurantes', 'action' => 'view', $this->Form->value('Promocao.restaurante_id'))); ?>
					    <li class="active">Editar Promoção</li>
					<?php } ?>
				</ul>
				<h1><?php echo __('Editar Promoção'); ?></h1>
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
								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir'), array('action' => 'delete', $this->Form->value('Promocao.produto_id')), array('escape' => false), __('Você realmente deseja excluir esta promoção?')); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Promoções'), array('action' => 'index'), array('escape' => false)); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Promocao', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('produto_id', array('class' => 'form-control', 'placeholder' => 'Produto Id'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('data_ini', array('class' => 'form-control', 'placeholder' => 'Data Início', 'label' => 'Data Início',  'required' => 'true'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('data_fim', array('class' => 'form-control', 'placeholder' => 'Data Fim', 'required' => 'true'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('desconto', array('class' => 'form-control', 'placeholder' => 'Desconto', 'label' => 'Desconto (%)', 'required' => 'true'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('produto_id', array('options' => $produtos, 'class' => 'form-control selectpicker', 'data-live-search' => 'true',  'multiple', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('restaurante_id', array('class' => 'esconde_rest form-control', 'label' => ''));?>
				</div>


				<div class="col-md-12 pad form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
