<div class="admins index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
				    <li><a href="../gerentes/home">Início</a></li>
				    <li class="active">Meu Restaurante</li>
				</ul> 
				<h1><?php echo __('Meu Restaurante'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->

	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Ações'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Meu perfil'), array('action' => 'meu_perfil'), array('escape' => false)); ?></li>
								<li class="active"><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;'.__('Meu restaurante'), array('action' => 'meu_restaurante'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;'.__('Todos os pedidos'), array('action' => 'home'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Atendentes'), array('controller' => 'atendentes', 'action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;'.__('Produtos'), array('controller' => 'produtos', 'action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-piggy-bank"></span>&nbsp;&nbsp;'.__('Promoções'), array('controller' => 'promocaos', 'action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-star-empty"></span>&nbsp;&nbsp;'.__('Avaliações'), array('controller' => 'classificacaos', 'action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;'.__('Relatórios'), array('action' => 'relatorios'), array('escape' => false)); ?></li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">

			<div class="col-md-3">

				<?php 
					if (!is_null($rest['0']['Restaurante']['foto'])) {									
						echo '<div class="foto_view">';
						echo $this->Html->image($rest['0']['Restaurante']['foto'], array('class' => 'img-responsive img_view')); 
						echo $this->Form->postLink('<span class="btn btn-danger btn-xs" role="button">Excluir foto</span>', array('controller' => 'restaurantes', 'action' => 'delete_foto', $rest['0']['Restaurante']['id']), array('escape' => false), __('Deseja apagar a foto?')); 
						echo '</div>';
					}
				?>

			</div>

			<div class="col-md-4">

				<div class="related row">

					<h3>Dados do restaurante:</h3><br>

					<div class="actions">
						<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Editar Restaurante'), array('controller' => 'restaurantes', 'action' => 'edit', $rest['0']['Restaurante']['id']), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
					</div><br>
						
					<?php if (!empty($gerente['Restaurante'])): ?>
						
						<?php echo __('<b>Nome:</b> ') . $rest['0']['Restaurante']['nome'];?> <br /><br />
						<?php echo __('<b>CNPJ:</b> ') . $rest['0']['Restaurante']['cnpj']; ?> <br /><br />
						<?php echo __('<b>Email:</b> ') . $rest['0']['Restaurante']['email']; ?> <br /><br />
						<?php echo __('<b>Descrição:</b> ') . $rest['0']['Restaurante']['descricao']; ?> <br /><br />
						<?php echo __('<b>Horário de funcionamento:</b> ') . $rest['0']['Restaurante']['horario_abre'] . ' às ' . $rest['0']['Restaurante']['horario_fecha'] ?> <br /><br />
						<?php echo __('<b>Tempo de mercado:</b> ') . $rest['0']['Restaurante']['tempo_mercado'] . ' anos'; ?> <br /><br />
						<?php echo __('<b>Valor mínimo de produtos:</b> ') . 'R$ ' . $rest['0']['Restaurante']['valor_min']; ?> <br /><br />
						<?php echo __('<b>Telefone1:</b> ') . $rest['0']['Restaurante']['telefone1']; ?> <br /><br />
						<?php echo __('<b>Telefone2:</b> ') . $rest['0']['Restaurante']['telefone2']; ?> <br /><br />
						<?php echo __('<b>Franqueado:</b> ') . $rest['0']['Franqueado']['nome']; ?> <br /><br />
		
					<?php endif; ?>
				</div>
			</div>

			<div class="col-md-5">

				<h3>Endereços:</h3><br>

				<div class="actions">
						<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Endereço'), array('controller' => 'enderecos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
					</div><br>

				<?php foreach ($ends as $e):

					echo $e['Endereco']['rua'] . ', ' . $e['Endereco']['numero'] . ', ' . $e['Endereco']['bairro'] . ', ' . $e['Endereco']['complemento'] . ' - ' . $e['Endereco']['cep'] . ', ' . $e['Cidade']['nome'] . ', ' . $e['Cidade']['Estado']['nome'] . '<br><br>'; 

					echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;Editar'), array('controller' => 'enderecos', 'action' => 'edit', $e['Endereco']['id']), array('escape' => false)) . '&nbsp;&nbsp;'; 
					echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;Excluir'), array('controller' => 'enderecos', 'action' => 'delete', $e['Endereco']['id']), array('escape' => false), __('Você realmente deseja excluir este endereço?')) . '<br><hr>'; 
					
				endforeach; ?>	
			</div>	
		</div> <!-- end col md 9 -->
	</div><!-- end row -->
</div><!-- end containing of content -->

<hr>

<div class="related row">
	<div class="col-md-12">
		<h3><?php echo __('Atendentes Relacionados'); ?></h3>
		<div class="actions">
			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Atendente'), array('controller' => 'atendentes', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
		</div><br>
		<?php if (!empty($rest['0']['Atendente'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Nome'); ?></th>
					<th><?php echo __('Email'); ?></th>
					<th><?php echo __('Senha'); ?></th>
					<th class="actions"></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($rest['0']['Atendente'] as $atendente): ?>
					<tr>
						<td><?php echo $atendente['nome']; ?></td>
						<td><?php echo $atendente['email']; ?></td>
						<td><?php echo $atendente['senha']; ?></td>
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
	</div><!-- end col md 12 -->
</div>

<hr>

<div class="related row">
	<div class="col-md-12">
		<h3><?php echo __('Avaliações'); ?></h3>
		<?php if (!empty($rest['0']['Classificacao'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Nota'); ?></th>
					<th><?php echo __('Comentario'); ?></th>
					<th><?php echo __('Cliente Id'); ?></th>
					<th class="actions"></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($rest['0']['Classificacao'] as $classificacao): ?>
					<tr>
						<td><?php echo $classificacao['nota']; ?></td>
						<td><?php echo $classificacao['comentario']; ?></td>
						<td><?php echo $classificacao['cliente_id']; ?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'classificacaos', 'action' => 'view', $classificacao['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'classificacaos', 'action' => 'delete', $classificacao['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $classificacao['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div><!-- end col md 12 -->
</div>

<hr>

<div class="related row">
	<div class="col-md-12">
		<h3><?php echo __('Culinárias'); ?></h3>
		<div class="actions">
			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nova Culinária'), array('controller' => 'culinarias', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
		</div><br>
		<?php if (!empty($rest['0']['Culinaria'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Tipo'); ?></th>
					<th class="actions"></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($rest['0']['Culinaria'] as $culinaria): ?>
					<tr>
						<td><?php echo $culinaria['tipo']; ?></td>
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
	</div><!-- end col md 12 -->
</div>

<hr>

<div class="related row">
	<div class="col-md-12">
		<h3><?php echo __('Pagamentos'); ?></h3>
		<div class="actions">
			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Pagamento'), array('controller' => 'pagamentos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
		</div><br>
		<?php if (!empty($rest['0']['Pagamento'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Descricao'); ?></th>
					<th class="actions"></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($rest['0']['Pagamento'] as $pagamento): ?>
					<tr>
						<td><?php echo $pagamento['descricao']; ?></td>
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
	</div><!-- end col md 12 -->
</div>

<hr>

<div class="related row">
	<div class="col-md-12">
		<h3><?php echo __('Produtos'); ?></h3>
		<div class="actions">
			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Produto'), array('controller' => 'produtos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
		</div><br>
		<?php if (!empty($rest['0']['Produto'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
			<thead>
			<tr>
				<th><?php echo __('Nome'); ?></th>
				<th><?php echo __('Tipo'); ?></th>
				<th><?php echo __('Descricao'); ?></th>
				<th><?php echo __('Preco'); ?></th>
				<th><?php echo __('Foto'); ?></th>
				<th><?php echo __('Qtd Max Complemento'); ?></th>
				<th class="actions"></th>
			</tr>
			<thead>
			<tbody>
			<?php foreach ($rest['0']['Produto'] as $produto): ?>
				<tr>
					<td><?php echo $produto['nome']; ?></td>
					<td><?php echo $produto['tipo']; ?></td>
					<td><?php echo $produto['descricao']; ?></td>
					<td><?php echo $produto['preco']; ?></td>
					<td><?php echo $produto['foto']; ?></td>
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

<hr>

<div class="related row">
	<div class="col-md-12">
		<h3><?php echo __('Promoções'); ?></h3>
		<div class="actions">
			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nova Promoção'), array('controller' => 'promocaos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
		</div><br>
		<?php if (!empty($rest['0']['Promocao'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
			<thead>
			<tr>
				<th><?php echo __('Produto Id'); ?></th>
				<th><?php echo __('Data Ini'); ?></th>
				<th><?php echo __('Data Fim'); ?></th>
				<th><?php echo __('Desconto'); ?></th>
				<th class="actions"></th>
			</tr>
			<thead>
			<tbody>
			<?php foreach ($rest['0']['Promocao'] as $promocao): ?>
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
	</div><!-- end col md 12 -->
</div>