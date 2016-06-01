<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\BaseUrl;

/* @var $this yii\web\View */
/* @var $model app\models\Articles */

$this->title = $model->meta_title;
$this->params['breadcrumbs'][] = ['label' => 'Публикации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="articles-view">

    <h1><?= Html::encode($model->name) ?></h1>


    <div class="row">

        <?//=$this->render('/layouts/sidebarLeft');?>


        <div class="col-md-9">
            <div class="col-md-<?//=$model->img?'9':'12';?>">
                <?= $model->body;?>
            </div>
            <?//if(isset($model->img) && $model->img!=''):?>
                <div class="col-md-3 pull-right">
                    <a href="<?//=BaseUrl::to(['@web/uploads/'.$model->img])?>" class="thumbnail">
                        <?//= Html::img('@web/uploads/'.$model->img, ['alt' => $model->meta_title, 'width'=> 300]);?>
                    </a>
                </div>
            <?//endif;?>
        </div>
        <?=$this->render('/site/sidbarRight');?>
    </div>
    <?/*= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'url:url',
            'name',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'body:ntext',
            'menu_id',
            'position',
            'visible',
            'header',
        ],
    ])*/ ?>

</div>
