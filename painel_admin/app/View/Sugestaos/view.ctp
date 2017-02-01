<div class="sugestaos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Sugestao'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Sugestao'), array('action' => 'edit', $sugestao['Sugestao']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Sugestao'), array('action' => 'delete', $sugestao['Sugestao']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $sugestao['Sugestao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Sugestaos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Sugestao'), array('action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($sugestao['Sugestao']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nome Restaurante'); ?></th>
		<td>
			<?php echo h($sugestao['Sugestao']['nome_restaurante']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Mensagem'); ?></th>
		<td>
			<?php echo h($sugestao['Sugestao']['mensagem']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Tel Restaurante'); ?></th>
		<td>
			<?php echo h($sugestao['Sugestao']['tel_restaurante']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cliente'); ?></th>
		<td>
			<?php echo $this->Html->link($sugestao['Cliente']['id'], array('controller' => 'clientes', 'action' => 'view', $sugestao['Cliente']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

