	<div class="footer-container">
				<div class="footer-top">
				<div class="container">
						<div class="row">
								<div class="col-xs-12">
										
<div class="module social_block col-md-3 col-sm-12 col-xs-12">
    <div class="modcontent clearfix"><ul class="social-block ">
		<li class="rss"><a class="_blank" href="/index.html#" target="_blank"><i class="fa fa-rss"></i></a></li>
				<li class="twitter"><a class="_blank" href="/https://twitter.com/smartaddons" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<li class="facebook"><a class="_blank" href="/https://www.facebook.com/MagenTech" target="_blank"><i class="fa fa-facebook"></i></a></li>
				<li class="google_plus"><a class="_blank" href="/https://plus.google.com/u/0/+Smartaddons/posts" target="_blank"><i class="fa  fa-google-plus"></i></a></li>
		<li class="pinterest"><a class="_blank" href="/https://www.pinterest.com/smartaddons/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
			</ul></div>
 </div>
<script>
		function subscribe()
		{
			var emailpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			var email = $('#txtemail').val();
			if(email != "")
			{
				if(!emailpattern.test(email))
				{
					alert("Invalid Email");
					return false;
				}
				else
				{
					$.ajax({
						url: 'index.php?route=module/newsletters/news',
						type: 'post',
						data: 'email=' + $('#txtemail').val(),
						dataType: 'json',
						
									
						success: function(json) {
						
						alert(json.message);
						
						}
						
					});
					return false;
				}
			}
			else
			{
				alert("Email Is Require");
				$(email).focus();
				return false;
			}
			

		}
	</script>
<div class="news-letter col-lg-9 col-md-9 col-sm-12" > 
		<div class="newsletter">
				<div class="title-block">
						<div class="page-heading">Sign up for our newsletter</div>
						<div class="pre-text" data-scroll-reveal="enter bottom and move 40px over 0.6s">
								Get our updates on new arrivals and discount												
						</div>
				</div>
				
				<div class="block_content">
						<form method="post">
								<div class="form-group required">
										<div class="input-box">
										  <input type="email" name="txtemail" id="txtemail" value="" placeholder="Enter your email" class="form-control input-lg"  /> 
										</div>
										<div class="subcribe">
												<button type="submit" class="btn btn-default btn-lg" onclick="return subscribe();">Subscribe</button>  
												
										</div>
								</div>
				
						</form>
				</div>
				
			  
		
		</div>
</div>
								</div>            
						</div>
				</div> 
		</div>
				<div class="footer-navbar ">
			<div class="container content">
				<div class="row">
										<div class="col-md-3 col-sm-6 col-xs-12 collapsed-block footer-links box-footer">
						<div class="module clearfix">
														<div  class="modcontent" >
																																																																																																																																																																																																						<div class="content-block-footer"><div class="footer-logo"><img src="image/catalog/cms/logo-cyan.png" alt=""> </div>


<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>


</div>																																																																																																																																																																																																					</div>
						</div>
					</div>
										
					 <div class="col-sm-6 col-md-3 box-account box-footer">
						<div class="module clearfix">
							<h3 class="modtitle">My Account</h3>
							<div  class="modcontent" >
								<ul class="menu">
									<li><a href="/index.php@route=product%252Fmanufacturer.html">Brands</a></li>
									<li><a href="/index.php@route=account%252Fvoucher.html">Gift Vouchers</a></li>
									<li><a href="/index.php@route=affiliate%252Flogin.html">Affiliates</a></li>
									<li><a href="/index.php@route=product%252Fspecial.html">Specials</a></li>

									<li><a href="/index.php@route=simple_blog%252Farticle.html" target="_blank">Our Blog</a></li>
							
								</ul>
							</div>
						</div>
					</div>

					
											<div class="col-sm-6 col-md-3 box-information box-footer">
							<div class="module clearfix">
								<h3 class="modtitle">Information</h3>
								<div  class="modcontent" >
									<ul class="menu">
																				<li><a href="/index.php@route=information%252Finformation&amp;information_id=11.html">Gallery</a></li>
																				<li><a href="/index.php@route=information%252Finformation&amp;information_id=4.html">About Us</a></li>
																				<li><a href="/index.php@route=information%252Finformation&amp;information_id=6.html">FAQ</a></li>
																				<li><a href="/index.php@route=information%252Finformation&amp;information_id=3.html">Pricing Tables</a></li>
																				<li><a href="/index.php@route=information%252Finformation&amp;information_id=5.html">Terms &amp; Conditions</a></li>
																			</ul>
								</div>
							</div>
						</div>
					
					

				  
										<div class="col-sm-6 col-md-3 collapsed-block box-footer">
						<div class="module clearfix">
							<h3 class="modtitle">
								Contact Us							</h3>
							<div  class="modcontent" >
								<ul class="contact-address">
	<li><span class="fa fa-home"></span> My Company, 42 avenue des Champs</li>
<li><span class="fa fa-envelope"></span> Email: <a href="/index.html#"> sales@yourcompany.com</a></li>
	<li><span class="fa fa-phone">&nbsp;</span> Phone 1: 0123456789</li>
	</ul>
<ul class="payment-method">
		<li><a title="Payment Method" href="/index.html#"><img src="image/catalog/cms/payment/payment-1.png" alt="Payment"></a></li>
		<li><a title="Payment Method" href="/index.html#"><img src="image/catalog/cms/payment/payment-2.png" alt="Payment"></a></li>
		<li><a title="Payment Method" href="/index.html#"><img src="image/catalog/cms/payment/payment-3.png" alt="Payment"></a></li>
		<li><a title="Payment Method" href="/index.html#"><img src="image/catalog/cms/payment/payment-4.png" alt="Payment"></a></li>
		<li><a title="Payment Method" href="/index.html#"><img src="image/catalog/cms/payment/payment-5.png" alt="Payment"></a></li>
	</ul>							</div>
						</div>
					</div>
										
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom-block ">
			<div class=" container">
				<div class="row">
					<div class="col-sm-5 copyright-text">
						© 2016 SO Maxshop. All Rights Reserved.					</div>

					
				</div>

			</div>
		</div>
	</div>