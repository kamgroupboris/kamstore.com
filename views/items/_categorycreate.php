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


<div id="alert-id" class="alert alert-warning alert-dismissible" style="display: none; margin-top:20px;">
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <h4>
        <i class="icon fa fa-warning"></i>
        Необходим заголовок!
    </h4>
    Нажмите кнопку создать.
</div>


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
                'value' => $model,
                'data' => $category,
                'options' => ['placeholder' => 'Выберете категорию ...', 'multiple' => true,],
                'toggleAllSettings'=>['selectLabel'=>'<i class="glyphicon glyphicon-unchecked"></i> Выбрать все'],

                'pluginOptions' => [

                ],
                'pluginEvents'=>[
                    "select2:select" => "function(env) {
                    var dataText = { category : JSON.stringify($('select#select-category').val()) };
                     $.pjax.reload({container:'#kv-unique-id-1',
                            type:'post',
                            url: '".Url::to(['items/options-category','action'=> 'create' ])."',
                            data: dataText,
                            replaceRedirect:false,
                            replace    : false
                        });

                      }",

                    "select2:unselect" => "function(env) {
                    var dataText = { category : JSON.stringify($('select#select-category').val()) };

                     $.pjax.reload({container:'#kv-unique-id-1',
                            type:'post',
                            url: '".Url::to(['items/options-category','action'=> 'create' ])."',
                            data: dataText,
                            replaceRedirect:false,
                            replace    : false
                        });}",
                    "select2:selecting" => "function() {
                            if($('input[name=\"Products[id]\"]').val() ==''){
                                $('#alert-id').fadeTo(2000, 1, function() {
                                    $(this).slideDown(\"slow\");
                                    });
                                 $('#alert-id').fadeTo(2000, 0.00, function() {
                                    $(this).slideUp(\"slow\");
                                });
                            }
                    }",
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