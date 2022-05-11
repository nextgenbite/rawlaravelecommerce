@extends('admin.master')
@section('admin')
<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
       
        <div class="ol-xl-8 col-md-8 col-sm-8">
            <div class="box overflow-hidden pull-up">
                <div class="box-header with-border">
                    <h3 class="box-title">Slider List <span class="badge badge-pill badge-sm badge-danger">{{count($index)}} </span></h3>
                  </div>
                <div class="box-body">							
                    <div class="table-responsive">
                    <table table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-uppercase">
                    <th>Slider Title</span></th>
                    <th>Slider Description</span></th>
                    <th>Status</span></th>
                    <th>Image</span></th>
                    <th>Action</span></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($index as $item)
                    <tr>     
                    <td>{{$item->title}} </td>
                    <td>{{$item->description}} </td>
                    <td>
                        @if ($item->status == 1)
                            <span class="badge badge-success">Active</span> 
                                
                        @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td><img src="{{asset($item->slider_img)}}"  style="width: 70px; height: 40px;" alt="">  </td>
                    <td>
                        <div class="row">
                            <a href="{{ Route('slider.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                        <form action="{{Route('slider.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-danger btn-sm" title="Delete Now" type="submit"> <i class="fa fa-trash"></i></button>
                        </form>
                        @if ($item->status == 1)
                            
                        <a href="{{url('admin/slider/inactive/'.$item->id)}} " class="btn btn-success btn-sm" title="Inactive Now"><i class="fa fa-arrow-up"></i> </a>
                        @else
                            
                        <a href="{{url('admin/slider/active/'.$item->id)}}" class="btn btn-danger btn-sm" title="Active Now"><i class="fa fa-arrow-down"></i> </a>
                        @endif
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

<!--   ------------ Add slider Page -------- -->
<div class="ol-xl-4 col-md-4 col-sm-4">
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Add Slider </h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">


<form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
@csrf
    

<div class="form-group">
<h5>Slider Title  <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text"  name="title" class="form-control" > 
@error('title') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>


<div class="form-group">
<h5>Slider Description <span class="text-danger">*</span></h5>
<div class="controls">
    {{-- <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea> --}}
<input type="text" name="description" class="form-control" >
@error('description') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>



<div class="form-group">
<h5>Slider Image <span class="text-danger">*</span></h5>
<div class="controls">
<input type="file" name="slider_img"  class="form-control" >
@error('slider_img') 
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