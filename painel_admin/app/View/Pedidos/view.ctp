<div class="pedidos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Pedido'); ?></h1>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-menu-left"></span>&nbsp&nbsp;Voltar'), array('action' => 'index'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<b>Cliente:</b> <?php echo $this->Html->link($pedido['Cliente']['nome'], array('controller' => 'clientes', 'action' => 'view', $pedido['Cliente']['id'])); ?><br /><br />
			<b>Status:</b> <?php echo $status[$pedido['Pedido']['status']]; ?><br /><br />
			<b>Data:</b> <?php echo date('d/m/Y', strtotime(h($pedido['Pedido']['data']))); ?><br /><br />
			<b>Total:</b> <?php echo 'R$' . h($pedido['Pedido']['total']); ?>
		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-4">
		<h3><?php echo __('Produtos do pedido'); ?></h3>
		<?php if (!empty($pedido['PedidoProduto'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th width="15%"><?php echo __('Qtd'); ?></th>
					<th width="85%"><?php echo __('Produto'); ?></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($pedido['PedidoProduto'] as $pedidoProduto): ?>
					<tr>
						<td><?php echo $pedidoProduto['qtd']; ?></td>
						<td><?php echo $pedidoProduto['Produto']['nome']; ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div><!-- end col md 12 -->
</div>
