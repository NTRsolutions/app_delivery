<div class="restaurantes form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
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
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Restaurante', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.cnpj', array('class' => 'form-control', 'placeholder' => 'Cnpj'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.descricao', array('class' => 'form-control', 'placeholder' => 'Descricao'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.foto', array('class' => 'form-control', 'placeholder' => 'Foto'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.horario_abre', array('class' => 'form-control', 'placeholder' => 'Horario Abre'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.horario_fecha', array('class' => 'form-control', 'placeholder' => 'Horario Fecha'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.tempo_mercado', array('class' => 'form-control', 'placeholder' => 'Tempo Mercado'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.valor_min', array('class' => 'form-control', 'placeholder' => 'Valor Min'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.telefone1', array('class' => 'form-control', 'placeholder' => 'Telefone1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.telefone2', array('class' => 'form-control', 'placeholder' => 'Telefone2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.gerente_id', array('class' => 'form-control', 'empty' => 'Selecione o gerente'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Restaurante.franqueado_id', array('class' => 'form-control', 'placeholder' => 'Franqueado Id'));?>
				</div>

				<div class="form-group">
					<?php echo $this->Form->input('Endereco.rua', array('class' => 'form-control', 'placeholder' => 'Rua'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Endereco.numero', array('class' => 'form-control', 'placeholder' => 'Numero'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Endereco.bairro', array('class' => 'form-control', 'placeholder' => 'Bairro'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Endereco.complemento', array('class' => 'form-control', 'placeholder' => 'Complemento'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Endereco.cep', array('class' => 'form-control', 'placeholder' => 'Cep'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Endereco.tipo', array('class' => 'form-control', 'placeholder' => 'Tipo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Endereco.cidade_id', array('class' => 'form-control', 'empty' => 'Selecione a cidade', 'options' => $cidades));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primery')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
