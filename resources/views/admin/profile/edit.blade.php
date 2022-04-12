@extends('admin.master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Admin Edit Profile</h4>
            
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form method="post" action="{{route('admin.profile.update')}} " enctype="multipart/form-data">
                    @csrf
                     <div class="row">
                       <div class="col-12">	
    <div class="row">
        <div class="col-6">
        <div class="form-group">
            <h5>Name Field<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name" value="{{$edit->name}}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
            </div>
        </div>
        <div class="col-6">
        <div class="form-group">
            <h5>Email Field <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="email" name="email" value="{{$edit->email}}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
            </div>
        </div>
    </div>					
    
    <div class="row">
        <div class="col-6">
        <div class="form-group">
            <h5>Profile Photo <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="file" id="image" name="profile_photo_path" class="form-control" required=""> <div class="help-block"></div></div>
        </div>

        </div>
        <div class="col-6">
        <img id="showImage" style="height: 100px; width:100px;" src="{{(!empty($edit->profile_photo_path))? url('uploads/admin_images/'.$edit->profile_photo_path) : url('uploads/no_image.jpg')}}" alt="">

        </div>
    </div>
    <div class="text-xs-right">
        <button type="submit" name="submit" class="btn btn-rounded btn-primary md-5">Update</button>
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