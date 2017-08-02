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
					} else {
						echo '<p style="margin-top:20px">Insira uma foto em "Editar restaurante"</p>';
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
						<?php echo __('<b>Tempo de mercado:</b> ') . $rest['0']['Restaurante']['tempo_mercado'] . ' anos'; ?> <br /><br />
						<?php echo __('<b>Telefone1:</b> ') . $rest['0']['Restaurante']['telefone1']; ?> <br /><br />
						<?php echo __('<b>Telefone2:</b> ') . $rest['0']['Restaurante']['telefone2']; ?> <br /><br />
						<?php echo __('<b>Franqueado:</b> ') . $rest['0']['Franqueado']['nome']; ?> <br /><br />
		
					<?php endif; ?>
				</div>
			</div>

			<div class="col-md-5">

				<h3>Endereço:</h3><br>

				<?php foreach ($ends as $e):
					echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;Editar Endereço'), array('controller' => 'enderecos', 'action' => 'edit', $e['Endereco']['id']), array('escape' => false, 'class' => 'btn btn-primary btn-sm')) . '&nbsp;&nbsp;<br><br>';

					echo $e['Endereco']['rua'] . ', ' . $e['Endereco']['numero'] . ', ' . $e['Endereco']['bairro'] . ', ' . $e['Endereco']['complemento'] . ' - ' . $e['Endereco']['cep'] . ', ' . $e['Cidade']['nome'] . ', ' . $e['Cidade']['Estado']['nome'] . '<br><br>'; 
					
				endforeach; ?>	
			</div>	
		</div> <!-- end col md 9 -->
	</div><!-- end row -->
</div><!-- end containing of content -->

<hr>

<div class="related row">
	<div class="col-md-6">
		<h3><?php echo __('Culinárias'); ?></h3>
		<div class="actions">
			<?php echo $this->Html->link(__('Nova / Editar Culinária'), array('controller' => 'culinarias', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
		</div><br>
		<?php if (!empty($rest['0']['Culinaria'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Tipo de Culinária'); ?></th>
					<th class="actions"></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($rest['0']['Culinaria'] as $culinaria): ?>
					<tr>
						<td><?php echo $culinaria['tipo']; ?></td>
						<td class="actions">
							<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'culinarias', 'action' => 'delete', $culinaria['id']), array('escape' => false), __('Tem certeza que deseja excluir esta culinária: %s?', $culinaria['tipo'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div><!-- end col md 12 -->

	<div class="col-md-6">
		<h3><?php echo __('Pagamentos'); ?></h3>
		<div class="actions">
			<?php echo $this->Html->link(__('Novo / Editar Pagamento'), array('controller' => 'pagamentos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
		</div><br>
		<?php if (!empty($rest['0']['Pagamento'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo __('Forma de Pagamento'); ?></th>
					<th class="actions"></th>
				</tr>
				<thead>
				<tbody>
				<?php foreach ($rest['0']['Pagamento'] as $pagamento): ?>
					<tr>
						<td><?php echo $pagamento['descricao']; ?></td>
						<td class="actions">
							<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'pagamentos', 'action' => 'delete', $pagamento['id']), array('escape' => false), __('Tem certeza que deseja excluir este pagamento: %s?', $pagamento['descricao'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div><!-- end col md 12 -->
</div>