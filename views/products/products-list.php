<?


use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Products;
use yii\helpers\ArrayHelper;

?>
<?
//print('<pre>');
$result = ArrayHelper::map($model, 'position', 'related_id');
//print_r($result);?>
<div class="module related products-list grid">
            <h3 class="modtitle">
                <span>Сопутствующие</span>
            </h3>
            <div class="releate-products releate-products-slider">
				<!-- Products list -->
								<div class="product-item-container">

									<?
									$dataProvider = new ActiveDataProvider([
											'query' => Products::find()->with('images','variants')->where(['id'=>$result]),
											'pagination' => [
													'pageSize' => 20,
											],
									]);
									echo ListView::widget([
											'dataProvider' => $dataProvider,
											'summary' => false,
											'emptyText'=>'Нет сопутствующих товаров',
											'options' => [
													'tag'=>'div',
													'class' => 'product-item-container'
											],
											'itemOptions' => [
													'tag'=>false,
											],
											'itemView' => '_product-item',
									]);

									?>




                			</div>
				        
                   
		
             				<div class="product-item-container">



                			</div>
				        
                   
		
             
            
                </div>

        </div>

<div class="line-divider"></div>

<!-- end Products widgets desktop-->


<script>// <![CDATA[
jQuery(document).ready(function($) {
		$('.releate-products-slider').owlCarousel2({
			pagination: false,
			center: false,
			nav: true,
			dots: false,
			loop: true,
			margin: 25,
			navText: [ 'prev', 'next' ],
			slideBy: 1,
			autoplay: false,
			autoplayTimeout: 2500,
			autoplayHoverPause: true,
			autoplaySpeed: 800,
			startPosition: 0, 
			responsive:{
				0:{
					items:1
				},
				480:{
					items:1
				},
				768:{
					items:1
				},
				1200:{
					items:1
				}
			}
		});	  
	});
// ]]></script>
				