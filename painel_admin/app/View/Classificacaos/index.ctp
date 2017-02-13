<div class="classificacaos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Gerente')){ ?>
						<ul class="breadcrumb" id="bread">
						    <li><a href="gerentes/home">Início</a></li>
						    <li class="active">Avaliações</li>
						</ul>
				<?php } else { ?>
						<ul class="breadcrumb" id="bread">
						    <li><a href="franqueados/home">Início</a></li>
						    <li class="active">Avaliações</li>
						</ul>
				<?php } ?>
				<h1><?php echo __('Avaliações'); ?></h1>
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
								<?php if($this->Session->check('Admin')) { ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;'.__('Pedidos'), array('controller' => 'pedidos', 'action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;'.__('Restaurantes'), array('controller' => 'restaurantes', 'action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Franqueados'), array('controller' => 'admins', 'action' => 'home'), array('escape' => false)); ?></li>								
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Gerentes'), array('controller' => 'gerentes', 'action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;'.__('Sugestões'), array('controller' => 'sugestaos', 'action' => 'index'), array('escape' => false)); ?></li>
									<li class="active"><a href="#"><span class="glyphicon glyphicon-star-empty"></span>&nbsp;&nbsp;Avaliações</a></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-barcode"></span>&nbsp;&nbsp;'.__('Gerar boletos'), array('controller' => 'admins', 'action' => 'gera_boleto'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;'.__('Relatórios'), array('controller' => 'admins', 'action' => 'gera_relatorio'), array('escape' => false)); ?></li>

								<?php } else if($this->Session->check('Franqueado')) { ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Meu perfil'), array('controller' => 'franqueados', 'action' => 'meu_perfil'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;'.__('Restaurantes'), array('controller' => 'franqueados', 'action' => 'home'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Gerentes'), array('controller' => 'gerentes', 'action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;'.__('Sugestões'), array('controller' => 'sugestaos', 'action' => 'index'), array('escape' => false)); ?></li>
									<li class="active"><?php echo $this->Html->link('<span class="glyphicon glyphicon-star-empty"></span>&nbsp;&nbsp;'.__('Avaliações'), array('controller' => 'classificacaos', 'action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;'.__('Relatórios'), array('controller' => 'franqueados', 'action' => 'relatorios'), array('escape' => false)); ?></li>

								<?php } else { ?>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Meu perfil'), array('controller' => 'gerentes', 'action' => 'meu_perfil'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;'.__('Meu restaurante'), array('controller' => 'gerentes', 'action' => 'meu_restaurante'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;'.__('Todos os pedidos'), array('controller' => 'gerentes', 'action' => 'home'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Atendentes'), array('controller' => 'atendentes', 'action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;'.__('Produtos'), array('controller' => 'produtos', 'action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-piggy-bank"></span>&nbsp;&nbsp;'.__('Promoções'), array('controller' => 'promocaos', 'action' => 'index'), array('escape' => false)); ?></li>
									<li class="active"><?php echo $this->Html->link('<span class="glyphicon glyphicon-star-empty"></span>&nbsp;&nbsp;'.__('Avaliações'), array('controller' => 'classificacaos', 'action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;'.__('Relatórios'), array('controller' => 'gerentes', 'action' => 'relatorios'), array('escape' => false)); ?></li>
								<?php } ?>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">

			<?php 

			$existe = false;

			if($this->Session->check('Admin')) {

				foreach ($classificacaos as $c): 

					if(isset($c)) { ?>

						<div class="jumbotron jumb">

							<?php echo $c['Cliente']['nome'] . ' escreveu:' ?> <br /> <?php echo 'Nota: <b>' . $c['Classificacao']['nota'] . '</b><br />';

							echo '<br /><b>' . $c['Restaurante']['nome'] . '</b>'; 

					        echo '<h4>' . $c['Classificacao']['comentario'] . '</h4>' ?>

					    </div>

					<?php $existe = true; }  

				endforeach; 

				if ($existe == false) {
					echo '<h4>Nenhuma avaliação realizada até o momento!</h4>'; 
				}

			} else if($this->Session->check('Gerente')) {

				$existe = false;

				foreach ($gerente['Restaurante'] as $g):

				 	foreach ($classificacaos as $c): 

						if($c['Classificacao']['restaurante_id'] == $g['id']) { ?>

							<div class="jumbotron jumb">

								<?php echo $c['Cliente']['nome'] . ' escreveu:' ?> <br /> <?php echo 'Nota: <b>' . $c['Classificacao']['nota'] . '</b>' ?> <br />

						        <?php echo '<h4>' . $c['Classificacao']['comentario'] . '</h4>' ?>

						    </div>

						<?php $existe = true; } ?>

					<?php endforeach;
					
				endforeach; 

				if ($existe == false) {
					echo '<h4>Nenhuma avaliação realizada até o momento!</h4>'; 
				}

			} else {

				$existe = false;

				foreach ($franq['Restaurante'] as $f):

					echo '<legend>' . $f['nome'] . '</legend>';
			
			 		foreach ($classificacaos as $c): 

						if($c['Classificacao']['restaurante_id'] == $f['id']) { ?>

							<div class="jumbotron jumb">

								<?php echo $c['Cliente']['nome'] . ' escreveu:' ?> <br /> <?php echo 'Nota: <b>' . $c['Classificacao']['nota'] . '</b>' ?> <br />

						        <?php echo '<h4>' . $c['Classificacao']['comentario'] . '</h4>' ?>

						    </div>

						<?php $existe = true; } ?>

					<?php endforeach; 

				endforeach;

				if ($existe == false) {
					echo '<h4>Nenhuma avaliação realizada até o momento!</h4>'; 
				}
			} ?>
		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->