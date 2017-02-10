<div class="admins index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
				    <li><a href="../franqueados/home">Início</a></li>
				    <li class="active">Meu Perfil</li>
				</ul>  
				<h1><?php echo __('Meu Perfil'); ?></h1>
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
								<li class="active"><?php echo $this->Html->link('<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;'.__('Meu perfil'), array('action' => 'meu_perfil'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;'.__('Restaurantes'), array('action' => 'home'), array('escape' => false)); ?></li>
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

	   	   	<b>Nome:</b> <?php echo $franqueado['Franqueado']['nome'] ?> <br /><br />
	        <b>Email:</b> <?php echo $franqueado['Franqueado']['email'] ?> <br /><br />  
	      	<b>Telefone 1:</b> <?php echo $franqueado['Franqueado']['telefone1'] ?> <br /><br />
	      	<?php if(isset($franqueado['Franqueado']['telefone2'])) { ?>
	      			<b>Telefone 2:</b> <?php echo $franqueado['Franqueado']['telefone2'] . '<br /><br />';
	      		  } ?> 

		    <?php 
				echo $this->Html->link('Editar Dados', 
					array('action' => 'edit', $franqueado['Franqueado']['id']),
					array('class' => 'btn btn-primary', 'target' => '_self')) . ' ';
			  
				echo $this->Form->button('Excluir Conta', array('class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#modalExcluir', 'label' => ''));

				echo '<br /><br />';
					
			?>
		    
		    <div id="modalExcluir" class="modal fade" role="dialog">
			  	<div class="modal-dialog">
			   		<div class="modal-content">
			      		<div class="modal-header">
			        		<button type="button" class="close" data-dismiss="modal">&times;</button>
			       			<h4 class="modal-title">Atenção</h4>
				     	</div>
			      		<div class="modal-body">
			        		<p>Tem certeza que deseja EXCLUIR sua conta?</p>
			      		</div>
				      	<div class="modal-footer">
					      	<?php 
								  	echo $this->Html->link("Sim, desejo excluir minha conta", 
				  							array('controller' => 'alunos', 
				  									'action' => 'delete', $franqueado['Franqueado']['id']),
				  							array('class' => 'btn btn-default', 'target' => '_self'));
									?>
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Não, vou ficar com a conta!</button>
				      	</div>
			    	</div>
				</div>
			</div>
			<br /><br />
		</div> <!-- end col md 9 -->
	</div><!-- end row -->
</div><!-- end containing of content -->