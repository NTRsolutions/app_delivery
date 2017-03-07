<div class="restaurantes form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Gerente')) { ?>
					<ul class="breadcrumb" id="bread">
					    <li><a href="../gerentes/home">Início</a></li>
					    <li><a href="../../gerentes/meu_restaurante">Meu Restaurante</a></li>
					    <li class="active">Editar Restaurante</li>
					</ul> 
				<?php } ?>

				<?php if($this->Session->check('Franqueado')){ ?>
					<ul class="breadcrumb" id="bread">
					    <li><a href="../../franqueados/home">Início</a></li>
					    <?php echo '<li><a href="../../restaurantes/view/' . $this->Form->value('Restaurante.id') . '">Detalhe Restaurante</a></li>'; ?>
					    <li class="active">Editar</li>
					</ul>
				<?php } ?>
				<h1><?php echo __('Editar Restaurante'); ?></h1>
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
								<?php } ?>
								<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir'), array('action' => 'delete', $this->Form->value('Restaurante.id')), array('escape' => false), __('Tem certeza que deseja excluir: %s?', $this->Form->value('Restaurante.nome'))); ?></li>	
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Restaurante', array('role' => 'form', 'type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('cnpj', array('class' => 'form-control', 'placeholder' => 'Cnpj'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Tinymce->input('Restaurante.descricao', $options = array('label' => 'Descrição'), $tinyoptions = array(), $preset = null) ?>
				</div><br>
				<div class="form-group">
					<?php echo $this->Form->input('foto', array('class' => 'form', 'type' => 'file'));?>
				</div><br>
				<div class="col-md-3 pad form-group">
					<?php echo $this->Form->input('horario_abre', array('class' => 'form-control', 'label' => 'Horário Abrir', 'placeholder' => 'Horário Abrir'));?>
				</div>
				<div class="col-md-3 pad form-group">
					<?php echo $this->Form->input('horario_fecha', array('class' => 'form-control', 'label' => 'Horário Fechar', 'placeholder' => 'Horário Fechar'));?>
				</div>
				<div class="col-md-3 pad form-group">
					<?php echo $this->Form->input('tempo_mercado', array('class' => 'form-control', 'label' => 'Tempo de Mercado (anos)', 'placeholder' => 'Tempo Mercado'));?>
				</div>
				<div class="col-md-3 pad form-group">
					<?php echo $this->Form->input('valor_min', array('class' => 'form-control', 'label' => 'Valor mínimo de produto (R$)', 'placeholder' => 'Valor Min'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('telefone1', array('class' => 'form-control', 'placeholder' => 'Telefone1'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('telefone2', array('class' => 'form-control', 'placeholder' => 'Telefone2'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('gerente_id', array('class' => 'form-control'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('franqueado_id', array('class' => 'form-control'));?>
				</div>

				
				<div class="pad form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
