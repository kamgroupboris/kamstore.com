<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use yii\web\JsExpression;

use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

use kartik\widgets\DepDrop;
use yii\bootstrap\Dropdown;
use yii\helpers\Url;

?>
<div class="options-index">

    <p>
        <?= Html::a('Create Options', ['/options/create'], ['class' => 'btn btn-success']) ?>
    </p>


<?Pjax::begin();?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>


    <?=  GridView::widget([
        'dataProvider'=>$dataProvider,
        //     'filterModel'=>$searchModel,
        //    'showPageSummary'=>true,
        'pjax'=>true,
        'striped'=>true,
        'hover'=>true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //    'id',
            [
                //'attribute' => 'name',
                'attribute' => 'features.name',
                'format' => 'text',
                'label' => 'Имя',
            ],
            [
                'attribute' => 'value',
                'format' => 'text',
                'label' => 'Значение',
                'content'=> function($data){
                    return Html::input('text', $data['feature_id'], $data['value'],['class' => 'form-control']);
                },

            ],

            [
                'attribute' => 'value',
                'format' => 'text',
                'label' => 'Значение',
                'content'=> function($data){
                    return DepDrop::widget( [
                        'name' => 'state_125',
                        'value'=>['2','df'],
                        'pluginOptions'=>[
                            'depends'=>['cat-id', 'subcat-id'],
                            'placeholder'=>'Select...',
                            'url'=>Url::to(['/site/prod'])
                        ]
                    ]);
                },

            ],


            [
                'attribute' => 'value',
                'format' => 'text',
                'label' => 'Значение',
                'content'=> function($data){
                    return Html::dropDownList('mn','fds',[
                        '0' => 'Активный',
                        '1' => 'Отключен',
                        '2'=>'Удален'
                    ]);
                },

            ],
            //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
  <?Pjax::end();?>
</div>