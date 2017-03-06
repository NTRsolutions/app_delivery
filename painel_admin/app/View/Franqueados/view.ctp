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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-home"></span>&nbsp&nbsp;Início'), array('controller' => 'admins', 'action' => 'home'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Franqueado'), array('action' => 'edit', $franqueado['Franqueado']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Franqueado'), array('action' => 'delete', $franqueado['Franqueado']['id']), array('escape' => false), __('Tem certeza que desaja excluir: %s?', $franqueado['Franqueado']['nome'])); ?> </li>
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
					<?php if(isset($franqueado['Franqueado']['telefone2'])) { ?>
					<tr>
						<th><?php echo __('Telefone2'); ?></th>
						<td>
							<?php echo h($franqueado['Franqueado']['telefone2']); } ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Endereço'); ?></th>
						<td>
							<?php echo $ends['0']['Endereco']['rua'] . ', ' . $ends['0']['Endereco']['numero'] . ', ' . $ends['0']['Endereco']['bairro'] . ', ' . $ends['0']['Endereco']['complemento'] . ' - ' . $ends['0']['Endereco']['cep'] . ', ' . $ends['0']['Cidade']['nome'] . ', ' . $ends['0']['Cidade']['Estado']['nome']; ?>
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
	<br><h3><?php echo __('Restaurantes Relacionados'); ?></h3>
	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Restaurante'), array('controller' => 'restaurantes', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
	</div><br>
	<?php if (!empty($franqueado['Restaurante'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Telefone1'); ?></th>
		<th><?php echo __('Telefone2'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($franqueado['Restaurante'] as $restaurante): ?>
		<tr>
			<td><?php echo $restaurante['nome']; ?></td>
			<td><?php echo $restaurante['email']; ?></td>
			<td><?php echo $restaurante['telefone1']; ?></td>
			<td><?php echo $restaurante['telefone2']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'restaurantes', 'action' => 'view', $restaurante['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'restaurantes', 'action' => 'edit', $restaurante['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'restaurantes', 'action' => 'delete', $restaurante['id']), array('escape' => false), __('Tem certeza que desaja excluir: %s?', $restaurante['nome'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>
	</div><!-- end col md 12 -->
</div>
