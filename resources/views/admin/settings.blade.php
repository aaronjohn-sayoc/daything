@extends('layouts.adminLayout.admin_design')
@section('content')  

    <div id="main-wrapper">
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Settings Wizard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Profile</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
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
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-body wizard-content">
                        <h4 class="card-title">Change Your Password</h4>
                            @if(Session::has('flash_message_error'))
                                <div class="alert alert-danger alert-block" role="alert">
                                    <strong>{!! session('flash_message_error') !!}</strong>
                                </div>
                            @endif 
                            @if(Session::has('flash_message_success'))
                                <div class="alert alert-success alert-block" role="alert">
                                    <strong>{!! session('flash_message_success') !!}</strong>
                                </div>
                            @endif                       
                        <h6 class="card-subtitle"></h6>
                        <form id="password_validate" name="password_validate" method="post"action="{{ url('admin/update-pwd') }}" novalidate class="m-t-40">
                            @csrf
                            <div id="wizard">
                                <h3>Account</h3>
                                <section>
                                    <label for="current_pwd">Current Password *</label><span id="chkPwd"></span>
                                    <input id="current_pwd" name="current_pwd" type="password" class="required form-control">
                                    <label for="new_pwd">New Password *</label>
                                    <input id="new_pwd" name="new_pwd" type="password" class="required form-control">
                                    <label for="confirm_pwd">Confirm Password *</label>
                                    <input id="confirm_pwd" name="confirm_pwd" type="password" class="required form-control">
                                    <p>(*) Mandatory</p>
                                </section>
                                <h3>Finish</h3>
                                <section>
                                    <p>Are you sure that you would like to change your password?</p>
                                      <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" name="acceptTerms" class="required custom-control-input" id="acceptTerms">
                                        <label class="custom-control-label" for="acceptTerms">Yes please change it!</label>
                                      </div>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->


    <script>

    //Validate current password if true or false - AJAX realtime
        
    $(document).ready(function() {
        $("#current_pwd").keyup(function(){
            var current_pwd = $("#current_pwd").val();
            $.ajax({
                type:'get',
                url:'/admin/check-pwd',
                data:{current_pwd:current_pwd},
                success:function(resp){
                    //alert(resp);
                    if(resp=="false"){
                        $("#chkPwd").html("<font color='red'> Your password is incorrect!</font>");
                    }else if(resp=="true"){
                        $("#chkPwd").html("<font color='green'> Your password is correct!</font>");
                    }
                },error:function(){
                    alert("Error");
                }
            });
        });
    });


    </script>

    <script>
        // Basic Example with form
    var form = $("#password_validate");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm_pwd: {
                equalTo: "#new_pwd"
            }
        }
    });
     form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            form.submit();
        }
    });


    </script>

 
@endsection