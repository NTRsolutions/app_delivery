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

					<legend>Dados do restaurante:</legend>

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

				<legend>Endereços:</legend>

				<div class="actions">
						<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Endereço'), array('controller' => 'enderecos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
					</div><br>

				<?php foreach ($ends as $e):

					echo 'Rua ' . $e['Endereco']['rua'] . ', ' . $e['Endereco']['numero'] . ', ' . $e['Endereco']['bairro'] . ', ' . $e['Endereco']['complemento'] . ' - ' . $e['Endereco']['cep'] . ', ' . $e['Cidade']['nome'] . ', ' . $e['Cidade']['Estado']['nome'] . '<br><br>'; 

					echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;Editar'), array('controller' => 'enderecos', 'action' => 'edit', $e['Endereco']['id']), array('escape' => false)) . '&nbsp;&nbsp;'; 
					echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;Excluir'), array('controller' => 'enderecos', 'action' => 'delete', $e['Endereco']['id']), array('escape' => false), __('Você realmente deseja excluir este endereço?')) . '<br><hr>'; 
					
				endforeach; ?>	
			</div>	
		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->