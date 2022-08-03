@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
 
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{Route('admin.dashboard')}} ">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>E</b> Shop Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route == 'admin.dashboard')? 'active':'' }}">
          <a href="{{Route('admin.dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview {{ ($route == 'brand.index' || $route == 'brand.edit')? 'active':'' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brand</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{Route('brand.index')}} "><i class="ti-more"></i>Brands</a></li>
           
          </ul>
        </li> 
        <li class="treeview {{ ($route == 'category.index' || $route == 'category.edit' )? 'active':'' }} ">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{Route('category.index')}}"><i class="ti-more"></i>Categories</a></li>
            <li><a href="{{Route('subcategory.index')}}"><i class="ti-more"></i>Sub Categories</a></li>
            <li><a href="{{Route('subsubcategory.index')}}"><i class="ti-more"></i>Sub Sub Categories</a></li>
        
          </ul>
        </li>

        <li class="treeview {{ ($route == 'product.index' || $route == 'product.edit')? 'active':'' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{Route('product.create')}} "><i class="ti-more"></i>Add Products</a></li>
            <li><a href="{{Route('product.index')}} "><i class="ti-more"></i>Products</a></li>
           
          </ul>
        </li>  
        <li class="treeview {{ ($route == 'slider.index' || $route == 'slider.edit')? 'active':'' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        
            <li><a href="{{Route('slider.index')}} "><i class="ti-more"></i>Slider List</a></li>
           
          </ul>
        </li>  
        <li class="treeview {{ ($route == 'coupon.index' || $route == 'coupon.edit')? 'active':'' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Cupon</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        
            <li><a href="{{Route('coupon.index')}} "><i class="ti-more"></i>Cupon List</a></li>
           
          </ul>
        </li>  
        
 	  
		 
        <li class="header nav-small-cap">Shipping</li>

        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Ship Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{Route('division.view')}}"><i class="ti-more"></i>Division List</a></li>
            <li><a href="{{Route('district.view')}}"><i class="ti-more"></i>District List</a></li>
            <li><a href="{{Route('state.view')}}"><i class="ti-more"></i>State List</a></li>
            
           
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		  </ul>
        </li>  
		  
    <li class="header nav-small-cap">EXTRA</li>		  
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="layers"></i>
			<span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Level One</a></li>
            <li class="treeview">
              <a href="#">Level One
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Level Two</a></li>
                <li class="treeview">
                  <a href="#">Level Two
                    <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#">Level Three</a></li>
                    <li><a href="#">Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Level One</a></li>
          </ul>
        </li>  
		  
		<li>
          <a href="{{route('admin.logout')}}">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
        </li> 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="{{route('admin.logout')}}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>