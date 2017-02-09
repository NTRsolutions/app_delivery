<div class="restaurantes index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Restaurantes'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Actions'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('Novo Restaurante'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'.__('Gerentes'), array('controller' => 'gerentes', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo'.__('Gerente'), array('controller' => 'gerentes', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'.__('Franqueados'), array('controller' => 'franqueados', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo'.__('Franqueado'), array('controller' => 'franqueados', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'.__('Atendentes'), array('controller' => 'atendentes', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo'.__('Atendente'), array('controller' => 'atendentes', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'.__('Classificacaos'), array('controller' => 'classificacaos', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo'.__('Classificacao'), array('controller' => 'classificacaos', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'.__('Culinarias'), array('controller' => 'culinarias', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo'.__('Culinaria'), array('controller' => 'culinarias', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'.__('Pagamentos'), array('controller' => 'pagamentos', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo'.__('Pagamento'), array('controller' => 'pagamentos', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'.__('Produtos'), array('controller' => 'produtos', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo'.__('Produto'), array('controller' => 'produtos', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'.__('Promocaos'), array('controller' => 'promocaos', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo'.__('Promocao'), array('controller' => 'promocaos', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'.__('Restaurante Enderecos'), array('controller' => 'restaurante_enderecos', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo'.__('Restaurante Endereco'), array('controller' => 'restaurante_enderecos', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th nowrap><?php echo $this->Paginator->sort('nome'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('cnpj'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('email'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('descricao'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('foto'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('horario_abre'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('horario_fecha'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('tempo_mercado'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('valor_min'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('telefone1'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('telefone2'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('gerente_id'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('franqueado_id'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($restaurantes as $restaurante): ?>
					<tr>
						<td nowrap><?php echo h($restaurante['Restaurante']['nome']); ?>&nbsp;</td>
						<td nowrap><?php echo h($restaurante['Restaurante']['cnpj']); ?>&nbsp;</td>
						<td nowrap><?php echo h($restaurante['Restaurante']['email']); ?>&nbsp;</td>
						<td nowrap><?php echo h($restaurante['Restaurante']['descricao']); ?>&nbsp;</td>
						<td nowrap><?php echo h($restaurante['Restaurante']['foto']); ?>&nbsp;</td>
						<td nowrap><?php echo h($restaurante['Restaurante']['horario_abre']); ?>&nbsp;</td>
						<td nowrap><?php echo h($restaurante['Restaurante']['horario_fecha']); ?>&nbsp;</td>
						<td nowrap><?php echo h($restaurante['Restaurante']['tempo_mercado']); ?>&nbsp;</td>
						<td nowrap><?php echo h($restaurante['Restaurante']['valor_min']); ?>&nbsp;</td>
						<td nowrap><?php echo h($restaurante['Restaurante']['telefone1']); ?>&nbsp;</td>
						<td nowrap><?php echo h($restaurante['Restaurante']['telefone2']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link($restaurante['Gerente']['id'], array('controller' => 'gerentes', 'action' => 'view', $restaurante['Gerente']['id'])); ?>
								</td>
								<td>
									<?php echo $this->Html->link($restaurante['Franqueado']['id'], array('controller' => 'franqueados', 'action' => 'view', $restaurante['Franqueado']['id'])); ?>
								</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $restaurante['Restaurante']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $restaurante['Restaurante']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $restaurante['Restaurante']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $restaurante['Restaurante']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->