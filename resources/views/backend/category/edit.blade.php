@extends('admin.master')
@section('admin')
<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
<!--   ------------ Add category Page -------- -->
<div class="col-xl-12 col-12">
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Update Category </h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">


        <form method="POST" action="{{Route('category.update', $edit->id)}}" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')    


                {{-- <input type="hidden" name="id" value="{{ $edit->id }}">	 --}}
                <input type="hidden" name="old_image" value="{{ $edit->category_image }}">			   
            
                <div class="form-group">
                <h5>Category Name English  <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="text"  name="category_name_en" class="form-control" value="{{ $edit->category_name_en }}" > 
                @error('category_name_en') 
                <span class="text-danger">{{ $message }}</span>
                @enderror 
                </div>
                </div>
            
            
                <div class="form-group">
                <h5>Category Name Bangla <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="text" name="category_name_bn" class="form-control" value="{{ $edit->category_name_bn }}" >
                @error('category_name_bn') 
                <span class="text-danger">{{ $message }}</span>
                @enderror 
                </div>
                </div>

                <div class="form-group">
                    <h5>Category Slug English <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <input type="text" name="category_slug_en" value="{{ $edit->category_slug_en }}" class="form-control" >
                    @error('category_slug_en') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    </div>
                    </div>
                    <div class="form-group">
                    <h5>Category Slug Bangla <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <input type="text" name="category_slug_bn" value="{{ $edit->category_slug_bn }}" class="form-control" >
                    @error('category_slug_bn') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    </div>
                    </div>
            
            
            
                <div class="form-group">
                <h5>Category Icon <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="text" value="{{ $edit->category_icon }}" name="category_icon" class="form-control" >
                @error('category_icon') 
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