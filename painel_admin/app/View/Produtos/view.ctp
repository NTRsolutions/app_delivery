<div class="produtos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Gerente')){ ?>
					<ul class="breadcrumb" id="bread">
					    <li><a href="../../gerentes/home">Início</a></li>
					    <li><a href="../../produtos">Produtos</a></li>
					    <li class="active">Detalhe Produto</li>
					</ul>
				<?php } else { ?>
					<ul class="breadcrumb" id="bread">
					    <li><a href="../../franqueados/home">Início</a></li>
					    <li><?php echo $this->Html->link(__('Detalhe Restaurante'), array('controller' => 'restaurantes', 'action' => 'view', $produto['Restaurante']['id']), array('escape' => false)); ?>
					    <li class="active">Detalhe Produto</li>
					</ul>
				<?php } ?>
				<h1><?php echo __('Produto'); ?></h1>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Produto'), array('action' => 'edit', $produto['Produto']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Produto'), array('action' => 'delete', $produto['Produto']['id']), array('escape' => false), __('Tem certeza que deseja excluir: %s?', $produto['Produto']['nome'])); ?> </li>
								<!--<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Novo Produto'), array('action' => 'add'), array('escape' => false)); ?> </li>-->
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<b>Nome:</b> <?php echo h($produto['Produto']['nome']); ?><br /><br />
			<b>Tipo:</b> <?php echo $tipo[$produto['Produto']['tipo']]; ?><br /><br />
			<b>Descrição:</b> <?php echo h($produto['Produto']['descricao']); ?><br /><br />
			<b>Preço:</b> <?php echo 'R$' . h($produto['Produto']['preco']); ?><br /><br />
			<b>Qtd Max Complemento:</b> <?php echo h($produto['Produto']['qtd_max_complemento']); ?><br /><br />
			<b>Restaurante:</b> <?php echo $this->Html->link($produto['Restaurante']['nome'], array('controller' => 'restaurantes', 'action' => 'view', $produto['Restaurante']['id'])); ?>
		</div><!-- end col md 9 -->

	</div>
</div><br><hr>

<div class="related row">
	<div class="col-md-12">
		<?php if (!empty($produto['Complemento'])): ?>
		<h3><?php echo __('Complementos'); ?></h3>
		<div class="actions">
			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Complemento'), array('controller' => 'complementos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
		</div><br>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
			<thead>
			<tr>
				<th><?php echo __('Nome'); ?></th>
				<th><?php echo __('Descrição'); ?></th>
				<th><?php echo __('Preço'); ?></th>
				<th class="actions"></th>
			</tr>
			<thead>
			<tbody>
			<?php foreach ($produto['Complemento'] as $complemento): ?>
				<tr>
					<td><?php echo $complemento['nome']; ?></td>
					<td><?php echo $complemento['descricao']; ?></td>
					<td><?php echo 'R$' . $complemento['preco']; ?></td>
					<td class="actions">
						<?php //echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'complementos', 'action' => 'view', $complemento['id']), array('escape' => false)); ?>
						<?php //echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'complementos', 'action' => 'edit', $complemento['id']), array('escape' => false)); ?>
						<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'complementos', 'action' => 'delete', $complemento['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $complemento['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			</table><br><hr>
		<?php endif; ?>
	</div><!-- end col md 12 -->
</div>

<div class="related row">
	<div class="col-md-12">
		<?php if (!empty($produto['Promocao'])): ?>
			<h3><?php echo __('Promoções'); ?></h3>
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nova Promoção'), array('controller' => 'promocaos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
			</div><br>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Data Início'); ?></th>
					<th><?php echo __('Data Fim'); ?></th>
					<th><?php echo __('Desconto (%)'); ?></th>
					<th class="actions"></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($produto['Promocao'] as $promocao): ?>
					<tr>
						<td><?php echo date("d/m/Y", strtotime($promocao['data_ini'])); ?></td>
						<td><?php echo date("d/m/Y", strtotime($promocao['data_fim'])); ?></td>
						<td><?php echo $promocao['desconto']; ?></td>
						<td class="actions">
							<?php //echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'promocaos', 'action' => 'view', $promocao['produto_id']), array('escape' => false)); ?>
							<?php //echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'promocaos', 'action' => 'edit', $promocao['produto_id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'promocaos', 'action' => 'delete', $promocao['produto_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $promocao['produto_id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div><!-- end col md 12 -->
</div>
