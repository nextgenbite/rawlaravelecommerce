@extends('admin.master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
    <section class="content col-6">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title text-center">Password Change</h4>
            
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col-12">
                   <form method="post" action="{{route('admin.update.password')}} ">
                    @csrf
                     <div class="row">
                       <div class="col-12">	
    <div class="row">
        <div class="col-12 ">
        <div class="form-group">
            <h5>Current Password<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="password" id="current_password" name="oldpassword" class="form-control" required="" data-validation-required-message="This field is required" autocomplete="current-password"> <div class="help-block"></div></div>
            </div>
        <div class="form-group">
            <h5>New Password<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="password" id="password" name="password"  class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
            </div>
        <div class="form-group">
            <h5>Confirm Password<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="password" id="password_confirmation" name="password_confirmation"  class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
            </div>

            <div class="text-xs-right">
                <button type="submit" name="submit" class="btn btn-rounded btn-primary md-5">Update Password</button>
            </div>
        </div>
       
    </div>					
    
  
                       </div>
                      
                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </section>
</div>

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