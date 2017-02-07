<div class="admins index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<ul class="breadcrumb" id="bread">
					<li><a href="../franqueados/home">Início</a></li>
				    <li><a href="../../franqueados/meu_perfil">Meu Perfil</a></li>
				    <li><?php echo $this->Html->link('Editar', array('action' => 'edit', $franqueado['Franqueado']['id']), array('escape' => false)); ?> </li>
				    <li class="active">Alterar Senha</li>
				</ul>
				<h1><?php echo __('Alterar senha'); ?></h1>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-menu-left"></span>&nbsp;&nbsp;'.__('Voltar'), array('action' => 'edit', $franqueado['Franqueado']['id']), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			
			<?php 
				echo $this->Form->create('Franqueado', array('action' => 'altera'));

				echo $this->Form->input('old_password', array('label'=>'Senha Atual', 'class' => 'form-control', 'type' => 'password', 'autofocus', 'required' => 'true')) . '<br />';

				echo $this->Form->input('new_password', array('label'=>'Nova Senha', 'class' => 'form-control', 'type' => 'password', 'required' => 'true')) . '<br />';

				echo $this->Form->input('confirm_password', array('label'=>'Confirme a Nova Senha', 'class' => 'form-control', 'type' => 'password', 'required' => 'true')) . '<br />';

				//botões
				echo $this->Form->button('Alterar', array('type' => 'submit', 'class' => 'btn btn-primary', 'label' => '')) . ' ';
				
			?>
		</div>
	</div><br />	
</div>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->