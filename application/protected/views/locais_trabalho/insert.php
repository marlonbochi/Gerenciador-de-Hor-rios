<?php
	// Marlon Bochi
	session_start();
	$this->pageTitle=Yii::app()->name;
	$modulo = 'locais_trabalho';
?>

<div class="breacrumbs">
	<ul class="breadcrumb">
		<li><a href="<?=$this->createUrl('/');?>">Home</a><span class="divider">/</span></li>
	 	<li><a href="<?=$this->createUrl('/'.$modulo);?>">Locais de Trabalho</a><span class="divider">/</span></li>
	 	<li class="active">Inserir Local</span></li>
	</ul>
</div>

<form action="<?=$this->createUrl('/'.$modulo.'/insert');?>" method='POST'>
	<div class="control-group">
		<label class="control-label">Descrição</label>
		<div class="controls">
		  <input type="text" name='descricao_local_trabalho' class='input-xxlarge' required  data-validation-required-message='Descrição deve ser preenchida!'>
		  <p class="help-block"></p>
		</div>
	</div>

	<div class="form-actions" style='text-align:right;'>
	  <a href="<?=$this->createUrl('/'.$modulo);?>" class="btn">Voltar</a>
	  <button type="submit" class="btn btn-primary">Salvar</button>
	</div>
</form>