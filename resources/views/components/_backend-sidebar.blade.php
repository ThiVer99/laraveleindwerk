<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center" href="{{route('backend.home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cogs"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CMS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('backend.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>CRM</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @can('admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-user"></i>
            <span>Users</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('users.index')}}">All users</a>
                <a class="collapse-item" href="{{route('users.create')}}">Add user</a>
            </div>
        </div>
    </li>
    @endcan
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('frontend.home')}}">
            <i class="fas fa-shopping-bag"></i>
            <span>Awesome Sneakers</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Products -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
           aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-shopping-cart"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="collapseProducts" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('products.index')}}">All products</a>
                <a class="collapse-item" href="{{route('products.create')}}">Create Product</a>
            </div>
        </div>
    </li>
    <!-- Orders -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
           aria-expanded="true" aria-controls="collapseOrders">
            <i class="fas fa-shopping-cart"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrders" class="collapse" aria-labelledby="collapseOrders" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('orders.index')}}">All Orders</a>
            </div>
        </div>
    </li>
    <!-- Brands -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrands"
           aria-expanded="true" aria-controls="collapseBrands">
            <i class="fas fa-tags"></i>
            <span>Brands</span>
        </a>
        <div id="collapseBrands" class="collapse" aria-labelledby="collapseBrands" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('brands.index')}}">All brands</a>
                <a class="collapse-item" href="{{route('brands.create')}}">Create Brand</a>
            </div>
        </div>
    </li>
    <!-- Product Categories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProductcategories"
           aria-expanded="true" aria-controls="collapseProductcategories">
            <i class="fas fa-tint"></i>
            <span>Product Categories</span>
        </a>
        <div id="collapseProductcategories" class="collapse" aria-labelledby="collapseProductcategories" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('productcategories.index')}}">All Product Categories</a>
                <a class="collapse-item" href="{{route('productcategories.create')}}">Create Product Category</a>
            </div>
        </div>
    </li>
    <!-- Genders -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGenders"
           aria-expanded="true" aria-controls="collapseGenders">
            <i class="fas fa-tags"></i>
            <span>Genders</span>
        </a>
        <div id="collapseGenders" class="collapse" aria-labelledby="collapseGenders" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('genders.index')}}">All genders</a>
                <a class="collapse-item" href="{{route('genders.create')}}">Create gender</a>
            </div>
        </div>
    </li>
    <!-- Colors -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseColorsNav"
           aria-expanded="true" aria-controls="collapseColorsNav">
            <i class="fas fa-palette"></i>
            <span>Colors</span>
        </a>
        <div id="collapseColorsNav" class="collapse" aria-labelledby="collapseColorsNav" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('colors.index')}}">All colors</a>
                <a class="collapse-item" href="{{route('colors.create')}}">Create color</a>
            </div>
        </div>
    </li>
    <!-- Size -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSizesNav"
           aria-expanded="true" aria-controls="collapseSizesNav">
            <i class="fas fa-shoe-prints"></i>
            <span>Sizes</span>
        </a>
        <div id="collapseSizesNav" class="collapse" aria-labelledby="collapseSizesNav" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('sizes.index')}}">All sizes</a>
                <a class="collapse-item" href="{{route('sizes.create')}}">Create size</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
           aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="{{asset('imag/undraw_rocket.svg')}}" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>

</ul>
