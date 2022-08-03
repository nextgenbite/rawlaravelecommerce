@extends('admin.master')
@section('admin')
<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
       
        <div class="col-xl-8">
            <div class="box overflow-hidden pull-up">
                <div class="box-header with-border">
                    <h3 class="box-title">Division List <span class="badge badge-pill badge-sm badge-danger">{{count($sVisions)}} </span></h3>
                  </div>
                <div class="box-body">							
                    <div class="table-responsive">
                        <table table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-uppercase">
                                   
                                    <th>Division Name</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sVisions as $item)
                                <tr> 
                                    <td>{{$item->division_name}} </td>
                                    <td>
                                  
                                    <a href="{{ Route('division.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                    <a href="{{ Route('division.destroy', $item->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
                                    <i class="fa fa-trash"></i></a>
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
<h3 class="box-title">Add Division </h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">


<form method="post" action="{{ Route('division.store') }}" >
@csrf
    

<div class="form-group">
<h5>Division Name  <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text"  name="division_name" class="form-control" > 
@error('division_name') 
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