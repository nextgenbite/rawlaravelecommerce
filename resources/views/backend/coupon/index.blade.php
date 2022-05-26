@extends('admin.master')
@section('admin')
<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
       
        <div class="col-xl-8">
            <div class="box overflow-hidden pull-up">
                <div class="box-header with-border">
                    <h3 class="box-title">Coupon List <span class="badge badge-pill badge-sm badge-danger">{{count($coupons)}} </span></h3>
                  </div>
                <div class="box-body">							
                    <div class="table-responsive">
                        <table table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-uppercase">
                                    <th> Id </th>
                                    <th>Coupon Name </th>
                                    <th>Coupon Discount</th>
                                    <th>Validity </th>
                                    <th>Status </th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($coupons as $key=>$item)
                                <tr>  
                                    <td>{{$key++}} </td>
                                    <td> {{ $item->coupon_name}}  </td>   
                                    <td>{{$item->coupon_discount}}% </td>
                                    <td width="25%">
                                        {{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}
                                              </td>
                                 
                                         <td>
                                              @if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                              <span class="badge badge-pill badge-success"> Valid </span>
                                              @else
                                            <span class="badge badge-pill badge-danger"> Invalid </span>
                                              @endif
                                 
                                          </td>
                                    <td>
                                    <div class="row">
                                        <a href="{{ Route('coupon.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                    <form action="{{Route('coupon.destroy', $item->id)}}" method="post">
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
<h3 class="box-title">Add Coupon </h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">


<form method="post" action="{{ Route('coupon.store') }}">
@csrf
    
<div class="form-group">
<h5>Coupon Name <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text"  name="coupon_name" class="form-control" > 
@error('coupon_name') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>


<div class="form-group">
<h5>Coupon Discount <span class="text-danger">*</span></h5>
<div class="controls">
<input type="number" name="coupon_discount" class="form-control" >
@error('coupon_discount') 
<span class="text-danger">{{ $message }}</span>
@enderror 
</div>
</div>

<div class="form-group">
<h5>Coupon Validity <span class="text-danger">*</span></h5>
<div class="controls">
<input type="date" name="coupon_validity" class="form-control" >
@error('coupon_validity') 
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