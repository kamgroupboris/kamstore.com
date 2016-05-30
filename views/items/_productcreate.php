<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\checkbox\CheckboxX;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\models\Brands;
use kartik\select2\Select2;
use yii\web\View;

use yii\helpers\ArrayHelper;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;



/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>


<?
    $this->registerJsFile('/js/main.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>



<div class="products-form">
    <?php Pjax::begin([
        'enableReplaceState'=>false,
        'enablePushState'=>false,
        'id' => 'product',
        'clientOptions'=>[
            'container'=>'x1',
        ]
    ]); ?>

    <?php $form = ActiveForm::begin([
        'id' => 'product-create',
        'method' => 'post',
        'action'=>Url::to(['items/product-create', 'action'=> 'create']),
        'enableAjaxValidation' => false,
        'options'=>[
            'data-pjax'=>'#x'
        ],
        'enableClientValidation' => true]); ?>
    <?= $form->field($model, 'id')->textInput()->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
    <?$data = ArrayHelper::map(Brands::find()->all(), 'id', 'name');?>
    <?= $form->field($model, 'brand_id')->widget(Select2::classname(), [
        'data' => $data,
     //   'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [

            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'annotation')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'body')->widget(CKEditor::className(), [
        'options' => ['rows' => 12],
        'preset' => '  Standard'
    ]) ?>

    <?=  $form->field($model, 'visible')->widget(CheckboxX::classname(), [
        'autoLabel'=>true,
        'options'=>['value'=>'1'],
        'pluginOptions' => [
          'threeState' => false,
        ],
    ])->label(false); ?>

    <?= $form->field($model, 'position')->textInput(['value'=> 1]) ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'created')->textInput([ 'value' => date("c")])->hiddenInput() //  2011-10-23 15:06:26 ?>

    <?//= $form->field($model, 'featured')->textInput() ?>

    <?=  $form->field($model, 'featured')->widget(CheckboxX::classname(), [
        'autoLabel'=>true,
        'options'=>['value'=>'1'],
        'pluginOptions' => [
            'threeState' => false,
        ],
    ])->label(false); ?>

    <?//= $form->field($model, 'external_id')->textInput() ?>

    <?=  $form->field($model, 'external_id')->widget(CheckboxX::classname(), [
        'autoLabel'=>true,
        'options'=>['value'=>'0'],
        'pluginOptions' => [
            'threeState' => false,
        ],
    ])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?Pjax::end();?>
</div>


