<div class="restaurantes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Restaurante'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Restaurante'), array('action' => 'edit', $restaurante['Restaurante']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Restaurante'), array('action' => 'delete', $restaurante['Restaurante']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $restaurante['Restaurante']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Restaurantes'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Restaurante'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Gerentes'), array('controller' => 'gerentes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Gerente'), array('controller' => 'gerentes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Franqueados'), array('controller' => 'franqueados', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Franqueado'), array('controller' => 'franqueados', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Atendentes'), array('controller' => 'atendentes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Atendente'), array('controller' => 'atendentes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Classificacaos'), array('controller' => 'classificacaos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Classificacao'), array('controller' => 'classificacaos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Culinarias'), array('controller' => 'culinarias', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Culinaria'), array('controller' => 'culinarias', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Pagamentos'), array('controller' => 'pagamentos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Pagamento'), array('controller' => 'pagamentos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Produtos'), array('controller' => 'produtos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Produto'), array('controller' => 'produtos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Promocaos'), array('controller' => 'promocaos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Promocao'), array('controller' => 'promocaos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Restaurante Enderecos'), array('controller' => 'restaurante_enderecos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Restaurante Endereco'), array('controller' => 'restaurante_enderecos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($restaurante['Restaurante']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nome'); ?></th>
		<td>
			<?php echo h($restaurante['Restaurante']['nome']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cnpj'); ?></th>
		<td>
			<?php echo h($restaurante['Restaurante']['cnpj']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Email'); ?></th>
		<td>
			<?php echo h($restaurante['Restaurante']['email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Descricao'); ?></th>
		<td>
			<?php echo h($restaurante['Restaurante']['descricao']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Foto'); ?></th>
		<td>
			<?php echo h($restaurante['Restaurante']['foto']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Horario Abre'); ?></th>
		<td>
			<?php echo h($restaurante['Restaurante']['horario_abre']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Horario Fecha'); ?></th>
		<td>
			<?php echo h($restaurante['Restaurante']['horario_fecha']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Tempo Mercado'); ?></th>
		<td>
			<?php echo h($restaurante['Restaurante']['tempo_mercado']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Valor Min'); ?></th>
		<td>
			<?php echo h($restaurante['Restaurante']['valor_min']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Telefone1'); ?></th>
		<td>
			<?php echo h($restaurante['Restaurante']['telefone1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Telefone2'); ?></th>
		<td>
			<?php echo h($restaurante['Restaurante']['telefone2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Gerente'); ?></th>
		<td>
			<?php echo $this->Html->link($restaurante['Gerente']['id'], array('controller' => 'gerentes', 'action' => 'view', $restaurante['Gerente']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Franqueado'); ?></th>
		<td>
			<?php echo $this->Html->link($restaurante['Franqueado']['id'], array('controller' => 'franqueados', 'action' => 'view', $restaurante['Franqueado']['id'])); ?>
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
	<h3><?php echo __('Related Atendentes'); ?></h3>
	<?php if (!empty($restaurante['Atendente'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Senha'); ?></th>
		<th><?php echo __('Restaurante Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($restaurante['Atendente'] as $atendente): ?>
		<tr>
			<td><?php echo $atendente['id']; ?></td>
			<td><?php echo $atendente['nome']; ?></td>
			<td><?php echo $atendente['email']; ?></td>
			<td><?php echo $atendente['senha']; ?></td>
			<td><?php echo $atendente['restaurante_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'atendentes', 'action' => 'view', $atendente['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'atendentes', 'action' => 'edit', $atendente['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'atendentes', 'action' => 'delete', $atendente['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $atendente['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Atendente'), array('controller' => 'atendentes', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Classificacaos'); ?></h3>
	<?php if (!empty($restaurante['Classificacao'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nota'); ?></th>
		<th><?php echo __('Comentario'); ?></th>
		<th><?php echo __('Restaurante Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($restaurante['Classificacao'] as $classificacao): ?>
		<tr>
			<td><?php echo $classificacao['id']; ?></td>
			<td><?php echo $classificacao['nota']; ?></td>
			<td><?php echo $classificacao['comentario']; ?></td>
			<td><?php echo $classificacao['restaurante_id']; ?></td>
			<td><?php echo $classificacao['cliente_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'classificacaos', 'action' => 'view', $classificacao['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'classificacaos', 'action' => 'edit', $classificacao['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'classificacaos', 'action' => 'delete', $classificacao['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $classificacao['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Classificacao'), array('controller' => 'classificacaos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Culinarias'); ?></h3>
	<?php if (!empty($restaurante['Culinaria'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Restaurante Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($restaurante['Culinaria'] as $culinaria): ?>
		<tr>
			<td><?php echo $culinaria['id']; ?></td>
			<td><?php echo $culinaria['tipo']; ?></td>
			<td><?php echo $culinaria['restaurante_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'culinarias', 'action' => 'view', $culinaria['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'culinarias', 'action' => 'edit', $culinaria['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'culinarias', 'action' => 'delete', $culinaria['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $culinaria['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Culinaria'), array('controller' => 'culinarias', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Pagamentos'); ?></h3>
	<?php if (!empty($restaurante['Pagamento'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Restaurante Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($restaurante['Pagamento'] as $pagamento): ?>
		<tr>
			<td><?php echo $pagamento['id']; ?></td>
			<td><?php echo $pagamento['descricao']; ?></td>
			<td><?php echo $pagamento['restaurante_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'pagamentos', 'action' => 'view', $pagamento['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'pagamentos', 'action' => 'edit', $pagamento['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'pagamentos', 'action' => 'delete', $pagamento['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $pagamento['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Pagamento'), array('controller' => 'pagamentos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Produtos'); ?></h3>
	<?php if (!empty($restaurante['Produto'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Preco'); ?></th>
		<th><?php echo __('Foto'); ?></th>
		<th><?php echo __('Qtd Max Complemento'); ?></th>
		<th><?php echo __('Restaurante Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($restaurante['Produto'] as $produto): ?>
		<tr>
			<td><?php echo $produto['id']; ?></td>
			<td><?php echo $produto['nome']; ?></td>
			<td><?php echo $produto['tipo']; ?></td>
			<td><?php echo $produto['descricao']; ?></td>
			<td><?php echo $produto['preco']; ?></td>
			<td><?php echo $produto['foto']; ?></td>
			<td><?php echo $produto['qtd_max_complemento']; ?></td>
			<td><?php echo $produto['restaurante_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'produtos', 'action' => 'view', $produto['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'produtos', 'action' => 'edit', $produto['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'produtos', 'action' => 'delete', $produto['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $produto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Produto'), array('controller' => 'produtos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Promocaos'); ?></h3>
	<?php if (!empty($restaurante['Promocao'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Produto Id'); ?></th>
		<th><?php echo __('Data Ini'); ?></th>
		<th><?php echo __('Data Fim'); ?></th>
		<th><?php echo __('Desconto'); ?></th>
		<th><?php echo __('Restaurante Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($restaurante['Promocao'] as $promocao): ?>
		<tr>
			<td><?php echo $promocao['produto_id']; ?></td>
			<td><?php echo $promocao['data_ini']; ?></td>
			<td><?php echo $promocao['data_fim']; ?></td>
			<td><?php echo $promocao['desconto']; ?></td>
			<td><?php echo $promocao['restaurante_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'promocaos', 'action' => 'view', $promocao['produto_id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'promocaos', 'action' => 'edit', $promocao['produto_id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'promocaos', 'action' => 'delete', $promocao['produto_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $promocao['produto_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Promocao'), array('controller' => 'promocaos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Restaurante Enderecos'); ?></h3>
	<?php if (!empty($restaurante['RestauranteEndereco'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Endereco Id'); ?></th>
		<th><?php echo __('Restaurante Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($restaurante['RestauranteEndereco'] as $restauranteEndereco): ?>
		<tr>
			<td><?php echo $restauranteEndereco['endereco_id']; ?></td>
			<td><?php echo $restauranteEndereco['restaurante_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'restaurante_enderecos', 'action' => 'view', $restauranteEndereco['endereco_id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'restaurante_enderecos', 'action' => 'edit', $restauranteEndereco['endereco_id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'restaurante_enderecos', 'action' => 'delete', $restauranteEndereco['endereco_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $restauranteEndereco['endereco_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Restaurante Endereco'), array('controller' => 'restaurante_enderecos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
