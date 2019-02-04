
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{url('/')}}">
          Date Thing </a>
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
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">account_circle</i> Profile
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="{{route('step/2')}}" class="dropdown-item">
                <i class="material-icons">edit</i> Complete Your Profile
              </a>
            </div>
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
            <a class="nav-link" href="{{route('register')}}">
              <i class="material-icons">power_settings_new</i> Register
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Tweet us on Twitter!">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Like us on Facebook!">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Share us on Instagram!">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
