<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'Update Products: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_product', [
        'model' => $model,
    ]) ?>

</div>
<div class="options-index">

    <p>
        <?= Html::a('Create Options', ['/options/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'name',
                'format' => 'text',
                'label' => 'Имя',
            ],
            [
                'attribute' => 'value',
                'format' => 'html',
                'label' => 'Значение',
                'content'=> function($data){return Html::input('text', 'username', $data['value'],['class' => 'form-control']);},

            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
