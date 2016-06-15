<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Purchases */
/* @var $form ActiveForm */
?>
<div class="cart-purchases">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'order_id') ?>
        <?= $form->field($model, 'product_id') ?>
        <?= $form->field($model, 'variant_id') ?>
        <?= $form->field($model, 'amount') ?>
        <?= $form->field($model, 'variant_name') ?>
        <?= $form->field($model, 'sku') ?>
        <?= $form->field($model, 'price') ?>
        <?= $form->field($model, 'product_name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- cart-purchases -->
