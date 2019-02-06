<?php $mainPage = "Admin" ?>

<?php $pageTitle = "Dashboard" ?>


@extends('layouts.adminLayout.admin_design')

@section('content')  

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><?php echo $mainPage ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $pageTitle ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-12">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <a href="{{url('admin/dashboard')}}">
                                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                    <h6 class="text-white">Dashboard</h6>        
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-12">
                        <a href="{{url('admin/view-users')}}">
                            <div class="card card-hover">
                                <div class="box bg-danger text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                                    <h6 class="text-white">Members</h6>
                                </div>
                            </div>               
                        </a>
                    </div>

                    <div class="col-12">
                        <a href="{{url('admin/settings')}}">
                            <div class="card card-hover">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-settings"></i></h1>
                                    <h6 class="text-white">Settings</h6>
                                </div>
                            </div>               
                        </a>
                    </div>





                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->


@endsection