<?php

use yii\helpers\Html;


use app\models\Products;
use app\models\Options;
use app\models\Features;
use app\models\Images;
use app\models\CategoriesFeatures;

use yii\widgets\Pjax;

use yii\web\View;

use yii\data\ActiveDataProvider;

use yii\widgets\ListView;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'Обновить продукт';
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?$this->registerJs("
$(document).on('pjax:beforeSend', function(xhr, options, settings) {
settings.url =  settings.url+'&id='+$('input[name=\"Products[id]\"]').val()+'&category='+JSON.stringify($('select#select-category').val());
});
", View::POS_END);?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="row">


    <div class="col-lg-6">





    <?= $this->render('_productcreate', [
        'model' => $model,// 'related' => $related,
    ]) ?>






</div>
    <div class="col-lg-6">


        <?= $this->render('_image', [
            //  'model' => $image,
            'model' =>  $model['images'],
        ]);?>

        <?$related = ArrayHelper::getColumn($model['relatedProducts'], 'related_id');?>

        <?= $this->render('_featured', [
            'model' => $related,
        ]);
        ?>

        <?$category = ArrayHelper::getColumn($model['productsCategories'], 'category_id');?>
        <?= $this->render('_categorycreate', [
            'model' => $category,// 'brand' => $brand,
        ]);?>


        <?= $this->render('_optionsupdate', [
            'items' => $items,
        ]) ?>



    </div>

</div>
