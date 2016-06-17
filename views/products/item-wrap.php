<div class="item-wrap style1">
						<div class="item-wrap-inner media">
							<div class="media-left">
								<div class="item-image">
									<div class="item-img-info">
										<a class="product_img_link" href="/product/<?=$model->url?>" target="_blank" title="<?=$model->name?>">
												<img src="/files/products/<?= str_replace(".", ".100x100.",$model->images[0]['filename'])?>" alt="<?=$model->name?>" title="<?=$model->name?>" class="img-responsive" />
										</a>
									</div>
								</div>
							</div>
															<div class="media-body">
									<div class="item-info">
																				<div class="rating">
																						<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
																						<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
																						<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
																						<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
																						<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
																					</div>
																				
																					<div class="item-title">
												<a href="/product/<?=$model->url?>" target="_blank"
												   title="<?=$model->name?>"  >
													<?=$model->name?></a>
											</div>
											
										
	
																					<!-- Begin item-content -->
											<div class="item-content">
													
																									<div  class="content_price">
																													<span class="old-price product-price"><?if(isset($model->variants[0]['price']))echo $model->variants[0]['price'];?>₽</span>&nbsp;&nbsp;
															<span class="price-old"><?if(isset($model->variants[0]['price']))echo $model->variants[0]['price'];?>₽</span>&nbsp;
																																									</div>
													
													
													
											</div>
											<!-- End item-content -->
																			</div>
								</div><!-- End item-info -->
							
						</div>
						<!-- End item-wrap-inner -->
					</div>
					<!-- End item-wrap -->