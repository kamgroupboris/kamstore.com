<?php
use yii\bootstrap\ActiveForm;
use unclead\widgets\TabularInput;
use yii\helpers\Html;
use app\models\Item;
use unclead\widgets\TabularColumn;
use yii\helpers\Url;
use yii\widgets\Pjax;

use kartik\typeahead\Typeahead;

use yii\data\SqlDataProvider;
use app\models\Options;


/* @var $this \yii\web\View */
/* @var $models Item[] */
?>

    <div class="products-form">
<?php Pjax::begin([
    'enableReplaceState'=>false,
    'enablePushState'=>false,
    'clientOptions'=>[
        'container'=>'x3',
    ]
]); ?>

<?php $form = \yii\bootstrap\ActiveForm::begin([
    'id' => 'tabular-form',
    'method' => 'post',
   // 'enableAjaxValidation' => false,
    'action'=>Url::to(['items/options-create', 'action'=> 'create']),

    'options' => [
        'enctype' => 'multipart/form-data',
        'data-pjax'=>'#x2'
    ]
]) ?>


<?


$dataProvider = new SqlDataProvider([
    'sql' => "SELECT
        s_features.id ,
		s_features.id `feature_id`,
		s_features.`name`,
		CONCAT('') `value`,
		CONCAT('50') `product_id`
FROM
s_features
WHERE id IN (
		SELECT
		s_categories_features.feature_id
		FROM
		s_categories_features
		WHERE
		s_categories_features.category_id = 5
);",
]);
$data = $dataProvider->getModels();


$items = [];
foreach ($data as $row) {
    $item = new Item();
    $item->setAttributes($row);
    $items[] = $item;
}

?>

<?= TabularInput::widget([
    'models' => $items,
    'attributeOptions' => [

        'enableAjaxValidation' => false,
        'enableClientValidation' => false,
        'validateOnChange' => false,
        'validateOnSubmit' => true,
        'validateOnBlur' => false,
    ],
    'columns' => [
        [
            'name' => 'product_id',
            'type' => TabularColumn::TYPE_HIDDEN_INPUT
        ],
        [
            'name' => 'feature_id',
            'type' => TabularColumn::TYPE_HIDDEN_INPUT
        ],
        [
            'name' => 'name',
            'title' => 'Свойство',
            'type' => TabularColumn::TYPE_TEXT_INPUT,
            'enableError' => true
        ],
        [
            'name' => 'value',
            'title' => 'Описание',
            'type'  => Typeahead::className(),

        ],
    ],
]) ?>


<?= Html::submitButton('Обновить', ['class' => 'btn btn-success']); ?>
<?php ActiveForm::end(); ?>
<?Pjax::end();?>
        </div>