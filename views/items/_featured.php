<?php
use app\models\Products;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use \app\models\Images;
use \yii\helpers\ArrayHelper;
use yii\helpers\Url;

use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Features */
/* @var $form ActiveForm */
?>
<?

$related =  ArrayHelper::map(Products::find()->all(),'id','name');
if(!isset($model)) $model = [];

$arrProduct = Images::find()->select(['product_id','filename'])->groupBy(['product_id'])->asArray()->all();
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
echo '<label class="control-label">Сопутствующие продукты</label>';
echo Select2::widget([
    'name' => 'featured',
    'id'=>'select-featured',
    'value' => $model,
    'data' => $related,
    'options' => ['placeholder' => 'Выберете связанные товары ...', 'multiple' => true],
    'pluginOptions' => [
        'templateResult' => new JsExpression('format'),
        'templateSelection' => new JsExpression('format'),
        'escapeMarkup' => $escape,
        'allowClear' => true
    ],
    'pluginEvents'=>[
        "select2:select" => "function(env) {
                    var dataText = { featured : JSON.stringify($('select#select-featured').val()), id:$('input[name=\"Products[id]\"]').val() };
                   $.post('".Url::to(['/items/featured','action'=> 'create' ])."',dataText);
        }",
        "select2:unselect" => "function(env) {
                    var dataText = { featured : JSON.stringify($('select#select-featured').val()), id:$('input[name=\"Products[id]\"]').val() };
                   $.post('".Url::to(['/items/featured','action'=> 'create' ])."',dataText);
        }",
    ],
]);
?>