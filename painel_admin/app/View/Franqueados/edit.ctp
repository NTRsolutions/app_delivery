<div class="franqueados form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
						<?php
						if($this->Session->check('Admin')){
							echo '<li><a href="../../admins/home">Início</a></li>
				    				<li class="active">Editar</li>';
						} else {
							echo '<li><a href="../../franqueados/home">Início</a></li>
				    				<li><a href="../../franqueados/meu_perfil/'.$franq['0']['Franqueado']['id'].'">Meu Perfil</a></li>
				    				<li class="active">Editar</li>';
						}
						?>				    
				</ul>
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
										echo '<li>'.$this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('controller' => 'admins', 'action' => 'home'), array('escape' => false)).'</li>';
									} else {
										echo '<li>'.$this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('action' => 'home'), array('escape' => false)).'</li>';
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
				
				<div class="form-group">
					<?php echo $this->Form->input('Franqueado.nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Franqueado.email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Franqueado.telefone1', array('class' => 'form-control', 'placeholder' => 'Telefone1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Franqueado.telefone2', array('class' => 'form-control', 'placeholder' => 'Telefone2'));?>
				</div>

				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
