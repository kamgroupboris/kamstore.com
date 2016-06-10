<?
use app\models\Images;
use app\models\Variants;
?>
<?
$img1 = Images::find()->where(['product_id'=>$model['id'],'position'=>0])->asArray()->one();
$variants1 = Variants::find()->where(['product_id'=>$model['id']])->asArray()->all();
?>

<?//print_r($model->variants[0]->price)?>

<div class="product-thumb transition product-item-container">
		    <div class="left-block">
			<div class="product-image-container">
			    			    <div class="image">
												<span class="label label-sale">Акция</span>
												<a class="" href="/product/<?= $model['url'] ?>" target="_self">
								<img data-src="/files/products/<?= str_replace(".", ".200x200.",$img1['filename'])?>" src="/files/products/<?= str_replace(".", ".200x200.",$img1['filename'])?>" alt="<?= $model->name ?>" class="<?= $model->name ?>"  />
						</a>
			    </div>			
			    			    				    <!--full quick view block-->
					    					    <a class="quickview iframe-link visible-lg" data-toggle="tooltip" title="Быстрый просмотр" data-fancybox-type="iframe"  href="/product/<?= $model->url ?>">  Быстрый просмотр</a>
				    <!--end full quick view block-->
			    			    
			</div>
		    </div>
		    <div class="right-block">
				<div class="caption">
				   <div class="item-time">
						<div class="item-timer product_time_52"></div>
						<script type="text/javascript">
							//<![CDATA[
							listdeal1.push('product_time_52|2016/07/15 00:00:00');
							//]]>
						</script>
					</div>
				   				    <div class="rating">
					    					    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
					    					    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
					    					    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
					    					    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
					    					    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
					    				    </div>
				    				    
				    				    <h4><a href="/product/<?= $model['url'] ?>" target="_self" title="<?= $model['name'] ?>" ><?= $model['name'] ?></a></h4>
				    				    				    					
				    				    <p class="price">
										<span class="price-new"><?=$model->variants[0]->price;?>₽</span> <span class="price-old"><?=$model->variants[0]->compare_price?>₽</span>
														    </p>
				    					
				</div>
						    							    <div class="button-group">
							    								    <button type="button" class="addToCart" data-toggle="tooltip" title="В корзину" onclick="cart.add('<?= $model->variants[0]->id ?>');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">В корзину</span></button>
							    							    	<button type="button" class="wishlist" data-toggle="tooltip" title="В избранное" onclick="wishlist.add('<?= $model->variants[0]->id ?>');"><i class="fa fa-heart"></i></button>
							      
							    								    <button type="button" class="compare" data-toggle="tooltip" title="Сравнить" onclick="compare.add('<?= $model->variants[0]->id ?>');"><i class="fa fa-exchange"></i></button>
							       
								    
							    </div>
						    			    </div>
		     </div><!-- End right block -->