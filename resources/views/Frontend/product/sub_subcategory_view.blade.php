@extends('Frontend.master')
@section('content')

  <div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
        <div class='col-md-3 sidebar'> 
          <!-- ================================== TOP NAVIGATION ================================== -->
            @include('Frontend.common.vertical_menu')
          <!-- /.side-menu --> 
          <!-- ================================== TOP NAVIGATION : END ================================== -->
          <div class="sidebar-module-container">
            <div class="sidebar-filter"> 
              <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
              <div class="sidebar-widget wow fadeInUp">
                <h3 class="section-title">shop by</h3>
                <div class="widget-header">
                  <h4 class="widget-title">Category</h4>
                </div>
                <div class="sidebar-widget-body">
                  <div class="accordion">

                    @foreach ($categories as $cat)
                        
                    <div class="accordion-group">
                      <div class="accordion-heading"> <a href="#{{$cat->id}}" data-toggle="collapse" class="accordion-toggle collapsed">{{session()->get('language') == 'english' ? $cat->category_name_en :$cat->category_name_bn}} </a> </div>
                      <!-- /.accordion-heading -->
                      <div class="accordion-body collapse" id="{{$cat->id}}" style="height: 0px;">
                        <div class="accordion-inner">
                          <ul>
                            @php
                                $subCats = App\Models\Subcategory::whereCategory_id($cat->id)->get();
                            @endphp
                            @foreach ($subCats as $subCat)
                                
                            <li><a href="{{ url('subcategory/product/'.$subCat->id.'/'.$subCat->subcategory_slug_en ) }}">{{session()->get('language') == 'english' ? $subCat->subcategory_name_en :$subCat->subcategory_name_bn}}</a></li>
                            @endforeach
   
                          </ul>
                        </div>
                        <!-- /.accordion-inner --> 
                      </div>
                      <!-- /.accordion-body --> 
                    </div>
                    <!-- /.accordion-group -->
                    @endforeach
                    
                   
                    
                  </div>
                  <!-- /.accordion --> 
                </div>
                <!-- /.sidebar-widget-body --> 
              </div>
              <!-- /.sidebar-widget --> 
              <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
              
              <!-- ============================================== PRICE SILDER============================================== -->
              <div class="sidebar-widget wow fadeInUp">
                <div class="widget-header">
                  <h4 class="widget-title">Price Slider</h4>
                </div>
                <div class="sidebar-widget-body m-t-10">
                  <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                    <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                    <input type="text" class="price-slider" value="" >
                  </div>
                  <!-- /.price-range-holder --> 
                  <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
                <!-- /.sidebar-widget-body --> 
              </div>
              <!-- /.sidebar-widget --> 
              <!-- ============================================== PRICE SILDER : END ============================================== --> 
              <!-- ============================================== MANUFACTURES============================================== -->
              <div class="sidebar-widget wow fadeInUp">
                <div class="widget-header">
                  <h4 class="widget-title">Manufactures</h4>
                </div>
                <div class="sidebar-widget-body">
                  <ul class="list">
                    @foreach ($brands as $brand)
                        
                    <li><a href="#">{{session()->get('language') == 'english' ? $brand->brand_name_en :$brand->brand_name_bn }}</a></li>
                    @endforeach
                  </ul>
                  <!--<a href="#" class="lnk btn btn-primary">Show Now</a>--> 
                </div>
                <!-- /.sidebar-widget-body --> 
              </div>
              <!-- /.sidebar-widget --> 
              <!-- ============================================== MANUFACTURES: END ============================================== --> 
              <!-- ============================================== COLOR============================================== -->
               <!-- ============================================== COMPARE============================================== -->
              <div class="sidebar-widget wow fadeInUp outer-top-vs">
                <h3 class="section-title">Compare products</h3>
                <div class="sidebar-widget-body">
                  <div class="compare-report">
                    <p>You have no <span>item(s)</span> to compare</p>
                  </div>
                  <!-- /.compare-report --> 
                </div>
                <!-- /.sidebar-widget-body --> 
              </div>
              <!-- /.sidebar-widget --> 
              <!-- ============================================== COMPARE: END ============================================== --> 
              <!-- ============================================== PRODUCT TAGS ============================================== -->
              <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
                <h3 class="section-title">Product tags</h3>
                <div class="sidebar-widget-body outer-top-xs">
                  <div class="tag-list"> <a class="item" title="Phone" href="category.html">Phone</a> <a class="item active" title="Vest" href="category.html">Vest</a> <a class="item" title="Smartphone" href="category.html">Smartphone</a> <a class="item" title="Furniture" href="category.html">Furniture</a> <a class="item" title="T-shirt" href="category.html">T-shirt</a> <a class="item" title="Sweatpants" href="category.html">Sweatpants</a> <a class="item" title="Sneaker" href="category.html">Sneaker</a> <a class="item" title="Toys" href="category.html">Toys</a> <a class="item" title="Rose" href="category.html">Rose</a> </div>
                  <!-- /.tag-list --> 
                </div>
                <!-- /.sidebar-widget-body --> 
              </div>
              <!-- /.sidebar-widget --> 
            <!----------- Testimonials------------->
              <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                <div id="advertisement" class="advertisement">
                  <div class="item">
                    <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                    <div class="clients_author">John Doe <span>Abc Company</span> </div>
                    <!-- /.container-fluid --> 
                  </div>
                  <!-- /.item -->
                  
                  <div class="item">
                    <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
                    <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                    <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                  </div>
                  <!-- /.item -->
                  
                  <div class="item">
                    <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                    <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                    <!-- /.container-fluid --> 
                  </div>
                  <!-- /.item --> 
                  
                </div>
                <!-- /.owl-carousel --> 
              </div>
              
              <!-- ============================================== Testimonials: END ============================================== -->
              
              <div class="home-banner"> <img src="assets/images/banners/LHS-banner.jpg" alt="Image"> </div>
            </div>
            <!-- /.sidebar-filter --> 
          </div>
          <!-- /.sidebar-module-container --> 
        </div>
        <!-- /.sidebar -->
        <div class='col-md-9'> 
          <!-- ========================================== SECTION – HERO ========================================= -->
          
          @include('Frontend.body.slider')
          
       
          <div class="clearfix filters-container m-t-10">
            <div class="row">
              <div class="col col-sm-6 col-md-2">
                <div class="filter-tabs">
                  <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                  </ul>
                </div>
                <!-- /.filter-tabs --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-12 col-md-6">
                <div class="col col-sm-3 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">position</a></li>
                          <li role="presentation"><a href="#">Price:Lowest first</a></li>
                          <li role="presentation"><a href="#">Price:HIghest first</a></li>
                          <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld --> 
                  </div>
                  <!-- /.lbl-cnt --> 
                </div>
                <!-- /.col -->
                <div class="col col-sm-3 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">Show</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">1</a></li>
                          <li role="presentation"><a href="#">2</a></li>
                          <li role="presentation"><a href="#">3</a></li>
                          <li role="presentation"><a href="#">4</a></li>
                          <li role="presentation"><a href="#">5</a></li>
                          <li role="presentation"><a href="#">6</a></li>
                          <li role="presentation"><a href="#">7</a></li>
                          <li role="presentation"><a href="#">8</a></li>
                          <li role="presentation"><a href="#">9</a></li>
                          <li role="presentation"><a href="#">10</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld --> 
                  </div>
                  <!-- /.lbl-cnt --> 
                </div>
                <!-- /.col --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-6 col-md-4 text-right">
                <div class="pagination-container">
                  <ul class="list-inline list-unstyled">
                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                  </ul>
                  <!-- /.list-inline --> 
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.col --> 
            </div>
            <!-- /.row --> 
          </div>
          <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">
              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                  <div class="row">
                    
                    @include('Frontend.common.gridview')
                    
                  </div>
                  <!-- /.row --> 
                </div>
                <!-- /.category-product --> 
                
              </div>
              <!-- /.tab-pane -->
              
              <div class="tab-pane "  id="list-container">
                <div class="category-product">
                    @include('Frontend.common.listview')
                  <!-- /.category-product-inner -->
                  
                 
                  
                </div>
                <!-- /.category-product --> 
              </div>
              <!-- /.tab-pane #list-container --> 
            </div>
            <!-- /.tab-content -->
            <div class="clearfix filters-container">
              <div class="text-right">
                <div class="pagination-container">
                  <ul class="list-inline list-unstyled">
                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                  </ul>
                  <!-- /.list-inline --> 
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.text-right --> 
              
            </div>
            <!-- /.filters-container --> 
            
          </div>
          <!-- /.search-result-container --> 
          
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      @include('Frontend.body.brand')
      <!-- /.logo-slider --> 
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.body-content --> 
@endsection