<div class="classificacaos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Classificacao'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Classificacao'), array('action' => 'edit', $classificacao['Classificacao']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Classificacao'), array('action' => 'delete', $classificacao['Classificacao']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $classificacao['Classificacao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Classificacaos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Classificacao'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Restaurante'), array('controller' => 'restaurantes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($classificacao['Classificacao']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nota'); ?></th>
		<td>
			<?php echo h($classificacao['Classificacao']['nota']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Comentario'); ?></th>
		<td>
			<?php echo h($classificacao['Classificacao']['comentario']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Restaurante'); ?></th>
		<td>
			<?php echo $this->Html->link($classificacao['Restaurante']['id'], array('controller' => 'restaurantes', 'action' => 'view', $classificacao['Restaurante']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cliente'); ?></th>
		<td>
			<?php echo $this->Html->link($classificacao['Cliente']['id'], array('controller' => 'clientes', 'action' => 'view', $classificacao['Cliente']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

