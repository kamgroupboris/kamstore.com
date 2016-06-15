<?php

use yii\helpers\Html;


use app\models\Products;
use app\models\Options;
use app\models\Features;
use app\models\Images;
use app\models\Variants;
use app\models\CategoriesFeatures;

use yii\widgets\Pjax;

use yii\web\View;
use yii\helpers\Url;

use yii\data\ActiveDataProvider;

use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'Создать карточку продукта';
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?$this->registerJs("
$(document).on('pjax:beforeSend', function(xhr, options, settings) {
   // console.log(settings);
   settings.url =  settings.url+'&id='+$('input[name=\"Products[id]\"]').val()+'&category='+JSON.stringify($('select#select-category').val());
});
", View::POS_END);?>

<?$this->registerJs("
$('#product').on('pjax:end', function(data, status, xhr, options) {
   // console.log(settings);
   $.pjax.reload({container:'#variants-pjax',
                            type:'post',
                            url: '".Url::to(['items/options-variants', 'action'=> 'create'])."',
                            replaceRedirect:false,
                            replace    : false
                        });

});
", View::POS_END);?>


<div class="products-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_productcreate', [
        'model' => $model,// 'related' => $related,
    ]) ?>

    <?= $this->render('_variants', [
     //   'model' => $variants,
    ]) ?>

    <?= $this->render('_image', [
        'model' => $image,
    ]);?>

    <?= $this->render('_featured', [
        //     'model' => $model,
    ]);
    ?>

    <?= $this->render('_categorycreate', [
        //    'category' => $category,// 'brand' => $brand,
    ]);?>

    <?= $this->render('_optionsupdate', [
        'items' => $items,
    ]) ?>



</div>
