<?
	use yii\web\View;
//	$this->title = $model->title;
	$this->params['breadcrumbs'][] = $model->name;
?>
	<div class="row">
                	
    <div id="content" class="col-sm-12">
		
       	<?=$this->render('/products/product-view',[
			'model'=>$model
		]);?>
				
		<div class="bototm-detail col-xs-12">
		    <div class="row">
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">										
					<!-- Products widgets desktop-->
					<?=$this->render('/products/products-list',[
							'model'=>$model->relatedProducts
					]);?>
				</div> <!-- End related -->
										
				<div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">

					<div class="producttab ">

					<?=$this->render('/products/product-tab',[
						'model'=>$model
					]);?>

					<?=$this->render('/products/up-sell');?>

				</div>


				</div><!-- End tabs -->
		    </div>
		</div>


    </div>
	</div>



<script type="text/javascript"><!--
$('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
	$.ajax({
		url: 'index.php?route=product/product/getRecurringDescription',
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
		data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
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
				 addProductNotice(json['title'], json['thumb'], json['success'], 'success');
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
						$('#cart  .text-shopping-cart').html(json['text_items_full'] );
						$('.text-danger').remove();
					}, 100);
					$('#cart > ul').load('/cart/info');
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
<script type="text/javascript"><!--
$('#review').delegate('.pagination a', 'click', function(e) {
  e.preventDefault();

    $('#review').fadeOut('slow');
    $('#review').load(this.href);
    $('#review').fadeIn('slow');
});

//$('#review').load('index.php?route=product/product/review&product_id=48');

$('#button-review').on('click', function() {
	$.ajax({
		url: 'index.php?route=product/product/write&product_id=48',
		type: 'post',
		dataType: 'json',
		data: 'name=' + encodeURIComponent($('input[name=\'name\']').val()) + '&text=' + encodeURIComponent($('textarea[name=\'text\']').val()) + '&rating=' + encodeURIComponent($('input[name=\'rating\']:checked').val() ? $('input[name=\'rating\']:checked').val() : ''),
		beforeSend: function() {
			$('#button-review').button('loading');
		},
		complete: function() {
			$('#button-review').button('reset');
		},
		success: function(json) {
			$('.alert-success, .alert-danger').remove();
			
			if (json['error']) {
				$('#review').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
			}
			
			if (json['success']) {
				$('#review').after('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');
				
				$('input[name=\'name\']').val('');
				$('textarea[name=\'text\']').val('');
				$('input[name=\'rating\']:checked').prop('checked', false);
			}
		}
	});
});

//--></script> 


<script type="text/javascript"><!--
	$(document).ready(function() {
		
		$('.product-options li').click(function(){
			$(this).addClass(function() {
				if($(this).hasClass("active")) return "";
				return "active";
			});
			
			$(this).siblings("li").removeClass("active");
			$('.product-options .selected-option').html('<span class="label label-success">'+ $(this).find('img').data('original-title') +'</span>');
		})
		
		//Call JQuery lightSlider Settings
		var thumbslider = $(".thumb-vertical-outer .thumb-vertical").lightSlider({
			item: 4,
			autoWidth: false,
			vertical:true,
			slideMargin: 0,
			verticalHeight:420,
            pager: false,
			controls: false,
            prevHtml: '<i class="fa fa-angle-up"></i>',
            nextHtml: '<i class="fa fa-angle-down"></i>',
			responsive: [
				{
					breakpoint: 1199,
					settings: {
						verticalHeight: 312,
						item: 3,
					}
				},
				{
					breakpoint: 1024,
					settings: {
						verticalHeight: 500,
						item: 4,
					}
				},
				{
					breakpoint: 768,
					settings: {
						verticalHeight: 360,
						item: 3,
					}
				}
			]
        });
		
		//Call JQuery lightSlider - Go to previous slide
		if(6 >= 4){
			$('#thumb-slider-prev').click(function(){
				thumbslider.goToPrevSlide();
			});
			$('#thumb-slider-next').click(function(){
				thumbslider.goToNextSlide();
			});
		}else{
			$('#thumb-slider .slider-btn').hide();
		}
		
		
		$("#thumb-slider .owl2-item").each(function() {
			$(this).find("[data-index='0']").addClass('active');
		});
		
		$('.thumb-video').magnificPopup({
		  type: 'iframe',
		  iframe: {
			patterns: {
			   youtube: {
				  index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
				  id: 'v=', // String that splits URL in a two parts, second part should be %id%
				  src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe. 
					},
				}
			}
		});
	});
	
//--></script>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/so-maxshop7/js/lightslider/lightslider.css" media="screen">
<script type="text/javascript" src="catalog/view/theme/so-maxshop7/js/lightslider/lightslider.js"></script>