<?


use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Products;

?>
<div class="up-sell-product col-xs-12">
		    <div class="module up-sell">
			<h3 class="modtitle"><span>Похожие товары</span></h3>
		<div class="so-basic-product" id="so_basic_products_108_18921863821465213813">

										<?
									$dataProvider = new ActiveDataProvider([
											'query' => Products::find()->where(['visible'=>1])->limit(10),
											'pagination' => false,

									]);
									echo ListView::widget([
											'dataProvider' => $dataProvider,
											'summary' => false,
											'options' => [
													'tag'=>'div',
													'class' => 'item-wrap row cf products-list grid'
											],
											'itemOptions' => [
													'tag'=>false,
											],
											'itemView' => '_owl2-item',
									]);

									?>

	</div>
</div>

<script>// <![CDATA[
jQuery(document).ready(function($) {
		$('.item-wrap').owlCarousel2({
			pagination: false,
			center: false,
			nav: true,
			dots: false,
			loop: true,
			margin: 0,
			navText: [ 'prev', 'next' ],
			slideBy: 4,
			autoplay: false,
			autoplayTimeout: 2500,
			autoplayHoverPause: true,
			autoplaySpeed: 800,
			startPosition: 0, 
			responsive:{
				0:{
					items:4
				},
				480:{
					items:1
				},
				768:{
					items:2
				},
				911:{
					items:3
				},
				1200:{
					items:4
				}
			}
		});	  
	});
// ]]></script>




		  </div>