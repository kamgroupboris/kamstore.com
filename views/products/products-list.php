<?


use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Products;

?>

<div class="module related products-list grid">
            <h3 class="modtitle">
                <span>Сопутствующие</span>
            </h3>
            <div class="releate-products releate-products-slider">
				<!-- Products list -->
								<div class="product-item-container">

									<?
									$dataProvider = new ActiveDataProvider([
											'query' => Products::find()->where(['id'=>6]),
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
											'itemView' => '_product-item',
									]);

									?>




                			</div>
				        
                   
		
             				<div class="product-item-container">	
                 
				
					<div class="product-item">
				      <div class="media">
						 <div class="media-left product-image-container  ">
							      <img src="image/cache/catalog/product/6-80x80.png" alt="Phasellus ut vehicula" title="Phasellus ut vehicula" class="img-responsive" />
							      						      
						 <!--- New ------->
						      						 
						  <!------SALE ---------->
						  						      						      						 
						 
						      							      <!--full quick view block-->
								      								      <a class="quickview iframe-link " data-fancybox-type="iframe"  href="index.php@route=product%252Fquickview&amp;product_id=52.html">  Quick view</a>
							      <!--end full quick view block-->
						      						</div> 
				     
				      
				      <div class="media-body">
					<div class="caption">
					    						<div class="ratings">
							      <div class="rating-box">
							      							      							      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
							      							      							      							      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
							      							      							      							      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
							      							      							      							      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
							      							      							      							      <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
							      							      							      </div>
						 </div>
						 						<h4><a class="preview-image" href="index.php@route=product%252Fproduct&amp;product_id=52.html">Phasellus ut vehicula</a></h4>
												<div class="price">
						       							      								     <span class="price-old">$78.00</span>
								     <span class="price-new">$45.00</span>
							      						       						</div>
											</div>
					 <div class="button-group">
						<button class="addToCart" type="button" onclick="cart.add('52');"><i class="fa fa-shopping-cart"></i> <span>Add to Cart</span></button>
						<button class="wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('52');"><i class="fa fa-heart"></i></button>
						<button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('52');"><i class="fa fa-exchange"></i></button>
					 </div>
				      </div>
				 </div>
			    </div>
							
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
				