
<div class="product-view row">
		  <div class="left-content-product col-xs-12">
			<div class="row">
						
                <div class="content-product-left  col-md-6 col-xs-12 ">
					<div id="thumb-slider" class="thumb-vertical-outer">
							<div id="thumb-slider-next" class="slider-btn lSNext"><i class="fa fa-chevron-up"></i></div>
							<ul class="thumb-vertical previews-list ">
							<?foreach($model['images'] as $img):?>
									<li class="owl2-item">
										<a data-index="0" class="img thumbnail" data-image="/files/products/<?=str_replace('.','.600x600.',$img->attributes['filename']);?>" title="<?=$model->name?>">
											<img src="/files/products/<?=str_replace('.','.600x600.',$img->attributes['filename']);?>" title="<?=$model->name?>" alt="<?=$model->name?>" />
										</a>
									</li>
							<?endforeach;?>


							</ul>
							<div id="thumb-slider-prev" class="slider-btn lSPrev"><i class="fa fa-chevron-down"></i></div>
                    </div>

					<div class="large-image  vertical  ">
						<?$filename =	str_replace('.','.600x600.',$model->images[0]->filename)?>
						<img itemprop="image" class="product-image-zoom" src="/files/products/<?=$filename?>" data-zoom-image="/files/products/<?=$filename?>" title="<?=$model->name?>" alt="<?=$model->name?>" />

						<!--New Label-->

						<!--Sale Label-->
					</div>
						
                    
					
					                    					                </div>
           
			<?//print('<pre>');print_r($model['images']);?>
						<div class="content-product-right col-md-6 col-xs-12">
			 <div class="title-product">
				<h1><?=$model['name']?></h1>
			 </div>
			 <!-- Review ---->
			 				    <div class="box-review">
					   <div class="ratings">
						  <div class="rating-box">
						  						  						  <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						  						  						  						  <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
						  						  						  						  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						  						  						  						  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						  						  						  						  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						  						  						  </div>
					  </div>
			 
					   <a class="reviews_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">нет отзывов</a> | <a class="write_review_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Написать отзыв</a>
				    </div>
								
			                 <div class="product-label">
					<div class="stock"><span>Доступность:</span> <span class="status-stock"><?=$model->visible==1?'В наличии':'Нет в наличии'?></span></div>
					   												<div class="product_page_price price" itemprop="offerDetails" itemscope itemtype="/Offer">
														<span class="price-old"><?=$model['variants'][0]->attributes['compare_price']?>₽</span>
							<span class="price-new" itemprop="price"><?=$model['variants'][0]->attributes['price']?>₽</span>
														
							
							
														<div class="discount">
																 10 или больше $88.00																 20 или больше $77.00															</div>
													</div>
																

                </div>
                	
			 
			 				<div class="product-box-desc">
						<div class="inner-box-desc">
																											
																		<div class="brand"><span>Бренд:</span>
																		<a href="/brand/<?=$model['brands']->attributes['url']?>"><?=$model['brands']->attributes['name']?></a></div>
																
																<div class="model"><span>Артикул:</span><?=$model['variants'][0]->attributes['sku']?></div>
																
														</div>

				</div>
				
				<div class="short_description">
					<h3>Краткая Информация</h3>
					<?=$model['annotation']?>
				</div>
					
				
			
				<div id="product">
										
										
					
				    <div class="form-group box-info-product">
					   <div class="option quantity">
							
						  <div class="input-group quantity-control">
							  <label>Кол-во</label>
							  <input class="form-control" type="text" name="quantity" value="1" />
							  <input type="hidden" name="product_id" value="<?=$model['variants'][0]->id?>" />
							  <span class="input-group-addon product_quantity_down">-</span>
							  <span class="input-group-addon product_quantity_up">+</span>
						  </div>
					   </div>
					   
						<div class="cart">
							<input type="button" data-toggle="tooltip" title="В корзину" value="В корзину" data-loading-text="Загрузка..." id="button-cart" class="btn btn-mega btn-lg" />
						</div>
						<div class="add-to-links wish_comp">
							<ul class="blank">
								<li class="wishlist">
									<a class="icon" data-toggle="tooltip" title="Добавить в список желаний" onclick="wishlist.add('<?=$model->variants[0]->id?>');"><i class="fa fa-heart"></i></a>
								</li>
								<li class="compare">
									<a class="icon" data-toggle="tooltip" title="Сравнить этот продукт" onclick="compare.add('<?=$model->variants[0]->id?>');"><i class="fa fa-exchange"></i></a>
								</li>
							</ul>
						</div>
						
				
			
					</div>
			
			
												
												
				
			</div><!-- end box info product -->

            </div>
						</div>
		  </div><!-- end - left-content-product --->


									<section class="col-lg-2 hidden-sm hidden-md hidden-xs slider-products">
											</section>
								</div>

	<?
	$items = [];
	foreach($model['images'] as $img):?>
		<? $items[]['src'] = '/files/products/'.str_replace('.','.600x600.',$img->attributes['filename']); ?>
	<?endforeach;?>



				<script type="text/javascript">
		$(document).ready(function() {
			var zoomCollection = '.large-image img';
			$( zoomCollection ).elevateZoom({
								zoomType        : "inner",
								lensSize    :"200",
				easing:true,

				gallery:'thumb-slider',
				cursor: 'pointer',
				galleryActiveClass: "active"
			});
			$('.large-image').magnificPopup({
				items: <?=json_encode($items);?>,

				gallery: { enabled: true, preload: [0,2] },
				type: 'image',
				mainClass: 'mfp-fade',
				callbacks: {
					open: function() {
												var activeIndex = parseInt($('#thumb-slider .img.active').attr('data-index'));
												var magnificPopup = $.magnificPopup.instance;
						magnificPopup.goTo(activeIndex);
					}
				}
			});

		});

		</script>