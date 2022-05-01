@extends('Frontend.master')
@section('content')
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
                @include('Frontend.common.user_menu')
            </div>
            
            <div class="col-md-8 col-sm-8">
                <div class="well">
                    {{-- <div class="well-header">
                        Header
                    </div> --}}
                    <div class="panel-body">
                       
                        <p class="panel-text">Full Name: {{ $user->name}}</p>
                        <p class="panel-text">Email: {{ $user->email}}</p>
                        <p class="panel-text">Phone: {{ $user->phone}}</p>
                        <p class="panel-text">Address: {{ $user->address}}</p>
                    </div>
                </div>
            </div>
        </div>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('Frontend.body.brand')
        <!-- /.logo-slider --> 
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div>
<!-- /.container -->
</div><!-- /.body-content -->
@endsection