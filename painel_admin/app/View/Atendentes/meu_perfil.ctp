<div class="admins index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
				    <li><a href="../../atendentes/home">Início</a></li>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;'.__('Pedidos'), array('action' => 'home'), array('escape' => false)); ?></li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9"> 

	   	   	<b>Nome:</b> <?php echo $atendente['Atendente']['nome'] ?> <br /><br />
	        <b>Email:</b> <?php echo $atendente['Atendente']['email'] ?> <br /><br />
		      
		    <?php 
				echo $this->Html->link('Editar Dados', 
					array('action' => 'edit', $atendente['Atendente']['id']),
					array('class' => 'btn btn-primary', 'target' => '_self')) . ' ';
			  
				//echo $this->Form->button('Excluir Conta', array('class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#modalExcluir', 'label' => ''));

				echo '<br /><br />';
					
			?>
		    
		   
			<br /><br />
		</div> <!-- end col md 9 -->
	</div><!-- end row -->
</div><!-- end containing of content -->