<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shop bán tranh</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="{{ URL::asset('resources/assets/admin/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('resources/assets/admin/css/bootstrap-responsive.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('resources/assets/admin/css/uniform.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('resources/assets/admin/css/select2.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('resources/assets/admin/css/matrix-style.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('resources/assets/admin/css/matrix-media.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/colorpicker.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/datepicker.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-wysihtml5.css') }}" />
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
	<script language="JavaScript" type="text/javascript">
	function checkDelete(){
	    return confirm('Are you sure to Delete?');
	}
	</script>
</head>
<body>
	<!--Header-part-->
	@include('admin.layout.header')
	<!--close-Header-part--> 

	@include('admin.layout.menu')

	<div id="content">
	  <div id="content-header">
	    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="@yield('currentLink')" class="current">@yield('current')</a> </div>
	    <h1>@yield('current')</h1>
	  </div>
	  <div class="container-fluid">
	    <hr>
	    	@yield('content')
	  </div>
	</div>


	<!--Footer-part-->
	@include('admin.layout.footer')
	<!--end-Footer-part-->
	<script src="{{ URL::asset('resources/assets/admin/js/jquery.min.js') }}"></script> 
	<script src="{{ URL::asset('resources/assets/admin/js/jquery.ui.custom.js') }}"></script> 
	<script src="{{ URL::asset('resources/assets/admin/js/bootstrap.min.js') }}"></script> 
	<script src="{{ URL::asset('resources/assets/admin/js/jquery.toggle.buttons.js') }}"></script> 
	<script src="{{ URL::asset('resources/assets/admin/js/js/masked.js.js') }}"></script>
	<script src="{{ URL::asset('resources/assets/admin/js/jquery.uniform.js') }}"></script> 
	<script src="{{ URL::asset('resources/assets/admin/js/select2.min.js') }}"></script> 
	<script src="{{ URL::asset('resources/assets/admin/js/jquery.dataTables.min.js') }}"></script> 
	<script src="{{ URL::asset('resources/assets/admin/js/matrix.js') }}"></script> 
	<script src="{{ URL::asset('resources/assets/admin/js/matrix.tables.js') }}"></script>
	<script src="{{ URL::asset('resources/assets/admin/js/matrix.form_common.js') }}"></script>
</body>
</html>	