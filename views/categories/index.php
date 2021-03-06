<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категория';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_id',
            'name',
            'meta_title',
            'meta_keywords',
            // 'meta_description',
            // 'description:ntext',
            // 'url:url',
            // 'image',
            // 'position',
            // 'visible',
            // 'external_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
