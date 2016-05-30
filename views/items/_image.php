<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Url;
use app\models\Images;
use yii\web\View;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Images */
/* @var $form ActiveForm */
?>
<div class="items-_image">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?

$js = <<< SCRIPT
function () {
    return {
        product_id: $('input[name="Products[id]"]').val(),
        cat_id: 'products',
        position: 1
     };
}
SCRIPT;

  //  $this->registerJs($js);
 //   $escape = new JsExpression("function(m) { return m; }");





   $product_id = Yii::$app->getRequest()->getQueryParam('id');

     $initPrev = Images::find()->where(['product_id'=>$product_id])->asArray()->all();
    $initialPreview = [];
    foreach( $initPrev as $ip){

      //  $ip['filename'];
        $img35 = str_replace(".", ".100x100.", $ip['filename']);

        $initialPreview[] = Html::img('/files/products/'.$img35, ['class'=>'col-md-12', 'alt'=>'', 'title'=>'']).
            Html::button('<i class="glyphicon glyphicon-trash text-danger"></i>', [ 'class' => 'kv-file-remove btn btn-xs btn-default pull-right', 'onclick' => '$(this).parent().hide(); (function () {
                 $.post("'.Url::to(['/images/delete','id'=>$ip['id']]).'");
            })();' ]);
    }
    ?>

        <?= $form->field($model, 'filename')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
                'multiple' => true,
            ],
            'pluginOptions' => [
                'initialPreview'=>$initialPreview,
               //     [
                //    Html::img($model->filename?'/uploads/category/'.$model->filename:'/img/no_image-250x250.jpg', ['class'=>'file-preview-image col-md-12', 'alt'=>'', 'title'=>'']),
            //    ],
                'uploadExtraData' => new JsExpression($js),
               /*     [
               //     'product_id' => $product_id,
                    'product_id' =>  new JsExpression($js),
                    'cat_id' => 'products',
                    'position' => 1,
                ],*/
                'uploadUrl' => Url::to(['/images/file-upload']),
                'overwriteInitial'=>false,
                'maxFileCount' => 10,
            ],
        ]) ?>
    

    <?php ActiveForm::end(); ?>

</div><!-- items-_image -->
