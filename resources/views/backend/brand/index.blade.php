@extends('admin.master')
@section('admin')
<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
       
        <div class="col-xl-8">
            <div class="box overflow-hidden pull-up">
                <div class="box-header with-border">
                    <h3 class="box-title">Brand List <span class="badge badge-pill badge-sm badge-danger">{{count($brand)}} </span></h3>
                  </div>
                <div class="box-body">							
                    <div class="table-responsive">
                    <table table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-uppercase">
                    <th>Brand En</span></th>
                    <th>Brand Bn</span></th>
                    <th>Logo</span></th>
                    <th>Action</span></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($brand as $item)
                    <tr>     
                    <td>{{$item->brand_name_en}} </td>
                    <td>{{$item->brand_name_bn}} </td>
                    <td><img src="{{asset($item->brand_image)}}"  style="width: 70px; height: 40px;" alt="">  </td>
                    <td>

                    <div class="row">
                    <a href="{{ Route('brand.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                    <form action="{{Route('brand.destroy', $item->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"> <i class="fa fa-trash"></i></button>
                    </form>
                    </div>
                    </td>

                    </tr>
                    @endforeach	
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

<!--   ------------ Add Brand Page -------- -->
<div class="col-xl-4 ">
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Add Brand </h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">


<form method="post" action="{{ URL::to('admin/brand') }}" enctype="multipart/form-data">
@csrf
    

<div class="form-group">
<h5>Brand Name English  <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text"  name="brand_name_en" class="form-control" > 
@error('brand_name_en') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>


<div class="form-group">
<h5>Brand Name Bangla <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="brand_name_bn" class="form-control" >
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
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">					 
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