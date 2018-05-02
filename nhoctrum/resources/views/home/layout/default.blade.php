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
	<link href="{{ URL::asset('resources/assets/home/css/form.css') }}" rel="stylesheet" type="text/css" media="all" />
<!---//End-rate---->
</head>

<body>
<!--header-->
	@include('home.layout.header')
<!--banner-->
	@include('home.layout.banner_product')
	<!--content-->
	@yield('content')
	<!--//products-->
	<!--brand-->
	<div class="container">
		
	</div>
	<!--//brand-->
	</div>
	
</div>
	<!--//content-->
<!--//footer-->
	@include('home.layout.footer')
<!--//footer-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ URL::asset('resources/assets/home/js/imagezoom.js') }}"></script>
<script src="{{ URL::asset('resources/assets/home/js/jquery.flexslider.js') }}"></script>
<script src="{{ URL::asset('resources/assets/home/js/simpleCart.min.js') }}"> </script>
<!-- slide -->
<script src="{{ URL::asset('resources/assets/home/js/bootstrap.min.js') }}"></script>
<!--light-box-files -->
<script src="{{ URL::asset('resources/assets/home/js/jquery.chocolat.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('resources/assets/home/css/flexslider.css') }}" type="text/css" media="screen" />
<link rel="stylesheet" href="{{ URL::asset('resources/assets/home/css/chocolat.css') }}" type="text/css" media="screen" charset="utf-8">
<!--light-box-files -->
<script type="text/javascript" charset="utf-8">
$(function() {
	$('a.picture').Chocolat();
});
</script>
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
</body>
</html>