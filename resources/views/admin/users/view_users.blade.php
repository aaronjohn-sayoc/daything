@extends('layouts.adminLayout.admin_design')

@section('content')

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">View Users</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">All Registered Users</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Registered On</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($users as $user)
                                            <tr>
                                                <td>{{$user['id']}}</td>
                                                <td>{{$user['name']}}</td>
                                                <td>{{$user['email']}}</td>
                                                <td>{{$user['created_at']}}</td>
                                                <td>
                                                	@if(!empty($user['details']['id']))
                                            		<button type="button" data-toggle="modal" data-target="#user_details{{$user['id']}}" class="btn btn-success btn-sm">View</button>
						                                <div class="modal fade" id="user_details{{$user['id']}}" tabindex="-1" role="dialog" aria-labelledby="user_detailsLabel" aria-hidden="true ">
						                                    <div class="modal-dialog" role="document ">
						                                        <div class="modal-content">
						                                            <div class="modal-header">
						                                                <h5 class="modal-title" id="user_detailsLabel">User Details</h5>                                           
						                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                                                    <span aria-hidden="true ">&times;</span>
						                                                </button>
						                                            </div>					                                            
						                                            <div class="modal-body">
																	<input class="userStatus" rel="{{$user['id']}}" id="userStatus" name="userStatus" type="checkbox" data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" @if($user['details']['approved'] == "1") checked @endif>					
																	<div class="card">
												                            <div class="card-body">
												                                <h5 class="card-title">Details Of {{$user['name']}}</h5>
												                                <div class="table-responsive">
												                                    <table class="table table-striped">
												                                        <tbody>
												                                            <tr>
												                                            	<td>Date Of Birth</td>
												                                                <td>{{$user['details']['date_of_birth']}}</td>
												                                            </tr>
												                                            <tr>
												                                            	<td>Marital Status</td>
												                                            	<td>{{$user['details']['marital_status']}}</td>
												                                            </tr>
												                                            <tr>
												                                            	<td>Height</th>
												                                            	<td>{{$user['details']['height']}}</td>	
												                                            </tr>
												                                            <tr>
												                                            	<td>Description</td>
												                                            	<td>{{$user['details']['description']}}</td>
												                                            </tr>
												                                            <tr>
												                                            	<td>Gender</td>
												                                            	<td>{{$user['details']['gender']}}</td>
												                                            </tr>											                                         
												                                        </tbody>
												                                    </table>
												                                </div>
												                            </div>
												                        </div>
						                                            </div>
						                                        </div>
						                                    </div>
						                                </div>
						                             @endif
                                                	<button type="button" class="btn btn-cyan btn-sm">Edit</button>
                                            		<button type="button" class="btn btn-danger btn-sm">Delete</button>
                                        		</td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
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
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

    <script>
    	
    $(document).ready(function() {
    	$(".userStatus").change(function(){
    		var user_id = $(this).attr('rel');
            if($(this).prop("checked") == true){
                //make status enabled
                /*alert("Enabled!")*/
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/admin/update-user-status',
                    data: {approved:'1', user_id:user_id},
                    success:function(resp){
                        alert('Success');
                    },
                    error:function(){
                        alert('Error');
                    }
                });

            }else{
                //make status disabled
                /*alert("Disabled!")*/
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/admin/update-user-status',
                    data: {approved:'0', user_id:user_id},
                    success:function(resp){
                        alert('Success');
                    },
                    error:function(){
                        alert('Error');
                    }
                });
            }
    	});
    });

    </script>


@endsection 