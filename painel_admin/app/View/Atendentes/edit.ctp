<div class="atendentes form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
					<li><a href="../atendentes/home">Início</a></li>
				    <li><a href="../../atendentes/meu_perfil">Meu Perfil</a></li>
				    <li class="active">Editar</li>
				</ul>
				<h1><?php echo __('Editar Atendente'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Açoes'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('action' => 'meu_perfil', $this->Form->value('Atendente.id')), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;'.__('Alterar senha'), array('action' => 'altera_senha', $this->Form->value('Atendente.id')), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir conta'), array('action' => 'delete', $this->Form->value('Atendente.id')), array('escape' => false), __('Você realmente deseja excluir: %s?', $this->Form->value('Atendente.nome'))); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Atendente', array('role' => 'form')); ?>

				<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
			
				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
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
