<?
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use app\models\MenuLink;
use yii\widgets\Menu;
?>
<style>
.navbar {
	margin-bottom: 0;}
</style>
<?
	$topM = MenuLink::find()->select('label,url')->where(['type_menu'=>3,'active'=>1])->asArray()->all();

Html::beginTag('nav', ['class'=>'navbar-default']);
	echo Menu::widget([
		'items' => $topM,
		'options' => ['class' => 'megamenu'],
	]);
Html::endTag('nav');
?>

<!--			<nav class="navbar-default">
	<div class=" container-megamenu  horizontal">
				<div class="navbar-header">
			<button type="button" id="show-megamenu" data-toggle="collapse"  class="navbar-toggle">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		
					<div class="megamenu-wrapper">
				
							<span id="remove-megamenu" class="fa fa-times"></span>
			 			 
			<div class="megamenu-pattern">
				<div class="container">
					<ul class="megamenu">
					
													<li class="home">
								<a href="/index.php@route=common%252Fhome.html">
								<span><strong>Home</strong></span>								</a>
							</li>
												
						<li class=' with-sub-menu hover' ><p class='close-menu'></p><a href='index.html' class='clearfix' ><strong>Features</strong> <span class='label'> </span> <b class='caret' ></b> </a><div class="sub-menu" style="width:60%"><div class="content"><div class="row"><div class="col-sm-6"><div class="column layout-color"> <a>Theme Colors</a>
	<div>	
		<ul class="row-list">
			<li class="color orange"><a href="/index.php@scheme=default.html">Orange Color</a></li>
			<li class="color green"><a href="/index.php@scheme=green.html">Green Color</a></li>
			<li class="color boocdo"><a href="/index.php@scheme=boocdo.html">Red Color</a></li>
			<li class="color blue"><a href="/index.php@scheme=blue.html">Blue Color</a></li>
			<li class="color cyan"><a href="/index.php@scheme=cyan.html">Blue Color</a></li>
		</ul>
	</div>
</div></div><div class="col-sm-6"><div class="column">		
	<a>Layouts</a>	
	<div>	
	<div class="row">
		<div class="col-md-6">
			<ul class="row-list">
				<li><a href="/../index.html">Home Style 1</a></li>
				<li><a href="/../layout2/index.html">Home Style 2</a></li>
				<li><a href="/../layout3/index.html">Home Style 3</a></li>
				<li><a href="/../layout4/index.html">Home Style 4</a></li>
			</ul>
		</div>
		<div class="col-md-6">
			<ul class="row-list">
				<li><a href="/../layout5/index.html">Home Style 5</a></li>
				<li><a href="/../layout6/index.html">Home Style 6</a></li>
				<li><a href="/index.html">Home Style 7</a></li>
			</ul>
		</div>
	</div>
	</div>
