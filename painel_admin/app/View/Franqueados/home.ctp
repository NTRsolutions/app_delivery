<div class="Franqueados index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
				    <li class="active">Início</li>
				</ul> 
				<h1><?php echo __('Franqueado'); ?></h1>
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
								<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Restaurantes</a></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Gerentes'), array('controller' => 'gerentes', 'action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;'.__('Sugestões'), array('controller' => 'sugestaos', 'action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-star-empty"></span>&nbsp;&nbsp;'.__('Avaliações'), array('controller' => 'classificacaos', 'action' => 'index'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;'.__('Relatórios'), array('action' => 'relatorios'), array('escape' => false)); ?></li>
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
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $restaurante['Restaurante']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $restaurante['Restaurante']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $restaurante['Restaurante']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $restaurante['Restaurante']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->