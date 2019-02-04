@extends('layouts.frontLayout.front_design')

@section('content')

<body class="login-page sidebar-collapse">

  <div class="page-header header-filter" id="registerpagehdr">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form id="datingForm" name="datingForm" class="form" method="post" action="{{route('step/2')}}">
              @csrf
              <div class="card-header card-header-rose text-center">
                <h2 class="card-title">Fill Your Profile</h2>
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
              <p class="description text-center">so people will know more about you!</p>
              <div class="card-body">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">person</i>
                      </span>
                    </div>
                        <select id="marital_status" name="marital_status" class="form-control selectpicker" data-style="btn btn-link">
                        <option value="single">Single</option>
                        <option value="relationship">In A Relationship</option>
                        <option value="married">Married</option>
                        <option value="complicated">It's Complicated</option>
                        </select>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">accessibility</i>
                      </span>
                    </div>
                        <select id="body_type" name="body_type" class="form-control selectpicker" data-style="btn btn-link">
                        <option value="slim">Slim</option>
                        <option value="average">Average</option>
                        <option value="athletic">Athletic</option>
                        <option value="heavy">Heavy</option>
                        </select>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">cake</i>
                    </span>
                  </div>
                  <!-- markup -->
                  <input class="datepicker form-control" id="date_of_birth" name="date_of_birth" type="text" placeholder="Date of Birth">
                </div>              
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">format_line_spacing</i>
                    </span>
                  </div>
                  <input id="height" name="height" type="height" class="form-control" placeholder="Height">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">info</i>
                      </span>
                    </div>
                    <textarea id="description" name="description" class="form-control" id="description" rows="3" placeholder="Description"></textarea>
                </div>
                <div class="form-check form-check-radio">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" id="gender1" value="male" checked>
                        Male
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="form-check form-check-radio">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="female">
                        Female
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>              
              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-rose btn-link  btn-wd btn-lg">Proceed</button>
              </div>
            </form>
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