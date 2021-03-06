@extends('admin.master')
@section('admin')
<div class="container-full">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Main content -->
<section class="content">

<!--   ------------ Add Product Page -------- -->
<div class="box">
<div class="box-header with-border">
    @if (isset($edit))
        
    <h3 class="box-title">Update Product </h3>
    @else
        
    <h3 class="box-title">Add Product </h3>
    @endif
</div>
<!-- /.box-header -->
<div class="box-body">
    @if (isset($edit))
        
    <form method="POST" action="{{Route('product.store', $edit->id)}}" enctype="multipart/form-data" >
        @csrf
        @method('PATCH')   
        <input type="hidden" name="old_image" value="{{ $edit->product_thambnail }}">	
    @else
        
    <form method="POST" action="{{Route('product.store')}}" enctype="multipart/form-data" >
        @csrf
    @endif

  
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <h5>Brand Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="brand_id" class="form-control"  >
                        <option selected disabled>Select Brand</option>
                        @foreach($brands as $item)
                        <option value="{{$item->id}}" >{{$item->brand_name_en}}</option> 
                        @endforeach
                    </select>                           
                    @error('brand_id') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <h5>Category Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="category_id" class="form-control"  >
                        <option value="" selected="" disabled="">Select Category</option>
                        @foreach($categories as $item)
                        <option value="{{$item->id}} "  >{{$item->category_name_en}} </option> 
                        @endforeach
                    </select>                           
                    @error('category_id') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <h5> Sub Category Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="subcategory_id" class="form-control"  >
                        <option value="" selected="" disabled="">Select Sub Category</option>
                       
                    </select>                           
                    @error('subcategory_id') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <h5> Sub Sub-Category Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="subsubcategory_id" class="form-control"  >
						<option value="" selected="" disabled="">Select Sub Sub Category</option>
                        
                    </select>                           
                    @error('subcategory_id') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <h5>Product Name English <span class="text-danger">*</span></h5>
                <div class="controls">
             <input type="text" name="product_name_en"  " class="form-control" >
             @error('product_name_en') 
             <span class="text-danger">{{ $message }}</span>
             @enderror 
              </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <h5>Product Name Bangla <span class="text-danger">*</span></h5>
                <div class="controls">
             <input type="text" name="product_name_bn"  class="form-control" >
             @error('product_name_bn') 
             <span class="text-danger">{{ $message }}</span>
             @enderror 
              </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <h5>Product Code <span class="text-danger">*</span></h5>
                <div class="controls">
             <input type="text" name="product_code"  " class="form-control" >
             @error('product_code') 
             <span class="text-danger">{{ $message }}</span>
             @enderror 
              </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <h5>Product Quantity  <span class="text-danger">*</span></h5>
                <div class="controls">
             <input type="text" name="product_qty"  " class="form-control" >
             @error('product_qty') 
             <span class="text-danger">{{ $message }}</span>
             @enderror 
              </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <h5>Product Tags English <span class="text-danger">*</span></h5>
                <div class="controls">
             <input type="text" name="product_tags_en"  " class="form-control" >
             @error('product_tags_en') 
             <span class="text-danger">{{ $message }}</span>
             @enderror 
              </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <h5>Product Tags Bangla <span class="text-danger">*</span></h5>
                <div class="controls">
             <input type="text" name="product_tags_bn" class="form-control" >
             @error('product_tags_bn') 
             <span class="text-danger">{{ $message }}</span>
             @enderror 
              </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <h5>Product Size English <span class="text-danger">*</span></h5>
                <div class="controls">
             <input type="text" name="product_size_en" class="form-control" >
             @error('product_size_en') 
             <span class="text-danger">{{ $message }}</span>
             @enderror 
              </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <h5>Product Size Bangla <span class="text-danger">*</span></h5>
                <div class="controls">
             <input type="text" name="product_size_bn"  class="form-control" >
             @error('product_size_bn') 
             <span class="text-danger">{{ $message }}</span>
             @enderror 
              </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <h5>Product Color English <span class="text-danger">*</span></h5>
                <div class="controls">
             <input type="text" name="product_color_en"  class="form-control" >
             @error('product_color_en') 
             <span class="text-danger">{{ $message }}</span>
             @enderror 
              </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <h5>Product Color Bangla <span class="text-danger">*</span></h5>
                <div class="controls">
             <input type="text" name="product_color_bn"  class="form-control" >
             @error('product_color_bn') 
             <span class="text-danger">{{ $message }}</span>
             @enderror 
              </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                <div class="controls">
             <input type="text" name="selling_price"  class="form-control" >
             @error('subcategory_name_en') 
             <span class="text-danger">{{ $message }}</span>
             @enderror 
              </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-4">

            <div class="form-group">
                  <h5>Product Discount Price <span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="discount_price"  class="form-control" required="">
                      </div>
              </div>
                      
                  </div>
                  <div class="col-md-4">

                    <div class="form-group">
                        <h5>Main Thambnail <span class="text-danger">*</span></h5>
                        <div class="controls">
                 <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)"  >
                 @error('product_thambnail') 
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
                 <img src="" id="mainThmb">
                          </div>
                    </div>
                              
                          </div>
                          <div class="col-md-4">

                            <div class="form-group">
                                  <h5>Multiple Image <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" >
                                         <div class="row" id="preview_img"></div>
                                             </div>
                              </div>
                                      
                                  </div>
    </div> 
    <div class="row">
        <div class="col-md-6">

            <div class="form-group">
             <h5>Product Short Dis English<span class="text-danger">*</span></h5>
                <div class="controls">
                 <textarea class="form-control" name="short_descp_en"  cols="30" rows="10"></textarea>
                 @error('short_descp_en') 
                 <span class="text-danger">{{ $message }}</span>
                 @enderror 
                </div>
            </div>

            </div>
            <div class="col-md-6">

            <div class="form-group">
            <h5>Product Short Dis Bangla<span class="text-danger">*</span></h5>
            <div class="controls">
            <textarea class="form-control" name="short_descp_bn"  cols="30" rows="10"></textarea>
            @error('short_descp_bn') 
            <span class="text-danger">{{ $message }}</span>
            @enderror 
            </div>
            </div>

            </div>
                        
    </div> 
    <div class="row">
        <div class="col-md-6">

            <div class="form-group">
             <h5>Product Long Dis English<span class="text-danger">*</span></h5>
                <div class="controls">
                 <textarea class="form-control " id="editor1" name="long_descp_en"  cols="30" rows="10"></textarea>
                 @error('long_descp_en') 
                 <span class="text-danger">{{ $message }}</span>
                 @enderror 
                </div>
            </div>

            </div>
            <div class="col-md-6">

            <div class="form-group">
            <h5>Product Long Dis Bangla<span class="text-danger">*</span></h5>
            <div class="controls">
            <textarea class="form-control" id="editor2"  name="long_descp_bn"  cols="30" rows="10"></textarea>
            @error('long_descp_bn') 
            <span class="text-danger">{{ $message }}</span>
            @enderror 
            </div>
            </div>

            </div>
                        
    </div> 
    {{-- <div class="row">
        <div class="col-md-6">
            <div class="form-group">
        <div class="controls">
            <fieldset>
                <input type="checkbox" id="checkbox_1"  name="hot_deals" value="1">
                <label for="checkbox_1">Hot Deals</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="checkbox_2"  name="featured" value="1">
                <label for="checkbox_2">Featured</label>
            </fieldset>
        </div>
        </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
        <div class="controls">
            <fieldset>
                <input type="checkbox" id="checkbox_3"  name="special_offer" value="1">
                <label for="checkbox_3">Special Offer</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="checkbox_4"  name="special_deals" value="1">
                <label for="checkbox_4">Special Deals</label>
            </fieldset>
        </div>
        </div>
        </div>

    </div>   --}}
 
        <div class="text-xs-right">
            @if (isset($edit))
                
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">					 
            @else
                
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">					 
            @endif
        </div>
        </form>




    
   
</div>
<!-- /.box-body -->
</div>
<!-- /.box --> 

   
</section>
<!-- /.content -->
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('/admin/subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                      $('select[name="subsubcategory_id"]').html('');
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



$('select[name="subcategory_id"]').on('change', function(){
          var subcategory_id = $(this).val();
          if(subcategory_id) {
              $.ajax({
                  url: "{{  url('/admin/subsubcategory/ajax') }}/"+subcategory_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });


  });
  </script>


<script type="text/javascript">
  function mainThamUrl(input){
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e){
              $('#mainThmb').attr('src',e.target.result).width(80).height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }	
</script>


<script>

$(document).ready(function(){
 $('#multiImg').on('change', function(){ //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
        var data = $(this)[0].files; //this file data
         
        $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                .height(80); //create image element 
                    $('#preview_img').append(img); //append image to output element
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
            }
        });
         
    }else{
        alert("Your browser doesn't support File API!"); //if File API is absent
    }
 });
});
 
</script>
@endsection