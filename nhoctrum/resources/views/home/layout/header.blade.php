<div class="header">
<div class="container">
	<div class="head">
		<div class=" logo">
			<a href=""><img src="{{URL::asset('resources/views/home/images/logo.png')}}" alt=""></a>	
		</div>
	</div>
</div>
<div class="header-top">
	<div class="container">
		<div class="col-sm-5 col-md-offset-2  header-login">
			<ul >
				<li><a href="">Login</a></li>
				<li><a href="">Register</a></li>
				<li><a href="">Checkout</a></li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
		
<div class="container">
	<div class="head-top">
		<div class="col-sm-8 col-md-offset-2 h_menu4">
			<nav class="navbar nav_bottom" role="navigation">
 
		 <!-- Brand and toggle get grouped for better mobile display -->
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		        <ul class="nav navbar-nav nav_1">
		            <li><a class="color" href="{{asset('/')}}">Trang chủ</a></li>
		            <li><a class="color6" href="{{asset('/shop')}}">Shop</a></li>
		    		<li class="dropdown mega-dropdown active">
					    <a class="color1" href="#" class="dropdown-toggle" data-toggle="dropdown">Hướng dẫn<span class="caret"></span></a>				
						<div class="dropdown-menu ">
		                    <div class="menu-top">
								<div class="col1">
									<div class="h_nav">
										<h4>Cách mua hàng</h4>
										<ul>
											<li><a href="product.html">Accessories</a></li>
											<li><a href="product.html">Bags</a></li>
										</ul>	
									</div>							
								</div>
								<div class="col1">
									<div class="h_nav">
										<h4>Phương pháp tô màu</h4>
										<ul>
											<li><a href="product.html">Accessories</a></li>
											<li><a href="product.html">Bags</a></li>
										</ul>	
									</div>							
								</div>
								<div class="col1 col5">
									<img src="https://png.icons8.com/metro/1600/black-cat.png" class="img-responsive" alt="">
								</div>
								<div class="clearfix"></div>
							</div>                  
						</div>				
					</li>
		            <li ><a class="color6" href="">Liên hệ</a></li>
		        </ul>
		    </div><!-- /.navbar-collapse -->
		</nav>
	</div>
	<div class="col-sm-2 search-right">
		<ul class="heart">
			<li>
				<a href=""><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a>
			</li>
			<li>
				<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"></i></a>
			</li>
		</ul>
		<div class="clearfix"> </div>
					
						<!----->

						<!---pop-up-box---->					  
		<link href="{{asset('resources/assets/home/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all"/>
		<script src="{{asset('resources/assets/home/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
		<!---//pop-up-box---->
			
		<div id="small-dialog" class="mfp-hide">
			<form method="get" action="{{asset('search')}}">
				{{ csrf_field() }}
				<div class="search-top">
					<div class="login-search">
						<input type="submit" value="">
						<input type="text" name="key" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}" required>		
					</div>
				</div>	
			</form>			
		</div>
				
		 <script>
			$(document).ready(function() {
			$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
			});
																						
			});
		</script>		
						<!----->
			</div>
	<!-- <div class="col-sm-2 search-right">
		<ul class="heart">
			<li><a href="wishlist.html"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></a></li>
			<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i></a></li>
		</ul>
		<div class="cart box_1">
			<a href="checkout.html">
				<h3><div class="total"><span class="simpleCart_total"></span></div><img src="{{URL::asset('resources/views/home/images/images/cart.png')}}" alt=""/></h3>
			</a>
			<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
		</div>
		<div class="clearfix"> </div>

	<!---pop-up-box---->					  
	<!-- <link href="{{URL::asset('resources/views/home/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all"/>
	<script src="{{URL::asset('resources/views/home/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
	<!---//pop-up-box---->
	<!-- <div id="small-dialog" class="mfp-hide">
		<div class="search-top">
			<div class="login-search">
				<input type="submit" value="">
				<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">
			</div>
			<p>Shopin</p>
		</div>				
	</div>
	 <script>
		$(document).ready(function() {
		$('.popup-with-zoom-anim').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
		});
																					
		});
	</script>						
				</div> --> 
			<div class="clearfix"></div>
		</div>	
	</div>	
</div>
