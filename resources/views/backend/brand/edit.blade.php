@extends('admin.master')
@section('admin')
<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
<!--   ------------ Add Brand Page -------- -->
<div class="col-xl-12 col-12">
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Update Brand </h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">


        <form method="POST" action="{{Route('brand.update', $edit->id)}}" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')    


                {{-- <input type="hidden" name="id" value="{{ $edit->id }}">	 --}}
                <input type="hidden" name="old_image" value="{{ $edit->brand_image }}">			   
            
                <div class="form-group">
                <h5>Brand Name English  <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="text"  name="brand_name_en" class="form-control" value="{{ $edit->brand_name_en }}" > 
                @error('brand_name_en') 
                <span class="text-danger">{{ $message }}</span>
                @enderror 
                </div>
                </div>
            
            
                <div class="form-group">
                <h5>Brand Name Bangla <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="text" name="brand_name_bn" class="form-control" value="{{ $edit->brand_name_bn }}" >
                @error('brand_name_bn') 
                <span class="text-danger">{{ $message }}</span>
                @enderror 
                </div>
                </div>
            
            
            
                <div class="form-group">
                <h5>Brand Image <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="file" name="brand_image" class="form-control" >
                @error('brand_image') 
                <span class="text-danger">{{ $message }}</span>
                @enderror 
                </div>
                </div>
            
            
                <div class="text-xs-right">
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
                </div>
                </form>




    
    </div>
</div>
<!-- /.box-body -->
</div>
<!-- /.box --> 
        </div>
    </div>
</section>
<!-- /.content -->
  </div>
@endsection