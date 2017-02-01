<div class="clientes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Cliente'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Actions'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Cliente'), array('action' => 'edit', $cliente['Cliente']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Clientes'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Cliente'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Classificacaos'), array('controller' => 'classificacaos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Classificacao'), array('controller' => 'classificacaos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Cliente Enderecos'), array('controller' => 'cliente_enderecos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Cliente Endereco'), array('controller' => 'cliente_enderecos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Pedidos'), array('controller' => 'pedidos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Pedido'), array('controller' => 'pedidos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Sugestaos'), array('controller' => 'sugestaos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Sugestao'), array('controller' => 'sugestaos', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nome'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['nome']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Email'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Senha'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['senha']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Telefone1'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['telefone1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Telefone2'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['telefone2']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Classificacaos'); ?></h3>
	<?php if (!empty($cliente['Classificacao'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nota'); ?></th>
		<th><?php echo __('Comentario'); ?></th>
		<th><?php echo __('Restaurante Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($cliente['Classificacao'] as $classificacao): ?>
		<tr>
			<td><?php echo $classificacao['id']; ?></td>
			<td><?php echo $classificacao['nota']; ?></td>
			<td><?php echo $classificacao['comentario']; ?></td>
			<td><?php echo $classificacao['restaurante_id']; ?></td>
			<td><?php echo $classificacao['cliente_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'classificacaos', 'action' => 'view', $classificacao['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'classificacaos', 'action' => 'edit', $classificacao['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'classificacaos', 'action' => 'delete', $classificacao['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $classificacao['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Classificacao'), array('controller' => 'classificacaos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Cliente Enderecos'); ?></h3>
	<?php if (!empty($cliente['ClienteEndereco'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Endereco Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($cliente['ClienteEndereco'] as $clienteEndereco): ?>
		<tr>
			<td><?php echo $clienteEndereco['cliente_id']; ?></td>
			<td><?php echo $clienteEndereco['endereco_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'cliente_enderecos', 'action' => 'view', $clienteEndereco['cliente_id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'cliente_enderecos', 'action' => 'edit', $clienteEndereco['cliente_id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'cliente_enderecos', 'action' => 'delete', $clienteEndereco['cliente_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $clienteEndereco['cliente_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Cliente Endereco'), array('controller' => 'cliente_enderecos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Pedidos'); ?></h3>
	<?php if (!empty($cliente['Pedido'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($cliente['Pedido'] as $pedido): ?>
		<tr>
			<td><?php echo $pedido['id']; ?></td>
			<td><?php echo $pedido['total']; ?></td>
			<td><?php echo $pedido['status']; ?></td>
			<td><?php echo $pedido['data']; ?></td>
			<td><?php echo $pedido['cliente_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'pedidos', 'action' => 'view', $pedido['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'pedidos', 'action' => 'edit', $pedido['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'pedidos', 'action' => 'delete', $pedido['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $pedido['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Pedido'), array('controller' => 'pedidos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Sugestaos'); ?></h3>
	<?php if (!empty($cliente['Sugestao'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome Restaurante'); ?></th>
		<th><?php echo __('Mensagem'); ?></th>
		<th><?php echo __('Tel Restaurante'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($cliente['Sugestao'] as $sugestao): ?>
		<tr>
			<td><?php echo $sugestao['id']; ?></td>
			<td><?php echo $sugestao['nome_restaurante']; ?></td>
			<td><?php echo $sugestao['mensagem']; ?></td>
			<td><?php echo $sugestao['tel_restaurante']; ?></td>
			<td><?php echo $sugestao['cliente_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'sugestaos', 'action' => 'view', $sugestao['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'sugestaos', 'action' => 'edit', $sugestao['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'sugestaos', 'action' => 'delete', $sugestao['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $sugestao['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Sugestao'), array('controller' => 'sugestaos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
