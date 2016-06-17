<div class="item-element product-layout ">
				<div class="item-inner product-item-container">
					<div class="left-block">
						<div class="product-image-container">
							<?
							if(isset($model['images'][0])){
								$filename =	str_replace('.','.600x600.',$model['images'][0]->attributes['filename']);
								$img600 = file_exists($filename)?$filename:$filename =	str_replace('.','.200x200.',$model['images'][0]->attributes['filename']);
							}
							else
								$img600 =	'no-image.jpg';
							?>
							<div class="image"><a href="/files/products/<?=$img600?>" target="_self"><img src="/files/products/<?=$img600?>" alt="<?=$model->name?>" title="<?=$model->name?>" class="img-responsive" /></a></div>
														<!--Sale Label-->
														  
								
															<!--full quick view block-->
																		<a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="/product/<?=$model->id?>">  Быстрый просмотр</a>
								<!--end full quick view block-->
													</div>
					</div>
					
					<div class="right-block">
													<div class="caption">
															<h4><a href="/product/<?=$model->url?>" target="_self"><?=$model->name?></a></h4>
																					
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
								  								  <span class="price-new">$279.99</span>
								  								  								</div>
																						</div>
																					<div class="button-group">
																	<button type="button" class="addToCart" onclick="cart.add('<?=$model->variants[0]->id?>');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">добавить в корзину</span></button>
																									<button type="button" class="wishlist" data-toggle="tooltip" title="Добавить в список желаний" onclick="wishlist.add('<?=$model->variants[0]->id?>');"><i class="fa fa-heart"></i></button>
																									<button type="button" class="compare" data-toggle="tooltip" title="Сравнить этот продукт" onclick="compare.add('<?=$model->id?>');"><i class="fa fa-exchange"></i></button>
																</div>
													
					</div>
				</div>
			 </div>