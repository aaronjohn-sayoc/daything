@extends('layouts.frontLayout.front_design')

@section('content')

<body class="login-page sidebar-collapse">

  <div class="page-header header-filter" id="registerpagehdr">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="post" action="{{route('login')}}">
              @csrf
              <div class="card-header card-header-rose text-center">
                <h2 class="card-title">Log In</h2>
{{--                 <div class="social-line">
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-facebook-square"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </div> --}}
              </div>
              <p class="description text-center">and interact with our members!</p>            
              <div class="card-body">
	              @if(Session::has('flash_message_error'))
	              	<div class="alert alert-danger" role="alert">
	              		<strong>{!! session('flash_message_error') !!}</strong>
	                </div>
	              @endif                	
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input id="email" name="email" type="email" class="form-control" placeholder="Email">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                </div>             
              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-rose btn-link  btn-wd btn-lg">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection