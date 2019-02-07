<?php

$pageTitle = "Step 2"

?>

@extends('layouts.frontLayout.front_design')

@section('content')

<?php

use App\User;
$datingCount = User::datingProfileExists(Auth::User()['id']);
if($datingCount == 1){
  $datingCountText = "Edit Profile";
  $datingCountText2 = "to represent yourself better!";
} else {
  $datingCountText = "Add Profile";
  $datingCountText2 = "so people will know more about you!";
}

$datingProfile = User::datingProfileDetails(Auth::User()['id']);


?>

<body class="login-page sidebar-collapse">

  <div class="page-header header-filter" id="step2pagehdr">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form id="datingForm" name="datingForm" class="form" method="post" action="{{route('step/2')}}">
              {{ csrf_token() }}
              @if (!empty($datingProfile->user_id))
                <input type="hidden" class="form-control" name="user_id" value="{{$datingProfile->user_id}}">
              @endif
              <div class="card-header card-header-rose text-center">
                <h2 class="card-title">{{$datingCountText}}</h2>
{{--                 <div class="social-line">
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-facebook-square"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </div> --}}
              </div>
              <p class="description text-center">{{$datingCountText2}}</p>
              <div class="card-body">
                <div class="form-group">
                          <select id="marital_status" name="marital_status" class="form-control selectpicker" data-style="btn btn-link">
                          <option value="single" @if (!empty($datingProfile['marital_status']) && $datingProfile['marital_status']=="single") selected="" @endif>Single</option>
                          <option value="relationship" @if (!empty($datingProfile['marital_status']) && $datingProfile['marital_status']=="relationship") selected="" @endif>In A Relationship</option>
                          <option value="married" @if (!empty($datingProfile['marital_status']) && $datingProfile['marital_status']=="married") selected="" @endif>Married</option>
                          <option value="complicated" @if (!empty($datingProfile['marital_status']) && $datingProfile['marital_status']=="complicated") selected="" @endif>It's Complicated</option>
                        </select>
                </div>
                <div class="form-group">
                          <select id="body_type" name="body_type" class="form-control selectpicker" data-style="btn btn-link">
                          <option value="slim"  @if (!empty($datingProfile['body_type']) && $datingProfile['body_type']=="slim") selected="" @endif>Slim</option>
                          <option value="average" @if (!empty($datingProfile['body_type']) && $datingProfile['body_type']=="average") selected="" @endif>Average</option>
                          <option value="athletic" @if (!empty($datingProfile['body_type']) && $datingProfile['body_type']=="athletic") selected="" @endif>Athletic</option>
                          <option value="heavy" @if (!empty($datingProfile['body_type']) && $datingProfile['body_type']=="heavy") selected="" @endif>Heavy</option>
                          </select>
                </div>

                 <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">bookmark</i>
                    </span>
                  </div>
                  <input id="username" name="username" type="usernamee" class="form-control" readonly placeholder="Username" @if (!empty(Session::get('userSession'))) value="{{ Session::get('userSession') }}" @endif required>
                </div>               

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">cake</i>
                    </span>
                  </div>
                  <!-- markup -->
                  <input class="datepicker form-control" id="date_of_birth" name="date_of_birth" type="text" placeholder="Date of Birth" @if (!empty($datingProfile['date_of_birth'])) value="{{ $datingProfile['date_of_birth'] }}" @endif required>
                </div>              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">format_line_spacing</i>
                    </span>
                  </div>
                  <input id="height" name="height" type="height" class="form-control" placeholder="Height" @if (!empty($datingProfile['height'])) value="{{ $datingProfile["height"] }}" @endif required>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">info</i>
                      </span>
                    </div>
                    <textarea name="description" class="form-control" id="description" rows="3" required placeholder="Description">@if (!empty($datingProfile['description'])) {{ $datingProfile["description"] }} @endif</textarea>
                </div>
                <div class="form-check form-check-radio">
                    <label class="form-check-label">
                        <input class="form-check-input" required type="radio" name="gender" id="gender1" value="male" @if (!empty($datingProfile['gender']) && $datingProfile['gender']=="male") checked @endif>
                        Male
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check form-check-radio">
                    <label class="form-check-label">
                        <input class="form-check-input" required type="radio" name="gender" id="gender2" value="female" @if (!empty($datingProfile['gender']) && $datingProfile['gender']=="female") checked @endif>
                        Female
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>              
              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-rose btn-link btn-block text-center btn-wd btn-lg">Proceed</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

   <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->


<script>
$(document).ready(function() {

    $('.datepicker').datetimepicker({
        format: 'MM/DD/YYYY'

    });
})
</script>


@endsection