<div class="culinarias form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Franqueado')){ ?>
					<ul class="breadcrumb" id="bread">
				    <li><a href="../../franqueados/home">Início</a></li>
				    <li class="active">Nova Culinária</li>
					</ul>
				<?php } ?>
				<h1><?php echo __('Adicionar Culinária'); ?></h1>
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
								<?php if($this->Session->check('Admin')) { ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('controller' => 'restaurantes', 'action' => 'index'), array('escape' => false)); ?></li>
								<?php } else { ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('controller' => 'gerentes', 'action' => 'meu_restaurante'), array('escape' => false)); ?></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Culinaria', array('role' => 'form')); ?>

				<div class="col-md-6 pad form-group">
					<?php //echo $this->Form->input('tipo', array('options' => $tipo, 'class' => 'form-control', 'label' => 'Tipo de Culinária', 'required' => 'true'));

					echo '<label for="checkbox1">
                            Selecione os tipos de Culinária: <br><br>
                        </label>';

                    echo $this->Form->input('Culinaria.tipo', array(
					    'type' => 'select',
					    'multiple' => 'checkbox',
					    'class' => 'col-md-4 checkbox checkbox-inline checkbox-primary',
					    'label' => '', 
					    'id' => 'checkbox1',
					    //'disabled' => array('0'),
					    'options' => $tipo
					    )
					); ?>
				</div>

				<div class="esconde_rest form-group">
					<?php echo $this->Form->input('restaurante_id', array('class' => 'form-control'));?>
				</div>


				<div class="col-md-12 pad form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
