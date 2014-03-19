<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="#">Sistema de Gerencimanto de Horários</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li class='<?= Yii::app()->controller->id == 'home' || Yii::app()->controller->id == '' ? 'active': ''; ?>'><a href="<?=$this->createUrl('/');?>">Home</a></li>
          <li class='<?= Yii::app()->controller->id == 'funcionarios' ? 'active': ''; ?>'><a href="<?=$this->createUrl('/funcionarios');?>">Funcionários</a></li>
          <li class='<?= Yii::app()->controller->id == 'atividades' ? 'active': ''; ?>'><a href="<?=$this->createUrl('/atividades');?>">Atividades</a></li>
          <li class='<?= Yii::app()->controller->id == 'locaistrabalho' ? 'active': ''; ?>'><a href="<?=$this->createUrl('/locaistrabalho');?>">Locais de Trabalho</a></li>
          <li class='<?= Yii::app()->controller->id == 'agenda' ? 'active': ''; ?>'><a href="<?=$this->createUrl('/agenda');?>">Agenda</a></li>	    
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>