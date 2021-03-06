<div class="produtos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
			    <li><a href="gerentes/home">Início</a></li>
			    <li class="active">Produtos</li>
				</ul>
				<h1><?php echo __('Produtos'); ?></h1>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Meu perfil'), array('controller' => 'gerentes', 'action' => 'meu_perfil'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;'.__('Meu restaurante'), array('controller' => 'gerentes', 'action' => 'meu_restaurante'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;'.__('Todos os pedidos'), array('controller' => 'gerentes', 'action' => 'home'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Atendentes'), array('controller' => 'atendentes', 'action' => 'index'), array('escape' => false)); ?></li>
								<li class="active"><?php echo $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;'.__('Produtos'), array('controller' => 'produtos', 'action' => 'index'), array('escape' => false)); ?></li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Produto'), array('controller' => 'produtos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
			</div><br>

			<?php if(!empty($produtos)) { ?>

				<table cellpadding="0" cellspacing="0" class="table table-striped">
					<thead>
						<tr>
							<th nowrap><?php echo $this->Paginator->sort('nome'); ?></th>
							<th nowrap><?php echo $this->Paginator->sort('tipo'); ?></th>
							<th nowrap><?php echo $this->Paginator->sort('preco'); ?></th>
							<th class="actions"></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($produtos as $produto): ?>
						<tr>
							<td nowrap><?php echo h($produto['Produto']['nome']); ?>&nbsp;</td>
							<td nowrap><?php echo h($tipo[$produto['Produto']['tipo']]); ?>&nbsp;</td>
							<td nowrap><?php echo 'R$' . h($produto['Produto']['preco']); ?>&nbsp;</td>
							<td class="actions">
								<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $produto['Produto']['id']), array('escape' => false)); ?>
								<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $produto['Produto']['id']), array('escape' => false)); ?>
								<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $produto['Produto']['id']), array('escape' => false), __('Tem certeza que deseja excluir: %s?', $produto['Produto']['nome'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>

			<?php } else { 

				echo '<h4>Nenhum produto está relacionada com o seu restaurante !</h4><br>';

			} ?>

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