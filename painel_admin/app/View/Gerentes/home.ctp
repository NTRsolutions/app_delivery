<div class="Gerentes index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
				    <li class="active">Início</li>
				</ul> 
				<h1><?php echo __('Gerente'); ?></h1>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;'.__('Meu restaurante'), array('action' => 'meu_restaurante'), array('escape' => false)); ?></li>
								<li class="active"><?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;'.__('Todos os pedidos'), array('action' => 'home'), array('escape' => false)); ?></li>
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
			<?php 
				if (empty($pedidos)) {
					echo '<h4>Nenhum pedido realizado até o momento!</h4>';
				} else {
					foreach ($pedidos as $p) {	

						echo '<div class="col-md-6">';
							echo '<p>Pedido nº: '.$p['Pedido']['id'].'</p>';
							echo '<p>Cliente: '.$p['Cliente']['nome'].' - Contato: '.$p['Cliente']['telefone1'].'</p>';
							echo '<p>Endereço de entrega: '.$p['Endereco']['rua'].','.$p['Endereco']['numero'].' - '.$p['Endereco']['complemento'].', '.$p['Endereco']['bairro'].' - '.$p['Endereco']['cep'].'</p>';
							echo '<table cellpadding="0" cellspacing="0" class="table table-striped">';
								echo '<thead>';
									echo '<tr>';
										echo '<th width="20%">Quantidade</th>';
										echo '<th width="40%">Produtos</th>';
										echo '<th width="40%">Complemento(s)</th>';
									echo '</tr>';
								echo '</thead>';
								echo '<tbody>';
									
									foreach ($p['PedidoProduto'] as $pp) {
										echo '<tr>';
											echo '<td>';
												echo $pp['qtd'];
											echo '</td>';
											echo '<td>';
												echo $pp['Produto']['nome'];
											echo '</td>';
											echo '<td>';
												foreach ($pp['Produto']['ProdutoComplemento'] as $pc) {
													if($pp['pedido_id'] == $pc['pedido_id']) { //para não pegar complemento de outro pedido
														echo $pc['qtd'].'x &nbsp;'.$pc['Complemento']['nome'].'<br>';
													}
												}
											echo '</td>';
										echo '<tr>';
									}
									
								echo '</tbody>';
							echo '</table>';
							switch ($p['Pedido']['status']) {
								case 0:
									echo '<div class="col-md-6" style="padding:0"><button value="'.$p['Pedido']['status'].'" id="'.$p['Pedido']['id'].'" class="status btn btn-danger">Pendente</button></div>';
									break;
								
								case 1:
									echo '<div class="col-md-6" style="padding:0"><button value="'.$p['Pedido']['status'].'" id="'.$p['Pedido']['id'].'" class="status btn btn-warning">Em preparo</button></div>';
									break;

								case 2:
									echo '<div class="col-md-6" style="padding:0"><button value="'.$p['Pedido']['status'].'" id="'.$p['Pedido']['id'].'" class="status btn btn-success">Entregue</button></div>';
									break;
							}
							
							echo '<div class="col-md-6"><h4 class="pull-right">Valor total: R$'.$p['Pedido']['total'].'</h4></div>';
						echo '</div>';
						//debug($p);
					}
				}
			?>
		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->

<script>
	$(document).on("click", ".status", function () {
		var id = $(this).attr("id");
		var status = $(this).attr("value");
		if (status < 2) {
			$.ajax({
			    url: 'status/'+id+'/'+status,
			    cache: false,
			    type: 'GET',
			    dataType: 'HTML',
			    success: function (data) {
			        $('#'+id).html(data);
			    }
			});

			if (status == 0) {
				$(this).removeClass("btn-danger");
				$(this).addClass("btn-warning");
				$(this).val(1);
			}

			if (status == 1) {
				$(this).removeClass("btn-warning");
				$(this).addClass("btn-success");
				$(this).val(2);
			}
		}
	});
</script>