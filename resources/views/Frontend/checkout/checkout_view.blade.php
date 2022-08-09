@extends('Frontend.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
My Checkout
@endsection

<style>
.media{
	display: flex;
	justify-content: space-around;
	align-items: center;
}
/* .media div{
	padding: 5px;
}	 */
</style>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb --> 




<div class="body-content">
	<div class="container-fluid">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
	 
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login -->			
			 <div class="col-md-6 col-sm-6 already-registered-login">
		 <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>
					 
	{{-- <form class="register-form" action="{{ route('checkout.store') }}" method="POST"> --}}
		@csrf


		<div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Shipping Name</b>  <span>*</span></label>
	    <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
	  </div>  <!-- // end form group  -->
	 

<div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Email </b> <span>*</span></label>
	    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}" required="">
	  </div>  <!-- // end form group  -->


<div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Phone</b>  <span>*</span></label>
	    <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}" required="">
	  </div>  <!-- // end form group  -->


	  <div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Post Code </b> <span>*</span></label>
	    <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code" required="">
	  </div>  <!-- // end form group  -->

	 
	 
				</div>	
				<!-- guest-login -->


 


				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					 

<div class="form-group">
	<h5><b>Division Select </b> <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="division_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select Division</option>
			@foreach($divisions as $item)
 <option value="{{ $item->id }}">{{ $item->division_name }}</option>	
			@endforeach
		</select>
		@error('division_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div> <!-- // end form group -->


		 <div class="form-group">
	<h5><b>District Select</b>  <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="district_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select District</option>
			 
		</select>
		@error('district_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div> <!-- // end form group -->


		 <div class="form-group">
	<h5><b>State Select</b> <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="state_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select State</option>
			 
		</select>
		@error('state_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div> <!-- // end form group -->
				 
					 
    <div class="form-group">
	 <label class="info-title" for="exampleInputEmail1">Notes <span>*</span></label>
	     <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>
	  </div>  <!-- // end form group  -->



					



					
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- End checkout-step-01  -->


					    
					  	
					</div><!-- /.checkout-steps -->
				</div>




				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
			 <div class="">
				 
				
				{{-- <table class="table">
					<thead >
						<tr>
							<th>Image</th>
							<th>QTY</th>
							<th>Color</th>
							<th>Size</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						@foreach($carts as $item)
							<td><img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;"></td>
							<td> {{ $item->qty }} </td>
							<td> {{ $item->options->color }}</td>
							<td> {{ $item->options->size }}</td>
						@endforeach 
						</tr>
					</tbody>
				</table> --}}
				{{-- <table class="table table-light">
					<tbody>
						<tr>
							<td colspan="3">Sub Total</td>
							<td>00.00tk</td>
						</tr>
						<tr>
							<td colspan="3">Grand Total</td>
							<td>00.00tk</td>
						</tr>
					</tbody>
				</table> --}}

				<ul class="nav nav-checkout-progress list-unstyled">
					@foreach($carts as $item)
					<li>
						<div class="media">
							<div class="media-left">
							  <a href="#">
								<img class="img-circle" data-src="holder.js/64x64" alt="64x64" src="{{ asset($item->options->image) }}" data-holder-rendered="true" style="width: 64px; height: 64px;">
							  </a>
							</div>
							<div class="media-body">
							  <h4 class="media-heading">{{ $item->name }}</h4>
							  <strong>Color: </strong>
							  {{ $item->options->color }} 
								<br>
							  <strong>Size: </strong>
							  {{ $item->options->size }}
							</div>
							<div class="media-body">
								<h4>{{ $item->qty }}</h4> 
							</div>
							<div class="media-right">
							  <h4>{{ $item->price }}</h4>
							</div>
						  </div>
					</li>
					<hr>
					@endforeach
					{{-- @foreach($carts as $item)
					<li> 
						<strong>Image: </strong>
						<img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;">
					</li>

					<li> 
						<strong>Qty: </strong>
						 ( {{ $item->qty }} )

						 <strong>Color: </strong>
						 {{ $item->options->color }}

						 <strong>Size: </strong>
						 {{ $item->options->size }}
					</li>
                    @endforeach  --}}
<hr>
		 <li>
		 	@if(Session::has('coupon'))

<strong>SubTotal: </strong> ${{ $cartTotal }} <hr>

<strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
( {{ session()->get('coupon')['coupon_discount'] }} % )
 <hr>

 <strong>Coupon Discount : </strong> ${{ session()->get('coupon')['discount_amount'] }} 
 <hr>

  <strong>Grand Total : </strong> ${{ session()->get('coupon')['total_amount'] }} 
 <hr>


		 	@else

<strong>SubTotal: </strong> <h5 class="pull-right">${{ $cartTotal }}</h5> <hr>

<strong>Grand Total : </strong><h5 class="pull-right">${{ $cartTotal }}</h5>


		 	@endif 

		 </li>
					 
					

				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar --> </div>







	<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Select Payment Method</h4>
		    </div>
			<form action="{{Route('checkout.store')}}" method="post">
				@csrf
				<div class="row">
					<div class="col-md-3">
			   <label for="">Stripe</label> 		
		   <input type="radio" name="payment_method" value="stripe">
		   <img src="{{ asset('frontend/assets/images/payments/4.png') }}">		    		
					</div> <!-- end col md 4 -->
	
					<div class="col-md-3">
						<label for="">Card</label> 		
		   <input type="radio" name="payment_method" value="card">	
			<img src="{{ asset('frontend/assets/images/payments/3.png') }}">    		
					</div> <!-- end col md 4 -->
	
					<div class="col-md-3">
						<label for="">Local payment</label> 		
						<input type="radio" name="payment_method" value="local">	
						<img src="{{ asset('frontend/assets/images/payments/3.png') }}">  
					</div> <!-- end col md 4 -->
					<div class="col-md-3">
						<label for="">Cash</label> 		
		   <input type="radio" name="payment_method" value="cash">	
			  <img src="{{ asset('frontend/assets/images/payments/2.png') }}">  		
					</div> <!-- end col md 4 -->
	
						 
				</div> <!-- // end row  -->
				<hr>
				<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>
			</form>


		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar --> </div>



 



</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- === ===== BRANDS CAROUSEL ==== ======== -->
 







<!-- ===== == BRANDS CAROUSEL : END === === -->	
</div><!-- /.container -->
</div><!-- /.body-content -->



 
 <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/district-get/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="state_id"]').empty(); 
                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });



 $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/state-get/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="state_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 

    });
    </script>




@endsection