<div class="pagamentos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Franqueado')){ ?>
					<ul class="breadcrumb" id="bread">
				    <li><a href="../../franqueados/home">Início</a></li>
				    <li class="active">Novo Pagamento</li>
					</ul>
				<?php } ?>
				<h1><?php echo __('Adicionar Pagamento'); ?></h1>
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
			<?php echo $this->Form->create('Pagamento', array('role' => 'form')); ?>

				<div class="col-md-6 pad form-group">
					<?php //echo $this->Form->input('descricao', array('options' => $tipo, 'class' => 'form-control', 'label' => 'Forma de Pagamento', 'required' => 'true'));

					echo '<label for="checkbox1">
                            Selecione as formas de Pagamento: <br><br>
                        </label>';

					echo $this->Form->input('Pagamento.descricao', array(
					    'type' => 'select',
					    'multiple' => 'checkbox',
					    'class' => 'col-md-8 checkbox checkbox-inline checkbox-primary',
					    'label' => '',
					    'id' => 'checkbox1',
					    'options' => $tipo
					    )
					); ?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('restaurante_id', array('class' => 'form-control', 'placeholder' => 'Restaurante Id'));?>
				</div>


				<div class="pad form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
