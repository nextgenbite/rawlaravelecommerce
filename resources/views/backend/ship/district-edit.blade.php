@extends('admin.master')
@section('admin')
<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
<!--   ------------ Add division Page -------- -->
<div class="col-xl-12 col-12">
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Update Division </h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">


        <form method="POST" action="{{Route('division.update', $edit->id)}}">
            @csrf
            @method('PATCH')    


            <div class="form-group">
                <h5>Division Name  <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="text"  name="division_name" value="{{$edit->division_name}} " class="form-control" > 
                @error('division_name') 
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