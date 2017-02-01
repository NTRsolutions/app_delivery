<div class="promocaos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Promocao'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Promocao'), array('action' => 'edit', $promocao['Promocao']['produto_id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Promocao'), array('action' => 'delete', $promocao['Promocao']['produto_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $promocao['Promocao']['produto_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Promocaos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Promocao'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Produtos'), array('controller' => 'produtos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Produto'), array('controller' => 'produtos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Restaurante'), array('controller' => 'restaurantes', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Produto'); ?></th>
		<td>
			<?php echo $this->Html->link($promocao['Produto']['id'], array('controller' => 'produtos', 'action' => 'view', $promocao['Produto']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Ini'); ?></th>
		<td>
			<?php echo h($promocao['Promocao']['data_ini']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Fim'); ?></th>
		<td>
			<?php echo h($promocao['Promocao']['data_fim']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Desconto'); ?></th>
		<td>
			<?php echo h($promocao['Promocao']['desconto']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Restaurante'); ?></th>
		<td>
			<?php echo $this->Html->link($promocao['Restaurante']['id'], array('controller' => 'restaurantes', 'action' => 'view', $promocao['Restaurante']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

