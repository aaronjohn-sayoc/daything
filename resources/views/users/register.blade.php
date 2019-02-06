<?php

$pageTitle = "Register"

?>

@extends('layouts.frontLayout.front_design')

@section('content')

<body class="login-page sidebar-collapse">

  <div class="page-header header-filter" id="registerpagehdr">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form id="signupForm" name="signupForm" class="form" method="post" action="{{url('/register')}}">
              @csrf
              <div class="card-header card-header-rose text-center">
                <h2 class="card-title">Sign Up</h2>
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
              <p class="description text-center">and join our community!</p>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">bookmark</i>
                    </span>
                  </div>
                  <input id="username" name="username" type="text" class="form-control" placeholder="Username" required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input id="name" name="name" type="text" class="form-control" placeholder="Name" required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input id="email" name="email" type="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="confirm_password" name="confirm_password" type="password" class="form-control" placeholder="Confirm Password" required>
                </div>              
              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-rose btn-link btn-block text-center btn-wd btn-lg">Get Started</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

@endsection