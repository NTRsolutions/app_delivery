<div class="restaurantes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Franqueado')){ ?>
					<ul class="breadcrumb" id="bread">
				    <li><a href="../../franqueados/home">Início</a></li>
				    <li class="active">Detalhe Restaurante</li>
					</ul>
				<?php } ?>
				<h1><?php echo __('Restaurante'); ?></h1>
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
								<?php if($this->Session->check('Admin')) { ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('controller' => 'restaurantes', 'action' => 'index'), array('escape' => false)); ?></li>
									
								<?php } else { ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;'.__('Início'), array('controller' => 'franqueados', 'action' => 'home'), array('escape' => false)); ?> </li>
								<?php } ?>

								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Restaurante'), array('action' => 'edit', $restaurante['Restaurante']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Restaurante'), array('action' => 'delete', $restaurante['Restaurante']['id']), array('escape' => false), __('Tem certeza que deseja excluir: %s?', $restaurante['Restaurante']['nome'])); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<b>Nome:</b> <?php echo h($restaurante['Restaurante']['nome']); ?><br /><br />
			<b>CNPJ:</b> <?php echo h($restaurante['Restaurante']['cnpj']); ?><br /><br />
			<b>Email:</b> <?php echo h($restaurante['Restaurante']['email']); ?><br /><br />
			<b>Descrição:</b> <?php echo h($restaurante['Restaurante']['descricao']); ?><br /><br />
			<b>Horário Abrir:</b> <?php echo h($restaurante['Restaurante']['horario_abre']); ?><br /><br />
			<b>Horário Fechar:</b> <?php echo h($restaurante['Restaurante']['horario_fecha']); ?><br /><br />
			<b>Tempo de Mercado:</b> <?php echo h($restaurante['Restaurante']['tempo_mercado']); ?><br /><br />
			<b>Valor mínimo cobrado:</b> <?php echo h($restaurante['Restaurante']['valor_min']); ?><br /><br />
			<b>Telefone 1:</b><?php echo h($restaurante['Restaurante']['telefone1']); ?><br /><br />
			<?php if(!empty($restaurante['Restaurante']['telefone2'])) { ?>
				<b>Telefone 2:</b> <?php echo h($restaurante['Restaurante']['telefone2']). '<br /><br />'; } ?>
			<b>Gerente:</b> <?php echo $this->Html->link($restaurante['Gerente']['nome'], array('controller' => 'gerentes', 'action' => 'view', $restaurante['Gerente']['id'])); ?><br /><br />
			<b>Franqueado:</b> <?php echo $this->Html->link($restaurante['Franqueado']['nome'], array('controller' => 'franqueados', 'action' => 'view', $restaurante['Franqueado']['id'])); ?>
		</div><!-- end col md 9 -->
	</div>
</div><br><hr>

<div class="related row">
	<div class="col-md-12">
		<?php if (!empty($restaurante['Atendente'])): ?>
			<h3><?php echo __('Atendentes Relacionados'); ?></h3>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Nome'); ?></th>
					<th><?php echo __('Email'); ?></th>
					<th class="actions"></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($restaurante['Atendente'] as $atendente): ?>
					<tr>
						<td><?php echo $atendente['nome']; ?></td>
						<td><?php echo $atendente['email']; ?></td>
						<td class="actions">
							<?php //echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'atendentes', 'action' => 'view', $atendente['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'atendentes', 'action' => 'edit', $atendente['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'atendentes', 'action' => 'delete', $atendente['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $atendente['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div><!-- end col md 12 -->
</div>

<div class="related row">
	<div class="col-md-12">
		<?php if (!empty($restaurante['Classificacao'])): ?>
			<h3><?php echo __('Avaliações'); ?></h3>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Nota'); ?></th>
					<th><?php echo __('Comentário'); ?></th>
					<!--<th><?php echo __('Cliente'); ?></th>-->
					<th class="actions"></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($restaurante['Classificacao'] as $classificacao): ?>
					<tr>
						<td><?php echo $classificacao['nota']; ?></td>
						<td><?php echo $classificacao['comentario']; ?></td>
						<!--<td><?php echo $classificacao['cliente_id']; ?></td>-->
						<td class="actions">
							<?php //echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'classificacaos', 'action' => 'view', $classificacao['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'classificacaos', 'action' => 'delete', $classificacao['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $classificacao['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div><!-- end col md 12 -->
</div>

<div class="related row">
	<div class="col-md-12">
		<?php if (!empty($restaurante['Culinaria'])): ?>
			<h3><?php echo __('Culinárias'); ?></h3>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Tipo de Culinária'); ?></th>
					<th class="actions"></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($restaurante['Culinaria'] as $culinaria): ?>
					<tr>
						<td><?php echo $culinaria['tipo']; ?></td>
						<td class="actions">
							<?php //echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'culinarias', 'action' => 'view', $culinaria['id']), array('escape' => false)); ?>
							<?php //echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'culinarias', 'action' => 'edit', $culinaria['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'culinarias', 'action' => 'delete', $culinaria['id']), array('escape' => false), __('Tem certeza que deseja excluir esta culinária?')); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div><!-- end col md 12 -->
</div>

<div class="related row">
	<div class="col-md-12">
		<?php if (!empty($restaurante['Pagamento'])): ?>
			<h3><?php echo __('Pagamentos'); ?></h3>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Forma de Pagamento'); ?></th>
					<th class="actions"></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($restaurante['Pagamento'] as $pagamento): ?>
					<tr>
						<td><?php echo $pagamento['descricao']; ?></td>
						<td class="actions">
							<?php //echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'pagamentos', 'action' => 'view', $pagamento['id']), array('escape' => false)); ?>
							<?php //echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'pagamentos', 'action' => 'edit', $pagamento['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'pagamentos', 'action' => 'delete', $pagamento['id']), array('escape' => false), __('Tem certeza que deseja excluir este pagamento?')); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div><!-- end col md 12 -->
</div>

<div class="related row">
	<div class="col-md-12">
		<?php if (!empty($restaurante['Produto'])): ?>
			<h3><?php echo __('Produtos'); ?></h3>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
			<thead>
			<tr>
				<th><?php echo __('Nome'); ?></th>
				<th><?php echo __('Descrição'); ?></th>
				<th><?php echo __('Preço'); ?></th>
				<th><?php echo __('Qtd Max Complemento'); ?></th>
				<th class="actions"></th>
			</tr>
			<thead>
			<tbody>
			<?php foreach ($restaurante['Produto'] as $produto): ?>
				<tr>
					<td><?php echo $produto['nome']; ?></td>
					<td><?php echo $produto['descricao']; ?></td>
					<td><?php echo $produto['preco']; ?></td>
					<td><?php echo $produto['qtd_max_complemento']; ?></td>
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
	</div><!-- end col md 12 -->
</div>

<div class="related row">
	<div class="col-md-12">
		<?php if (!empty($restaurante['Promocao'])): ?>
			<h3><?php echo __('Promoções'); ?></h3>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
			<thead>
			<tr>
				<th><?php echo __('Produto'); ?></th>
				<th><?php echo __('Data Início'); ?></th>
				<th><?php echo __('Data Fim'); ?></th>
				<th><?php echo __('Desconto (%)'); ?></th>
				<th class="actions"></th>
			</tr>
			<thead>
			<tbody>
			<?php foreach ($restaurante['Promocao'] as $promocao): ?>
				<tr>
					<td><?php echo $promocao['Produto']['nome']; ?></td>
					<td><?php echo date("d/m/Y", strtotime($promocao['data_ini'])); ?></td>
					<td><?php echo date("d/m/Y", strtotime($promocao['data_fim'])); ?></td>
					<td><?php echo $promocao['desconto']; ?></td>
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
	</div><!-- end col md 12 -->
</div>

<!--<div class="related row">
	<div class="col-md-12">
		<?php if (!empty($restaurante['RestauranteEndereco'])): ?>
			<h3><?php echo __('Restaurante Enderecos'); ?></h3>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
			<thead>
			<tr>
				<th><?php echo __('Endereco Id'); ?></th>
				<th class="actions"></th>
			</tr>
			<thead>
			<tbody>
			<?php foreach ($restaurante['RestauranteEndereco'] as $restauranteEndereco): ?>
				<tr>
					<td><?php echo $restauranteEndereco['endereco_id']; ?></td>
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
	</div>
</div>-->
