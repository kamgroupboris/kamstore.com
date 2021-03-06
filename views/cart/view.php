<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'delivery_id',
            'delivery_price',
            'payment_method_id',
            'paid',
            'payment_date',
            'closed',
            'date',
            'user_id',
            'name',
            'address',
            'phone',
            'email:email',
            'comment',
            'status',
            'url:url',
            'payment_details:ntext',
            'ip',
            'total_price',
            'note',
            'discount',
            'coupon_discount',
            'coupon_code',
            'separate_delivery',
            'modified',
        ],
    ]) ?>

</div>
