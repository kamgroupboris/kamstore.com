<?
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use app\models\MenuLink;
use yii\widgets\Menu;
?>
<style>
.navbar {
	margin-bottom: 0;}
</style>
<?
	$topM = MenuLink::find()->select('label,url')->where(['type_menu'=>3,'active'=>1])->asArray()->all();

Html::beginTag('nav', ['class'=>'navbar-default']);
	echo Menu::widget([
		'items' => $topM,
		'options' => ['class' => 'megamenu'],
	]);
Html::endTag('nav');
?>

