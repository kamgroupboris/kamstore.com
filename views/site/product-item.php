<?
use app\models\Images;
use app\models\Variants;
?>
<?
$img1 = Images::find()->where(['product_id'=>$model['id'],'position'=>0])->asArray()->one();
$variants1 = Variants::find()->where(['product_id'=>$model['id']])->asArray()->all();
?>

<div class="item ">
				<div class="item-inner product-item-container transition">
					<div class="left-block">
								<div class="product-image-container">
																								<div class="image">
																										<a class="lt-image " href="/product/<?= $model['url'] ?>" target="_self" title="<?= $model['name'] ?>">
														<img data-src="/files/products/<?= str_replace(".", ".200x200.",$img1['filename'])?>" src="/files/products/<?= str_replace(".", ".200x200.",$img1['filename'])?>" alt="<?= $model['name'] ?>">
													</a>
												</div>
																																				<!--full quick view block-->
																										<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="index.php@route=product%252Fquickview&amp;product_id=31.html" data-toggle="tooltip" title="Быстрый просмотр">  Быстрый просмотр</a>
												<!--end full quick view block-->
																			</div>
						</div>
						<div class="right-block">
								<div class="caption">
																		<div class="rating">
																				<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
																				<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
																				<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
																				<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
																				<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
																			</div>
																		
																		<h4>
										<a href="/product/<?= $model['url'] ?>" title="<?= $model['name'] ?>" target="_self">
											<?= $model['name'] ?>									</a>
									</h4>
																		
																											<p class="price">
																				<span class="price-new"><?if(isset($variants1[0]['price']))echo $variants1[0]['price'];?>₽</span>
																													</p>
																	</div>
								<div class="button-group">
																		<button type="button" class="addToCart" data-toggle="tooltip" title="В корзину" onclick="cart.add('<?= $model['id'] ?>');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">В корзину</span></button>
																											<button type="button" class="wishlist" data-toggle="tooltip" title="В избранное" onclick="wishlist.add('<?= $model['id'] ?>');"><i class="fa fa-heart"></i></button>
																											<button type="button" class="compare" data-toggle="tooltip" title="Сравнить продукт" onclick="compare.add('<?= $model['id'] ?>');"><i class="fa fa-exchange"></i></button>
																	</div>
							</div>
						</div> <!-- End right block -->
						</div>