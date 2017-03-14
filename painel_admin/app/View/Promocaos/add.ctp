<div class="promocaos form">

	<script type="text/javascript">
		jQuery(function($){
			$("#data_ini").mask("99/99/9999",{autoclear: false});  	
			$("#data_fim").mask("99/99/9999",{autoclear: false});  	
	  });
	</script>

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Franqueado')){ ?>
					<ul class="breadcrumb" id="bread">
				    <li><a href="../../franqueados/home">Início</a></li>
				    <li class="active">Nova Promoção</li>
					</ul>
				<?php } else { ?>
					<ul class="breadcrumb" id="bread">
					    <li><a href="../gerentes/home">Início</a></li>
					    <li><a href="../produtos">Produtos</a></li>
					    <li><a href="../produtos/add">Novo Produto</a></li>
					    <li class="active">Nova Promoção</li>
					</ul>
				<?php } ?>
				<h1><?php echo __('Adicionar Promoção'); ?></h1>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('controller' => 'produtos', 'action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Promoções'), array('action' => 'index'), array('escape' => false)); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Promocao', array('role' => 'form')); ?>

				<div class="col-md-4 pad form-group">
					<label>Data de início</label>
					<?php echo $this->Form->date('data_ini', array('class' => 'form-control', 'placeholder' => 'Data Inicio', 'id' => 'data_ini'));?>
				</div>
				<div class="col-md-4 pad form-group">
					<label>Data de término</label>
					<?php echo $this->Form->date('data_fim', array('class' => 'form-control', 'placeholder' => 'Data Fim', 'id' => 'data_fim'));?>
				</div>
				<div class="col-md-4 pad form-group">
					<?php echo $this->Form->input('desconto', array('class' => 'form-control', 'placeholder' => 'Desconto'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('produto_id', array('options' => $produtos, 'class' => 'form-control', 'placeholder' => 'Produto'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('restaurante_id', array('class' => 'form-control', 'placeholder' => 'Restaurante', 'disabled'));?>
				</div>


				<div class="col-md-12 pad form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
