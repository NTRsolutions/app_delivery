<div class="produtos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Gerente')){ ?>
					<ul class="breadcrumb" id="bread">
					    <li><a href="../../gerentes/home">Início</a></li>
					    <li><a href="../../produtos">Produtos</a></li>
					    <li class="active">Detalhe Produto</li>
					</ul>
				<?php } else { ?>
					<ul class="breadcrumb" id="bread">
					    <li><a href="../../franqueados/home">Início</a></li>
					    <li><?php echo $this->Html->link(__('Detalhe Restaurante'), array('controller' => 'restaurantes', 'action' => 'view', $produto['Restaurante']['id']), array('escape' => false)); ?>
					    <li class="active">Detalhe Produto</li>
					</ul>
				<?php } ?>
				<h1><?php echo __('Produto'); ?></h1>
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
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Produto'), array('action' => 'edit', $produto['Produto']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Excluir Produto'), array('action' => 'delete', $produto['Produto']['id']), array('escape' => false), __('Tem certeza que deseja excluir: %s?', $produto['Produto']['nome'])); ?> </li>
								<!--<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Novo Produto'), array('action' => 'add'), array('escape' => false)); ?> </li>-->
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<b>Nome:</b> <?php echo h($produto['Produto']['nome']); ?><br /><br />
			<b>Tipo:</b> <?php echo $tipo[$produto['Produto']['tipo']]; ?><br /><br />
			<b>Descrição:</b> <?php echo ($produto['Produto']['descricao']); ?><br /><br />
			<b>Preço:</b> <?php echo 'R$' . h($produto['Produto']['preco']); ?><br /><br />
			<b>Restaurante:</b> <?php echo $this->Html->link($produto['Restaurante']['nome'], array('controller' => 'restaurantes', 'action' => 'view', $produto['Restaurante']['id'])); ?>
		</div><!-- end col md 9 -->

	</div>
</div>
