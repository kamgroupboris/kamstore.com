<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?//= Html::a('Create Articles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
       //     ['class' => 'yii\grid\SerialColumn'],

       //     'id',
       //     'url:url',
            'name',
        //    'meta_title',
        //    'meta_description',
            // 'meta_keywords',
             'body:html',
            // 'menu_id',
            // 'position',
            // 'visible',
            // 'header',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
