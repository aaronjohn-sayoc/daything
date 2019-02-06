<?php

$pageTitle = "Review"

?>

@extends('layouts.frontLayout.front_design')

@section('content')

<body class="login-page sidebar-collapse">

  <div class="page-header header-filter" id="reviewpagehdr">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login form">
              @csrf
              <div class="card-header card-header-rose text-center">
                <h3 class="card-title">Profile Review</h2>
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
            <div class="card-body">
			<p class="description text-center">Thank you! We will get back to you ASAP.</p>
          	</div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection