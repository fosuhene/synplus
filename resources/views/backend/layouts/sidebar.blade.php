<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#nav_banner" aria-expanded="false" aria-controls="nav_banner">
          <i class="ti-gallery menu-icon"></i>
          <span class="menu-title">Banner</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="nav_banner">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('banner.index')}}">All Banners</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('banner.create')}}">Add Banner</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#nav_category" aria-expanded="false" aria-controls="nav_category">
          <i class="ti-layers-alt menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="nav_category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('category.index')}}">All Categories</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('category.create')}}">Add Category</a></li>
           </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#nav_brand" aria-expanded="false" aria-controls="nav_brand">
          <i class="ti-layers-alt menu-icon"></i>
          <span class="menu-title">Brand</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="nav_brand">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('brand.index')}}">All Brands</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('brand.create')}}">Add Brand</a></li>
           </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#nav_products" aria-expanded="false" aria-controls="nav_products">
          <i class="ti-layout-grid3 menu-icon"></i>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="nav_products">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#nav_cart" aria-expanded="false" aria-controls="nav_cart">
          <i class="ti-shopping-cart-full menu-icon"></i>
          <span class="menu-title">Carts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="nav_cart">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#nav_orders" aria-expanded="false" aria-controls="nav_orders">
          <i class="ti-truck menu-icon"></i>
          <span class="menu-title">Order Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="nav_orders">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#nav_post" aria-expanded="false" aria-controls="nav_post">
          <i class="ti-notepad menu-icon"></i>
          <span class="menu-title">Post Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="nav_post">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#nav_posttag" aria-expanded="false" aria-controls="nav_posttag">
          <i class="ti-layout-list-thumb-alt menu-icon"></i>
          <span class="menu-title">Post Tag</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="nav_posttag">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#nav_postmagt" aria-expanded="false" aria-controls="nav_postmagt">
          <i class="ti-loop menu-icon"></i>
          <span class="menu-title">Post Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="nav_postmagt">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#nav_review" aria-expanded="false" aria-controls="nav_review">
          <i class="ti-pulse menu-icon"></i>
          <span class="menu-title">Review Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="nav_review">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#nav_coupon" aria-expanded="false" aria-controls="nav_coupon">
          <i class="ti-package menu-icon"></i>
          <span class="menu-title">Coupon Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="nav_coupon">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#nav_usermgt" aria-expanded="false" aria-controls="nav_usermgt">
          <i class="ti-headphone-alt menu-icon"></i>
          <span class="menu-title">User Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="nav_usermgt">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/documentation/documentation.html">
          <i class="ti-settings menu-icon"></i>
          <span class="menu-title">Settings</span>
        </a>
      </li>
    </ul>
  </nav>