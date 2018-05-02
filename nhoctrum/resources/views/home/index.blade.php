<!DOCTYPE html>
<html>
<head>
	<title>Shopin A Ecommerce Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
	<link href="{{ URL::asset('resources/assets/home/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->
	<!--theme-style-->
	<link href="{{ URL::asset('resources/assets/home/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--theme-style-->
	<link href="{{ URL::asset('resources/assets/home/css/style4.css') }}" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<script src="{{ URL::asset('resources/assets/home/js/jquery.min.js') }}"></script>
	<!--- start-rate---->
	<script src="{{ URL::asset('resources/assets/home/js/jstarbox.js') }}"></script>
	<link rel="stylesheet" href="{{ URL::asset('resources/assets/home/css/jstarbox.css') }}" type="text/css" media="screen" charset="utf-8" />

	<script type="text/javascript">
		jQuery(function() {
		jQuery('.starbox').each(function() {
			var starbox = jQuery(this);
				starbox.starbox({
				average: starbox.attr('data-start-value'),
				changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
				ghosting: starbox.hasClass('ghosting'),
				autoUpdateAverage: starbox.hasClass('autoupdate'),
				buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
				stars: starbox.attr('data-star-count') || 5
				}).bind('starbox-value-changed', function(event, value) {
				if(starbox.hasClass('random')) {
				var val = Math.random();
				starbox.next().text(' '+val);
				return val;
				} 
			})
		});
	});
	</script>
	<style type="text/css">
		.banner{
			width: 100%;
		    height: 600px;
		    display: block;
		    background: url({{$banner[0]['name']}})no-repeat top;
			overflow-x:hidden;
			margin: 0 auto;
		}
	</style>
	<link href="{{ URL::asset('resources/assets/home/css/form.css') }}" rel="stylesheet" type="text/css" media="all" />
<!---//End-rate---->
</head>

<body>
<!--header-->
	@include('home.layout.header')
<!--banner-->
	@include('home.layout.banner')
	<!--content-->
<div class="content">
	<div class="container">	
		<!--products-->
		<!-- <div class="col-md-6 col-md">
			<div class="col-1">
			 <a href="shop" class="b-link-stroke b-animate-go  thickbox">
			 	<img src="http://sohanews.sohacdn.com/2017/photo-1-1514222361469.jpg" class="img-responsive" alt=""/>
			 	<div class="b-wrapper1 long-img"><p class="b-animate b-from-right b-delay03 ">Shop now</p>
			 		<label class="b-animate b-from-right b-delay03 "></label>
			 		<h3 class="b-animate b-from-left b-delay03 ">Trendy</h3>
			 	</div></a>
			</div>
			<div class="col-2">
				<h2><a href="shop" class="buy-now">Shop Now</a></h2>
			</div>
		</div> -->
		<div class="mid-popular">
			<?php $i=0; ?>
			@foreach($categories as $cat)
			<div class="col-md-3">
				<div class="col-3">
					<a href="shop"><center><img style="height: 200px" src="{{$images[$i]}}" class="img-responsive" class="img-responsive"></center><?php $i++; ?>
					<div class="col-pic">
						<p>{{$cat->name}}</p>
						<label></label>
						<h3>Shop now</h3>
					</div></a>
				</div>
			</div>
			@endforeach
		<div class="clearfix"></div>
		</div>
	</div>	

	<div class="content-mid">
		<h3>BEST SELLER</h3>
		<label class="line"></label>


	@for($i=0; $i<2; $i++)
		<div class="mid-popular">
			@for($j=0; $j<4; $j++)
			<div class="col-md-3 item-grid simpleCart_shelfItem">
				<div class=" mid-pop">
					<div class="pro-img">
						<img style="height: 250px" src="{{$product[$i+$j]->image}}" class="img-responsive" alt="">
						<div class="zoom-icon ">
							<a class="picture" href="{{$product[$i+$j]->image}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
							<a href="sanpham/{{$product[$i+$j]->id}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
						</div>
					</div>
					<div class="mid-1">
						<div class="women">
							<div class="women-top">
								<span>Women</span>
								<h6><a href="">{{$product[$i+$j]->name}}</a></h6>
							</div>
							<div class="img item_add">
								<a href="#"><img src="{{URL::asset('resources/views/home/images/ca.png')}}" alt=""></a>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="mid-2">
							<p><label>$100.00</label><em class="item_price">$70.00</em></p>
							<div class="block">
								<div class="starbox small ghosting"> </div>
							</div>
							<div class="clearfix"></div>
						</div>	
					</div>
				</div>
			</div>
				@endfor
			<div class="clearfix"></div>
		@endfor
		</div>
		
	</div>
	<!--//products-->
	<!--brand-->
	<div class="brand">	
	</div>
	<!--//brand-->
	</div>
	
</div>
	<!--//content-->
<!--//footer-->
	@include('home.layout.footer')
<!--//footer-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ URL::asset('resources/assets/home/js/simpleCart.min.js') }}"> </script>
<!-- slide -->
<script src="{{ URL::asset('resources/assets/home/js/bootstrap.min.js') }}"></script>
<!--light-box-files -->
<script src="{{ URL::asset('resources/assets/home/js/jquery.chocolat.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('resources/assets/home/css/chocolat.css') }}" type="text/css" media="screen" charset="utf-8">
<!--light-box-files -->
<script type="text/javascript" charset="utf-8">
$(function() {
	$('a.picture').Chocolat();
});
</script>
</body>
</html>