<div class="Gerentes index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
				    <li class="active">Início</li>
				</ul> 
				<h1><?php echo __('Gerentes'); ?></h1>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;'.__('Meu restaurante'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;'.__('Todos os pedidos'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Atendentes'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;'.__('Produtos'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-piggy-bank"></span>&nbsp;&nbsp;'.__('Promoções'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-star-empty"></span>&nbsp;&nbsp;'.__('Avaliações'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;'.__('Relatórios'), array('action' => 'add'), array('escape' => false)); ?></li>
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
						<th nowrap><?php echo $this->Paginator->sort('login'); ?></th>
						<th nowrap><?php echo $this->Paginator->sort('senha'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($gerentes as $ger): ?>
					<tr>
						<td nowrap><?php echo h($ger['Gerente']['id']); ?>&nbsp;</td>
						<td nowrap><?php echo h($ger['Gerente']['email']); ?>&nbsp;</td>
						<td nowrap><?php echo h($ger['Gerente']['senha']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $ger['Gerente']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $ger['Gerente']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $ger['Gerente']['id']), array('escape' => false), __('Tem certeza que deseja excluir: %s?', $ger['Gerente']['nome'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->