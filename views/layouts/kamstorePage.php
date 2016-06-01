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
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <? $this->registerCssFile('/css/bootstrap.css'); ?>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700' rel='stylesheet' type='text/css'>
</head>
<body>
<?php $this->beginBody() ?>

	<?=$this->render('/site/header');?>
        <div class="container">
            <?= $content ?>
        </div>
	<?=$this->render('/site/footer');?>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>