<?
use app\models\Blog;
use app\models\Products;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Comments;

?>

<div class="so-spotlight1">
    <div class="container">
        <div class="row">
            <div class="module so-latest-blog latest-blog col-md-4 col-sm-6 col-xs-12">
			<h3 class="modtitle"><span>Последние новости</span></h3>
		<div id="so_latest_blog_143_3938208031465210850" class="so-blog-external button-type2 button-type2">
				<div class="blog-external-simple">


				<?	$dataProvider = new ActiveDataProvider([
					'query' => Blog::find()->where(['visible'=>1])->orderBy('date DESC')->limit(2),
					'pagination' => false,

					]);

					echo ListView::widget([
					'dataProvider' => $dataProvider,
							'summary' => false,
					'itemView' => 'blog-external-simple',
					]);?>

<!--
							<div class="media">
					<div class="item">
		<div class="media-body">
		
						<div class="media-date-added">28<br />
				<span>Mar</span></div>
					<div class="media-content">
						<h4 class="media-heading">
				<a href="index.php@route=simple_blog%252Farticle%252Fview&amp;simple_blog_article_id=8.html" title="Ac tincidunt Suspendisse malesuada" target="_blank">Ac tincidunt Suspendisse malesuada</a>
			</h4>
									<div class="description">
												
Commodo laoreet semper tincidunt lorem Vestibulum nunc at In 
Curabitur magna.....
				</div>
								</div>
	</div>
</div>


				</div>
							<div class="media">
					<div class="item">
		<div class="media-body">
		
						<div class="media-date-added">28<br />
				<span>Mar</span></div>
					<div class="media-content">
						<h4 class="media-heading">
				<a href="index.php@route=simple_blog%252Farticle%252Fview&amp;simple_blog_article_id=7.html" title="Nure caten raverunt lector legere" target="_blank">Nure caten raverunt lector legere</a>
			</h4>
									<div class="description">
												Neque
 porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
.....
				</div>
								</div>
	</div>
</div>


				</div>-->
					</div>
			</div>
	<script type="text/javascript">
		//<![CDATA[
		jQuery(document).ready(function ($) {
			;(function (element) {
				var $element = $(element),
						$extraslider = $(".blog-external", $element),
						_delay = 500,
				_duration = 800,
				_effect = 'starwars';

				this_item = $extraslider.find('div.media');
				this_item.find('div.item:eq(0)').addClass('head-button');
				this_item.find('div.item:eq(0) .media-heading').addClass('head-item');
				this_item.find('div.item:eq(0) .media-left').addClass('so-block');
				this_item.find('div.item:eq(0) .media-content').addClass('so-block');
				$extraslider.on("initialized.owl.carousel2", function () {
					var $item_active = $(".owl2-item.active", $element);
					if ($item_active.length > 1 && _effect != "none") {
						_getAnimate($item_active);
					}
					else {
						var $item = $(".owl2-item", $element);
						$item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});
					}
											if ($(".owl2-dot", $element).length < 2) {
							$(".owl2-prev", $element).css("display", "none");
							$(".owl2-next", $element).css("display", "none");
							$(".owl2-dot", $element).css("display", "none");
						}
					
											$(".owl2-nav", $element).insertBefore($extraslider);
						$(".owl2-controls", $element).insertAfter($extraslider);
					
				});

				$extraslider.owlCarousel2({
					margin: 5,
				slideBy: 1,
				autoplay: 0,
				autoplayHoverPause: 0,
				autoplayTimeout: 0,
				autoplaySpeed: 1000,
				loop: 1,
				startPosition: 0,
				mouseDrag: 1,
				touchDrag: 1,
				autoWidth: false,
						responsive: {
					0: 	{ items: 1 } ,
					480: { items: 1 },
					768: { items: 1 },
					992: { items: 1 },
					1200: {items: 1}
				},
				dotClass: "owl2-dot",
				dotsClass: "owl2-dots",
				dots: true,
				dotsSpeed:500,
				nav: true,
				loop: true,
				navSpeed: 500,
				navText: ["&#139;", "&#155;"],
				navClass: ["owl2-prev", "owl2-next"]

			});

			$extraslider.on("translate.owl.carousel2", function (e) {
									if ($(".owl2-dot", $element).length < 2) {
						$(".owl2-prev", $element).css("display", "none");
						$(".owl2-next", $element).css("display", "none");
						$(".owl2-dot", $element).css("display", "none");
					}
				
				var $item_active = $(".owl2-item.active", $element);
				_UngetAnimate($item_active);
				_getAnimate($item_active);
			});

			$extraslider.on("translated.owl.carousel2", function (e) {

									if ($(".owl2-dot", $element).length < 2) {
						$(".owl2-prev", $element).css("display", "none");
						$(".owl2-next", $element).css("display", "none");
						$(".owl2-dot", $element).css("display", "none");
					}
				
				var $item_active = $(".owl2-item.active", $element);
				var $item = $(".owl2-item", $element);

				_UngetAnimate($item);

				if ($item_active.length > 1 && _effect != "none") {
					_getAnimate($item_active);
				} else {

					$item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});

				}
			});

			function _getAnimate($el) {
				if (_effect == "none") return;
				//if ($.browser.msie && parseInt($.browser.version, 10) <= 9) return;
				$extraslider.removeClass("extra-animate");
				$el.each(function (i) {
					var $_el = $(this);
					$(this).css({
						"-webkit-animation": _effect + " " + _duration + "ms ease both",
						"-moz-animation": _effect + " " + _duration + "ms ease both",
						"-o-animation": _effect + " " + _duration + "ms ease both",
						"animation": _effect + " " + _duration + "ms ease both",
						"-webkit-animation-delay": +i * _delay + "ms",
						"-moz-animation-delay": +i * _delay + "ms",
						"-o-animation-delay": +i * _delay + "ms",
						"animation-delay": +i * _delay + "ms",
						"opacity": 1
					}).animate({
						opacity: 1
					});

					if (i == $el.size() - 1) {
						$extraslider.addClass("extra-animate");
					}
				});
			}

			function _UngetAnimate($el) {
				$el.each(function (i) {
					$(this).css({
						"animation": "",
						"-webkit-animation": "",
						"-moz-animation": "",
						"-o-animation": "",
						"opacity": 0
					});
				});
			}

		})("#so_latest_blog_143_3938208031465210850");
		});
		//]]>
	</script>
