<?php
	// Marlon Bochi
	session_start();
	$this->pageTitle=Yii::app()->name;
	$modulo = 'funcionarios';
?>

<div class="breacrumbs">
	<ul class="breadcrumb">
		<li><a href="<?=$this->createUrl('/');?>">Home</a><span class="divider">/</span></li>
	 	<li><a href="<?=$this->createUrl('/'.$modulo);?>">Funcionários</a><span class="divider">/</span></li>
	 	<li class="active">Editar Funcionário</span></li>
	</ul>
</div>

<form action="<?=$this->createUrl('/'.$modulo.'/update/'.$funcionario[0]['id_funcionario']);?>" method='POST'>
	<div class="control-group">
		<label class="control-label">Nome</label>
		<div class="controls">
		  <input type="text" name='nome_funcionario' class='input-xxlarge' required  data-validation-required-message='Nome deve ser preenchido!' value='<?=$funcionario[0]['nome_funcionario']?>'>
		  <p class="help-block"></p>
		</div>
	</div>

	<div class="form-actions" style='text-align:right;'>
	  <a href="<?=$this->createUrl('/'.$modulo);?>" class="btn">Voltar</a>
	  <button type="submit" class="btn btn-primary">Salvar</button>
	</div>
</form>