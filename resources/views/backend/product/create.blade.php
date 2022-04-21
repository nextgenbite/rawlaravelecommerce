@extends('admin.master')
@section('admin')
<div class="container-full">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Main content -->
<section class="content">

<!--   ------------ Add Product Page -------- -->
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Add Product </h3>
</div>
<!-- /.box-header -->
<div class="box-body">


        <form method="POST" action="{{Route('product.store')}}" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')   
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <h5>Brand Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="brand_id" class="form-control"  >
                        <option value="" selected="" disabled="">Select Brand</option>
                        @foreach($brand as $item)
                        <option value="{{$item->id}}">{{$item->brand_name_en}}</option> 
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
                        @foreach($cat as $item)
                        <option value="{{$item->id}} " >{{$item->category_name_en}} </option> 
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
                        <option value="" selected="" disabled="">Select Category</option>
                        @foreach($cat as $item)
                            
                        @endforeach
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
             <input type="text" name="product_name_en" class="form-control" >
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
             <input type="text" name="product_name_bn" class="form-control" >
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
             <input type="text" name="product_code" class="form-control" >
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
             <input type="text" name="product_qty" class="form-control" >
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
             <input type="text" name="product_tags_en" class="form-control" >
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
             <input type="text" name="product_tags_en" class="form-control" >
             @error('product_tags_en') 
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
             <input type="text" name="product_size_bn" class="form-control" >
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
             <input type="text" name="product_color_en" class="form-control" >
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
             <input type="text" name="product_color_bn" class="form-control" >
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
             <input type="text" name="subcategory_name_en" class="form-control" >
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
                      <input type="text" name="product_code" class="form-control" required="">
                      </div>
              </div>
                      
                  </div>
                  <div class="col-md-4">

                    <div class="form-group">
                          <h5>Main Thambnail<span class="text-danger">*</span></h5>
                          <div class="controls">
                              <input type="file" name="product_code" class="form-control" required="">
                              </div>
                      </div>
                              
                          </div>
                          <div class="col-md-4">

                            <div class="form-group">
                                  <h5>Multiple Image <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" required="">
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
                 <textarea class="form-control" name="short_descp_en" id="editor1" cols="30" rows="10"></textarea>
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
            <textarea class="form-control textarea" name="short_descp_bn"  cols="30" rows="10"></textarea>
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
                 <textarea class="form-control textarea" name="long_descp_en"  cols="30" rows="10"></textarea>
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
            <textarea class="form-control textarea"  name="long_descp_bn"  cols="30" rows="10"></textarea>
            @error('long_descp_bn') 
            <span class="text-danger">{{ $message }}</span>
            @enderror 
            </div>
            </div>

            </div>
                        
    </div> 
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
        <div class="controls">
            <fieldset>
                <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                <label for="checkbox_2">Hot Deals</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="checkbox_3" name="featured" value="1">
                <label for="checkbox_3">Featured</label>
            </fieldset>
        </div>
        </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
        <div class="controls">
            <fieldset>
                <input type="checkbox" id="checkbox_2" name="special_offer" value="1">
                <label for="checkbox_2">Special Offer</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="checkbox_3" name="special_deals" value="1">
                <label for="checkbox_3">Special Deals</label>
            </fieldset>
        </div>
        </div>
        </div>

    </div>  
 
        <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">					 
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

      $('select[name="subcategory_id"]').on('change', function(){
          var subcategory_id = $(this).val();
          if(subcategory_id) {
              $.ajax({
                  url: "{{url('admin/subsubcategory/ajax') }}/"+subcategory_id,
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
  <script src="{{asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
@endsection