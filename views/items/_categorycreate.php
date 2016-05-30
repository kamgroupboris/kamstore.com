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
            <?= '<label class="control-label">Category</label>';
            $category = ArrayHelper::map(Categories::find()->all(), 'id', 'name');

            if(isset($model)){}
            else $model = [];
//print_r($value);

            echo Select2::widget([
                'name' => 'category',
                'id'=>'select-category',
                'value' => $model,//['red', 'green'], // initial value
                'data' => $category,
                'options' => ['placeholder' => 'Select a category ...', 'multiple' => true,],

                'pluginOptions' => [

                ],
                'pluginEvents'=>[
                    //      "change" => "function() { console.log('change'); }",
                    //     "select2:opening" => "function() { console.log('select2:opening'); }",
                    //      "select2:open" => "function() { console.log('open'); }",
                    //      "select2:closing" => "function() { console.log('close'); }",
                    //      "select2:close" => "function() { console.log('close'); }",
              //      "select2:selecting" => "function(env) {}",



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
                    //     "select2:unselect" => "function() { console.log('unselect'); }"
                ],
                'pluginOptions' => [
                    'tags' => true,
                    //      'url' => Url::to(['items/options-create', 'action'=> 'category']),

                    'maximumInputLength' => 10
                ],
            ]);
            ?>
        </div>
    </div>
</div>