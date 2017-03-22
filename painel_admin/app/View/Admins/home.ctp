<div class="Franqueados index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Franqueados'); ?></h1>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;'.__('Pedidos'), array('controller' => 'pedidos', 'action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;'.__('Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index'), array('escape' => false)); ?></li>
								<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Franqueados</a></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Gerentes'), array('controller' => 'gerentes', 'action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;'.__('Sugestões'), array('controller' => 'sugestaos', 'action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-star-empty"></span>&nbsp;&nbsp;'.__('Avaliações'), array('controller' => 'classificacaos', 'action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-barcode"></span>&nbsp;&nbsp;'.__('Gerar boletos'), array('action' => 'gera_boleto'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;'.__('Relatórios'), array('action' => 'gera_relatorio'), array('escape' => false)); ?></li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">

			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Franqueado'), array('controller' => 'franqueados', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
			</div><br>

			<?php if(!empty($franqs)) { ?>

				<table cellpadding="0" cellspacing="0" class="table table-striped">
					<thead>
						<tr>
							<th nowrap><?php echo $this->Paginator->sort('nome'); ?></th>
							<th nowrap><?php echo $this->Paginator->sort('email'); ?></th>
							<th nowrap><?php echo $this->Paginator->sort('telefone1'); ?></th>
							<th nowrap><?php echo $this->Paginator->sort('telefone2'); ?></th>
							<th class="actions"></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($franqs as $f): ?>
						<tr>
							<td nowrap><?php echo h($f['Franqueado']['nome']); ?>&nbsp;</td>
							<td nowrap><?php echo h($f['Franqueado']['email']); ?>&nbsp;</td>
							<td nowrap><?php echo h($f['Franqueado']['telefone1']); ?>&nbsp;</td>
							<td nowrap><?php echo h($f['Franqueado']['telefone2']); ?>&nbsp;</td>

							<?php /*foreach ($franqEnds as $fe): 

								if($fe['FranqueadoEndereco']['franqueado_id'] == $f['Franqueado']['id']) {

									foreach ($ends as $e):

										if($e['Endereco']['id'] == $fe['FranqueadoEndereco']['endereco_id']) {

											foreach ($cidades as $c):

												if($c['Cidade']['id'] == $e['Endereco']['cidade_id']) {

													foreach ($estados as $est):

														if($est['Estado']['id'] == $c['Cidade']['estado_id']) {

															echo '<td nowrap>Rua ' . $e['Endereco']['rua'] . ', ' . $e['Endereco']['numero'] . ',<br> ' . $e['Endereco']['bairro'] . ', ' . $e['Endereco']['complemento'] . '<br>CEP: ' . $e['Endereco']['cep'] . '<br>' . $e['Cidade']['nome'] . ', ' . $est['Estado']['nome'] . '&nbsp;</td>';
														}
													endforeach;
												}
											endforeach;
										}
									endforeach;
								} 
							endforeach; */?>

							<td class="actions">
								<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'franqueados', 'action' => 'view', $f['Franqueado']['id']), array('escape' => false)); ?>
								<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller' => 'franqueados', 'action' => 'edit', $f['Franqueado']['id']), array('escape' => false)); ?>
								<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller' => 'franqueados', 'action' => 'delete', $f['Franqueado']['id']), array('escape' => false), __('Tem certeza que deseja excluir: %s?', $f['Franqueado']['nome'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>

			<?php } else { 
				echo '<h4>Nenhum franqueado foi cadastrado até o momento !</h4><br>';
			} ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->