<?
use app\models\Categories;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>

		<div class="header-bottom">
			<div class="container">
				<div class="row">
						
								<!-- Main menu -->
						<div class="header-bottom-menu col-md-8 col-xs-3">								 
							<div class="responsive so-megamenu">
									<?=$this->render('/site/navbar');?>	
							</div>
								<!-- //end Navbar -->
						</div>
						<!-- Search -->
														<div class="header_search col-md-4 col-xs-9 ">
							<div id="sosearchpro" class="sosearchpro-wrapper so-search compact-hidden">
		<form method="GET" action="#">
	<div id="search0" class="search input-group">
	    		<div class="select_category filter_type  icon-select">

					<?php
					$items = ArrayHelper::map(Categories::find()->all(), 'id', 'name');
				echo	Html::dropDownList('category_id',null,$items, ['class'=>'no-border']);

					?>
			<!--<select class="no-border" name="category_id">
				<option value="0">All Categories</option>
						        		        <option value="78">Apparel</option>
		        							        		        		        <option value="77">Cables &amp; Connectors</option>
		        							        		        		        <option value="82">Cameras &amp; Photo</option>
		        							        		        		        <option value="80">Flashlights &amp; Lamps</option>
		        							        		        		        <option value="81">Mobile Accessories</option>
		        							        		        		        <option value="79">Video Games</option>
		        							        		        		        <option value="20">Mobiles &amp; Tablets</option>
		        															<option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Earings</option>
																
															<option value="83">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monitor</option>
																
															<option value="86">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Refrigerator</option>
																
															<option value="85">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Washing machine</option>
																
															<option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wedding Rings</option>
																
															<option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men Watches</option>
																
							        		        		        <option value="18">Electronics</option>
		        															<option value="89">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hixeg misgu vocabu</option>
																
															<option value="46">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Smartphone</option>
																
															<option value="45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tablet</option>
																
															<option value="91">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ttis maseis igme</option>
																
															<option value="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Memory Card</option>
																
															<option value="32">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile Accessories</option>
																
							        		        		        <option value="25">Computer</option>
		        															<option value="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Camping &amp; Hiking</option>
																
															<option value="92">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lostete solites </option>
																
															<option value="94">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Voliste mesite</option>
																
															<option value="31">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fishing</option>
																
															<option value="29">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Golf Supplies</option>
																
															<option value="28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Outdoor &amp; Traveling</option>
																
							        		        		        <option value="57">Toys &amp; Hobbies</option>
		        															<option value="73">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FPV System &amp; Parts</option>
																
															<option value="75">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Helicopters &amp; Parts</option>
																
															<option value="74">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RC Cars &amp; Parts</option>
																
															<option value="72">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Walkera</option>
																
							        		        		        <option value="17">Bags, Holiday Supplies</option>
		        															<option value="68">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gift &amp; Lifestyle Gadgets</option>
																
															<option value="70">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gift for Woman</option>
																
															<option value="71">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lighter &amp; Cigar Supplies</option>
																
							        		        		        <option value="24">Health &amp; Beauty</option>
		        															<option value="64">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bath &amp; Body</option>
																
															<option value="66">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fragrances</option>
																
															<option value="67">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Salon &amp; Spa Equipment</option>
																
															<option value="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shaving &amp; Hair Removal</option>
																
							        		        		        <option value="33">Automotive</option>
		        															<option value="61">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Car Alarms and Security</option>
																
															<option value="62">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Car Audio &amp; Speakers</option>
																
															<option value="63">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gadgets &amp; Auto Parts</option>
																
															<option value="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;More Car Accessories</option>
																
							        		        		        <option value="34">Smartphone &amp; Tablets</option>
		        															<option value="44">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accessories for i Pad</option>
																
															<option value="43">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accessories for iPhone</option>
																
															<option value="47">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accessories for Tablet PC</option>
																
							        			</select>-->
		</div>
			
	    <input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Поиск" name="search">
	    <span class="input-group-btn">
			<button type="submit" class="button-search btn btn-default btn-lg" name="submit_search"><i class="fa fa-search"></i></button>
		</span>
	</div>
	

	
	<input type="hidden" name="route" value="product/search"/>
	</form>
