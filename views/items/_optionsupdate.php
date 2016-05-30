<?php
use yii\bootstrap\ActiveForm;
use unclead\widgets\TabularInput;
use yii\helpers\Html;
use app\models\Item;
use app\models\CategoriesFeatures;
use app\models\Features;

use unclead\widgets\TabularColumn;
use yii\helpers\Url;
use yii\widgets\Pjax;

use kartik\typeahead\Typeahead;

use yii\data\SqlDataProvider;
use app\models\Options;


/* @var $this \yii\web\View */
/* @var $models Item[] */
?>

    <div class="products-form" id="option-form1">
        <?php Pjax::begin([
            'enableReplaceState'=>false,
            'enablePushState'=>false,
            'clientOptions'=>[
                'container'=>'kv-unique-id-1',
            ],
            'options'=>[
                'id'=>'kv-unique-id-1',
            ]
        ]); ?>

        <?php $form = ActiveForm::begin([
            'id' => 'tabular-form',
            'method' => 'post',
            'action'=>Url::to(['items/options-create', 'action'=> 'create']),

            'options' => [
                'enctype' => 'multipart/form-data',
                'data-pjax'=>'#x2'
            ]
        ]) ?>

        <?= TabularInput::widget([
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
                    'name' => 'product_id',
                    'type' => TabularColumn::TYPE_HIDDEN_INPUT
                ],
                [
                    'name' => 'feature_id',
                    'type' => TabularColumn::TYPE_HIDDEN_INPUT
                ],
                [
                    'name' => 'name',
                    'title' => 'Свойство',
                    'type' => TabularColumn::TYPE_TEXT_INPUT,
                    'enableError' => true
                ],
                [
                    'name' => 'value',
                    'title' => 'Описание',
                    'type'  => Typeahead::className(),

                ],
            ],
        ]) ?>


        <?= Html::submitButton('Обновить', ['class' => 'btn btn-success']); ?>
        <?php ActiveForm::end(); ?>
        <?Pjax::end();?>


</div>