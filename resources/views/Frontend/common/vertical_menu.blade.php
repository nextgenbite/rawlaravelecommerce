<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
@php
$categories= App\Models\Category::select('id','category_name_en', 'category_name_bn', 'category_icon')->get();
@endphp
      @foreach ($categories as $cat)
          
      <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $cat->category_icon}} " aria-hidden="true"></i>{{session()->get('language')  == 'english' ? $cat->category_name_en: $cat->category_name_bn}}</a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
@php
$subcategories= App\Models\SubCategory::select('id','subcategory_name_en', 'subcategory_name_bn', 'subcategory_slug_en')->whereCategory_id($cat->id)->get();
@endphp                   
              <div class="row">
               @foreach ($subcategories as $subcat)
                   
               <div class="col-sm-12 col-md-3">
                 <ul class="links list-unstyled">
                   <li><a href="{{ url('subcategory/product/'.$subcat->id.'/'.$subcat->subcategory_slug_en ) }}">
                    {{session()->get('language') == 'english' ? $subcat->subcategory_name_en : $subcat->subcategory_name_bn}} </a></li>
                   
                 </ul>
               </div>
               <!-- /.col -->
               @endforeach   
              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
      @endforeach
        <!-- /.menu-item -->
        
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>
  <!-- /.side-menu --> 