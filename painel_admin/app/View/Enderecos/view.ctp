<div class="enderecos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Endereco'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Endereco'), array('action' => 'edit', $endereco['Endereco']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Endereco'), array('action' => 'delete', $endereco['Endereco']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $endereco['Endereco']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Enderecos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Endereco'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($endereco['Endereco']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Rua'); ?></th>
		<td>
			<?php echo h($endereco['Endereco']['rua']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Numero'); ?></th>
		<td>
			<?php echo h($endereco['Endereco']['numero']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Bairro'); ?></th>
		<td>
			<?php echo h($endereco['Endereco']['bairro']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Complemento'); ?></th>
		<td>
			<?php echo h($endereco['Endereco']['complemento']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cep'); ?></th>
		<td>
			<?php echo h($endereco['Endereco']['cep']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Tipo'); ?></th>
		<td>
			<?php echo h($endereco['Endereco']['tipo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cidade'); ?></th>
		<td>
			<?php echo $this->Html->link($endereco['Cidade']['id'], array('controller' => 'cidades', 'action' => 'view', $endereco['Cidade']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

