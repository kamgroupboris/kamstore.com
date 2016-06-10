<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppBasic;

AppBasic::register($this);
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<!--[if IE]><![endif]-->
	<!--[if IE 8 ]><html dir="ltr" lang="1" class="ie8"><![endif]-->
	<!--[if IE 9 ]><html dir="ltr" lang="1" class="ie9"><![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!-->
	<html dir="ltr" lang="<?= Yii::$app->language ?>">
	<!--<![endif]-->
	<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>



	<!--[if gt IE 9]><!-->
	<link rel="stylesheet" type="text/css" href="/catalog/view/theme/so-maxshop7/css/ie9-and-up.css" />
	<!--<![endif]-->


	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

	<style type="text/css">
		body,.about-us .client-say-content .about-title,.about-us .about-title, .about-demo-1 .our-team .about-title,
		.article-description,.article-title a{font-family:Open Sans, sans-serif }		</style>




	<style type="text/css">

		@import url(//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700);

	</style>



</head>
<?//=$this->render('/site/head');?>
<?php $this->beginBody() ?>
<body class="information-information ltr res layout-0 no-bgbody ">
<div id="wrapper" class="wrapper-full">
       
	<?=$this->render('/site/header');?>
	
	<?=$this->render('/site/breadcrumb');?>

    <div id="content" class="">		
        <div class="container">
		    <?= $content ?>
		</div>
    </div>
  

	
	<?=$this->render('/site/footer');?>
    <!-- //end Footer -->
	
			<div class="back-to-top"><i class="fa fa-angle-up"></i></div>
		



    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>