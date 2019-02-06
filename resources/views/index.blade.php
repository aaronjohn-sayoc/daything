@extends('layouts.frontLayout.front_design')

@section('content')

<body class="landing-page sidebar-collapse">

  <div class="page-header header-filter"  id="landingpagehdr">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto text-center">
          <h1 class="title">Get Started. Meet New People.</h1>
          <h4>Connect with strangers around the world. Discover what you are passionate about.</h4>
          <br>
          <a href="https://www.youtube.com/watch?v=ruhCl6QVqRE" target="_blank" class="btn btn-rose btn-raised btn-lg">
            <i class="fa fa-play"></i> Watch Video
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Start Your Journey With Us.</h2>
            <h5 class="description">On Day Thing, dating starts with just three steps. We let you match with the ones you are most compatible.</h5>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-rose">
                  <i class="material-icons">supervisor_account</i>
                </div>
                <h4 class="info-title">Create A Profile</h4>
                <p>Make your own profile and stand out from the crowd. Just fill up the necessary information and your account is set up in no time. </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-rose">
                  <i class="material-icons">camera_alt</i>
                </div>
                <h4 class="info-title">Fill Up Gallery</h4>
                <p>Add photos to your profile and have a gallery that others can see. Set up your best looking shot as your default photo.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-rose">
                  <i class="material-icons">loyalty</i>
                </div>
                <h4 class="info-title">View Profiles</h4>
                <p>Once you found someone you like, you can easily access their profiles anytime! Each member has their own unique profile.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="section text-center">
        <h2 class="title">Our Recent Users</h2>
        <div class="row">
          <?php $count = 1 ?>
          @foreach($recent_users as $user)
            @if(!empty($user->details) && $user->details->approved == '1')
              @if($count<=3)
                <div class="col-md-4 ml-auto mr-auto">
                    <div class="card">
                      @foreach($user->photos as $key => $photo)
                        @if($photo->default_photo == "Yes")
                          <?php $user_photo = $user->photos[$key]->photo; ?>
                        @else
                          <?php $user_photo = $user->photos[0]->photo; ?>
                        @endif
                      @endforeach
                      @if(!empty($user_photo))
                        <a href="{{url('/profile/'.$user->username)}}"><img class="card-img-top" src="{{asset('images/frontend_images/photos/'.$user_photo)}}"></a>
                      @elseif(empty($user_photo))
                        <a href="{{url('/profile/'.$user->username)}}"><img class="card-img-top" src="https://epicattorneymarketing.com/wp-content/uploads/2016/07/Headshot-Placeholder-1.png"></a>
                      @endif
                      <div class="card-body">
                        <h4 class="card-title">{{$user->name}}</h4>
                        <span class="card-text description">@if(!empty($user->details->gender)){{ucfirst(trans($user->details->gender))}},@endif</span>
                        <span class="card-text description">
                          @if(!empty($user->details->date_of_birth))
                          <?php $date_of_birth = $user->details->date_of_birth; 
                          echo $diff = date('Y') - date('Y', strtotime($date_of_birth)); ?> 
                          @endif 
                        </span>        
                      </div>
                    </div>
                </div>
              <?php $count++; ?>
              @endif
            @endif
          @endforeach
        </div>
      </div>
{{--       <div class="section text-center">
        <h2 class="title">Our Testimonies</h2>
        <div class="team">
          <div class="row">
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="{{asset('images/frontend_images/faces/avatar.jpg')}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">Gigi Hadid
                    <br>
                    <small class="card-description text-muted">Model</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                      <a href="#">links</a> for people to be able to follow them outside the site.</p>
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="{{asset('images/frontend_images/faces/christian.jpg')}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">Christian Louboutin
                    <br>
                    <small class="card-description text-muted">Designer</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                      <a href="#">links</a> for people to be able to follow them outside the site.</p>
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="{{asset('images/frontend_images/faces/kendall.jpg')}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">Kendall Jenner
                    <br>
                    <small class="card-description text-muted">Model</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                      <a href="#">links</a> for people to be able to follow them outside the site.</p>
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">Work with us</h2>
            <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
            <form class="contact-form">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Your Name</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Your Email</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
                <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <button class="btn btn-rose btn-raised">
                    Send Message
                  </button>
                </div>
              </div> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection