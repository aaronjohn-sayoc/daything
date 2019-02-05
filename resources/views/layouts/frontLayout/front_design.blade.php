<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Kit by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('css/frontend_css/material-kit.min.css?v=2.1.1')}}" rel="stylesheet" />
  
  <!-- Personal CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!--   Core JS Files   -->
  <script src="{{asset('js/frontend_js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/frontend_js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/frontend_js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/frontend_js/plugins/moment.min.js')}}"></script>
  <script src="{{asset('js/frontend_js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/frontend_js/bootstrap-selectpicker.js')}}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{asset('js/frontend_js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
{{--   <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('js/frontend_js/material-kit.min.js?v=2.1.1')}}" type="text/javascript"></script>
  <script src="{{asset('js/frontend_js/jquery.validate.js')}}"></script>  
  <script src="{{asset('js/frontend_js/additional-methods.js')}}"></script> 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="{{asset('js/frontend_js/main.js')}}"></script>  

</head>


	@include('layouts.frontLayout.front_header')
	@yield('content')
	@include('layouts.frontLayout.front_footer')
	
</body>
</html>