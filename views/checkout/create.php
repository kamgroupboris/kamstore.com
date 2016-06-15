<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = 'Отправить заказ';
$this->params['breadcrumbs'][] = ['label' => 'Заказ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('cart', [
        //  'model' => $model,
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
