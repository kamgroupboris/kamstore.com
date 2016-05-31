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

    if(!isset($model)) $model = new Images();

    $product_id = Yii::$app->getRequest()->getQueryParam('id');
    $initPrev = Images::find()->where(['product_id'=>$product_id])->asArray()->all();
    $initialPreview = [];
    $initialPreviewConfig = [];
    foreach( $initPrev as $ip){
        $img35 = str_replace(".", ".100x100.", $ip['filename']);
        $initialPreview[] = Html::img('/files/products/'.$img35, ['class'=>'col-md-12', 'alt'=>'', 'title'=>'']);
        $url = Url::to(['/images/delete','id'=>$ip['id']]);
        $initialPreviewConfig[] = ['caption' => $ip['name'], 'url' => $url, 'key'=> $ip['id']];
    }
    ?>

        <?= $form->field($model, 'filename')->widget(FileInput::classname(), [
            'id'=>'file-input',
            'language'=>'ru',
            'name' => 'filename[]',
            'options' => [
                'accept' => 'image/*',
                'multiple' => true,
            ],
            'pluginOptions' => [
                'initialPreview'=>$initialPreview,
                'uploadExtraData' => new JsExpression($js),
                'uploadUrl' => Url::to(['/images/file-upload']),
                'overwriteInitial'=>false,
                'initialPreviewAsData'=>true,
                'initialPreviewConfig' => $initialPreviewConfig,
                'maxFileCount' => 10,
            ],
        ]) ?>
    

    <?php ActiveForm::end(); ?>

</div>
