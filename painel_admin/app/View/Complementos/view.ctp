<div class="complementos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Complemento'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Complemento'), array('action' => 'edit', $complemento['Complemento']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Complemento'), array('action' => 'delete', $complemento['Complemento']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $complemento['Complemento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Complementos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Complemento'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Produtos'), array('controller' => 'produtos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Produto'), array('controller' => 'produtos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($complemento['Complemento']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nome'); ?></th>
		<td>
			<?php echo h($complemento['Complemento']['nome']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Tipo'); ?></th>
		<td>
			<?php echo h($complemento['Complemento']['tipo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Descricao'); ?></th>
		<td>
			<?php echo h($complemento['Complemento']['descricao']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Preco'); ?></th>
		<td>
			<?php echo h($complemento['Complemento']['preco']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Produto'); ?></th>
		<td>
			<?php echo $this->Html->link($complemento['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $complemento['Produto']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

