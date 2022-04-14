@extends('frontend.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('index')}} ">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                @include('frontend.common.user_menu')
            </div>
            
            <div class="col-md-8 col-sm-8">
                <div class="well">
                    <div class="well-header">
                        <h4>Update Profile</h4> 
                    </div>
                    <div class="well-body">
                       
                        <!-- create a new account -->


        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="register-form outer-top-xs" role="form">
            @csrf
		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2" value="{{ __('Email') }}">Email Address <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" value="{{$user->email}} " name="email" id="exampleInputEmail2" >
	  	</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
		    <input type="text" name="name" value="{{$user->name}} "  class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
		    <input type="phone" name="phone" value="{{$user->phone}} " class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Profile <span>*</span></label>
		    <input type="file" id="image" name="profile_photo_path" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
        
	  	<button type="submit" name=" submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
	</form>
		
<!-- create a new account -->
                    </div>
                </div>
            </div>
        </div>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brand')
        <!-- /.logo-slider --> 
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div>
<!-- /.container -->
</div><!-- /.body-content -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showImage').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
@endsection