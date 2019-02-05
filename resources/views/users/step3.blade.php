@extends('layouts.frontLayout.front_design')

@section('content')
<body class="landing-page sidebar-collapse">


<div class="page-header header-filter" id="registerpagehdr">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form id="photo" name="photo" class="form" method="post" action="{{route('step/3')}}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{Auth::User()->id}}">
              <div class="card-header card-header-rose text-center">
                <h2 class="card-title">Add Photos</h2>
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
              <p class="description text-center">to become a recognized star!</p>
              <div class="card-body text-center">
              @if(Session::has('flash_message_success'))
              <div class="alert alert-success" role="alert">
                    <strong>{!! session('flash_message_success') !!}</strong>
              </div>
              @endif
				<div class="fileinput fileinput-new text-center photo" data-provides="fileinput">
				    <div class="fileinput-new thumbnail img-circle img-raised">
					<img src="https://epicattorneymarketing.com/wp-content/uploads/2016/07/Headshot-Placeholder-1.png" alt="...">
				    </div>
				    <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
				    <div>
				    <span class="btn btn-raised btn-round btn-default btn-file">
				    <span class="fileinput-new">Add Photos</span>
					<input type="file" name="photo[]" id="photo" multiple></span>
				    </div>
				</div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-rose btn-link btn-block btn-wd btn-lg text-center">Proceed</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="main main-raised">
  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col-md-12 col-12">
          <h2 class="title text-center">My Photos</h2>
        </div>
      </div>
      <div class="row">
        @foreach($user_photos as $photo)
        <div class="col-md-4 col-12 ml-auto mr-auto text-center">
          <div class="card">
            <img class="card-img-top" src="/images/frontend_images/photos/{{$photo->photo}}" alt="{{$photo->photo}}">
            <div class="card-body">
              <h4 class="card-title">Status:</h4>
              <p class="card-text">
                @if($photo->approved=="1") Active
                @else Inactive
                @endif
                @if($photo->default_photo=="Yes")
                <strong>(Default)</strong>
                @endif                
              </p>
              @if($photo->approved=="1")
              <a class="btn btn-info btn-round text-center" href="/default-photo/{{$photo->photo}}">Make Default</a>
              @endif
              <a class="btn btn-danger btn-round text-center deletePhoto" rel="{{$photo->photo}}" href="javascript:">Delete</a>
          </div>
          </div>          
        </div>
        @endforeach          
  </div>
</div>



@endsection