</div></div></div></div></div></li>
<li class='item-style1 with-sub-menu hover' ><p class='close-menu'></p><a href='index.html' class='clearfix' ><strong>Electronic</strong> <span class='label'> New</span> <b class='caret' ></b> </a><div class="sub-menu" style="width:70%"><div class="content"><div class="row"><div class="col-sm-4"><div class="row"><div class="col-sm-12 static-menu"><div class="menu"><ul><li><a href="/index.php@route=product%252Fcategory&amp;path=33.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=33';" class="main-menu">Automotive</a><ul><li><a href="/index.php@route=product%252Fcategory&amp;path=33_63.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=33_63';">Gadgets &amp; Auto Parts</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=17_68.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=17_68';">Gift &amp; Lifestyle Gadgets</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=25_29.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25_29';">Golf Supplies</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=34_43.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=34_43';">Accessories for iPhone</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=17_70.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=17_70';">Gift for Woman</a></li></ul></li></ul></div></div></div></div><div class="col-sm-4"><div class="row"><div class="col-sm-12 static-menu"><div class="menu"><ul><li><a href="/index.php@route=product%252Fcategory&amp;path=24.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=24';" class="main-menu">Health &amp; Beauty</a><ul><li><a href="/index.php@route=product%252Fcategory&amp;path=24.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=24';">Health &amp; Beauty</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=20_27.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=20_27';">Men Watches</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=18_46.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=18_46';">Smartphone</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=34.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=34';">Smartphone &amp; Tablets</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=24.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=24';">Health &amp; Beauty</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=24.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=24';">Health &amp; Beauty</a></li></ul></li></ul></div></div></div></div><div class="col-sm-4"><div class="row"><div class="col-sm-12 static-menu"><div class="menu"><ul><li><a href="/index.php@route=product%252Fcategory&amp;path=18.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=18';" class="main-menu">Electronics</a><ul><li><a href="/index.php@route=product%252Fcategory&amp;path=20_76.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=20_76';">Earings</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=24.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=24';">Health &amp; Beauty</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=57_75.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=57_75';">Helicopters &amp; Parts</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=24_64.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=24_64';">Bath &amp; Body</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=18_45.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=18_45';">Tablet</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=18_30.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=18_30';">Memory Card</a></li></ul></li></ul></div></div></div></div></div><div class="border"></div><div class="row"><div class="col-sm-12"><div class="col-xs-12 img-bottom">			<div class="row"><a href="/index.html#"><img src="image/catalog/cms/static-image-h-2.png" alt="banner1"></a> </div>

</div></div></div></div></div></li>
<li class=' item-style2 with-sub-menu hover' ><p class='close-menu'></p><a href='index.html' class='clearfix' ><strong>Accessories</strong> <span class='label'> Hot</span> <b class='caret' ></b> </a><div class="sub-menu" style="width:100%"><div class="content"><div class="row"><div class="col-sm-8"><div class="row"><div class="col-sm-6 static-menu"><div class="menu"><ul><li><a href="/index.php@route=product%252Fcategory&amp;path=33.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=33';" class="main-menu">Automotive</a><ul><li><a href="/index.php@route=product%252Fcategory&amp;path=33_61.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=33_61';">Car Alarms and Security</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=33_62.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=33_62';">Car Audio &amp; Speakers</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=33_63.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=33_63';">Gadgets &amp; Auto Parts</a></li></ul></li><li><a href="/index.php@route=product%252Fcategory&amp;path=34.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=34';" class="main-menu">Smartphone &amp; Tablets</a><ul><li><a href="/index.php@route=product%252Fcategory&amp;path=34_44.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=34_44';">Accessories for i Pad</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=78.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=78';">Apparel</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=34_43.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=34_43';">Accessories for iPhone</a></li></ul></li></ul></div></div><div class="col-sm-6 static-menu"><div class="menu"><ul><li><a href="/index.php@route=product%252Fcategory&amp;path=25.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25';" class="main-menu">Computer</a><ul><li><a href="/index.php@route=product%252Fcategory&amp;path=25_35.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25_35';">Camping &amp; Hiking</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=82.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=82';">Cameras &amp; Photo</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=77.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=77';">Cables &amp; Connectors</a></li></ul></li><li><a href="/index.php@route=product%252Fcategory&amp;path=18.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=18';" class="main-menu">Electronics</a><ul><li><a href="/index.php@route=product%252Fcategory&amp;path=18_46.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=18_46';">Smartphone</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=24_64.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=24_64';">Bath &amp; Body</a></li><li><a href="/index.php@route=product%252Fcategory&amp;path=25_28.html" onclick="window.location = 'http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=product/category&amp;path=25_28';">Outdoor &amp; Traveling</a></li></ul></li></ul></div></div></div></div><div class="col-sm-4"><span class="title-submenu">Best sellers</span><div class="col-sm-12 list-product"><div class="product-thumb"><div class="image">
																		<a href="/index.php@route=product%252Fproduct&amp;product_id=54.html">
																			<img src="image/cache/catalog/product/15-100x100.png" alt="Ruma huren chuma" title="Ruma huren chuma" class="img-responsive" />
																		</a></div><div class="caption"><h4><a href="/index.php@route=product%252Fproduct&amp;product_id=54.html">Ruma huren chuma</a></h4><p class="description">Anim cillum meatball et, shoulder cow pork belly flank tri-tip pig.  
