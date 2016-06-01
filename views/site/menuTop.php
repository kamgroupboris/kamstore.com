  <?php
  
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ButtonGroup;
use app\models\MenuLink;
?>




    <?php
	
	
/*

$footM = Menu::find()->select('label,url')->where(['type_menu'=>'footer','active'=>2])->asArray()->all();


    echo Nav::widget([
        'options' => ['class' => 'footMenu', 'id'=>'footM'],
        'items' => $footM,
    ]);



	[
            ['label' => 'Компания', 'url' => ['/about']],
			['label' => 'Портфолио', 'url' => ['/portfolio']],
			['label' => 'Цены', 'url' => ['/ceny']],
            ['label' => 'Контакты', 'url' => ['/contact']],
          Yii::$app->user->isGuest ? ''
		  //(     ['label' => 'Войти', 'url' => ['/login']]   )
		  : (
                '<li class="btn-li">'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Пользователь : ' . Yii::$app->user->identity->username . '',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                .'</li>'
            ),

        ]*/
	

	$topM = MenuLink::find()->select('label,url')->where(['type_menu'=>3,'active'=>1])->asArray()->all();


    echo Nav::widget([
        'options' => ['class' => 'nav nav-pills', 'id'=>'topNaw'],
        'items' => $topM,
    ]);


    ?>


