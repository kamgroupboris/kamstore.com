<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\web\JsExpression;
use app\models\Categories;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="categories-form">
    <div class="row">
        <div class="col-md-12">
            <?= '<label class="control-label">Категории</label>';
            $category = ArrayHelper::map(Categories::find()->all(), 'id', 'name');

            if(isset($model)){}
            else $model = [];


            echo Select2::widget([
                'name' => 'category',
                'id'=>'select-category',
                'value' => $model,//['red', 'green'], // initial value
                'data' => $category,
                'options' => ['placeholder' => 'Выберете категорию ...', 'multiple' => true,],

                'pluginOptions' => [

                ],
                'pluginEvents'=>[
                    "select2:select" => "function(env) {
                    var dataText = { category : JSON.stringify($('select#select-category').val()) };

                     $.pjax.reload({container:'#kv-unique-id-1',
                            type:'post',
                       //     dataType: 'json',
                            url: '".Url::to(['items/options-category','action'=> 'create' ])."',
                            data: dataText,
                            replaceRedirect:false,
                            replace    : false
                        });}",

                    "select2:unselecting" => "function(env) {
                    var dataText = { category : JSON.stringify($('select').val()) };

                     $.pjax.reload({container:'#kv-unique-id-1',
                            type:'post',
                      //      dataType: 'json',
                            url: '".Url::to(['items/options-category','action'=> 'create' ])."',
                            data: dataText,
                            replaceRedirect:false,
                            replace    : false
                        });}",
                ],
                'pluginOptions' => [
                    'tags' => true,
                    'maximumInputLength' => 10
                ],
            ]);
            ?>
        </div>
    </div>
</div>