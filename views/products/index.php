<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Products;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container bb">
    <div class="row nomargin">
        <div class="col-xs-12 breakfast mtt21 noPadding">
            <p class="StileTextParam1 tdn"><a href="" class="colorx">Главная</a> / <a href="" class="colorx">Телефоны</a></p>
            <p class="StileTextParam2 cb">Мобильные телефоны</p>
        </div>
    </div>

    <div class="row nomargin">
        <div class="col-xs-12 noPadding mb27">
            <div class="col-xs-6 noPadding">
                <p class="param8s">Найдено в наличии: 53 товаров</p>
            </div>
            <div class="col-xs-6 noPadding">
                <div class="">
                    <p class="printparam1">Сортировать:</p>
                    <label class="buttonparam1">по популярности</label>
                    <label class="buttonparam2">по цене</label>
                </div>
                <div class="flR">
                    <label class="buttonparam3"><img src="../img/Прямоугольник12-копияindexcatlogcloj.png" alt=""></label>
                    <label class="buttonparam4"><img src="../img/Прямоугольник-20-копияindexcatlogcloj.png" alt=""></label>
                </div>
            </div>
        </div>
    </div>
    <div class="row nomargin">
        <div class="col-xs-9 noPadding height bord">


                <?
                $dataProvider = new ActiveDataProvider([
                    'query' => Products::find()->where(['visible'=>1]),
                    'pagination' => [
                        'pageSize' => 20,
                    ],
                ]);
                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => false,
                    'options' => [
                        'tag'=>'ul',
                        'class' => ''
                    ],
                    'itemOptions' => [
                       'tag'=>false,
                    ],
                    'itemView' => '_productlist',
                ]);

                ?>

            </div>





         <div class="col-xs-3 noPadding height bord noPadding" >
             <?=  $this->render('_sidebar');?>
            </div>

    </div>
    <div class="col-xs-5 col-xs-offset-4 ">
        <button class=" buttonlearnmore borded StileTextParam1" onclick="lazyload.load()">ЗАГРУЗИТЬ ЕЩЕ</button>
    </div>
    <div class="col-xs-12" id="loading-div"></div>
</div>
<div class="row mtt20">
    <div class="container">
        <div class="col-xs-12">
            <div class="col-xs-3">
                <div class="blockinfobottom">
                    <img src="../img/ShopImgBottom1.png" alt="">
                    <p>Бесплатная доставка<br>от 5000 руб.</p>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="blockinfobottom">
                    <img src="../img/ShopImgBottom2.png" alt="">
                    <p>Доступные способы оплаты</p>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="blockinfobottom">
                    <img src="../img/ShopImgBottom3.png" alt="">
                    <p>Возврат в течении<br>60 дней</p>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="blockinfobottom">
                    <img src="../img/ShopImgBottom4.png" alt="">
                    <p>Поможем настроить технику</p>
                </div>
            </div>
        </div>
    </div>
</div>
