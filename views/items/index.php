<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'id',
            'url:url',
         //   'brand_id',
            'name',
            'annotation:html',
            // 'body:ntext',
            // 'visible',
            // 'position',
            // 'meta_title',
            // 'meta_keywords',
            // 'meta_description',
            // 'created',
            // 'featured',
            // 'external_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
