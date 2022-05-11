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
                    <div class="table-responsive-sm">
                        <table id="complex_header" class="table table-bordered table-striped table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Image </th>
                                    <th scope="col">Product En</th>
                                    <th scope="col">Product Price </th>
                                    <th scope="col">Quantity </th>
                                    <th scope="col">Discount </th>
                                    <th scope="col">Status </th>
                                    <th scope="col">Action</th>
                                     
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
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge badge-success">Active</span> 
                                                 
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                    <div class="row">
                                        <a href="{{ Route('product.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                    <form action="{{Route('product.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Delete Now" type="submit"> <i class="fa fa-trash"></i></button>
                                    </form>
                                    @if ($item->status == 1)
                                        
                                    <a href="#" class="btn btn-success btn-sm" title="Inactive Now"><i class="fa fa-arrow-up"></i> </a>
                                    @else
                                        
                                    <a href="#" class="btn btn-danger btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
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

    </div>
</section>
<!-- /.content -->
  </div>
  <script src="{{asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
  <script src="{{asset('backend/js/pages/data-table.js')}}"></script>
@endsection