</div>
<script type="text/javascript">
// Autocomplete */
(function($) {
	$.fn.Soautocomplete = function(option) {
		return this.each(function() {
			this.timer = null;
			this.items = new Array();
	
			$.extend(this, option);
	
			$(this).attr('autocomplete', 'off');
			
			// Focus
			$(this).on('focus', function() {
				this.request();
			});
			
			// Blur
			$(this).on('blur', function() {
				setTimeout(function(object) {
					(typeof object !== 'undefined') ? object.hide() : '';
				}, 200, this);				
			});
			
			// Keydown
			$(this).on('keydown', function(event) {
				switch(event.keyCode) {
					case 27: // escape
						this.hide();
						break;
					default:
						this.request();
						break;
				}				
			});
			
			// Click
			this.click = function(event) {
				event.preventDefault();
	
				value = $(event.target).parent().attr('data-value');
	
				if (value && this.items[value]) {
					this.select(this.items[value]);
				}
			}
			
			// Show
			this.show = function() {
				var pos = $(this).position();
	
				$(this).siblings('ul.dropdown-menu').css({
					top: pos.top + $(this).outerHeight(),
					left: pos.left
				});
	
				$(this).siblings('ul.dropdown-menu').show();
			}
			
			// Hide
			this.hide = function() {
				$(this).siblings('ul.dropdown-menu').hide();
			}		
			
			// Request
			this.request = function() {
				clearTimeout(this.timer);
				
				this.timer = setTimeout(function(object) {
					(typeof object !== 'undefined') ? object.source($(object).val(), $.proxy(object.response, object)) : '';
				}, 200, this);
			}
			
			// Response
			this.response = function(json) {
				html = '';
	
				if (json.length) {
					for (i = 0; i < json.length; i++) {
						this.items[json[i]['value']] = json[i];
					}
	
					for (i = 0; i < json.length; i++) {
						if (!json[i]['category']) {
						html += '<li class="media" data-value="' + json[i]['value'] + '">';
						if(json[i]['image'] && json[i]['show_image'] && json[i]['show_image'] == 1 ) {
							html += '	<a class="media-left pull-left" href="/'&#32;+&#32;json[i]['link']&#32;+&#32;'.html"><img class="pull-left" src="'&#32;+&#32;json[i]['image']&#32;+&#32;'.html"></a>';	
						}
						
						html += '<div class="media-body">';	
						html += '<a href="/'&#32;+&#32;json[i]['link']&#32;+&#32;'.html"><span>' + json[i]['label'] + '</span></a>';
						if(json[i]['price'] && json[i]['show_price'] && json[i]['show_price'] == 1){
							html += '	<div class="price">';
							if (!json[i]['special']) {
								html += '<span class="price">Price : '+json[i]['price']+'</span>';;
							} else {
								html += '<span class="price-old">' + json[i]['price'] + '</span><span class="price-new">' + json[i]['special'] + '</span>';
							}
							if (json[i]['tax']) {
								html += '<br />';
								html += '<span class="price-tax">Tax : ' + json[i]['tax'] + '</span>';
							}
							html += '	</div>';
						}

						if(json[i]['show_addtocart'] || json[i]['show_addtowishlist'] || json[i]['show_addtocompare'] ){
							html += '<div class="button-group">';
							if(json[i]['show_addtocart'])
								html += '<button type="button" onclick="cart.add(' + json[i]['value'] + ',' + json[i]['minimum'] + ');"><span class="hidden-xs hidden-sm hidden-md">Add to Cart</span> <i class="fa fa-shopping-cart"></i></button>';
							if(json[i]['show_addtowishlist'])
								html += '<button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add(' + json[i]['value'] + ');"><i class="fa fa-heart"></i></button>';
							if(json[i]['show_addtocompare'])
								html += '<button type="button" data-toggle="tooltip" title="Add to Compare" onclick="compare.add(' + json[i]['value'] + ');"><i class="fa fa-exchange"></i></button>';
							html += '</div>';
						}
						html += '</div></li>';
						html += '<li class="clearfix"></li>';
						}
					}
	
					// Get all the ones with a categories
					var category = new Array();
	
					for (i = 0; i < json.length; i++) {
						if (json[i]['category']) {
							if (!category[json[i]['category']]) {
								category[json[i]['category']] = new Array();
								category[json[i]['category']]['name'] = json[i]['category'];
								category[json[i]['category']]['item'] = new Array();
							}
	
							category[json[i]['category']]['item'].push(json[i]);
						}
					}
	
					for (i in category) {
						html += '<li class="dropdown-header">' + category[i]['name'] + '</li>';
	
						for (j = 0; j < category[i]['item'].length; j++) {
							html += '<li data-value="' + category[i]['item'][j]['value'] + '"><a href="/index.html#">&nbsp;&nbsp;&nbsp;' + category[i]['item'][j]['label'] + '</a></li>';
						}
					}
				}
	
				if (html) {
					this.show();
				} else {
					this.hide();
				}
	
				$(this).siblings('ul.dropdown-menu').html(html);
			}
			
			$(this).after('<ul class="dropdown-menu"></ul>');
			
		});
	}
})(window.jQuery);

$(document).ready(function() {
	var selector = '#search0';
	var total = 0;
	var showimage = 1;
	var showprice = 1;
	var character = 3;
	var height = 60;
	var width = 60;
	

	$(selector).find('input[name=\'search\']').Soautocomplete({
		delay: 500,
		source: function(request, response) {
			var category_id = $(".select_category select[name=\"category_id\"]").first().val();
			if(typeof(category_id) == 'undefined')
				category_id = 0;
			var limit = 5;
			if(request.length >= character){
				$.ajax({
					url: 'index.php?route=module/so_searchpro/autocomplete&filter_category_id='+category_id+'&limit='+limit+'&width='+width+'&height='+height+'&filter_name='+encodeURIComponent(request),
					dataType: 'json',
					success: function(json) {		
						response($.map(json, function(item) {
							total = 0;
							if(item.total){
								total = item.total;
							}
							
							return {
								price:   item.price,
								special: item.special,
								tax:     item.tax,
								label:   item.name,
								image:   item.image,
								link:    item.link,
								minimum:    item.minimum,
								show_price:  showprice,
								show_image:  showimage,	
								value:   item.product_id,
							}
						}));
					}
				});
			}	
		},
	});
});

</script>

							</div>
						
				</div>
			</div>
		  
		</div>