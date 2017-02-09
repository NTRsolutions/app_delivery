<div class="franqueados view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Franqueado'); ?></h1>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Franqueado'), array('action' => 'edit', $franqueado['Franqueado']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Franqueado'), array('action' => 'delete', $franqueado['Franqueado']['id']), array('escape' => false), __('Tem certeza que desaja excluir: %s?', $franqueado['Franqueado']['nome'])); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Franqueados'), array('action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
					<tr>
						<th><?php echo __('Nome'); ?></th>
						<td>
							<?php echo h($franqueado['Franqueado']['nome']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Email'); ?></th>
						<td>
							<?php echo h($franqueado['Franqueado']['email']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Telefone1'); ?></th>
						<td>
							<?php echo h($franqueado['Franqueado']['telefone1']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Telefone2'); ?></th>
						<td>
							<?php echo h($franqueado['Franqueado']['telefone2']); ?>
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
	<h3><?php echo __('Restaurantes Relacionados'); ?></h3>
	<?php if (!empty($franqueado['Restaurante'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
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
		<th><?php echo __('Gerente'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($franqueado['Restaurante'] as $restaurante): ?>
		<tr>
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
