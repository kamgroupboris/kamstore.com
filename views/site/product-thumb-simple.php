<?
use app\models\Images;
use app\models\Variants;
?>
<?
$img1 = Images::find()->where(['product_id'=>$model['id'],'position'=>0])->asArray()->one();
$variants1 = Variants::find()->where(['product_id'=>$model['id']])->asArray()->all();
?>

<div class="product-layout ">
											<div class="product-thumb transition">
							<div class="image"><a href="/product/<?= $model['url'] ?>"><img src="/files/products/<?= str_replace(".", ".200x200.",$img1['filename'])?>" alt="Ruma huren chuma" title="Ruma huren chuma" class="img-responsive" /></a></div>
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
								<h4><a href="index.php@route=product%252Fproduct&amp;product_id=54.html"><?= $model['name'] ?></a></h4>
								<div class="description"><?= $model['meta_description'] ?></div>
								
							                <p class="price">
                                    <span class="price-new"><?if(isset($variants1[0]['price']))echo $variants1[0]['price'];?>₽</span> <span class="price-old"><?if(isset($variants1[0]['compare_price']))echo $variants1[0]['compare_price'];?>₽</span>
                                                    </p>
                							</div>
							<div class="button-group">
								<button type="button" onclick="cart.add('54');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button>
								<button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('54');"><i class="fa fa-heart"></i></button>
								<button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('54');"><i class="fa fa-exchange"></i></button>
							</div>
						</div>
					</div>