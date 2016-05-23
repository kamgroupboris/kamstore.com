<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Images */
/* @var $form ActiveForm */
?>
<div class="items-_image">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'filename')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
                'multiple' => true,
            ],
            'pluginOptions' => [
                'initialPreview'=>[
                    Html::img($model->filename?'/uploads/category/'.$model->filename:'/img/no_image-250x250.jpg', ['class'=>'file-preview-image col-md-12', 'alt'=>'', 'title'=>'']),
                ],
                'uploadExtraData' => [
                    'product_id' => 1,
                    'cat_id' => 'products',
                    'position' => 1,
                ],
                'uploadUrl' => Url::to(['/images/file-upload']),
                'maxFileCount' => 10,
            ],
        ]) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- items-_image -->
