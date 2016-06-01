<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MenuLink */

$this->title = 'Update Menu Link: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Menu Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="menu-link-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
