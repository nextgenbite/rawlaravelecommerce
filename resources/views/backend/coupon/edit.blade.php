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
<h3 class="box-title">Update Coupon </h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">


        <form method="POST" action="{{Route('coupon.update', $edit->id)}}" >
            @csrf
            @method('PATCH')   
            
                <div class="form-group">
                <h5>Coupon Name <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="text"  name="coupon_name" class="form-control" value="{{ $edit->coupon_name }}" > 
                @error('coupon_name') 
                <span class="text-danger">{{ $message }}</span>
                @enderror 
                </div>
                </div>
            
            
                <div class="form-group">
                <h5>Category Name Bangla <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="number" name="coupon_discount" class="form-control" value="{{ $edit->coupon_discount }}" >
                @error('coupon_discount') 
                <span class="text-danger">{{ $message }}</span>
                @enderror 
                </div>
                </div>

                <div class="form-group">
                    <h5>Category Slug English <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <input type="date" name="coupon_validity" value="{{ $edit->coupon_validity }}" class="form-control" >
                    @error('coupon_validity') 
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