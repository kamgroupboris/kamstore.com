<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'delivery_id',
            'delivery_price',
            'payment_method_id',
            'paid',
            // 'payment_date',
            // 'closed',
            // 'date',
            // 'user_id',
            // 'name',
            // 'address',
            // 'phone',
            // 'email:email',
            // 'comment',
            // 'status',
            // 'url:url',
            // 'payment_details:ntext',
            // 'ip',
            // 'total_price',
            // 'note',
            // 'discount',
            // 'coupon_discount',
            // 'coupon_code',
            // 'separate_delivery',
            // 'modified',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
