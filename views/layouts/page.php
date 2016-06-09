<?php
	use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="1" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="1" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="<?= Yii::$app->language ?>">
<!--<![endif]-->
<?=$this->render('/site/head');?>

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



</body>
</html>