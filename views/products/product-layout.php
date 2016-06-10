 <?
 	use app\models\Images;
 	use app\models\Variants;
 ?>
 <?
 	$img1 = Images::find()->where(['product_id'=>$model['id'],'position'=>0])->asArray()->one();
 	$variants1 = Variants::find()->where(['product_id'=>$model['id']])->asArray()->all();
 ?>
 <div class="product-layout col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
			<div class="product-item-container">
				<div class="left-block">
					<div class="product-image-container   ">
						<img data-src="/files/products/<?= str_replace(".", ".200x200.",$img1['filename'])?>" src="/files/products/<?= str_replace(".", ".200x200.",$img1['filename'])?>"  title="" class="img-responsive" />
											</div>
					<!--countdown box-->


					<!--end countdown box--

					<!--New Label-->

					<!--Sale Label-->


											<!--full quick view block-->
					<a class="quickview iframe-link visible-lg" data-toggle="tooltip" title="Быстрый просмотр" data-fancybox-type="iframe"  href="/product/<?= $model['url'] ?>">  Быстрый просмотр</a>
						<!--end full quick view block-->
									</div>
				<!-- end left block -->

				<div class="right-block">
					<div class="caption">
					<h4><a href="/product/<?= $model['url'] ?>"><?= $model['name'] ?></a></h4>
										<div class="ratings">
						<div class="rating-box">
									<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
															<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
															<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
															<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
															<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
									</div>
					</div>

										<div class="price">
					  					  <span class="price-new"><?if(isset($variants1[0]['price']))echo $variants1[0]['price'];?>₽</span>

											<?//print_r($variants1)?>
					</div>
										<div class="description  item-desc ">
						<p>	<?=$model['annotation']?></p>
					</div>
				  </div>

				  <div class="button-group">
					<button class="addToCart" type="button" data-toggle="tooltip" title="Добавить в корзину" onclick="cart.add('<?= $variants1[0]['id'] ?>', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Добавить в корзину</span></button>
					<button class="wishlist" type="button" data-toggle="tooltip" title="Добавить в список пожеланий" onclick="wishlist.add('<?= $variants1[0]['id'] ?>');"><i class="fa fa-heart"></i></button>
					<button class="compare" type="button" data-toggle="tooltip" title="Сравнить этот продукт" onclick="compare.add('<?= $variants1[0]['id'] ?>');"><i class="fa fa-exchange"></i></button>
				  </div>

				</div><!-- right block -->

			</div>
        </div>