<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=Yii::app()->name;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?=Yii::app()->baseUrl;?>/assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="<?=Yii::app()->baseUrl;?>/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=Yii::app()->baseUrl;?>/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=Yii::app()->baseUrl;?>/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=Yii::app()->baseUrl;?>/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=Yii::app()->baseUrl;?>/assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?=Yii::app()->baseUrl;?>/assets/ico/favicon.png">
  </head>

  <body>	
  	<div class="header">
		<?php echo $this->renderPartial("/comum/header"); ?>
	</div>

    <div class="container">
		<?php echo $content; ?>      
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/jquery.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/bootstrap-transition.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/bootstrap-alert.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/bootstrap-modal.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/bootstrap-dropdown.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/bootstrap-tab.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/bootstrap-tooltip.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/bootstrap-popover.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/bootstrap-button.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/bootstrap-collapse.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/bootstrap-carousel.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/bootstrap-typeahead.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/jqBootstrapValidation.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/jquery.placeholder.min.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/jquery.maskedinput.min.js"></script>
    <script src="<?=Yii::app()->baseUrl;?>/assets/js/main.js"></script>

  </body>
</html>
