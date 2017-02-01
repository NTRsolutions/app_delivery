<div class="cidades view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Cidade'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Cidade'), array('action' => 'edit', $cidade['Cidade']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Cidade'), array('action' => 'delete', $cidade['Cidade']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $cidade['Cidade']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Cidades'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Cidade'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Estados'), array('controller' => 'estados', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Estado'), array('controller' => 'estados', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Enderecos'), array('controller' => 'enderecos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Endereco'), array('controller' => 'enderecos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($cidade['Cidade']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nome'); ?></th>
		<td>
			<?php echo h($cidade['Cidade']['nome']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Estado'); ?></th>
		<td>
			<?php echo $this->Html->link($cidade['Estado']['id'], array('controller' => 'estados', 'action' => 'view', $cidade['Estado']['id'])); ?>
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
	<h3><?php echo __('Related Enderecos'); ?></h3>
	<?php if (!empty($cidade['Endereco'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Rua'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('Complemento'); ?></th>
		<th><?php echo __('Cep'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Cidade Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($cidade['Endereco'] as $endereco): ?>
		<tr>
			<td><?php echo $endereco['id']; ?></td>
			<td><?php echo $endereco['rua']; ?></td>
			<td><?php echo $endereco['numero']; ?></td>
			<td><?php echo $endereco['bairro']; ?></td>
			<td><?php echo $endereco['complemento']; ?></td>
			<td><?php echo $endereco['cep']; ?></td>
			<td><?php echo $endereco['tipo']; ?></td>
			<td><?php echo $endereco['cidade_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'enderecos', 'action' => 'view', $endereco['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'enderecos', 'action' => 'edit', $endereco['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'enderecos', 'action' => 'delete', $endereco['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $endereco['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Endereco'), array('controller' => 'enderecos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
