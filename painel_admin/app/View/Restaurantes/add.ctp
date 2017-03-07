<div class="restaurantes form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Franqueado')) { ?>
					<ul class="breadcrumb" id="bread">
				    	<li><a href="../franqueados/home">Início</a></li>
				    	<li class="active">Novo Restaurante</li>
					</ul>
				<?php } ?>
				<h1><?php echo __('Adicionar Restaurante'); ?></h1>
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
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index'), array('escape' => false)); ?> </li>
								<?php } else { ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;'.__('Início'), array('controller' => 'franqueados', 'action' => 'home'), array('escape' => false)); ?> </li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Restaurante', array('role' => 'form', 'type' => 'file', 'method' => 'post')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Restaurante.cnpj', array('class' => 'form-control', 'placeholder' => 'Cnpj'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Restaurante.email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Tinymce->input('Restaurante.descricao', $options = array('label' => 'Descrição'), $tinyoptions = array(), $preset = null) ?>
				</div><br>
				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.foto', array('class' => 'form', 'type' => 'file'));?>
				</div><br>
				<div class="col-md-2 pad form-group">
					<?php echo $this->Form->input('Restaurante.horario_abre', array('class' => 'form-control', 'placeholder' => 'Horario Abre'));?>
				</div>
				<div class="col-md-2 pad form-group">
					<?php echo $this->Form->input('Restaurante.horario_fecha', array('class' => 'form-control', 'placeholder' => 'Horario Fecha'));?>
				</div>
				<div class="col-md-2 pad form-group">
					<?php echo $this->Form->input('Restaurante.tempo_mercado', array('class' => 'form-control', 'placeholder' => 'Tempo Mercado'));?>
				</div>
				<div class="col-md-2 pad form-group">
					<?php echo $this->Form->input('Restaurante.valor_min', array('class' => 'form-control', 'placeholder' => 'Valor Min'));?>
				</div>
				<div class="col-md-2 pad form-group">
					<?php echo $this->Form->input('Restaurante.telefone1', array('class' => 'form-control', 'placeholder' => 'Telefone1'));?>
				</div>
				<div class="col-md-2 pad form-group">
					<?php echo $this->Form->input('Restaurante.telefone2', array('class' => 'form-control', 'placeholder' => 'Telefone2'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Restaurante.gerente_id', array('class' => 'form-control', 'empty' => 'Selecione o gerente'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Restaurante.franqueado_id', array('class' => 'form-control', 'empty' => 'Selecione o franqueado')) . '<br>';?>
				</div>


				<div class="col-md-4 pad form-group">
					<?php echo $this->Form->input('Endereco.cep', array('class' => 'form-control', 'placeholder' => 'Cep',  'id' => 'cep', 'label' => 'CEP (somente números)'));?>
				</div>
				<div class="col-md-9 pad form-group">
					<?php echo $this->Form->input('Endereco.rua', array('class' => 'form-control', 'placeholder' => 'Rua', 'id' => 'rua', 'disabled'));?>
				</div>
				<div class="col-md-3 pad form-group">
					<?php echo $this->Form->input('Endereco.numero', array('class' => 'form-control', 'label' => 'Número', 'placeholder' => 'Numero', 'id' => 'numero', 'disabled'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Endereco.bairro', array('class' => 'form-control', 'placeholder' => 'Bairro', 'id' => 'bairro', 'disabled'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Endereco.complemento', array('class' => 'form-control', 'placeholder' => 'Complemento', 'id' => 'complemento', 'disabled'));?>
				</div>
		

				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Cidade.nome', array('class' => 'form-control', 'id' => 'cidade', 'placeholder' => 'Cidade', 'label' => 'Cidade', 'disabled'));?>
				</div>



				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Estado.nome', array('class' => 'form-control', 'id' => 'uf', 'placeholder' => 'Estado', 'label' => 'Estado', 'disabled'));?>
				</div>



				<div class="col-md-12 pad form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
