@extends('admin.master')
@section('admin')
<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
       
        <div class="col-xl-8">
            <div class="box overflow-hidden pull-up">
                <div class="box-header with-border">
                    <h3 class="box-title">District List <span class="badge badge-pill badge-sm badge-danger">{{count($district)}} </span></h3>
                  </div>
                <div class="box-body">							
                    <div class="table-responsive">
                        <table table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-uppercase">
                                   
                                    <th>Division Name </th> 
                                    <th>District Name </th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($district as $item)
                                <tr> 
                                    <td>{{$item->division->division_name}} </td>
                                    <td>{{$item->district_name}} </td>
                                    <td>
                                  
                                    <a href="{{ Route('district.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                    <a href="{{ Route('district.destroy', $item->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
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
<h3 class="box-title">Add District </h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">


<form method="post" action="{{ Route('district.store') }}" >
@csrf

<div class="form-group">
    <h5>Division Select <span class="text-danger">*</span></h5>
    <div class="controls">
        <select name="division_id" class="form-control"  >
            <option value="" selected="" disabled="">Select Division</option>
            @foreach($division as $item)
            <option value="{{ $item->id }}">{{ $item->division_name }}</option>	
            @endforeach
        </select>
        @error('division_id') 
     <span class="text-danger">{{ $message }}</span>
     @enderror 
     </div>
</div>

<div class="form-group">
<h5>District Name  <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text"  name="district_name" class="form-control" > 
@error('district_name') 
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