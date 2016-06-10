<?
	use yii\widgets\ListView;
	use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
	use app\models\Products;
    use app\models\ProductsCategories;

use yii\widgets\Menu;
use app\models\Categories;
?>

<div id="so_category_slider_<?=$model->id?>" class="container-slider module  item<?=$model->id<3?$model->id:3?>"  >
		<div class="page-top">
		<h3 class="modtitle">
				<span><?=$model->name?></span>
		</h3>
		
	</div>
						
	<div class="categoryslider-content products-list grid show  preset01-4 preset02-3 preset03-2 preset04-2 preset05-1">
					<div class="item-sub-cat">


						<?
						$items = Categories::find()->select(['label'=>'name','url'])->where(['parent_id'=>$model->id])->asArray()->all();
						foreach($items as $k=> $it){
							$items[$k]['url'] = '/category/'.$it['url'];
						}
						?>

						<?= Menu::widget([
								'items' => $items,
						]);
						?>


			</div>
						
			
					
									
						
						            <?
/*
                $dataProvider = new ActiveDataProvider([
                    'query' => ProductsCategories::find()->with('products')->limit(10),
                    'pagination' => false,
                ]);
*/


									$dataProvider = new SqlDataProvider([
											'sql' => 'SELECT
s_products.url,
s_products.brand_id,
s_products.`name`,
s_variants.price,
s_variants.compare_price,
s_variants.position,
s_variants.product_id,
s_products.meta_description,
s_products.annotation,
s_variants.id variant_id,
s_products.id
FROM
s_products
INNER JOIN s_products_categories ON s_products_categories.product_id = s_products.id
INNER JOIN s_variants ON s_variants.product_id = s_products.id
WHERE
s_products.visible = 1  AND
s_products_categories.category_id = :id
GROUP BY s_variants.product_id
',
											'params' => [':id' => $model->id],
											'pagination' => false,
									]);


                    echo ListView::widget([
                        'dataProvider' => $dataProvider,
                        'summary' => false,

                        'options' => [
                            'tag'=>'div',
                            'class' => 'slider so-category-slider not-js product-layout'
                        ],
                        'itemOptions' => [
                           'tag'=>false,
                        ],
                        'itemView' => 'product-item',
                    ]);

        ?>
						
						
				

			
	</div>
</div>


<script type="text/javascript">
	//<![CDATA[
	jQuery(document).ready(function ($) {
		;(function (element) {
			var id = $("#so_category_slider_187");
			var $element = $(element),
					$extraslider = $(".slider", $element),
					_delay = 500,
			_duration = 800,
			_effect = 'none',
					total_item = 6;

			$extraslider.on("initialized.owl.carousel2", function () {
				var $item_active = $(".owl2-item.active", $element);
				if ($item_active.length > 1 && _effect != "none") {
					_getAnimate($item_active);
				}
				else {
					var $item = $(".owl2-item", $element);
					$item.css({"opacity": 1, "filter": "alpha(opacity = 100)"});
				}
				var $navpage = $(".page-top .page-title-categoryslider span", id);
				$(".owl2-controls", id).insertAfter($navpage);
				$(".owl2-dot", id).css("display", "none");

			});

			$extraslider.owlCarousel2({
				margin: 5,
			slideBy: 4,
			autoplay: 0,
			autoplayHoverPause: 0,
			autoplayTimeout: 0,
			autoplaySpeed: 1000,
			startPosition: 0,
			mouseDrag: 0,
			touchDrag: 0,
			autoWidth: false,
					responsive: {
				0:{	items: 1,
					nav: total_item <= 1 ? false : ((true) ? true: false),
				},
				480:{ items: 2,
					nav: total_item <= 2 ? false : ((true) ? true: false),
				},
				768:{ items: 4,
					nav: total_item <= 4 ? false : ((true) ? true: false),
				},
				992:{ items: 4,
					nav: total_item <= 4 ? false : ((true) ? true: false),
				},
				1200:{ items: 4,
					nav: total_item <= 4 ? false : ((true) ? true: false),
				}
			},

			nav: true,
			loop: true,
					navSpeed: 500,
			navText: ["&#139;", "&#155;"],
					navClass: ["owl2-prev", "owl2-next"]

		});

		$extraslider.on("translate.owl.carousel2", function (e) {

			var $item_active = $(".owl2-item.active", $element);
			_UngetAnimate($item_active);
			_getAnimate($item_active);
		});

		$extraslider.on("translated.owl.carousel2", function (e) {


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
					"opacity": 1
				});
			});
		}

	})("#so_category_slider_<?=$model->id?>");
	});
	//]]>
</script>