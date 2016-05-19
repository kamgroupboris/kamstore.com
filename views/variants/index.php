<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Variants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variants-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Variants', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'sku',
            'name',
            'price',
            // 'compare_price',
            // 'stock',
            // 'position',
            // 'attachment',
            // 'external_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
