<!DOCTYPE html>
<html>
    
<head>
    <title>Matrix Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="{{ URL::asset('resources/assets/admin/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('resources/assets/admin/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/admin/css/matrix-login.css') }}" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>   
    <div id="loginbox">            
        <form id="loginform" method="post" class="form-vertical" action="{{ url('/admin/login') }}">
            {{ csrf_field() }}
			<div class="control-group normal_text"> <h3><img src="{{ URL::asset('resources/assets/admin/img/logo.png') }}" alt="Logo" /></h3></div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="email" name="email" placeholder="Email"  />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password"/> 
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <span class="pull-right"><input type="submit" value="Login" class="btn btn-success"></span>
            </div>
        </form>
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                {{ $error }}
              @endforeach
            </ul>
          </div>
        @endif 
    </div>    
    <script src="{{ URL::asset('resources/assets/admin/js/jquery.min.js') }}"></script>  
    <script src="{{ URL::asset('resources/assets/admin/js/matrix.login.js') }}"></script> 
</body>

</html>
