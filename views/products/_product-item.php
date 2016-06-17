					<div class="product-item">
				      <div class="media">
						 <div class="media-left product-image-container  ">
							 <?
							 if(isset($model['images'][0])){
								 $filename =	str_replace('.','.600x600.',$model['images'][0]->attributes['filename']);
								 $img600 = file_exists($filename)?$filename:$filename =	str_replace('.','.200x200.',$model['images'][0]->attributes['filename']);
							 }
							 else
								 $img600 =	'no-image.jpg';
							 ?>
							      <img src="/files/products/<?=$img600?>" alt="<?=$model->name?>" title="<?=$model->name?>" class="<?=$model->name?>" />
							      						      
						 <!--- New ------->
						      						 
						  <!------SALE ---------->
						  						 
						 
						      							      <!--full quick view block-->
								      								      <a class="quickview iframe-link " data-fancybox-type="iframe"  href="/product/<?=$model->id?>">  Быстрый просмотр</a>
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
						 						<h4><a class="preview-image" href="/product/<?=$model->url?>"><?= $model->name ?></a></h4>
												<div class="price">
						       <span class="price-new"><?=$model['variants'][0]->attributes['price']?>₽</span>
								</div>
					</div>
					 <div class="button-group">
						<button class="addToCart" type="button" onclick="cart.add('<?=$model->variants[0]->id?>');"><i class="fa fa-shopping-cart"></i> <span>Добавить в корзину</span></button>
						<button class="wishlist" type="button" data-toggle="tooltip" title="Добавить в список желаний" onclick="wishlist.add('<?=$model->variants[0]->id?>');"><i class="fa fa-heart"></i></button>
						<button class="compare" type="button" data-toggle="tooltip" title="Сравнить этот продукт" onclick="compare.add('<?=$model->variants[0]->id?>');"><i class="fa fa-exchange"></i></button>
					 </div>
				      </div>
				 </div>
			    </div>