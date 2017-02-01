<div class="gerentes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Gerente'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Gerente'), array('action' => 'edit', $gerente['Gerente']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Gerente'), array('action' => 'delete', $gerente['Gerente']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $gerente['Gerente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Gerentes'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Gerente'), array('action' => 'add'), array('escape' => false)); ?> </li>
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
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($gerente['Gerente']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nome'); ?></th>
		<td>
			<?php echo h($gerente['Gerente']['nome']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Email'); ?></th>
		<td>
			<?php echo h($gerente['Gerente']['email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Senha'); ?></th>
		<td>
			<?php echo h($gerente['Gerente']['senha']); ?>
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
	<h3><?php echo __('Related Restaurantes'); ?></h3>
	<?php if (!empty($gerente['Restaurante'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Cnpj'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Foto'); ?></th>
		<th><?php echo __('Horario Abre'); ?></th>
		<th><?php echo __('Horario Fecha'); ?></th>
		<th><?php echo __('Tempo Mercado'); ?></th>
		<th><?php echo __('Valor Min'); ?></th>
		<th><?php echo __('Telefone1'); ?></th>
		<th><?php echo __('Telefone2'); ?></th>
		<th><?php echo __('Gerente Id'); ?></th>
		<th><?php echo __('Franqueado Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($gerente['Restaurante'] as $restaurante): ?>
		<tr>
			<td><?php echo $restaurante['id']; ?></td>
			<td><?php echo $restaurante['nome']; ?></td>
			<td><?php echo $restaurante['cnpj']; ?></td>
			<td><?php echo $restaurante['email']; ?></td>
			<td><?php echo $restaurante['descricao']; ?></td>
			<td><?php echo $restaurante['foto']; ?></td>
			<td><?php echo $restaurante['horario_abre']; ?></td>
			<td><?php echo $restaurante['horario_fecha']; ?></td>
			<td><?php echo $restaurante['tempo_mercado']; ?></td>
			<td><?php echo $restaurante['valor_min']; ?></td>
			<td><?php echo $restaurante['telefone1']; ?></td>
			<td><?php echo $restaurante['telefone2']; ?></td>
			<td><?php echo $restaurante['gerente_id']; ?></td>
			<td><?php echo $restaurante['franqueado_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'restaurantes', 'action' => 'view', $restaurante['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'restaurantes', 'action' => 'edit', $restaurante['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'restaurantes', 'action' => 'delete', $restaurante['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $restaurante['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Restaurante'), array('controller' => 'restaurantes', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
