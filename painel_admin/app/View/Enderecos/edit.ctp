<div class="enderecos form">

<script type="text/javascript">
	jQuery(function($){
		$("#cep").mask("99999-999",{autoclear: false});
  });
</script>

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
				    <li><a href="../gerentes/home">Início</a></li>
				    <li><a href="../../gerentes/meu_restaurante">Meu Restaurante</a></li>
				    <li class="active">Editar Endereço</li>
				</ul> 
				<h1><?php echo __('Editar Endereco'); ?></h1>
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
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Nova Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('escape' => false)); ?> </li>
									<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;'.__('Excluir'), array('action' => 'delete', $this->Form->value('Endereco.id')), array('escape' => false), __('Tem certeza que deseja excluir este endereço?')); ?></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Endereco', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="col-md-3 pad form-group">
					<?php echo $this->Form->input('cep', array('class' => 'form-control', 'placeholder' => 'Cep', 'id' => 'cep', 'required' => 'true'));?>
				</div>
				<div class="col-md-7 pad form-group">
					<?php echo $this->Form->input('rua', array('class' => 'form-control', 'placeholder' => 'Rua', 'id' => 'rua', 'disabled', 'required' => 'true'));?>
				</div>
				<div class="col-md-2 pad form-group">
					<?php echo $this->Form->input('numero', array('class' => 'form-control', 'placeholder' => 'Numero', 'id' => 'numero', 'disabled'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('bairro', array('class' => 'form-control', 'placeholder' => 'Bairro', 'id' => 'bairro', 'disabled', 'required' => 'true'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('complemento', array('class' => 'form-control', 'placeholder' => 'Complemento', 'id' => 'complemento', 'disabled'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('lat', array('type' => 'hidden', 'placeholder' => 'Complemento', 'id' => 'lat'));?>
				</div>

				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('lng', array('type' => 'hidden', 'placeholder' => 'Complemento', 'id' => 'lng'));?>
				</div>	
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Cidade.nome', array('class' => 'form-control', 'placeholder' => 'Cidade Id', 'id' => 'cidade', 'disabled', 'required' => 'true'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Estado.nome', array('class' => 'form-control', 'id' => 'uf', 'placeholder' => 'Estado', 'label' => 'Estado', 'disabled', 'required' => 'true'));?>
				</div>


				<div class="col-md-12 pad form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
