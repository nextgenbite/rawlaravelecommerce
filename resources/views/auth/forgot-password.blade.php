@extends('frontend.master')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
			

<!-- create a new account -->
<div class="col-md-6 col-sm-6 col-md-offset-3">
	<h4 class="checkout-subtitle">Forget Password</h4>
    
	<form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('password.email') }}">
		@csrf
		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2" value="{{ __('Email') }}">Email Address <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" name="email" id="exampleInputEmail2" >
	  	</div>
       
	  	<button type="submit" name=" submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
	</form>
	
	
</div>	
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