</div>

<div class="bestseller col-md-4 col-sm-6 col-xs-12">
		<div class="bestseller-inner">
				
				<div class="row">
						<h3>Популярные</h3>


											<?	$dataProvider = new ActiveDataProvider([
													'query' => Products::find()->where(['visible'=>1])->orderBy('created DESC')->limit(2),
													'pagination' => false,

											]);

											echo ListView::widget([
													'dataProvider' => $dataProvider,
													'summary' => false,
													'itemView' => 'product-thumb-simple',
											]);?>
<!--
					<div class="product-layout ">
											<div class="product-thumb transition">
							<div class="image"><a href="index.php@route=product%252Fproduct&amp;product_id=54.html"><img src="image/cache/catalog/product/15-84x84.png" alt="Ruma huren chuma" title="Ruma huren chuma" class="img-responsive" /></a></div>
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
								<h4><a href="index.php@route=product%252Fproduct&amp;product_id=54.html">Ruma huren chuma</a></h4>
								<div class="description">Anim cillum meatball et, shoulder cow pork belly flank tri-tip pig.  
Occaecat culpa ut sint.  Rump..</div>
								
							                <p class="price">
                                    <span class="price-new">$55.00</span> <span class="price-old">$99.00</span>
                                                    </p>
                							</div>
							<div class="button-group">
								<button type="button" onclick="cart.add('54');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button>
								<button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('54');"><i class="fa fa-heart"></i></button>
								<button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('54');"><i class="fa fa-exchange"></i></button>
							</div>
						</div>
					</div>
										<div class="product-layout ">
						<div class="product-thumb transition">
							<div class="image"><a href="index.php@route=product%252Fproduct&amp;product_id=52.html"><img src="image/cache/catalog/product/6-84x84.png" alt="Phasellus ut vehicula" title="Phasellus ut vehicula" class="img-responsive" /></a></div>
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
								<h4><a href="index.php@route=product%252Fproduct&amp;product_id=52.html">Phasellus ut vehicula</a></h4>
								<div class="description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut l..</div>
								
							                <p class="price">
                                    <span class="price-new">$45.00</span> <span class="price-old">$78.00</span>
                                                    </p>
                							</div>
							<div class="button-group">
								<button type="button" onclick="cart.add('52');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button>
								<button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('52');"><i class="fa fa-heart"></i></button>
								<button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('52');"><i class="fa fa-exchange"></i></button>
							</div>
						</div>
					</div>-->
									</div>
		</div>
</div>

<div class="module testimonial col-md-4 col-sm-12">
    <div class="modcontent clearfix"><div class="clients_say"><div class="block-title"><h3>Благодарности</h3>

</div>



	<?	$dataProvider = new ActiveDataProvider([
			'query' => Comments::find()->where(['approved'=>1])->orderBy('date DESC')->limit(5),
			'pagination' => false,
	]);

	echo ListView::widget([
			'dataProvider' => $dataProvider,
			'summary' => false,
			'itemView' => 'testimonial',
			'options' => [
					'tag'=>'div',
					'class' => 'owl-carousel slider-clients-say'
			],
	]);?>

<!--<div class="owl-carousel slider-clients-say">
<div class="block_content"><div class="image"><img src="../image/catalog/cms/clients_say.png" alt="" width="46" height="46"></div>

<div class="block-info"><div class="text">"Aliquam1 ut tellus dignissim, cursus erat ultricies tellus cursus erat ultricies tellus.. Nulla tempus sollicitudin mauris cursus dictum. Commodo laoreet semper tincidunt lorem. Etiam id diam diam."</div>

<div class="info"><div class="author">Aliquam Tellus</div>

</div>

</div>

</div>

<div class="block_content"><div class="image"><img src="../image/catalog/cms/clients_say.png" alt="" width="46" height="46"></div>

<div class="block-info"><div class="text">"Aliquam1 ut tellus dignissim, cursus erat ultricies tellus cursus erat ultricies tellus.. Nulla tempus sollicitudin mauris cursus dictum. Commodo laoreet semper tincidunt lorem. Etiam id diam diam."</div>

<div class="info"><div class="author">Aliquam Tellus</div>

</div>

</div>

</div>

<div class="block_content"><div class="image"><img src="../image/catalog/cms/clients_say.png" alt="" width="46" height="46"></div>

<div class="block-info"><div class="text">"Aliquam1 ut tellus dignissim, cursus erat ultricies tellus cursus erat ultricies tellus.. Nulla tempus sollicitudin mauris cursus dictum. Commodo laoreet semper tincidunt lorem. Etiam id diam diam."</div>

<div class="info"><div class="author">Aliquam Tellus</div>

</div>

</div>
</div>
</div>-->



</div></div>
 </div>
        </div>
    </div> 
</div>