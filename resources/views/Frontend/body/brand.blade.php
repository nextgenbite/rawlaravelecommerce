<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
      <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
        @php
             $brands =App\Models\Brand::latest()->get();
        @endphp
        @foreach ($brands as $item)
            
        <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{asset($item->brand_image)}}" src="{{asset('frontend/assets/images/blank.gif')}}" style="height: 110px; width:166px" alt=""> </a> </div>
        <!--/.item-->
        @endforeach
        {{-- <div class="item"> <a href="#" class="image"> <img data-echo="{{asset('frontend/assets/images/brands/brand5.png')}}" src="{{asset('frontend/assets/images/blank.gif')}}" alt=""> </a> </div> --}}
        <!--/.item--> 
      </div>
      <!-- /.owl-carousel #logo-slider --> 
    </div>
    <!-- /.logo-slider-inner --> 
    
  </div>