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


        <form method="POST" action="{{Route('state.update', $edit->id)}}" >
            @csrf
            @method('PATCH')    
            <div class="form-group">
                <h5>Category Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="division_id" class="form-control"  >
                        @foreach($division as $item)
                        <option value="{{ $item->id }}"{{$item->id == $edit->division_id ? 'selected': ''}} >{{ $item->division_name}}</option>	
                        @endforeach
                    </select>
                    @error('division_id') 
                 <span class="text-danger">{{ $message }}</span>
                 @enderror 
                 </div>
                 </div>
                 <div class="form-group">
                 <h5>District <span class="text-danger">*</span></h5>
                 <div class="controls">
                 <select name="subdivision_id" class="form-control"  >
                    <option value="{{ $edit->district_id }}" selected="">{{ $edit->district->district_name }}</option>
                    {{-- @foreach($subcat as $item)
                    <option value="{{ $item->id }}"{{$item->id == $edit->subdivision_id ? 'selected': ''}} >{{ $item->subcategory_name_en }}</option>	
                    @endforeach --}}
                   
         
                 </select>
                 @error('subdivision_id') 
                 <span class="text-danger">{{ $message }}</span>
                 @enderror 
                 </div>
                 </div>
            
            
                <div class="form-group">
                    <h5>State <span class="text-danger">*</span></h5>
                    <div class="controls">
                 <input type="text" name="state_name_en" value="{{$edit->state_name}} " class="form-control" >
                 @error('state_name_en') 
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
      $('select[name="division_id"]').on('change', function(){
          var division_id = $(this).val();
          if(division_id) {
              $.ajax({
                  url: "{{url('admin/subcategory/ajax') }}/"+division_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subdivision_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subdivision_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
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