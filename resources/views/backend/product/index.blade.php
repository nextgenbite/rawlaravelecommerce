@extends('admin.master')
@section('admin')
<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
       
        <div class="col-xl-12 col-12">
            <div class="box overflow-hidden pull-up">
                <div class="box-header with-border">
                    <h3 class="box-title">Product List <span class="badge badge-pill badge-sm badge-danger">{{count($index)}} </span></h3>
                  </div>
                <div class="box-body">							
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image </th>
                                    <th>Product En</th>
                                    <th>Product Price </th>
                                    <th>Quantity </th>
                                    <th>Discount </th>
                                    <th>Status </th>
                                    <th>Action</th>
                                     
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($index as $item)
                                <tr>  
                                    <td><img src="{{asset($item->product_thambnail)}}"  style="width: 70px; height: 40px;" alt="">  </td>
                                    <td>{{$item->product_name_en}} </td>
                                    <td>{{$item->product_name_bn}} </td>
                                    <td>{{$item->product_qty}} </td>
                                    <td>{{$item->discount_price}} </td>
                                    <td>{{$item->status}} </td>
                                    <td>
                                    <div class="row">
                                        <a href="{{ Route('product.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                    <form action="{{Route('product.destroy', $item->id)}}" method="post">
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

    </div>
</section>
<!-- /.content -->
  </div>
@endsection

