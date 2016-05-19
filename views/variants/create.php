<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Variants */

$this->title = 'Create Variants';
$this->params['breadcrumbs'][] = ['label' => 'Variants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variants-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