Occaecat culpa ut sint.  Rump..</p><div class="rating"><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div><p class="price"><span class="price-new">$55.00</span> <span class="price-old">$99.00</span></p></div></div></div><div class="col-sm-12 list-product"><div class="product-thumb"><div class="image">
																		<a href="/index.php@route=product%252Fproduct&amp;product_id=52.html">
																			<img src="image/cache/catalog/product/6-100x100.png" alt="Phasellus ut vehicula" title="Phasellus ut vehicula" class="img-responsive" />
																		</a></div><div class="caption"><h4><a href="/index.php@route=product%252Fproduct&amp;product_id=52.html">Phasellus ut vehicula</a></h4><p class="description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut l..</p><div class="rating"><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div><p class="price"><span class="price-new">$45.00</span> <span class="price-old">$78.00</span></p></div></div></div><div class="col-sm-12 list-product"><div class="product-thumb"><div class="image">
																		<a href="/index.php@route=product%252Fproduct&amp;product_id=50.html">
																			<img src="image/cache/catalog/product/29-100x100.png" alt="Hazen dima polan" title="Hazen dima polan" class="img-responsive" />
																		</a></div><div class="caption"><h4><a href="/index.php@route=product%252Fproduct&amp;product_id=50.html">Hazen dima polan</a></h4><p class="description">Aliquip ut ut sausage ball tip tri-tip doner hamburger cupidatat 
t-bone duis pig pork belly.  Veli..</p><div class="rating"><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div><p class="price">$43.00</p></div></div></div></div></div></div></div></li>
<li class='' ><p class='close-menu'></p><a href='index.php@route=simple_blog%252Fcategory&amp;simple_blog_category_id=1.html' class='clearfix' ><strong>Blog</strong> <span class='label'> </span></a></li>
<li class='style-page with-sub-menu hover' ><p class='close-menu'></p><a href='index.html' class='clearfix' ><strong>Pages</strong> <span class='label'> </span> <b class='caret' ></b> </a><div class="sub-menu" style="width:40%"><div class="content"><div class="row"><div class="col-sm-6"><ul class="row-list">
		<li><a class="subcategory_item" href="/index.php@route=information%252Finformation&amp;information_id=6.html">FAQ</a></li>
	<li><a class="subcategory_item" href="/index.php@route=information%252Finformation&amp;information_id=3.html">Pricing Tables</a></li>
		<li><a class="subcategory_item" href="/index.php@route=information%252Finformation&amp;information_id=11.html">Gallery</a></li>
		<li><a class="subcategory_item" href="/index.php@route=information%252Fcontact.html">Contact us</a></li>
		</ul></div><div class="col-sm-6"><ul class="row-list">	<li><a class="subcategory_item" href="/index.php@route=information%252Finformation&amp;information_id=4.html">About Us 1</a></li>	<li><a class="subcategory_item" href="/index.php@route=information%252Finformation&amp;information_id=7.html">About Us 2</a></li>	<li><a class="subcategory_item" href="/index.php@route=information%252Finformation&amp;information_id=8.html">About Us 3</a></li>	<li><a class="subcategory_item" href="/index.php@route=information%252Finformation&amp;information_id=9.html">About Us 4</a></li></ul></div></div></div></div></li>
<li class='' ><p class='close-menu'></p><a href='index.php@route=information%252Fcontact.html' class='clearfix' ><strong>Contact us</strong> <span class='label'> </span></a></li>
					</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>-->