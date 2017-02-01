<div class="produtos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Produto'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Produto'), array('action' => 'edit', $produto['Produto']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Produto'), array('action' => 'delete', $produto['Produto']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $produto['Produto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Produtos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Produto'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Restaurante'), array('controller' => 'restaurantes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Complementos'), array('controller' => 'complementos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Complemento'), array('controller' => 'complementos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Promocaos'), array('controller' => 'promocaos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Promocao'), array('controller' => 'promocaos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($produto['Produto']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nome'); ?></th>
		<td>
			<?php echo h($produto['Produto']['nome']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Tipo'); ?></th>
		<td>
			<?php echo h($produto['Produto']['tipo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Descricao'); ?></th>
		<td>
			<?php echo h($produto['Produto']['descricao']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Preco'); ?></th>
		<td>
			<?php echo h($produto['Produto']['preco']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Foto'); ?></th>
		<td>
			<?php echo h($produto['Produto']['foto']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Qtd Max Complemento'); ?></th>
		<td>
			<?php echo h($produto['Produto']['qtd_max_complemento']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Restaurante'); ?></th>
		<td>
			<?php echo $this->Html->link($produto['Restaurante']['id'], array('controller' => 'restaurantes', 'action' => 'view', $produto['Restaurante']['id'])); ?>
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
	<h3><?php echo __('Related Complementos'); ?></h3>
	<?php if (!empty($produto['Complemento'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Preco'); ?></th>
		<th><?php echo __('Produto Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($produto['Complemento'] as $complemento): ?>
		<tr>
			<td><?php echo $complemento['id']; ?></td>
			<td><?php echo $complemento['nome']; ?></td>
			<td><?php echo $complemento['tipo']; ?></td>
			<td><?php echo $complemento['descricao']; ?></td>
			<td><?php echo $complemento['preco']; ?></td>
			<td><?php echo $complemento['produto_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'complementos', 'action' => 'view', $complemento['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'complementos', 'action' => 'edit', $complemento['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'complementos', 'action' => 'delete', $complemento['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $complemento['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Complemento'), array('controller' => 'complementos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Promocaos'); ?></h3>
	<?php if (!empty($produto['Promocao'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Data Ini'); ?></th>
		<th><?php echo __('Data Fim'); ?></th>
		<th><?php echo __('Desconto'); ?></th>
		<th><?php echo __('Restaurante Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($produto['Promocao'] as $promocao): ?>
		<tr>
			<td><?php echo $promocao['produto_id']; ?></td>
			<td><?php echo $promocao['data_ini']; ?></td>
			<td><?php echo $promocao['data_fim']; ?></td>
			<td><?php echo $promocao['desconto']; ?></td>
			<td><?php echo $promocao['restaurante_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'promocaos', 'action' => 'view', $promocao['produto_id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'promocaos', 'action' => 'edit', $promocao['produto_id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'promocaos', 'action' => 'delete', $promocao['produto_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $promocao['produto_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Promocao'), array('controller' => 'promocaos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
