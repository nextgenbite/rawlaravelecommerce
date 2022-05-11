@extends('admin.master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">

<!-- Main content -->
<section class="content">
    <div class="row">
       
<div class="col-xl-8 ">
    <div class="box overflow-hidden pull-up">
        <div class="box-header with-border">
            <h3 class="box-title">Sub Sub-Category List <span class="badge badge-pill badge-sm badge-danger">{{count($subsubcat)}} </span></h3>
            </div>
        <div class="box-body">							
            <div class="table-responsive">
            <table table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-uppercase">
                        <th>Category </th>
                        <th>SubCategory Name</th>
                        <th>Sub-Subcategory English </th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subsubcat as $item)
                    <tr>    
                        <td> {{ $item['category']['category_name_en'] }}  </td>   
                        <td> {{ $item['subcategory']['subcategory_name_en'] }}  </td>   
                        <td>{{$item->subsubcategory_name_en}} </td>
                        <td>
                        <div class="row">
                            <a href="{{ Route('subsubcategory.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                        <form action="{{Route('subsubcategory.destroy', $item->id)}}" method="post">
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

<!--   ------------ Add Sub Sub Category Page -------- -->
<div class="col-xl-4 ">
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Add Sub Sub-Category </h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">


        <form method="post" action="{{ route('subsubcategory.store') }}" >
            @csrf
                          
   
        <div class="form-group">
       <h5>Category Select <span class="text-danger">*</span></h5>
       <div class="controls">
           <select name="category_id" class="form-control"  >
               <option value="" selected="" disabled="">Select Category</option>
               @foreach($category as $item)
               <option value="{{ $item->id }}">{{ $item->category_name_en }}</option>	
               @endforeach
           </select>
           @error('category_id') 
        <span class="text-danger">{{ $message }}</span>
        @enderror 
        </div>
        </div>
        <div class="form-group">
        <h5>SubCategory Select <span class="text-danger">*</span></h5>
        <div class="controls">
        <select name="subcategory_id" class="form-control"  >
        <option value="" selected="" disabled="">Select SubCategory</option>

        </select>
        @error('subcategory_id') 
        <span class="text-danger">{{ $message }}</span>
        @enderror 
        </div>
        </div>
   
   
       <div class="form-group">
           <h5>Sub Sub-Category English <span class="text-danger">*</span></h5>
           <div class="controls">
        <input type="text" name="subsubcategory_name_en" class="form-control" >
        @error('subsubcategory_name_en') 
        <span class="text-danger">{{ $message }}</span>
        @enderror 
         </div>
       </div>
   
   
       <div class="form-group">
           <h5>Sub Sub-Category Bangla  <span class="text-danger">*</span></h5>
           <div class="controls">
        <input type="text" name="subsubcategory_name_bn" class="form-control" >
        @error('subsubcategory_name_bn') 
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
  <script type="text/javascript">
    $(document).ready(function() {
      $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{url('admin/subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });
  });
  </script>


@endsection

