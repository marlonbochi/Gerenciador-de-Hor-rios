<?php
	// Marlon Bochi
	session_start();
	$this->pageTitle=Yii::app()->name;
	$modulo = 'agenda';
?>

<div class="breacrumbs">
	<ul class="breadcrumb">
		<li><a href="<?=$this->createUrl('/');?>">Home</a><span class="divider">/</span></li>
	 	<li class="active">Agenda</span></li>
	</ul>
</div>
<?php 
if(isset($_SESSION['mensagen_modulo'])){
?>
<div class="alert alert-success">  
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php echo $_SESSION['mensagen_modulo'];
	unset($_SESSION['mensagen_modulo']);?>
</div>
<?php } ?>

<div class="control-group">
	<a href="<?=$this->createUrl('/'.$modulo.'/insert');?>" class="btn"><i class='icon-plus'></i> Inserir Horário</a>
</div>

<table class='table table-hover table-bordered'>
	<tbody>
		<tr>
			<th style='width:30%;'>
				Funcionário
			</th>
			<th style='width:30%;'>
				Local de Trabalho
			</th>
			<th style='width:20%;'>
				Atividade
			</th>
			<th style='text-align:center;'>
				Ações
			</th>
		</tr>
		<?php foreach ($agenda as $value) {?>
		<tr>
			<td>
				<?=$value['funcionario'];?>
			</td>
			<td>
				<?=$value['atividade'];?>
			</td>
			<td>
				<?=$value['local_trabalho'];?>
			</td>
			<td style='text-align:center;'>
				<a href="<?=$this->createUrl('/'.$modulo.'/update/'.$value['id_agenda'])?>" class="btn btn-mini btn-warning">
					<i class="icon-edit icon-white"></i> Editar
				</a>
				<a href="<?=$this->createUrl('/'.$modulo.'/delete/'.$value['id_agenda']);?>" class="btn btn-mini btn-danger" onclick="return confirm('Deseja realmente excluir este registro?');">
					<i class="icon-minus icon-white"></i> Excluir
				</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>