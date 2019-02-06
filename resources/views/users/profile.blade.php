<?php

$pageTitle = "Profile"

?>

@extends('layouts.frontLayout.front_design')

@section('content')

<body class="profile-page sidebar-collapse">

  <div class="page-header header-filter" id="profilepagehdr"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
	            @foreach($userDetails->photos as $key => $photo)
	            	@if($photo->default_photo == "Yes")
	            		<?php $user_photo = $userDetails->photos[$key]->photo; ?>
	            	@else
	            		<?php $user_photo = $userDetails->photos[0]->photo; ?>
	           		@endif
	            @endforeach
              @if(!empty($user_photo))              	
                <img src="{{asset('images/frontend_images/photos/'.$user_photo)}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              @elseif(empty($user_photo))
                <img src="https://epicattorneymarketing.com/wp-content/uploads/2016/07/Headshot-Placeholder-1.png" class="img-raised rounded-circle img-fluid">
              @endif              
              <div class="name">
                <h3 class="title">{{$userDetails->name}}</h3> 
                <h5 class="title">ID: {{$userDetails->username}}</h5>
                <i class="material-icons">wc</i><span class="description">{{ucfirst(trans($userDetails->details->gender))}}</span>
                <i class="material-icons">cake</i><span class="description">                          <?php $date_of_birth = $userDetails->details->date_of_birth; 
                          echo $diff = date('Y') - date('Y', strtotime($date_of_birth)); ?> </span>
                <i class="material-icons">favorite</i><span class="description">{{ucfirst(trans($userDetails->details->marital_status))}}</span>
                <i class="material-icons">format_line_spacing</i><span class="description">{{ucfirst(trans($userDetails->details->height))}}</span>
                <i class="material-icons">accessibility</i><span class="description">{{ucfirst(trans($userDetails->details->body_type))}}</span>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center mt-5">
          <p>{{$userDetails->details->description}}</p>
        </div>


            <div class="row">
              @foreach($userDetails->photos as $photo)
              <div class="col-md-3 ml-auto mr-auto text-center gallery">
                <img src="../images/frontend_images/photos/{{$photo->photo}}" alt="{{$photo->photo}}" class="img-fluid rounded">
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
	