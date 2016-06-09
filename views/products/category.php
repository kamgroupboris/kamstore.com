<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Products;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категория продуктов';
$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="row">
	<?=$this->render('/products/sidebar-left');?>
            	
    <div id="content" class="col-sm-8 col-md-9 col-xs-12">        <div class="products-category">
									  <div class="row">
													<div class="col-sm-12"><p><img src="image/catalog/category/fashion-cat.png"><br></p></div>
							  </div>
					
				
	  
					<!-- Filters -->
			<div class="product-filter filters-panel">
			  <div class="row">
				<div class="col-md-2 hidden-sm hidden-xs">
					<div class="view-mode">
						<div class="list-view">
							<button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
							<button class="btn btn-default list " data-view="list" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
						</div>
					</div>
				</div>
				<div class="short-by-show form-inline text-right col-md-10 col-xs-12">
					<div class="form-group short-by">
						<label class="control-label" for="input-sort">Sort By:</label>
						<select id="input-sort" class="form-control" onchange="location = this.value;">
						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
						  						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;sort=pd.name&amp;order=ASC">Name (A - Z)</option>
						  						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;sort=pd.name&amp;order=DESC">Name (Z - A)</option>
						  						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
						  						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
						  						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;sort=rating&amp;order=DESC">Rating (Highest)</option>
						  						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;sort=rating&amp;order=ASC">Rating (Lowest)</option>
						  						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;sort=p.model&amp;order=ASC">Model (A - Z)</option>
						  						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;sort=p.model&amp;order=DESC">Model (Z - A)</option>
						  						  						</select>
					</div>

					<div class="form-group">
						<label class="control-label" for="input-limit">Show:</label>
						<select id="input-limit" class="form-control" onchange="location = this.value;">
						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;limit=15" selected="selected">15</option>
						  						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;limit=25">25</option>
						  						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;limit=50">50</option>
						  						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;limit=75">75</option>
						  						  						  						  <option value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25&amp;limit=100">100</option>
						  						  						</select>
					</div>
									</div>
							  </div>
			</div>
			<!-- //end Filters -->
	
		<!--changed listings-->
		
		<div class="products-list row grid">		
 
		
        		
            <?

                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => false,
                    'options' => [
                        'tag'=>'ul',
                        'class' => ''
                    ],
                    'itemOptions' => [
                       'tag'=>false,
                    ],
                    'itemView' => 'product-layout',
                ]);

                ?>
		
        	</div>
	<!--// End Changed listings-->
	
	<!-- Filters -->
	<div class="product-filter product-filter-bottom filters-panel" style="float: left; width: 100%;">
	  <div class="row">
		<div class="col-md-2 hidden-sm hidden-xs">
			<div class="view-mode">
				<div class="list-view">
					<button class="btn btn-default grid active" data-view="grid" ><i class="fa fa-th-large"></i></button>
					<button class="btn btn-default list " data-view="list"><i class="fa fa-th-list"></i></button>
				</div>
			</div>
		</div>
	   <div class="short-by-show text-center col-md-10 col-xs-12">
			<div class="form-group" style="margin: 7px 10px">Showing 1 to 8 of 8 (1 Pages)</div>
					</div>
				
	  </div>
	</div>
	<!-- //end Filters -->

	<!--changed listings-->
    	
	  <!--end content-->
		<script type="text/javascript"><!--
		function display(view) {
			$('.products-list').removeClass('list grid').addClass(view);
			$('.list-view .btn').removeClass('active');
			if(view == 'list') {
				$('.products-list .product-layout').addClass('col-lg-12');
				$('.products-list .product-layout .left-block').addClass('col-md-4');
				$('.products-list .product-layout .right-block').addClass('col-md-8');
				$('.products-list .product-layout .item-desc').removeClass('hidden')
				$('.list-view .' + view).addClass('active');
				$.cookie('display', 'list'); 
			}else{
				$('.products-list .product-layout').removeClass('col-lg-12');
				$('.products-list .product-layout .left-block').removeClass('col-md-4');
				$('.products-list .product-layout .right-block').removeClass('col-md-8');
				$('.products-list .product-layout .item-desc').addClass('hidden');
				$('.list-view .' + view).addClass('active');
				$.cookie('display', 'grid');
			}
		}
		
		$(document).ready(function () {
			// Check if Cookie exists
			if($.cookie('display')){
				view = $.cookie('display');
			}else{
				view = 'grid' ;
			}
			if(view) display(view);
			
			// Click Button
			$('.list-view .btn').each(function() {
				var ua = navigator.userAgent,
				event = (ua.match(/iPad/i)) ? 'touchstart' : 'click';
				$(this).bind(event, function() {
					$(this).addClass(function() {
						if($(this).hasClass('active')) return ''; 
						return 'active';
					});
					$(this).siblings('.btn').removeClass('active');
					$catalog_mode = $(this).data('view');
					display($catalog_mode);
				});
				
			});
		});

		//--></script> 
      		</div>
      </div>
	  
    </div>
