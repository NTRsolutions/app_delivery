<div class="enderecos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Enderecos'); ?></h1>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;'.__('New Endereco'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List'.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New'.__('Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th nowrap><?php echo $this->Paginator->sort('id'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('rua'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('numero'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('bairro'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('complemento'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('cep'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('cidade_id'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($enderecos as $endereco): ?>
					<tr>
						<td nowrap><?php echo h($endereco['Endereco']['id']); ?>&nbsp;</td>
						<td nowrap><?php echo h($endereco['Endereco']['rua']); ?>&nbsp;</td>
						<td nowrap><?php echo h($endereco['Endereco']['numero']); ?>&nbsp;</td>
						<td nowrap><?php echo h($endereco['Endereco']['bairro']); ?>&nbsp;</td>
						<td nowrap><?php echo h($endereco['Endereco']['complemento']); ?>&nbsp;</td>
						<td nowrap><?php echo h($endereco['Endereco']['cep']); ?>&nbsp;</td>
						<td><?php echo $this->Html->link($endereco['Cidade']['id'], array('controller' => 'cidades', 'action' => 'view', $endereco['Cidade']['id'])); ?></td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $endereco['Endereco']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $endereco['Endereco']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $endereco['Endereco']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $endereco['Endereco']['id'])); ?>
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