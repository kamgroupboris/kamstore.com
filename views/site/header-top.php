<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="header-top-left form-inline col-lg-4 col-md-5 hidden-sm hidden-xs ">
						
						
						
						
												<div class="form-group navbar-welcome hidden-xs" >
													<div class="welcome-msg">
														<?=$this->render('/site/welcome-msg');?>
													</div>
												</div>
												
						 
					</div>
					<div class="header-top-right collapsed-block col-lg-8 col-md-7 col-xs-12 ">
						<h5 class="tabBlockTitle visible-sm visible-xs">More<a class="expander " href="/index.html#TabBlock-1"><i class="fa fa-angle-down"></i></a></h5>
						<div  class="tabBlock" id="TabBlock-1">
												   
						<ul class="top-link list-inline">
							<li class="account" id="my_account"><a href="/index.php@route=account%252Flogin.html" title="My Account" class="btn btn-xs dropdown-toggle" data-toggle="dropdown"> <span>Личный кабинет</span> <span class="fa fa-angle-down"></span></a>
								<ul class="dropdown-menu ">
									<li><a href="/register"><i class="fa fa-user"></i> Регистрация</a></li>
									<li><a href="/login"><i class="fa fa-pencil-square-o"></i> Войти</a></li>
																	</ul>
							</li>
							<?
								$wish_list = Yii::$app->session->get('wish_list');
							?>

							<li class="wishlist"><a href="<?=Yii::$app->user->isGuest?'/login':'/wishlist/'?>" id="wishlist-total" class="top-link-wishlist" title="Избраное"><span>Отложенные (<?=$wish_list?count($wish_list):0?>)</span></a></li>
							<!-- <li class="login"><a href="/http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=checkout/cart" title="Shopping Cart"><span class="hidden-xs hidden-sm hidden-md">Shopping Cart</span></a></li> -->
							
						</ul>
													
<div class="form-group currencies-block">
	<form action="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=common/currency/currency" method="post" enctype="multipart/form-data" id="currency">
	<a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
        <span class="icon icon-credit "></span>
        RU руб.        <span class="fa fa-angle-down"></span>
    </a>
	<ul class="dropdown-menu btn-xs" >
							<li >
				<a title="Euro" onclick="$('input[name=\'code\']').attr('value', 'EUR'); $('#currency').submit();">(€)
					&nbsp;Euro				</a>
			</li>
							<li >
				<a title="Pounds" onclick="$('input[name=\'code\']').attr('value', 'GBP'); $('#currency').submit();">(£)
					&nbsp;Pounds				</a>
			</li>
							<li >
				<a title="US Dollar" onclick="$('input[name=\'code\']').attr('value', 'USD'); $('#currency').submit();">($)
					&nbsp;US Dollar				</a>
			</li>
			</ul>
	<input type="hidden" name="code" value="" />
	<input type="hidden" name="redirect" value="http://opencart.magentech.com/themes/so_maxshop/layout7/index.php?route=information/information&amp;information_id=9" />
	</form>
</div>












							
<div class="form-group languages-block ">
	<form action="/language" method="post" enctype="multipart/form-data" id="bt-language">
		<a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
												<img src="image/flags/rus.png" alt="Русский" title="Русский">
					<span>Русский</span>
																	<span class="fa fa-angle-down"></span>
		</a>
		<ul class="dropdown-menu">
		  		  <li> 
				<a onclick="$('input[name=\'code\']').attr('value', 'en'); $('#bt-language').submit();">
                    <img class="image_flag" src="image/flags/gb.png" alt="English" title="English" />
                    English                </a>
			</li>
		  		  <li> 
				<a onclick="$('input[name=\'code\']').attr('value', 'ar'); $('#bt-language').submit();">
                    <img class="image_flag" src="image/flags/lb.png" alt="Arabic" title="Arabic" />
                    Arabic                </a>
			</li>
		  		</ul>
	  
	  <input type="hidden" name="code" value="" />
	  <input type="hidden" name="redirect" value="/information" />
	</form>
</div>


							
												</div>
						
					</div>
				</div>
			</div>
		</div>