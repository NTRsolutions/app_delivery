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
		<h3><?php echo __('Pedidos Relacionados'); ?></h3><br>
		<?php if (!empty($cliente['Pedido'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Status'); ?></th>
					<th><?php echo __('Data'); ?></th>
					<th><?php echo __('Total'); ?></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($cliente['Pedido'] as $pedido): ?>
					<tr>
						<td><?php echo $pedido['status']; ?></td>
						<td><?php echo date("d/m/Y", strtotime($pedido['data'])); ?></td>
						<td><?php echo 'R$ ' . $pedido['total']; ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div><!-- end col md 12 -->
</div>