@extends('admin.master')
@section('admin')
<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
       
        <div class="col-xl-8">
            <div class="box overflow-hidden pull-up">
                <div class="box-header with-border">
                    <h3 class="box-title">Category List <span class="badge badge-pill badge-sm badge-danger">{{count($category)}} </span></h3>
                  </div>
                <div class="box-body">							
                    <div class="table-responsive">
                        <table table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-uppercase">
                                    <th>Icon</span></th>
                                    <th>Category En</span></th>
                                    <th>Category Bn</span></th>
                                    <th>Action</span></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                <tr>  
                                    <td> <span><i class="{{ $item->category_icon }}"></i></span>  </td>   
                                    <td>{{$item->category_name_en}} </td>
                                    <td>{{$item->category_name_bn}} </td>
                                    <td>
                                    <div class="row">
                                        <a href="{{ Route('category.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                    <form action="{{Route('category.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-danger" type="submit"> <i class="fa fa-trash"></i></button>
                                    </form>
                                    </div>
                                    {{-- <a href="{{Route('category.destroy', $item->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
                                    <i class="fa fa-trash"></i></a> --}}
                                    </td>
                                    
                                    </tr>
                                    @endforeach										
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<!--   ------------ Add Category Page -------- -->
<div class="col-xl-4 ">
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Add Category </h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">


<form method="post" action="{{ Route('category.store') }}" enctype="multipart/form-data">
@csrf
    

<div class="form-group">
<h5>Category Name English  <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text"  name="category_name_en" class="form-control" > 
@error('category_name_en') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>


<div class="form-group">
<h5>Category Name Bangla <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="category_name_bn" class="form-control" >
@error('category_name_bn') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>

<div class="form-group">
<h5>Category Slug English <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="category_slug_en" class="form-control" >
@error('category_slug_en') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>
<div class="form-group">
<h5>Category Slug Bangla <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="category_slug_bn" class="form-control" >
@error('category_slug_bn') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>



<div class="form-group">
<h5>Category Icon <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" name="category_icon" class="form-control" >
@error('category_icon') 
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