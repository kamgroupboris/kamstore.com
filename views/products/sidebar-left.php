<?
use yii\widgets\Menu;
use app\models\Categories;
?>

	<aside class="col-md-3 col-sm-4 content-aside left_column">
			<div class="module block_category">
	<h3 class="modtitle"><span>Категории</span></h3>
	<div class="modcontent box-content">

		<?
			$items = Categories::find()->select(['label'=>'name','url'])->asArray()->all();
			foreach($items as $k=> $it){
				$items[$k]['url'] = '/category/'.$it['url'];
			}
		?>

		<?= Menu::widget([
				'items' => $items,
		]);
		?>

	</div>
</div>
<script type="text/javascript">
	
	$(document).ready(function(){
		$('span.button-view').click(function() {
		if ($(this).hasClass('ttopen')) {varche = true} else {varche = false};
		if(varche == false){
			$(this).addClass("ttopen");
			$(this).removeClass("ttclose");
			$(this).parent().find('ul').slideDown();
			varche = true;
		} else 
		{	
			$(this).removeClass("ttopen");
			$(this).addClass("ttclose");
			$(this).parent().find('ul').slideUp();
			varche = false;
		}
		});
	});
	
</script>
		<?=$this->render('/products/best-seller');?>
			
		<div class="module banner-left">
			<div class="modcontent clearfix"><div class="static-image-home-left">
					<a title="Static Image" href="index.html#">
						<img src="/image/catalog/cms/left-image-static.png" alt="Static Image">
					</a>
				</div>
			</div>
		 </div>
	</aside>