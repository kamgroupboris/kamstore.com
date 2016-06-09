<?
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\DetailView;
use app\models\Images;
?>


<div class="container bb">
    <div class="row nomargin">
        <div class="col-xs-12 breakfast mtt21 noPadding">
            <p class="StileTextParam1 tdn"><a href="" class="colorx">Главная</a> / <a href="" class="colorx">Телефоны</a> / <a href="" class="colorx">Мобильные Телефоны</a> / <a href="" class="colorx">Телефоны</a></p>
            <p class="StileTextParam2 cb"><?=$model->name;?></p>
        </div>
    </div>
    <!--
    Start content
    -->
    <div class="row">
        <div class="container ">
            <div class="col-xs-12 br ">
                <div class="col-xs-5 stars">
                    <p class="fll mr5 arcticlesblock ">Артикул: 30021094</p>
                    <div id="rating_cont" class="fll ">
                        <div id="rating_btns">
                            <ul>
                                <li>0.5</li>
                                <li>1.0</li>
                                <li>1.5</li>
                                <li>2.0</li>
                                <li>2.5</li>
                                <li>3.0</li>
                                <li>3.5</li>
                                <li>4.0</li>
                                <li>4.5</li>
                                <li>5.0</li>
                            </ul>
                        </div>
                        <div id="rating_on" >&nbsp;</div>
                        <div id="rated">
                            <div id="rating" >not rated</div>
                            <div> - &nbsp;</div>
                            <div id="small_stars">&nbsp;</div>
                            <div id="rate_edit">edit</div>
                        </div>
                    </div>
                    <p class="fll">отзывов: 23</p>
                    <input type="hidden" id="rating_output" name="rating_output" value="not rated" />
                </div>
                <div class="col-xs-3  col-xs-offset-4">
                    <div class="flr">
                        <a href=""><img src="../img/1qaz.png" alt=""></a>
                        <a href=""><img src="../img/2wsx.png" alt=""></a>
                        <a href=""><img src="../img/3edc.png" alt=""></a>
                        <a href=""><img src="../img/4rfv.png" alt=""></a>
                        <a href=""><img src="../img/5tgb.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="cox-xs-12 tovar">
                <div class="col-xs-7">



                    <?//$images = ArrayHelper::map($model['images'], 'name', 'filename');?>
                    <!-- scroll -->

                    <?
                    $images =  Images::find()->where(['product_id'=>$model->id])->asArray()->all();
                    $img1 =  Images::find()->where(['product_id'=>$model->id,'position'=>0])->asArray()->one();
                    ?>
                    <div class="container_fo_scroll">
                        <div class="main-image">
                            <img src="/files/products/<?=str_replace(".", ".200x200.",$img1['filename'])?>" alt="Placeholder" class="custom">
                        </div>
                        <div id="demo-left" class="thumbnails">

                            <div id="vWrapper">
                                <div id="carouselv">



                                    <?foreach($images as $img):?>
                                    <div><?// print('<pre>');  print_r($img); ?>
                                        <a href="/files/originals/<?= $img['filename']?>"><img src="<?=\yii\helpers\Url::to('/files/products/'.str_replace(".", ".95x95.",$img['filename']))?>" alt="Thumbnails"></a>
                                    </div>
                                    <?endforeach;?>
                                    <!--  <div>
                                          <a href="images/img_4.jpg"><img src="images/img_4.jpg" alt="Thumbnails"></a></div>
                                      <div>
                                          <a href="images/img_5.jpg"><img src="images/img_5.jpg" alt="Thumbnails"></a></div>
                                      <div>
                                          <a href="images/img_1.jpg"><img src="images/img_1.jpg" alt="Thumbnails"></a></div>
                                      <div>
                                          <a href="images/img_2.jpg"><img src="images/img_2.jpg" alt="Thumbnails"></a></div>
                                      <div>
                                          <a href="images/img_3.jpg"><img src="images/img_3.jpg" alt="Thumbnails"></a></div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- scroll -->
                </div>
                <div class="col-xs-5">
                    <div class="col-xs-12 nalichie">
                        <div class="col-xs-6 nalichieL">
                            <p class="nalichieRtext1">1730 руб.</p>
                            <p class="nalichieRtext2">есть в наличии</p>
                        </div>
                        <div class="col-xs-6 nalichieR">
                            <p class="nalichieRtext3">Бонусных<br>рублей:</p>
                            <img src="../img/25.png" alt="">
                        </div>
                    </div>

                    <div class="col-xs-12 opisanie">
                        <div class="col-xs-6">
                            <p class="opisanietext1">Количество SIM карт:</p>
                            <p class="opisanietext1">Тип карты памяти:</p>
                            <p class="opisanietext1">Время в режиме разговора: </p>
                            <p class="opisanietext1">Время в режиме ожидания:</p>
                            <p class="opisanietext1">Емкость аккумулятора:</p>
                            <p class="opisanietext1">Цвет:</p>
                            <p class="opisanietext1">Габаритные размеры (В*Ш*Г):</p>
                            <p class="opisanietext1">Вес:</p>
                        </div>
                        <div class="col-xs-6">
                            <p class="opisanietext2">2</p>
                            <p class="opisanietext2">microSD, microSDHC</p>
                            <p class="opisanietext2">до 12 часов</p>
                            <p class="opisanietext2">до 400 часов</p>
                            <p class="opisanietext2">800 мАч</p>
                            <p class="opisanietext2">белый</p>
                            <p class="opisanietext2">113*47*13 мм</p>
                            <p class="opisanietext2">75 г</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tabbable container">
                <ul class="nav nav-tabs menutovarov">
                    <li class="active"><a href="#tab1" data-toggle="tab">ОПИСАНИЕ</a></li>
                    <li><a href="#tab2" data-toggle="tab">ХАРАКТЕРИСТИКИ</a></li>
                    <li><a href="#tab3" data-toggle="tab">ОТЗЫВЫ О ТОВАРЕ(63)</a></li>
                    <li><a href="#tab4" data-toggle="tab">АКСЕССУАРЫ</a></li>
                </ul>

                <div class="tab-content">
                    <div id="tab1" class="tab-pane fade">
                        <h3>Menu 1</h3>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div id="tab2" class="tab-pane fade">
                        <h3>Menu 2</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="tab3" class="tab-pane fade active in">
                        <h3>Menu 3</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                    <div id="tab4" class="tab-pane fade">
                        <h3>HOME</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>