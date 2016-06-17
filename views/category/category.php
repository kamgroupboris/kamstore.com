<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\Products;
use yii\widgets\Pjax;
use yii\helpers\Url;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категория продуктов';
$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="row">
	<?=$this->render('/products/sidebar-left');?>
            	
    <div id="content" class="col-sm-8 col-md-9 col-xs-12">        <div class="products-category">
									  <div class="row">
													<div class="col-sm-12"><p><img src="/image/catalog/category/fashion-cat.png"><br></p></div>
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
						<label class="control-label" for="input-sort">Сортировка:</label>

						<!--<select id="input-sort" class="form-control" onchange="location = this.value;">
							  <option value="/product/category&path=25&sort=p.sort_order&order=ASC" selected="selected"></option>
							  <option value="/product/category&path=25&sort=pd.name&order=ASC">Name (A - Z)</option>
							  <option value="/product/category&path=25&sort=pd.name&order=DESC">Name (Z - A)</option>
							  <option value="/product/category&path=25&sort=p.price&order=ASC">Price (Low &gt; High)</option>
							  <option value="/product/category&path=25&sort=p.price&order=DESC">Price (High &gt; Low)</option>
							  <option value="/product/category&path=25&sort=rating&order=DESC">Rating (Highest)</option>
							  <option value="/product/category&path=25&sort=rating&order=ASC">Rating (Lowest)</option>
							  <option value="/product/category&path=25&sort=p.model&order=ASC">Model (A - Z)</option>
							  <option value="/product/category&path=25&sort=p.model&order=DESC">Model (Z - A)</option>
							</select>-->

						<?
						//$items = ArrayHelper::map(Categories::find()->all(), 'id', 'name');
						//array_unshift($items, "Все категории");
						$items	= [
								'sort=name&order=ASC' => 'Имени (по возрастанию)',
								'sort=name&order=DESC' => 'Имени (по убыванию)',
								'sort=price&order=ASC' => 'Цене (по возрастанию)',
								'sort=price&order=DESC' => 'Цене (по убыванию)',
						//		'path=25&sort=rating&order=ASC'=>'Рейтингу (по возрастанию)',
								'sort=variant&order=ASC'=>'Модели (по возрастанию)',
								'sort=variant&order=ASC'=>'Модели (по убыванию)',
						];
						echo Html::dropDownList('category_id',null,$items, ['class'=>'form-control', 'id'=>'input-sort']);
						?>

				<?
/*
				$data	= [
						'path=25&sort=name&order=ASC' => 'Имени (по возрастанию)',
						'path=25&sort=price&order=ASC' => 'Цене (по возрастанию)',
						'path=25&sort=rating&order=ASC'=>'Рейтингу (по возрастанию)',
						'path=25&sort=model&order=ASC'=>'Модели (по возрастанию)',
				];
				echo Select2::widget([
						'name' => 'category',
						'attribute' => 'state_2',
						'data' => $data,
						'options' => ['placeholder' => 'Select a state ...'],
						'pluginOptions' => [
						'allowClear' => true
						],
						]);
				*/
				?>
					</div>

					<div class="form-group">
						<label class="control-label" for="input-limit">Показывать:</label>
					<!--	<select id="input-limit" class="form-control" onchange="location = this.value;">
						  <option value="/product/category&path=25&limit=15" selected="selected">15</option>
						  <option value="/product/category&path=25&limit=25">25</option>
						  <option value="/product/category&path=25&limit=50">50</option>
						  <option value="/product/category&path=25&limit=75">75</option>
						  <option value="/product/category&path=25&limit=100">100</option>
						</select>-->
						<?php
						//$items = ArrayHelper::map(Categories::find()->all(), 'id', 'name');
						//array_unshift($items, "Все категории");
						$items	= [
								'path=15' => '15',
								'path=25' => '25',
								'path=50'=>'50',
								'path=75'=>'75',
								'path=100'=>'100',
						];
						echo Html::dropDownList('category_id',null,$items, ['class'=>'form-control', 'id'=>'input-limit']);
						?>

					</div>
									</div>
							  </div>
			</div>
			<!-- //end Filters -->
	
		<!--changed listings-->
			<?php Pjax::begin([
					'id'=>'variants-pjax',
					'enableReplaceState'=>false,
					'enablePushState'=>false,
					'clientOptions'=>[
							'container'=>'x8',
					]
			]); ?>
		
		<div class="products-list row grid">		
 
		
        		
            <?

                echo ListView::widget([
                    'dataProvider' => $dataProvider,
				//	'layout' => '{summary}{items}{pager}',
				//		'filterPosition' => FILTER_POS_FOOTER,
                //    'summary' => false,
                    'options' => [
                        'tag'=>'ul',
                        'class' => ''
                    ],
                    'itemOptions' => [
                 //      'tag'=>false,
                    ],
                    'itemView' => 'product-layout',
                ]);

                ?>
		
        	</div>
			<?Pjax::end();?>
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
			<!--<div class="form-group" style="margin: 7px 10px">Показано 1 to 8 of 8 (1 страниц)</div>
					</div>-->
				
	  </div>
	</div>
	<!-- //end Filters -->

		<script>
			$(document).ready(function() {
				$("#input-sort").change( function() {
					$.pjax.reload({container:"#variants-pjax",
								type:'get',
								url: '<?=Url::to(['categories/sort','action'=> 'create' ])?>',
							data: $(this).val(),
							replaceRedirect:false,
							replace    : false}).success(function(){$('.products-list .product-layout .item-desc').addClass('hidden')});  //Reload GridView
				});


				$("#input-limit").change( function() {
					$.pjax.reload({container:"#variants-pjax",
						type:'get',
						url: '<?=Url::to(['categories/sort','action'=> 'create' ])?>',
						data: $(this).val()+$("#input-sort").val(),
						replaceRedirect:false,
						replace    : false}).success(function(){$('.products-list .product-layout .item-desc').addClass('hidden')});  //Reload GridView
				});




			});

		</script>


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
