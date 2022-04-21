@extends('admin.master')
@section('admin')
<div class="container-full">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Main content -->
<section class="content">
    <div class="row">
<!--   ------------ Add category Page -------- -->
<div class="col-xl-12 col-12">
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Update Category </h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">


        <form method="POST" action="{{Route('subsubcategory.update', $edit->id)}}" >
            @csrf
            @method('PATCH')    
            <div class="form-group">
                <h5>Category Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="category_id" class="form-control"  >
                        @foreach($category as $item)
                        <option value="{{ $item->id }}"{{$item->id == $edit->category_id ? 'selected': ''}} >{{ $item->category_name_en }}</option>	
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
                    <option value="{{ $edit->subcategory_id }}" selected="">{{ $edit->subcategory->subcategory_name_en }}</option>
                    {{-- @foreach($subcat as $item)
                    <option value="{{ $item->id }}"{{$item->id == $edit->subcategory_id ? 'selected': ''}} >{{ $item->subcategory_name_en }}</option>	
                    @endforeach --}}
                   
         
                 </select>
                 @error('subcategory_id') 
                 <span class="text-danger">{{ $message }}</span>
                 @enderror 
                 </div>
                 </div>
            
            
                <div class="form-group">
                    <h5>Sub Sub-Category English <span class="text-danger">*</span></h5>
                    <div class="controls">
                 <input type="text" name="subsubcategory_name_en" value="{{$edit->subsubcategory_name_en}} " class="form-control" >
                 @error('subsubcategory_name_en') 
                 <span class="text-danger">{{ $message }}</span>
                 @enderror 
                  </div>
                </div>
            
            
                <div class="form-group">
                    <h5>Sub Sub-Category Bangla  <span class="text-danger">*</span></h5>
                    <div class="controls">
                 <input type="text" name="subsubcategory_name_bn" value="{{$edit->subsubcategory_name_bn}} " class="form-control" >
                 @error('subsubcategory_name_bn') 
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