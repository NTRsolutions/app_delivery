<div class="atendentes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Gerente')){ ?>
					<ul class="breadcrumb" id="bread">
					    <li><a href="../../gerentes/home">Início</a></li>
					    <li><a href="../../atendentes">Atendentes</a></li>
					    <li class="active">Detalhe Atendente</li>
					</ul>
				<?php } ?>
				<h1><?php echo __('Atendente'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo __('Ações'); ?></div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<?php if ($this->Session->check('Gerente')) { ?>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-menu-left"></span>&nbsp&nbsp;Voltar'), array('action' => 'index'), array('escape' => false)); ?> </li>
								<?php } else { ?>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-home"></span>&nbsp&nbsp;Início'), array('controller' => 'admins', 'action' => 'home'), array('escape' => false)); ?> </li>
								<?php } ?>

								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Atendente'), array('action' => 'edit', $atendente['Atendente']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Atendente'), array('action' => 'delete', $atendente['Atendente']['id']), array('escape' => false), __('Tem certeza que desaja excluir: %s?', $atendente['Atendente']['nome'])); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
					<tr>
						<th><?php echo __('Nome'); ?></th>
						<td>
							<?php echo h($atendente['Atendente']['nome']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Email'); ?></th>
						<td>
							<?php echo h($atendente['Atendente']['email']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<th><?php echo __('Restaurante'); ?></th>
						<td>
							<?php echo $this->Html->link($atendente['Restaurante']['nome'], array('controller' => 'restaurantes', 'action' => 'view', $atendente['Restaurante']['id'])); ?>
							&nbsp;
						</td>
					</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

