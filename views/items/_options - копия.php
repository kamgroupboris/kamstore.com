<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use yii\web\JsExpression;

?>
<div class="options-index">

    <p>
        <?= Html::a('Create Options', ['/options/create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?
        $data = [
            "red" => "red",
            "green" => "green",
            "blue" => "blue",
            "orange" => "orange",
            "white" => "white",
            "black" => "black",
            "purple" => "purple",
            "cyan" => "cyan",
            "teal" => "teal"
        ];
    ?>

    <?=  GridView::widget([
        'dataProvider'=>$dataProvider,
  //     'filterModel'=>$searchModel,
    //    'showPageSummary'=>true,
        'pjax'=>true,
        'striped'=>true,
        'hover'=>true,
        'panel'=>['type'=>'primary', 'heading'=>'Grid Grouping Example'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //    'id',
            [
                'attribute' => 'name',
                'format' => 'text',
                'label' => 'Имя',
            ],
            [
                'attribute' => 'value',
                'format' => 'html',
                'label' => 'Значение',
           //     'content'=> function($data){return Html::input('text', 'username', $data['value'],['class' => 'form-control']);},
                'content'=> function($data){
                    return  Select2::widget([
                        'name' => 'state_125',
                        'value' => ['red', 'green'],
                        'data' => $data,
                        'options' => ['placeholder' => 'Select a state ...', 'multiple' => true],
                        'pluginOptions' => [
                            'templateResult' => new JsExpression('format'),
                            'templateSelection' => new JsExpression('format'),
                            'allowClear' => true
                        ],
                    ]);
                },

            ],
            //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>