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
					<div class="panel-heading"><?php echo __('Ações'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-menu-left"></span>&nbsp&nbsp;Voltar'), array('controller' => 'pedidos', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Cliente'), array('action' => 'edit', $cliente['Cliente']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), array('escape' => false), __('Tem certeza que desaja excluir: %s?', $cliente['Cliente']['nome'])); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<b>Nome:</b> <?php echo h($cliente['Cliente']['nome']); ?><br /><br />
			<b>Email:</b> <?php echo h($cliente['Cliente']['email']); ?><br /><br />
			<b>Telefone 1:</b> <?php echo $cliente['Cliente']['telefone1']; ?><br /><br />
			<b>Telefone 2:</b> <?php echo $cliente['Cliente']['telefone2']; ?>
		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
		<h3><?php echo __('Classificações Relacionadas'); ?></h3><br>
		<?php if (!empty($cliente['Classificacao'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
			<thead>
			<tr>
				<th><?php echo __('Nota'); ?></th>
				<th><?php echo __('Comentario'); ?></th>
				<th><?php echo __('Restaurante Id'); ?></th>
				<th class="actions"></th>
			</tr>
			<thead>
			<tbody>
			<?php foreach ($cliente['Classificacao'] as $classificacao): ?>
				<tr>
					<td><?php echo $classificacao['nota']; ?></td>
					<td><?php echo $classificacao['comentario']; ?></td>
					<td><?php echo $this->Html->link($classificacao['restaurante_id'], array('controller' => 'restaurantes', 'action' => 'view', $classificacao['restaurante_id'])); ?></td>
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
	</div><!-- end col md 12 -->
</div>

<!--<div class="related row">
	<div class="col-md-12">
		<h3><?php echo __('Related Cliente Enderecos'); ?></h3><br>
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
	</div>
</div>-->

<div class="related row">
	<div class="col-md-12">
		<h3><?php echo __('Pedidos Relacionados'); ?></h3><br>
		<?php if (!empty($cliente['Pedido'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Status'); ?></th>
					<th><?php echo __('Data'); ?></th>
					<th><?php echo __('Total'); ?></th>
					<th class="actions"></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($cliente['Pedido'] as $pedido): ?>
					<tr>
						<td><?php echo $pedido['status']; ?></td>
						<td><?php echo date("d/m/Y", strtotime($pedido['data'])); ?></td>
						<td><?php echo 'R$ ' . $pedido['total']; ?></td>
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
	</div><!-- end col md 12 -->
</div>

<div class="related row">
	<div class="col-md-12">
		<h3><?php echo __('Sugestões Relacionadas'); ?></h3><br>
		<?php if (!empty($cliente['Sugestao'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
			<thead>
			<tr>
				<th><?php echo __('Restaurante'); ?></th>
				<th><?php echo __('Mensagem'); ?></th>
				<th><?php echo __('Telefone Restaurante'); ?></th>
				<th class="actions"></th>
			</tr>
			<thead>
			<tbody>
			<?php foreach ($cliente['Sugestao'] as $sugestao): ?>
				<tr>
					<td><?php echo $sugestao['nome_restaurante']; ?></td>
					<td><?php echo $sugestao['mensagem']; ?></td>
					<td><?php echo $sugestao['tel_restaurante']; ?></td>
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
	</div><!-- end col md 12 -->
</div>
