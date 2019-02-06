<?php

use App\User;
$datingCount = User::datingProfileExists(Auth::User()['id']);
$username = Auth::User()['username'];
if($datingCount == 1){
  $datingCountText = "Edit Profile";
  $datingCountText2 = "My Photos";
} else {
  $datingCountText = "Add Profile";
  $datingCountText2 = "Add Photos";
}

?>

  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-md" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{url('/')}}">
          Daything
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          @if(Session::get('userSession'))
          @if($datingCount == 1)
          <li class="nav-item">
            <a href="{{url('/profile/'.$username)}}" class="nav-link">
              <i class="material-icons">pages</i>My Profile 
            </a>
          </li>
          @endif          
          <li class="nav-item">
            <a href="{{route('step/2')}}" class="nav-link">
              <i class="material-icons">person</i>{{$datingCountText}} 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('step/3')}}">
              <i class="material-icons">photo</i> {{$datingCountText2}}
            </a>
          </li>        
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">
              <i class="material-icons">clear</i> Logout
            </a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">
              <i class="material-icons">check</i> Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/register')}}">
              <i class="material-icons">power_settings_new</i> Register
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/" target="_blank" data-original-title="Tweet us on Twitter!">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/" target="_blank" data-original-title="Like us on Facebook!">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/" target="_blank" data-original-title="Share us on Instagram!">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
