<?
	use app\models\Images;
	$img1 = Images::find()->where(['product_id'=>$model->id,'position'=>0])->asArray()->one();
?>
<li class="span3">
	<div class="thumbnail">
		<div class="hit"><img src="../img/ХИТ.png" alt=""></div>
		<a href="#"><img src="/files/products/<?= str_replace(".", ".200x200.",$img1['filename'])?>" alt=""></a>

	<div class="hoverblock">
		<a href="/products/<?= $model->url ?>" class="bistrii_prosmotr">БЫСТРЫЙ ПРОСМОТР</a>
	</div>
	</div>
	<div class="caption">
		<p class="captionP1"><?= $model->name ?> </p>
		<p class="captionP2">24 999 руб.</p>
		<a class="btn btn-mini" href="#"> В КОРЗИНУ</a>
	</div>
</li>