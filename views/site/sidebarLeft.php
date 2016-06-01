<?
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\MenuLink;
?>

<aside class="col-xs-3 sidbar_gl">
	<?

	$footM = MenuLink::find()->select('label,url')->where(['type_menu'=>7,'active'=>1])->asArray()->all();


	echo Nav::widget([
			'options' => ['class' => 'sidbarKompani', 'id'=>'footM'],
			'items' => $footM,
	]);

	?>


</aside>