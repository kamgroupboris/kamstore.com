<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Coupons */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coupons-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expire')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([ 'absolute' => 'Absolute', 'percentage' => 'Percentage', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <?= $form->field($model, 'min_order_price')->textInput() ?>

    <?= $form->field($model, 'single')->textInput() ?>

    <?= $form->field($model, 'usages')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
