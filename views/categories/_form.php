<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use \app\models\Categories;
use yii\helpers\ArrayHelper;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model app\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <? $parent = Categories::find()->all();
   $arr = ArrayHelper::map($parent,'id','name');
    array_unshift($arr,'Родительская категория');
    ?>
    <?= $form->field($model, 'parent_id')->dropDownList($arr);
        //->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'visible')->widget(CheckboxX::classname(), [
        'autoLabel'=>true,
        'pluginOptions' => [
            'threeState' => false,
        ],
    ])->label(false);?>

    <?= $form->field($model, 'external_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
