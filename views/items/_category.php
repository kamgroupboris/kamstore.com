<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">
    <div class="row">
        <div class="col-md-6">
        <?= '<label class="control-label">Category</label>';
            echo Select2::widget([
            'name' => 'color_1',
            'value' => ['red', 'green'], // initial value
            'data' => $category,
            'options' => ['placeholder' => 'Select a category ...', 'multiple' => true],
            'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 10
            ],
            ]);
        ?>
        </div><div class="col-md-6">
        <?= '<label class="control-label">Brand</label>';
            echo Select2::widget([
                'name' => 'kv-state-210',
                'data' => $brand,
                'size' => Select2::MEDIUM,
                'options' => ['placeholder' => 'Select a brand ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
        ?>
        </div>
    </div>
</div>