<div class="Atendentes index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
				    <li class="active">Início</li>
				</ul> 
				<h1><?php echo __('Atendentes'); ?></h1>
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
				<?php foreach ($atendentes as $at): ?>
					<tr>
						<td nowrap><?php echo h($at['Atendente']['id']); ?>&nbsp;</td>
						<td nowrap><?php echo h($at['Atendente']['email']); ?>&nbsp;</td>
						<td nowrap><?php echo h($at['Atendente']['senha']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $at['Atendente']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $at['Atendente']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $at['Atendente']['id']), array('escape' => false), __('Tem certeza que deseja excluir: %s?', $at['Atendente']['nome'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->