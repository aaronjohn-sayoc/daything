<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0 shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/backend_images/favicon.png')}}">
    <title>Date Thing</title>
    <!-- Custom CSS -->
    <link href="{{asset('libs/flot/css/float-chart.css')}}" rel="stylesheet">
    <!--Custom CSS-->
    <link href="{{asset('libs/jquery-steps/jquery.steps.css')}}" rel="stylesheet">
    <link href="{{asset('libs/jquery-steps/steps.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('css/backend_css/dist/css/style.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <!-- Settings js -->
    <script src="{{asset('libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{asset('libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('css/backend_css/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('css/backend_css/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('css/backend_css/dist/js/custom.min.js')}}"></script>
    <!--Dashboard JavaScript -->
    {{-- <script src="{{asset('css/backend_css/dist/js/pages/dashboards/dashboard1.js')}}"></script> --}}
    <!-- Charts js Files -->
    <script src="{{asset('libs/flot/excanvas.js')}}"></script>
    <script src="{{asset('libs/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('js/backend_js/pages/chart/chart-page-init.js')}}"></script>
    <script src="{{asset('extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('extra-libs/DataTables/datatables.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    

<![endif]-->
</head>

<body>

    @include('layouts.adminLayout.admin_header')

    @include('layouts.adminLayout.admin_sidebar')

    @yield('content')

    @include('layouts.adminLayout.admin_footer')



</body>

</html>