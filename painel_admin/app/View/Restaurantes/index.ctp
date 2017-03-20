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
					<div class="panel-heading"><?php echo __('Ações'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<?php if($this->Session->check('Admin')){ ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;'.__('Pedidos'), array('controller' => 'pedidos', 'action' => 'index'), array('escape' => false)); ?></li>
									<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Restaurantes</a></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Franqueados'), array('controller' => 'admins', 'action' => 'home'), array('escape' => false)); ?></li>		
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Gerentes'), array('controller' => 'gerentes', 'action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;'.__('Sugestões'), array('controller' => 'sugestaos', 'action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-star-empty"></span>&nbsp;&nbsp;'.__('Avaliações'), array('controller' => 'classificacaos', 'action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-barcode"></span>&nbsp;&nbsp;'.__('Gerar boletos'), array('controller' => 'admins', 'action' => 'gera_boleto'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;'.__('Relatórios'), array('controller' => 'admins', 'action' => 'gera_relatorio'), array('escape' => false)); ?></li>
								<?php } ?>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Restaurante'), array('controller' => 'restaurantes', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
			</div><br>
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th nowrap><?php echo $this->Paginator->sort('nome'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('email'); ?></th>
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
						<td nowrap><?php echo h($restaurante['Restaurante']['email']); ?>&nbsp;</td>
						<td nowrap><?php echo h($restaurante['Restaurante']['telefone1']); ?>&nbsp;</td>
						<td nowrap><?php echo h($restaurante['Restaurante']['telefone2']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link($restaurante['Gerente']['nome'], array('controller' => 'gerentes', 'action' => 'view', $restaurante['Gerente']['id'])); ?>
								</td>
								<td>
									<?php echo $this->Html->link($restaurante['Franqueado']['nome'], array('controller' => 'franqueados', 'action' => 'view', $restaurante['Franqueado']['id'])); ?>
								</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $restaurante['Restaurante']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $restaurante['Restaurante']['id']), array('escape' => false), __('Você realmente deseja excluir: %s?', $restaurante['Restaurante']['nome'])); ?>
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