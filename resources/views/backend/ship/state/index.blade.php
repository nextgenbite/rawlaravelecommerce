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
            <h3 class="box-title">State List <span class="badge badge-pill badge-sm badge-danger">{{count($state)}} </span></h3>
            </div>
        <div class="box-body">							
            <div class="table-responsive">
            <table table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-uppercase">
                        <th>Division </th>
                        <th>District Name</th>
                        <th>State </th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($state as $item)
                    <tr>    
                        <td> {{ $item['division']['division_name'] }}  </td>   
                        <td> {{ $item['district']['district_name'] }}  </td>   
                        <td>{{$item->state_name}} </td>
                        <td>
                        <div class="row">
                            <a href="{{ Route('state.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                        <form action="{{Route('state.destroy', $item->id)}}" method="post">
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


        <form method="post" action="{{ route('state.store') }}" >
            @csrf
                          
   
        <div class="form-group">
       <h5>Category <span class="text-danger">*</span></h5>
       <div class="controls">
           <select name="division_id" class="form-control"  >
               <option value="" selected="" disabled="">Select a Division</option>
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
        <h5>District <span class="text-danger">*</span></h5>
        <div class="controls">
        <select name="district_id" class="form-control"  >
            <option value="" selected="" disabled="">Select a District</option>
            @foreach($district as $item)
                <option value="{{ $item->id }}">{{ $item->district_name }}</option>	
            @endforeach
        </select>
        @error('district_id') 
        <span class="text-danger">{{ $message }}</span>
        @enderror 
        </div>
        </div>
   
   
       <div class="form-group">
           <h5>State <span class="text-danger">*</span></h5>
           <div class="controls">
        <input type="text" name="state_name" class="form-control" >
        @error('state_name') 
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
      $('select[name="division_id"]').on('change', function(){
          var division_id = $(this).val();
          if(division_id) {
              $.ajax({
                  url: "{{url('admin/district/ajax') }}/"+division_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="district_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
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

