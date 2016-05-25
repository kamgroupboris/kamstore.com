<?php
use yii\bootstrap\ActiveForm;
use unclead\widgets\TabularInput;
use yii\helpers\Html;
use app\models\Item;
use unclead\widgets\TabularColumn;
use yii\helpers\Url;

use kartik\typeahead\Typeahead;

use yii\data\SqlDataProvider;
use app\models\Options;


/* @var $this \yii\web\View */
/* @var $models Item[] */
?>

<?php $form = \yii\bootstrap\ActiveForm::begin([
    'id' => 'tabular-form',
    'options' => [
        'enctype' => 'multipart/form-data'
    ]
]) ?>


<?


$dataProvider = new SqlDataProvider([
    'sql' => "SELECT
		s_features.id,
		s_features.`name`,
		CONCAT('') `value`
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




$data1 = [
    [
        'id' => 1,
        'title' => 'Title 1',
        'description' => 'Description 1'
    ],
    [
        'id' => 2,
        'title' => 'Title 2',
        'description' => 'Description 2'
    ],
];
$items = [];
foreach ($data as $row) {
    $item = new Item();
    $item->setAttributes($row);
    $items[] = $item;
}
//$models = $items;
$count = 0;
?>

<?= TabularInput::widget([
    'models' => $items,
    'attributeOptions' => [
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'validateOnChange' => false,
        'validateOnSubmit' => true,
        'validateOnBlur' => false,
    ],
    'columns' => [
        [
            'name' => 'id',
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
       //     'type'  => 'static',
            'type'  => Typeahead::className(),
            'value' => function($data) {
            //    print('<pre>');
            //   print_r($data);

                /*  return Typeahead::widget(
                      [
                      'name' =>  'value' ,
               /*     'options' => ['placeholder' => ' ...'],
                      'pluginOptions' => ['highlight'=>true, 'minLength' => 0],
                      'dataset' => [
                          [
                              'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                              'display' => 'value',
                              'remote' => [
                                  'url' => Url::to(['items/feature-list', 'id'=> $data->id]) . '&q=%QUERY',
                                  'wildcard' => '%QUERY'
                              ]
                          ]
                      ]
                ]
                );*/
            },
        ],
    /*    [
            'name' => 'description',
            'title' => 'Description',
        ],*/
//        [
//            'name'  => 'file',
//            'title' => 'File',
//            'type'  => \vova07\fileapi\Widget::className(),
//            'options' => [
//                'settings' => [
//                    'url' => ['site/fileapi-upload']
//                ]
//            ]
//        ],

    ],
]) ?>


<?= Html::submitButton('Обновить', ['class' => 'btn btn-success']); ?>
<?php ActiveForm::end(); ?>