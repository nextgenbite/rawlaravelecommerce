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


        <form method="POST" action="{{Route('subcategory.update', $edit->id)}}" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')    
            <div class="form-group">
                <h5>Category Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="category_id" class="form-control"  >
                        <option value="" selected="" disabled="">Select Category</option>
                        @foreach($category as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $edit->category_id ? 'selected': '' }}>{{ $item->category_name_en }}</option>	
                        @endforeach
                    </select>                           
                    @error('category_id') 
                 <span class="text-danger">{{ $message }}</span>
                 @enderror 
                 </div>
                     </div>
            
            
                <div class="form-group">
                    <h5>SubCategory English <span class="text-danger">*</span></h5>
                    <div class="controls">
                 <input type="text" value="{{$edit->subcategory_name_en}} " name="subcategory_name_en" class="form-control" >
                 @error('subcategory_name_en') 
                 <span class="text-danger">{{ $message }}</span>
                 @enderror 
                  </div>
                </div>
            
            
                <div class="form-group">
                    <h5>SubCategory Bangla  <span class="text-danger">*</span></h5>
                    <div class="controls">
                 <input type="text" value="{{$edit->subcategory_name_bn}} " name="subcategory_name_bn" class="form-control" >
                 @error('subcategory_name_bn') 
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