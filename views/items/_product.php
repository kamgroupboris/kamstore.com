<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\checkbox\CheckboxX;
use yii\widgets\Pjax;

use kartik\widgets\Select2;
use yii\web\JsExpression;
use \app\models\Images;
use \yii\helpers\ArrayHelper;

use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="products-form">
<?Pjax::begin();?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_id')->textInput() ?>

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
        'pluginOptions' => [
          'threeState' => false,
        ],
    ])->label(false); ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?//= $form->field($model, 'featured')->textInput() ?>

    <?

   $arrProduct = Images::find()->select(['product_id','filename'])->groupBy(['product_id'])->asArray()->all();
  //  $flag = ArrayHelper::map($arrProduct,'product_id','filename');
    $flag = [];
    foreach($arrProduct as $ap){
        $flag[$ap['product_id']] = str_replace('.','.35x35.', $ap['filename']);
    }

    $this->registerJs("var flagimg = ".json_encode($flag).";", View::POS_HEAD);


    View::registerCss("
        img.flag {
            height: 10px;
            padding-right: 10px;
            width: 25px;
        }
        .select2-dropdown .select2-search__field, .select2-search--inline .select2-search__field:focus{
        border:none;
        }
    ");
    // Templating example of formatting each list element
    $url = \Yii::$app->urlManager->baseUrl . '/files/products/';
    $format = <<< SCRIPT
function format(state) {
    console.log(state);
    if (!state.id) return state.text; // optgroup
    //src = '$url' +  state.id.toLowerCase() + '.png'
   src = '$url'+ flagimg[state.id];
    return '<img class="flag" src="' + src + '"/>' + state.text;
}
SCRIPT;

    $escape = new JsExpression("function(m) { return m; }");
    $this->registerJs($format, View::POS_HEAD); //
    echo '<label class="control-label">Provinces features</label>';
    echo Select2::widget([
        'name' => 'featured',
        'value' => ['red', 'green'],
        'data' => $related,
        'options' => ['placeholder' => 'Select a state ...', 'multiple' => true],
        'pluginOptions' => [
            'templateResult' => new JsExpression('format'),
            'templateSelection' => new JsExpression('format'),
            'escapeMarkup' => $escape,
            'allowClear' => true
        ],
    ]);
    ?>


    <?= $form->field($model, 'external_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?Pjax::end();?>
</div>
