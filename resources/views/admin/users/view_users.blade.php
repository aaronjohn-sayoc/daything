<?php $mainPage = "Admin" ?>

<?php $pageTitle = "View Users" ?>

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
                                                <th>Username</th>
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
                                                <td>{{$user['username']}}</td>
                                                <td>{{$user['name']}}</td>
                                                <td>{{$user['email']}}</td>
                                                <td>{{$user['created_at']}}</td>
                                                <td>
                                                	@if(!empty($user['details']['id']))
                                            		<button type="button" data-toggle="modal" data-target="#user_details{{$user['id']}}" class="btn btn-success btn-sm">View</button>
						                                <div class="modal fade" id="user_details{{$user['id']}}" tabindex="-1" role="dialog" aria-labelledby="user_detailsLabel" aria-hidden="true ">
						                                    <div class="modal-dialog" role="document">
						                                        <div class="modal-content">
						                                            <div class="modal-header">
						                                                <h5 class="modal-title" id="user_detailsLabel">View User Details</h5>                                           
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
                                                                                                <td>Body Type</td>
                                                                                                <td>{{$user['details']['body_type']}}</td>
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
                                                    @if(!empty($user['details']['id']))
                                                	<button type="button" data-toggle="modal" id="edit-modal" data-target="#user_details_edit{{$user['id']}}" class="btn btn-cyan btn-sm">Edit</button>
                                                    <div class="modal fade" id="user_details_edit{{$user['id']}}" tabindex="-1" role="dialog" aria-labelledby="user_detailsEditLabel" aria-hidden="true ">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="user_detailsEditLabel">Edit User Details</h5>                                           
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true ">&times;</span>
                                                                        </button>
                                                                    </div>                                                              
                                                                    <div class="modal-body">
                                                                    <input class="userStatus" rel="{{$user['id']}}" id="userStatus" name="userStatus" type="checkbox" data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" @if($user['details']['approved'] == "1") checked @endif>                   
                                                                    <div class="card">
                                                                        <form id="edituseradmin" name="edituseradmin" class="form-horizontal" method="post" action="{{url('admin/view-users/')}}">
                                                                            @csrf
                                                                            
                                                                            <div class="card-body">
                                                                                <input type="text" id="my_user_id" class="form-control" name="my_user_id" value="{{$user['id']}}">
                                                                                <h4 class="card-title">Details of {{$user['name']}}</h4>
                                                                                <div class="form-group row">
                                                                                    <label for="date_of_birth" class="col-sm-3 text-right control-label col-form-label">Date Of Birth</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" name="date_of_birth" class="form-control mydatepicker" id="date_of_birth" placeholder="Date Of Birth" value="{{$user['details']['date_of_birth']}}">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="marital_status"class="col-sm-3 text-right control-label col-form-label">Marital Status</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select id="marital_status" name="marital_status" class="select2 form-control custom-select">
                                                                                          <option value="single" @if (!empty($user['details']['marital_status']) && $user['details']['marital_status']=="single") selected="" @endif>Single</option>
                                                                                          <option value="relationship" @if (!empty($user['details']['marital_status']) && $user['details']['marital_status']=="relationship") selected="" @endif>In A Relationship</option>
                                                                                          <option value="married" @if (!empty($user['details']['marital_status']) && $user['details']['marital_status']=="married") selected="" @endif>Married</option>
                                                                                          <option value="complicated" @if (!empty($user['details']['marital_status']) && $user['details']['marital_status']=="complicated") selected="" @endif>It's Complicated</option>                         
                                                                                         </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="body_type"class="col-sm-3 text-right control-label col-form-label">Body Type</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select id="body_type" name="body_type" class="select2 form-control custom-select">
                                                                                          <option value="slim" @if (!empty($user['details']['body_type']) && $user['details']['body_type']=="slim") selected="" @endif>Slim</option>
                                                                                          <option value="average" @if (!empty($user['details']['body_type']) && $user['details']['body_type']=="average") selected="" @endif>Average</option>
                                                                                          <option value="athletic" @if (!empty($user['details']['body_type']) && $user['details']['body_type']=="athletic") selected="" @endif>Athletic</option>
                                                                                          <option value="heavy" @if (!empty($user['details']['body_type']) && $user['details']['body_type']=="heavy") selected="" @endif>Heavy</option>                         
                                                                                         </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="height" class="col-sm-3 text-right control-label col-form-label">Height</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" name="height" class="form-control" id="height" placeholder="Height" value="{{$user['details']['height']}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                                                                    <div class="col-sm-9">
                                                                                        <textarea id="description" name="description" class="form-control">{{$user['details']['description']}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="marital_status"class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" name="gender" class="form-control" id="gender" placeholder="Gender" value="{{$user['details']['gender']}}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <button id="edituseradminbtn" name="{{$user['id']}}" type="submit" class="btn btn-cyan submituser">Edit</button>
                                                                            </div>
                                                                        </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if(!empty($user['details']['id']))
                                                    <button type="button" data-toggle="modal" data-target="#myPhotos{{$user['id']}}" class="btn btn-info btn-sm">Gallery</button>
                                                        <div class="modal fade" id="myPhotos{{$user['id']}}" tabindex="-1" role="dialog" aria-labelledby="myPhotosLabel" aria-hidden="true ">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="myPhotosLabel">Photos Of {{$user['name']}}</h5>                                           
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true ">&times;</span>
                                                                        </button>
                                                                    </div>                                                              
                                                                    <div class="modal-body">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            @foreach($user['photos'] as $photo)
                                                                            <div class="col-md-4 col-12">
                                                                                <div class="card">
                                                                                    <img class="card-img-top" src="{{ url('/images/frontend_images/photos/'.$photo['photo']) }}">
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title">Approved:</h5>
                                                                                        <input class="userPhotoStatus" rel="{{$photo['id']}}" id="userPhotoStatus" name="userPhotoStatus" type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger"@if($photo['approved'] == "1") checked @endif>
                                                                                    </div>
                                                                                </div> 
                                                                            </div>
                                                                            @endforeach
                                                                        </div>  
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif                                                
                                            		<button type="submit" rel="{{$user['id']}}" class="btn btn-danger btn-sm deleteUser">Delete</button>
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
                        Swal.fire(
                          'Good job!',
                          'You have approved the user!',
                          'success'
                        );
                    },
                    error:function(){
                        Swal.fire(
                          'Oops!',
                          'Change approval failed!',
                          'error'
                        );
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
                        Swal.fire(
                          'Oh no!',
                          'You have unapproved the user!',
                          'error'
                        );
                    },
                    error:function(){
                        Swal.fire(
                          'Oops!',
                          'Change approval failed!',
                          'error'
                        );
                    }
                });
            }
        });
    });

    </script>

    <script>
        
    $(document).ready(function() {
        $(".userPhotoStatus").change(function(){
            var photo_id = $(this).attr('rel');
            if($(this).prop("checked") == true){
                //make status enabled
                /*alert("Enabled!")*/
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/admin/update-photo-status',
                    data: {approved:'1', photo_id:photo_id},
                    success:function(resp){
                        Swal.fire(
                          'Good job!',
                          'You have approved the photo!',
                          'success'
                        );
                    },
                    error:function(){
                        Swal.fire(
                          'Oops!',
                          'Change approval failed!',
                          'error'
                        );
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
                    url: '/admin/update-photo-status',
                    data: {approved:'0', photo_id:photo_id},
                    success:function(resp){
                        Swal.fire(
                          'Oh no!',
                          'You have unapproved the photo!',
                          'error'
                        );
                    },
                    error:function(){
                        Swal.fire(
                          'Oops!',
                          'Change approval failed!',
                          'error'
                        );
                    }
                });
            }
        });
    });

    </script>    



    <script>

    $(document).ready(function() {
        $(".submituser").click(function(event){
            event.preventDefault();
            var user_id = $('#my_user_id').val();
            var date_of_birth = $('#date_of_birth').val();
            var marital_status = $('#marital_status').val();
            var body_type = $('#body_type').val();
            var height = $('#height').val();
            var description = $('#description').val();
            var gender = $('#gender').val();
                $.ajax({ 
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },                 
                    type: 'post',
                    url: '/admin/update-user-details',
                    async: false,
                    data: {user_id:user_id, date_of_birth:date_of_birth, marital_status:marital_status, body_type:body_type, height:height, description:description, gender:gender},
                    success:function(resp){
                        Swal.fire(
                          'Good job!',
                          'You have edited the user succesfully!',
                          'success'
                        );
                        alert(user_id);
                    },
                    error:function(){
                        Swal.fire(
                          'Oops!',
                          'Changing details of user failed!',
                          'error'
                        );
                    }
                });            

        });
    });

    </script>

    <script>


    $(document).ready(function() {
        $(".deleteUser").click(function(){
            var id = $(this).attr('rel');
                //make status enabled
                /*alert("Enabled!")*/
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    url: '/admin/delete-user/',
                    data: {id:id, "_token": "{{ csrf_token() }}"},
                    success:function(resp){
                        Swal.fire(
                          'Good job!',
                          'You have deleted the user!',
                          'success'
                        );
                    },
                    error:function(){
                        Swal.fire(
                          'Oops!',
                          'Delete user failed!',
                          'error'
                        );
                    }
                });

            });
        });
            
      


    </script>        




    </script>

    <script>
        
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        }); 
    </script>


@endsection 
