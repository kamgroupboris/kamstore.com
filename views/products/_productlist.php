<?
use app\models\Images;
?>
<div class="col-xs-4 height3 bord noPadding">
<li class="span31">
	<div class="napolnitel">
		<div class="hit1"><img src="../img/ХИТ.png" alt=""></div>
		<? $img1 = Images::find()->where(['product_id'=>$model->id,'position'=>0])->asArray()->one();?>
		<a href="#"><img src="/files/products/<?= str_replace(".", ".200x200.",$img1['filename'])?>" alt=""></a>
		<div class="hoverblock1">
			<a href="/products/view?id=<?= $model->id ?>" class="bistrii_prosmotr">БЫСТРЫЙ ПРОСМОТР</a>
		</div>
		<div class="caption1">
			<p class="captionP11"><?= $model->name ?></p>
			<p class="captionP22">24 999 руб.</p>
			<a class="btn btn-mini1" href="#"> В КОРЗИНУ</a>
		</div>
	</div>
</li>
</div>