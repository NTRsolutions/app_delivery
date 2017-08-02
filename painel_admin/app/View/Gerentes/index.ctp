<div class="gerentes index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Franqueado')){ ?>
					<ul class="breadcrumb" id="bread">
				    <li><a href="franqueados/home">Início</a></li>
				    <li class="active">Gerentes</li>
					</ul>
				<?php } ?>
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
								<?php if($this->Session->check('Admin')){ ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;'.__('Pedidos'), array('controller' => 'pedidos', 'action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;'.__('Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Franqueados'), array('controller' => 'admins', 'action' => 'home'), array('escape' => false)); ?></li>								
									<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Gerentes</a></li>
								<?php } else { ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Meu perfil'), array('controller' => 'franqueados', 'action' => 'meu_perfil'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;'.__('Restaurantes'), array('controller' => 'franqueados', 'action' => 'home'), array('escape' => false)); ?></li>
									<li class="active"><?php echo $this->Html->link('<span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp;'.__('Gerentes'), array('controller' => 'gerentes', 'action' => 'index'), array('escape' => false)); ?></li>
								<?php } ?>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<div class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Gerente'), array('controller' => 'gerentes', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary btn-sm')); ?> 
			</div><br>

			<?php if(!empty($gerentes)) { ?>

				<table cellpadding="0" cellspacing="0" class="table table-striped">
					<thead>
						<tr>
							<th nowrap><?php echo $this->Paginator->sort('nome'); ?></th>
							<th nowrap><?php echo $this->Paginator->sort('email'); ?></th>
							<th nowrap><?php echo $this->Paginator->sort('restaurante'); ?></th>
							<th class="actions"></th>
						</tr>
					</thead>
					<tbody>
					<?php  
						foreach ($gerentes as $gerente): 

							if($gerente['Gerente']['nome'] )?>
							<tr>
								<td nowrap><?php echo h($gerente['Gerente']['nome']); ?>&nbsp;</td>
								<td nowrap><?php echo h($gerente['Gerente']['email']); ?>&nbsp;</td>
								<td nowrap><?php echo h($gerente['Restaurante']['nome']); ?>&nbsp;</td>
								<td class="actions">
									<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $gerente['Gerente']['id']), array('escape' => false)); ?>
									<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $gerente['Gerente']['id']), array('escape' => false)); ?>
									<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $gerente['Gerente']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $gerente['Gerente']['id'])); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

			<?php } else { 
				echo '<h4>Nenhum gerente foi cadastrado até o momento !</h4><br>';
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