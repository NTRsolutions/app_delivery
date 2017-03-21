<div class="gerentes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Franqueado')){ ?>
					<ul class="breadcrumb" id="bread">
					    <li><a href="../../franqueados/home">Início</a></li>
					    <li><a href="../../gerentes">Gerentes</a></li>
					    <li class="active">Detalhe Gerente</li>
					</ul>
				<?php } ?>
				<h1><?php echo __('Gerente'); ?></h1>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Gerentes'), array('controller' => 'gerentes', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Gerente'), array('action' => 'edit', $gerente['Gerente']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Gerente'), array('action' => 'delete', $gerente['Gerente']['id']), array('escape' => false), __('Tem certeza que desaja excluir: %s?', $gerente['Gerente']['nome'])); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<b>Nome:</b> <?php echo h($gerente['Gerente']['nome']); ?><br /><br />
			<b>Email:</b> <?php echo h($gerente['Gerente']['email']); ?>
		</div><!-- end col md 9 -->

	</div>
</div>
<!--
<div class="related row">
	<div class="col-md-12">
		<br><h3><?php echo __('Restaurantes Relacionados'); ?></h3>
		<div class="actions">
			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Restaurante'), array('controller' => 'restaurantes', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
		</div><br>
		<?php if (!empty($gerente['Restaurante'])): ?>
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
				<?php foreach ($gerente['Restaurante'] as $restaurante): ?>
					<tr>
						<td><?php echo $restaurante['nome']; ?></td>
						<td><?php echo $restaurante['email']; ?></td>
						<td><?php echo $restaurante['telefone1']; ?></td>
						<td><?php echo $restaurante['telefone2']; ?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'restaurantes', 'action' => 'view', $restaurante['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'restaurantes', 'action' => 'edit', $restaurante['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'restaurantes', 'action' => 'delete', $restaurante['nome']), array('escape' => false), __('Você realmente deseja excluir: %s?', $restaurante['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div>
</div>
-->