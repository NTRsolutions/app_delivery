<div class="gerentes form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Gerente')){ ?>
					<ul class="breadcrumb" id="bread">
					    <li><a href="../../gerentes/home">Início</a></li>
					    <li><a href="../../gerentes/meu_perfil">Meu Perfil</a></li>
					    <li class="active">Editar</li>
					</ul>
				<?php } ?>
				<?php if($this->Session->check('Franqueado')){ ?>
					<ul class="breadcrumb" id="bread">
					    <li><a href="../../franqueados/home">Início</a></li>
					    <li><a href="../../gerentes">Gerentes</a></li>
					    <?php echo '<li><a href="../../gerentes/view/' . $this->Form->value('Gerente.id') . '">Detalhe Gerente</a></li>'; ?>
					    <li class="active">Editar</li>
					</ul>
				<?php } ?>
				<h1><?php echo __('Editar Gerente'); ?></h1>
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

									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('action' => 'meu_perfil', $this->Form->value('Gerente.id')), array('escape' => false)); ?> </li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;'.__('Alterar senha'), array('action' => 'altera_senha', $this->Form->value('Gerente.id')), array('escape' => false)); ?> </li>

								<?php } else { 

									echo '<li>'.$this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('action' => 'view', $this->Form->value('Gerente.id')), array('escape' => false)).'</li>';

								} ?>

								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir conta'), array('action' => 'delete', $this->Form->value('Gerente.id')), array('escape' => false), __('Você realmente deseja excluir: %s?', $this->Form->value('Gerente.nome'))); ?></li>
							</ul>
						</div>
				</div>
			</div>			
		</div><!-- end col md 3 -->

		<div class="col-md-9">

			<?php echo $this->Form->create('Gerente', array('role' => 'form')); ?>

				<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				
				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
