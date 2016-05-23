<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

use kartik\widgets\Typeahead;



?>
<div class="options-index">

    <p>
        <?= Html::a('Create Options', ['/options/create'], ['class' => 'btn btn-success']) ?>
    </p>


<?Pjax::begin();?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>


    <?=  GridView::widget([
        'dataProvider'=>$dataProvider,
        'pjax'=>true,
        'striped'=>true,
        'hover'=>true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'features.name',
                'format' => 'text',
                'label' => 'Имя',
            ],
            [
                'attribute' => 'value',
                'format' => 'text',
                'label' => 'Значение',
                'content'=> function($data){
                    return Typeahead::widget([
                        'name' => $data['feature_id'],
                        'value' => $data['value'],
                        'options' => ['placeholder' => 'Filter as you type ...'],
                        'pluginOptions' => ['highlight'=>true, 'minLength' => 0],
                        'dataset' => [
                            [
                                'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                                'display' => 'value',
                                'remote' => [
                                    'url' => Url::to(['items/featurelist', 'id'=> $data['feature_id']]) . '&q=%QUERY',
                                    'wildcard' => '%QUERY'
                                ]
                            ]
                        ]
                    ]);
                },

            ],
        ],
    ]); ?>



        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
  <?Pjax::end();?>
</div>