@extends('frontend.master')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Forget Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
        <div class="col-md-3 col-sm-3">
        </div>
		<div class="sign-in-page col-md-6">
			<div class="row">
				<!-- Sign-in -->			
    
<div class="col-md-12 col-sm-12 offset-3 sign-in">
	<h4 class="">Reset Password</h4>
	
    
        <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
		<div class="form-group">
		    <label class="info-title" for="email" value="{{ __('Email') }}">Email Address <span>*</span></label>
		    <input type="email" name="email" required class="form-control unicase-form-control text-input" name="email" :value="old('email')" required autofocus id="email" >
		</div>
		<div class="form-group">
		    <label class="info-title" for="email" value="{{ __('Email') }}">Password <span>*</span></label>
		    <input type="password" name="password" required class="form-control unicase-form-control text-input" name="email" :value="old('email')" required autofocus id="email" >
		</div>
		<div class="form-group">
		    <label class="info-title" for="email" value="{{ __('Email') }}">Confirm Password <span>*</span></label>
		    <input type="email" type="password" name="password_confirmation" requiredd class="form-control unicase-form-control text-input" name="email" :value="old('email')" required autofocus id="email" >
		</div>
	  	<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
	</form>					
</div>
<!-- Sign-in -->

<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brand')
        <!-- /.logo-slider --> 
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div>
<!-- /.container -->
</div><!-- /.body-content -->
@endsection