<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppBasic;

AppBasic::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="1" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="1" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="<?= Yii::$app->language ?>">
<!--<![endif]-->
<head>


	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>


	<!--[if gt IE 9]><!-->
	<link rel="stylesheet" type="text/css" href="catalog/view/theme/so-maxshop7/css/ie9-and-up.css" />
	<!--<![endif]-->


					<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

				<style type="text/css">
			body,.about-us .client-say-content .about-title,.about-us .about-title, .about-demo-1 .our-team .about-title,
.article-description,.article-title a{font-family:Open Sans, sans-serif }		</style>



		
</head>

<div class="product-detail">
    <div id="product-quick" class="product-info">
      
        <div class="product-view row">
		  <div class="left-content-product ">
						
                <div class="content-product-left  col-sm-5">
                   
                        <div class="large-image ">
						<?						
						if(isset($model['images'][0])){
							$filename =	str_replace('.','.600x600.',$model['images'][0]->attributes['filename']);
							$img600 = file_exists($filename)?$filename:$filename =	str_replace('.','.200x200.',$model['images'][0]->attributes['filename']);
						}							
						else
							$img600 =	'no-image.jpg';
						?>
                            <img itemprop="image" class="product-image-zoom" src="/files/products/<?=$img600?>" data-zoom-image="/files/products/<?=$img600?>" title="<?=$model->name?>" alt="<?=$model->name?>" />
                        </div>
						
						<!--New Label-->
																							
						<!--Sale Label-->
																					<span class="label label-sale">SALE</span>
													                   
					
                </div>
           
			
						<div class="content-product-right col-sm-7">
				<div class="title-product">
					<h1><?=$model->name?></h1>
				</div>
				
				<!-- Review ---->
								    <div class="box-review">
					   <div class="ratings">
						  <div class="rating-box">
						  						  						  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						  						  						  						  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						  						  						  						  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						  						  						  						  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						  						  						  						  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
						  						  						  </div>
					  </div>
			 
					   <a class="reviews_button" href="" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 review (s)</a> 
				    </div>
								
				                <div class="product-label">
					
					   												<div class="product_page_price price" itemprop="offerDetails" itemscope itemtype="http://data-vocabulary.org/Offer">
							
														<span class="price-new" itemprop="price"><?=$model['variants'][0]->attributes['price']?>₽</span>
							<span class="price-old"><?=$model['variants'][0]->attributes['compare_price']?>₽</span>
														
							
							
													</div>
																<div class="stock"><span>Доступность:</span> <span class="status-stock">В наличии</span></div>

                </div>
                	
			 
								<p class="form-group">
									<?=$model['annotation']?></p>
								
				
								
				
								
				<div class="form-group box-info-product">
					   <div class="option quantity">
							
						  <div class="input-group quantity-control">
							  <label>Кол-во</label>
							  <input class="form-control" type="text" name="quantity" value="1" />
							  <input type="hidden" name="product_id" value="54" />
							  <span class="input-group-addon product_quantity_down">-</span>
							  <span class="input-group-addon product_quantity_up">+</span>
						  </div>
					   </div>
					   						<div class="cart">
							<input type="button" data-toggle="tooltip" title="В корзину" value="В корзину" data-loading-text="Загрузка..." id="button-cart" class="btn btn-mega btn-lg " />
						</div>
						<div class="add-to-links wish_comp">
							<ul class="blank">
								<li class="wishlist">
									<a class="icon" data-toggle="tooltip" title="Добавить в список желаний" onclick="wishlist.add('<?=$model->variants[0]->id?>');"><i class="fa fa-heart"></i></a>
								</li>
								<li class="compare">
									<a class="icon" data-toggle="tooltip" title="Сравнить этот продукт" onclick="compare.add('<?=$model->variants[0]->id?>');"><i class="fa fa-exchange"></i></a>
								</li>
								<li class="detail">
																	<a href="/product/<?=$model->url?>" data-toggle="tooltip" title="Detail" target="_top"  class="icon" ><i class="fa fa-chevron-right"></i> </a>
								</li>
							</ul>
						</div>
						
					</div>
			
            </div>
					  </div><!-- end - left-content-product --->

		</div>

	
    </div>
</div>


<script type="text/javascript"><!--
$('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
	$.ajax({
		url: '/product/getRecurringDescription',
		type: 'post',
		data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
		dataType: 'json',
		beforeSend: function() {
			$('#recurring-description').html('');
		},
		success: function(json) {
			$('.alert, .text-danger').remove();
			
			if (json['success']) {
				$('#recurring-description').html(json['success']);
			}
		}
	});
});
//--></script> 

<script type="text/javascript"><!--
$('#button-cart').on('click', function() {
	$.ajax({
		url: '/cart/add',
		type: 'post',
		data: $('#product-quick input[type=\'text\'], #product-quick input[type=\'hidden\'], #product-quick input[type=\'radio\']:checked, #product-quick input[type=\'checkbox\']:checked, #product-quick select, #product-quick textarea'),
		dataType: 'json',
		beforeSend: function() {
			$('#button-cart').button('loading');
		},
		complete: function() {
			$('#button-cart').button('reset');
		},
		success: function(json) {
			
			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						var element = $('#input-option' + i.replace('_', '-'));
						
						if (element.parent().hasClass('input-group')) {
							element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
						} else {
							element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
						}
					}
				}
				
				if (json['error']['recurring']) {
					$('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
				}
				
				// Highlight any found errors
				$('.text-danger').parent().addClass('has-error');
			}
			
			if (json['success']) {
				if (!parent.addProductNotice(json['title'], json['thumb'], json['success'], 'success')) {
                    $('.breadcrumb').after('<div class="alert alert-success success">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                }
				
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					parent.$('#cart .text-shopping-cart').html(json['total'] );
					$('.text-danger').remove();
				}, 100);
				parent.$('#cart > ul').load('/cart/info ul li');
			}
			
		}
	});
});
//--></script> 
<script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});

$('.datetime').datetimepicker({
	pickDate: true,
	pickTime: true
});

$('.time').datetimepicker({
	pickDate: false
});

$('button[id^=\'button-upload\']').on('click', function() {
	var node = this;
	
	$('#form-upload').remove();
	
	$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');
	
	$('#form-upload input[name=\'file\']').trigger('click');
    if (typeof timer != 'undefined') {
        clearInterval(timer);
    }
	timer = setInterval(function() {
		if ($('#form-upload input[name=\'file\']').val() != '') {
			clearInterval(timer);
			
			$.ajax({
				url: 'index.php?route=tool/upload',
				type: 'post',
				dataType: 'json',
				data: new FormData($('#form-upload')[0]),
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(node).button('loading');
				},
				complete: function() {
					$(node).button('reset');
				},
				success: function(json) {
					$('.text-danger').remove();
					
					if (json['error']) {
						$(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
					}
					
					if (json['success']) {
						alert(json['success']);
						
						$(node).parent().find('input').attr('value', json['code']);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}, 500);
});
//--></script> 


