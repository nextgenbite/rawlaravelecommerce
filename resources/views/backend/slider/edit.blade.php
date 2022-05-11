@extends('admin.master')
@section('admin')
<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
<!--   ------------ Add Slider Page -------- -->
<div class="col-xl-12 col-12">
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Update Slider </h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">


        <form method="POST" action="{{Route('slider.update', $edit->id)}}" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')    


                {{-- <input type="hidden" name="id" value="{{ $edit->id }}">	 --}}
                <input type="hidden" name="old_image" value="{{ $edit->slider_img }}">			   
            
                <div class="form-group">
                <h5>Slider Title  <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="text"  name="title" class="form-control" value="{{ $edit->title }}" > 
                @error('title') 
                <span class="text-danger">{{ $message }}</span>
                @enderror 
                </div>
                </div>
            
            
                <div class="form-group">
                <h5>Slider Description <span class="text-danger">*</span></h5>
                <div class="controls">
                <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $edit->description }}</textarea>
                @error('description') 
                <span class="text-danger">{{ $message }}</span>
                @enderror 
                </div>
                </div>
            
            
            
                <div class="form-group">
                <h5>Slider Image <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="file" name="slider_img" class="form-control" >
                @error('slider_img') 
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