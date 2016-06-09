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
		/*[

				['label' => 'Home', 'url' => ['site/index']],
				['label' => 'Products', 'url' => ['product/index'], 'items' => [
						['label' => 'New Arrivals', 'url' => ['product/index', 'tag' => 'new']],
						['label' => 'Most Popular', 'url' => ['product/index', 'tag' => 'popular']],
				]],
				['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
		],*/
]);
?>

	<!--	<ul class="list-group">
		  		  		  <li  class="hadchild" >
		  <a href="index.php@route=product%252Fcategory&amp;path=34.html" class="list-group-item "><span>Smartphone &amp; Tablets</span></a>
		  		  <span class="button-view  ttclose  ">view</span>
		  <ul  style="display: none;" >
		  							<li><a href="index.php@route=product%252Fcategory&amp;path=34_44.html" class="list-group-item"><span> Accessories for i Pad</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=34_43.html" class="list-group-item"><span> Accessories for iPhone</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=34_47.html" class="list-group-item"><span> Accessories for Tablet PC</span></a></li>
					  		  </ul>
		  		  </li>
		  		  <li  class="hadchild" >
		  <a href="index.php@route=product%252Fcategory&amp;path=33.html" class="list-group-item "><span>Automotive</span></a>
		  		  <span class="button-view  ttclose  ">view</span>
		  <ul  style="display: none;" >
		  							<li><a href="index.php@route=product%252Fcategory&amp;path=33_61.html" class="list-group-item"><span> Car Alarms and Security</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=33_62.html" class="list-group-item"><span> Car Audio &amp; Speakers</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=33_63.html" class="list-group-item"><span> Gadgets &amp; Auto Parts</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=33_60.html" class="list-group-item"><span> More Car Accessories</span></a></li>
					  		  </ul>
		  		  </li>
		  		  <li  class="hadchild" >
		  <a href="index.php@route=product%252Fcategory&amp;path=24.html" class="list-group-item "><span>Health &amp; Beauty</span></a>
		  		  <span class="button-view  ttclose  ">view</span>
		  <ul  style="display: none;" >
		  							<li><a href="index.php@route=product%252Fcategory&amp;path=24_64.html" class="list-group-item"><span> Bath &amp; Body</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=24_66.html" class="list-group-item"><span> Fragrances</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=24_67.html" class="list-group-item"><span> Salon &amp; Spa Equipment</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=24_65.html" class="list-group-item"><span> Shaving &amp; Hair Removal</span></a></li>
					  		  </ul>
		  		  </li>
		  		  <li  class="hadchild" >
		  <a href="index.php@route=product%252Fcategory&amp;path=17.html" class="list-group-item "><span>Bags, Holiday Supplies</span></a>
		  		  <span class="button-view  ttclose  ">view</span>
		  <ul  style="display: none;" >
		  							<li><a href="index.php@route=product%252Fcategory&amp;path=17_68.html" class="list-group-item"><span> Gift &amp; Lifestyle Gadgets</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=17_70.html" class="list-group-item"><span> Gift for Woman</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=17_71.html" class="list-group-item"><span> Lighter &amp; Cigar Supplies</span></a></li>
					  		  </ul>
		  		  </li>
		  		  <li  class="hadchild" >
		  <a href="index.php@route=product%252Fcategory&amp;path=57.html" class="list-group-item "><span>Toys &amp; Hobbies</span></a>
		  		  <span class="button-view  ttclose  ">view</span>
		  <ul  style="display: none;" >
		  							<li><a href="index.php@route=product%252Fcategory&amp;path=57_73.html" class="list-group-item"><span> FPV System &amp; Parts</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=57_75.html" class="list-group-item"><span> Helicopters &amp; Parts</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=57_74.html" class="list-group-item"><span> RC Cars &amp; Parts</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=57_72.html" class="list-group-item"><span> Walkera</span></a></li>
					  		  </ul>
		  		  </li>
		  		  <li  class="hadchild" >
		  <a href="index.php@route=product%252Fcategory&amp;path=25.html" class="list-group-item  active "><span>Computer</span></a>
		  		  <span class="button-view  ttopen  ">view</span>
		  <ul   style="display: block;"  >
		  							<li><a href="index.php@route=product%252Fcategory&amp;path=25_35.html" class="list-group-item"><span> Camping &amp; Hiking</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=25_92.html" class="list-group-item"><span> Lostete solites </span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=25_94.html" class="list-group-item"><span> Voliste mesite</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=25_31.html" class="list-group-item"><span> Fishing</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=25_29.html" class="list-group-item"><span> Golf Supplies</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=25_28.html" class="list-group-item"><span> Outdoor &amp; Traveling</span></a></li>
					  		  </ul>
		  		  </li>
		  		  <li  class="hadchild" >
		  <a href="index.php@route=product%252Fcategory&amp;path=18.html" class="list-group-item "><span>Electronics</span></a>
		  		  <span class="button-view  ttclose  ">view</span>
		  <ul  style="display: none;" >
		  							<li><a href="index.php@route=product%252Fcategory&amp;path=18_89.html" class="list-group-item"><span> Hixeg misgu vocabu</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=18_46.html" class="list-group-item"><span> Smartphone</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=18_45.html" class="list-group-item"><span> Tablet</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=18_91.html" class="list-group-item"><span> Ttis maseis igme</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=18_30.html" class="list-group-item"><span> Memory Card</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=18_32.html" class="list-group-item"><span> Mobile Accessories</span></a></li>
					  		  </ul>
		  		  </li>
		  		  <li  class="hadchild" >
		  <a href="index.php@route=product%252Fcategory&amp;path=20.html" class="list-group-item "><span>Mobiles &amp; Tablets</span></a>
		  		  <span class="button-view  ttclose  ">view</span>
		  <ul  style="display: none;" >
		  							<li><a href="index.php@route=product%252Fcategory&amp;path=20_76.html" class="list-group-item"><span> Earings</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=20_83.html" class="list-group-item"><span> Monitor</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=20_86.html" class="list-group-item"><span> Refrigerator</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=20_85.html" class="list-group-item"><span> Washing machine</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=20_26.html" class="list-group-item"><span> Wedding Rings</span></a></li>
					  							<li><a href="index.php@route=product%252Fcategory&amp;path=20_27.html" class="list-group-item"><span> Men Watches</span></a></li>
					  		  </ul>
		  		  </li>
		  		  <li >
		  <a href="index.php@route=product%252Fcategory&amp;path=79.html" class="list-group-item "><span>Video Games</span></a>
		  		  </li>
		  		  <li >
		  <a href="index.php@route=product%252Fcategory&amp;path=81.html" class="list-group-item "><span>Mobile Accessories</span></a>
		  		  </li>
		  		  <li >
		  <a href="index.php@route=product%252Fcategory&amp;path=80.html" class="list-group-item "><span>Flashlights &amp; Lamps</span></a>
		  		  </li>
		  		  <li >
		  <a href="index.php@route=product%252Fcategory&amp;path=82.html" class="list-group-item "><span>Cameras &amp; Photo</span></a>
		  		  </li>
		  		  <li >
		  <a href="index.php@route=product%252Fcategory&amp;path=77.html" class="list-group-item "><span>Cables &amp; Connectors</span></a>
		  		  </li>
		  		  <li >
		  <a href="index.php@route=product%252Fcategory&amp;path=78.html" class="list-group-item "><span>Apparel</span></a>
		  		  </li>
		  		</ul>-->
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
    <div class="modcontent clearfix"><div class="static-image-home-left"><a title="Static Image" href="index.html#"><img src="image/catalog/cms/left-image-static.png" alt="Static Image"></a></div></div>
 </div>
	</aside>