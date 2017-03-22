<div class="promocaos form">

	<script type="text/javascript">
		
		jQuery(function($){	
		  $("#data_ini").mask("99/99/9999",{autoclear: true});  	
		  $("#data_fim").mask("99/99/9999",{autoclear: true}); 

		  $("#save").click(function(){

		    var dataIni = $("#data_ini").val();
		    var dataFim = $("#data_fim").val();

		    if (isValidDate(dataIni)) {
		    	var parts = dataIni.split("/");
				  var day = parseInt(parts[0], 10);
				  var month = parseInt(parts[1], 10);
				  var year = parseInt(parts[2], 10);
				  var d1 = year + '-' + month + '-' + day;
				  $("#data_ini").val(d1);
		    } else {
		    	alert("Data de início inválida");
		    	$("#PromocaoAddForm").submit(function(event) {
		    		return false;
		    	});
		    }

		    if (isValidDate(dataFim)) {
		    	var parts = dataFim.split("/");
				  var day = parseInt(parts[0], 10);
				  var month = parseInt(parts[1], 10);
				  var year = parseInt(parts[2], 10);
				  var d2 = year + '-' + month + '-' + day;
				  $("#data_fim").val(d2);
		    } else {
		    	alert("Data de fim inválida");
		    	$("#PromocaoAddForm").submit(function(event) {
		    		return false;
		    	});
		    }
			});
		});

		function isValidDate(dateString) {
		  // First check for the pattern
		  if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
		      return false;

		  // Parse the date parts to integers
		  var parts = dateString.split("/");
		  var day = parseInt(parts[0], 10);
		  var month = parseInt(parts[1], 10);
		  var year = parseInt(parts[2], 10);

		  // Check the ranges of month and year
		  if(year < 1000 || year > 3000 || month == 0 || month > 12)
		      return false;

		  var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

		  // Adjust for leap years
		  if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
		      monthLength[1] = 29;

		  // Check the range of the day
		  return day > 0 && day <= monthLength[month - 1];
		}
	
	</script>


	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<?php if($this->Session->check('Franqueado')){ ?>
					<ul class="breadcrumb" id="bread">
				    <li><a href="../../franqueados/home">Início</a></li>
				    <li class="active">Nova Promoção</li>
					</ul>
				<?php } else { ?>
					<ul class="breadcrumb" id="bread">
					    <li><a href="../gerentes/home">Início</a></li>
					    <li><a href="../produtos">Produtos</a></li>
					    <li><a href="../produtos/add">Novo Produto</a></li>
					    <li class="active">Nova Promoção</li>
					</ul>
				<?php } ?>
				<h1><?php echo __('Adicionar Promoção'); ?></h1>
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
								<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;'.__('Listar Promoções'), array('action' => 'index'), array('escape' => false)); ?></li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Promocao', array('role' => 'form')); ?>

				<div class="col-md-6 pad form-group">
					<label>Data de início</label>
					<?php echo $this->Form->date('data_ini', array('class' => 'form-control', 'placeholder' => 'Data Inicio', 'id' => 'data_ini', 'required' => 'true'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<label>Data de término</label>
					<?php echo $this->Form->date('data_fim', array('class' => 'form-control', 'placeholder' => 'Data Fim', 'id' => 'data_fim', 'required' => 'true'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('desconto', array('class' => 'form-control', 'placeholder' => 'Desconto', 'label' => 'Desconto (%)', 'required' => 'true'));?>
				</div>
				<div class="col-md-6 pad form-group">
					<?php echo $this->Form->input('Promocao.produto', array('options' => $produtos, 'class' => 'form-control selectpicker', 'data-live-search' => 'true',  'multiple' => 'multiple', 'required' => 'true'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('restaurante_id', array('class' => 'esconde_rest form-control', 'label' => ''));?>
				</div>


				<div class="col-md-12 pad form-group">
					<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary', 'id' => 'save')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
