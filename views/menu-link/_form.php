<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Dropdown;
use app\models\Lookup;
use app\models\Menu;

use app\models\MenuLink;

use app\models\Articles;
use app\models\Categories;
use yii\helpers\ArrayHelper;
use kartik\checkbox\CheckboxX;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>



    <?
    $this->registerJs("
		$('.field-menu-url1').toggle();
		  $('#menu-url1').attr('name','6');
		    $('#menu-url').change(function(){
				$('#menu-label').val($('#menu-url option:selected').text());
			});
			$('#outurl').change(function() {

				  $('.field-menu-url').toggle();
				  $('.field-menu-url1').toggle();

				  if($('#outurl').val()==1){
					  $('#menu-url1').attr('name','MenuLink[url]');
					   $('#menu-url').attr('name','6');
					  }else{
						  $('#menu-url1').attr('name','6');
						   $('#menu-url').attr('name','MenuLink[url]');
				}

			});
		");
    ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true, 'id'=>'menu-label']) ?>

    <?
    $urlM = Articles::find()->select(["CONCAT('/', url ) AS url", 'name'])->all(); //select('alias, title')
    $items = ArrayHelper::map($urlM, 'url', 'name');

    $urlMc = Categories::find()->select(["CONCAT('/', url ) AS url", 'name'])->all(); //select('code, name')
    $items1 = ArrayHelper::map($urlMc, 'url', 'name');
    //	print_r($urlM);
    ?>

    <?
    echo CheckboxX::widget([
        'name' => 'outurl',
        'options'=>['id'=>'outurl'],
        'autoLabel' => true,
        'labelSettings' => [
            'label' => 'Ссылка на внешний ресурс',
        ],
        'pluginOptions'=>['threeState'=>false]
    ]);

    ?>



    <?= $form->field($model, 'url')->dropDownList(['Статьи'=>$items,'Категории'=>$items1],['id'=>'menu-url']);?>

    <?= $form->field($model, 'url')->textInput(['id' => 'menu-url1']);?>


    <?= $form->field($model, 'type_menu')->dropDownList( ArrayHelper::map(Menu::find()->all(), 'id', 'name'));?>

    <?	$parents = ArrayHelper::map(MenuLink::find()->asArray()->all(), 'id', 'label');
        array_unshift($parents, 'Не связанно');
    ?>

    <?= $form->field($model, 'active')->widget(CheckboxX::classname(), [
        'autoLabel'=>true,
        'pluginOptions'=>['threeState'=>false]
    ])->label(false);?>

    <?= $form->field($model, 'parent_id')->dropDownList($parents);?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
