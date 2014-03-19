<?php
	// Marlon Bochi
	$this->pageTitle=Yii::app()->name;
	$modulo = 'agenda';

	if(isset($_SESSION['id_funcionario'])){
		$data_inicial_agenda = $_SESSION['data_inicial_agenda'];
		$hora_inicial_agenda = $_SESSION['hora_inicial_agenda'];
		$data_final_agenda = $_SESSION['data_final_agenda']; 
		$hora_final_agenda = $_SESSION['hora_final_agenda'];
		$id_funcionario = $_SESSION['id_funcionario'];
		$id_atividade = $_SESSION['id_atividade'];
		$id_local_trabalho = $_SESSION['id_local_trabalho'];
		unset($_SESSION['data_inicial_agenda']);
		unset($_SESSION['hora_inicial_agenda']);
		unset($_SESSION['data_final_agenda']);
		unset($_SESSION['hora_final_agenda']);
		unset($_SESSION['id_funcionario']);
		unset($_SESSION['id_atividade']);
		unset($_SESSION['id_local_trabalho']);
	}else{
		$data_inicial_agenda = null;
		$hora_inicial_agenda = null;
		$data_final_agenda = null;
		$hora_final_agenda = null;
		$id_funcionario = null;
		$id_atividade = null;
		$id_local_trabalho = null;
	}
?>

<div class="breacrumbs">
	<ul class="breadcrumb">
		<li><a href="<?=$this->createUrl('/');?>">Home</a><span class="divider">/</span></li>
	 	<li><a href="<?=$this->createUrl('/'.$modulo);?>">Agenda</a><span class="divider">/</span></li>
	 	<li class="active">Inserir Horário</span></li>
	</ul>
</div>

<?php 
if(isset($_SESSION['mensagen_modulo_error'])){
?>
<div class="alert alert-error">  
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php echo $_SESSION['mensagen_modulo_error'];
	unset($_SESSION['mensagen_modulo_error']);?>
</div>
<?php } ?>

<div class="alert alert-error esconder_alert"> 
</div>

<form action="<?=$this->createUrl('/'.$modulo.'/insert');?>" method='POST' class='form_agenda'>
	<div class="control-group">
		<label class="control-label">Funcionário</label>
		<div class="controls">
		  <select name='id_funcionario' required class='chosen-select' data-validation-required-message='Funcionário deve ser selecionado!' style='min-width:250px;'>
		  	<option value="">Selecione um Funcionário</option>
		  	<?php foreach ($funcionarios as $value) { ?>
				<option value="<?=$value['id_funcionario'];?>" <?=!empty($id_funcionario)? 'selected': '';?> ><?=$value['nome_funcionario'];?></option>
		  	<?php } ?>
		  </select>
		  <p class="help-block"></p>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Atividade</label>
		<div class="controls"> 
		  <select name='id_atividade' required class='chosen-select' data-validation-required-message='Atividade deve ser selecionada!' style='min-width:250px;'>
		  	<option value="">Selecione uma Atividade</option>
		  	<?php foreach ($atividades as $value) { ?>
				<option value="<?=$value['id_atividade'];?>" <?=!empty($id_atividade)? 'selected': '';?> ><?=$value['descricao_atividade'];?></option>
		  	<?php } ?>
		  </select>
		  <p class="help-block"></p>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Local de Trabalho</label>
		<div class="controls">
		  <select name='id_local_trabalho' required class='chosen-select' data-validation-required-message='Local de Trabalho deve ser selecionado!' style='min-width:250px;'>
		  	<option value="">Selecione um Local de Trabalho</option>
		  	<?php foreach ($locais_trabalho as $value) { ?>
				<option value="<?=$value['id_local_trabalho'];?>" <?=!empty($id_local_trabalho)? 'selected': '';?> ><?=$value['descricao_local_trabalho'];?></option>
		  	<?php } ?>
		  </select>
		  <p class="help-block"></p>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Horário Inicial</label>
		<div class="controls">
			<div class="input-prepend">
			  <input type="text" name='data_inicial_agenda' class='input-small data data_inicial' required placeholder='Data Inicial' data-validation-required-message='Data Inicial deve ser preenchida!' value='<?=!empty($data_inicial_agenda)? $data_inicial_agenda : ''; ?>'> 
			  <p class="help-block"></p>
		  	</div>
		  	<div class="input-append">
			  <input type="text" name='hora_inicial_agenda' class='input-small hora hora_inicial' required placeholder='Hora Inicial' data-validation-required-message='Hora Inicial deve ser preenchida!' value='<?=!empty($hora_inicial_agenda)? $hora_inicial_agenda : ''; ?>'>
			  <p class="help-block"></p>
		  	</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Horário Final</label>
		<div class="controls">
			<div class="input-prepend">
				<input type="text" name='data_final_agenda' class='input-small data data_final' required placeholder='Data Final' data-validation-required-message='Data Final deve ser preenchida!' value='<?=!empty($data_final_agenda)? $data_final_agenda : ''; ?>'>
				<p class="help-block"></p>
			</div>
			<div class="input-append">
				<input type="text" name='hora_final_agenda' class='input-small hora hora_final' required placeholder='Hora Final' data-validation-required-message='Hora Final deve ser preenchida!' value='<?=!empty($hora_final_agenda)? $hora_final_agenda : ''; ?>'>
				<p class="help-block"></p>
			</div>
		</div>
	</div>

	<div class="form-actions" style='text-align:right;'>
	  <a href="<?=$this->createUrl('/'.$modulo);?>" class="btn">Voltar</a>
	  <button type="submit" class="btn btn-primary">Salvar</button>
	</div>
</form>