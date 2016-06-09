<?php
use yii\bootstrap\ActiveForm;
use unclead\widgets\TabularInput;
use yii\helpers\Html;
use app\models\Item;
use app\models\Variants;
use unclead\widgets\TabularColumn;
use yii\helpers\Url;
use yii\widgets\Pjax;

use kartik\typeahead\Typeahead;

use yii\data\SqlDataProvider;
use app\models\Options;


/* @var $this \yii\web\View */
/* @var $models Item[] */
?>

<div class="variants-form">
    <?php Pjax::begin([
        'enableReplaceState'=>false,
        'enablePushState'=>false,
        'clientOptions'=>[
            'container'=>'x8',
        ]
    ]); ?>

    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'id' => 'variants-form',
        'method' => 'post',
        // 'enableAjaxValidation' => false,
        'action'=>Url::to(['items/options-variants', 'action'=> 'create']),

        'options' => [
            'enctype' => 'multipart/form-data',
            'data-pjax'=>'#x9'
        ]
    ]) ?>


    <?
   // print_r($model->attributes);

    $items = [];
    if( !isset($model[0]->attributes)){
    for ($x=0; $x<2; $x++){
        $item = new Variants();
        $items[] = $item;
    }}else{
        $items =  $model;
    }
    ?>

    <?= TabularInput::widget([
        'id'=>'multiple-variants',
        'models' => $items,
        'attributeOptions' => [

            'enableAjaxValidation' => false,
            'enableClientValidation' => false,
            'validateOnChange' => false,
            'validateOnSubmit' => true,
            'validateOnBlur' => false,
        ],
        'columns' => [
            [
                'name' => 'id',
                'type' => TabularColumn::TYPE_HIDDEN_INPUT
            ],
            [
                'name' => 'name',
                'title' => 'Свойство',
                'type' => TabularColumn::TYPE_TEXT_INPUT,
                'enableError' => true
            ],
            [
                'name' => 'sku',
                'title' => 'Артикул',
                'type' => TabularColumn::TYPE_TEXT_INPUT,
                'enableError' => true
            ],
            [
                'name' => 'price',
                'title' => 'Цена',
                'type' => TabularColumn::TYPE_TEXT_INPUT,
                'enableError' => true
            ],
            [
                'name' => 'compare_price',
                'title' => 'Старая цена',
                'type' => TabularColumn::TYPE_TEXT_INPUT,
                'enableError' => true
            ],
            [
                'name' => 'stock',
                'title' => 'Кол-во',
                'type' => TabularColumn::TYPE_TEXT_INPUT,
                'enableError' => true
            ],
            [
                'name' => 'position',
                'title' => 'Позиция',
                'type' => TabularColumn::TYPE_TEXT_INPUT,
                'enableError' => true
            ],

        ],
    ]) ?>


    <?= Html::submitButton('Обновить', ['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end(); ?>
    <?Pjax::end();?>
</div>
<?
$this->registerJs("jQuery('#multiple-variants').on('beforeDeleteRow', function(e, row){
        var r =  confirm('Вы действительно хотите удалить данный вариант?');
        if (r == true) {
             $.post('/items/variants-delete',row.find(':input').serializeArray());
        }else{
             return false;
        }
    });");
?>