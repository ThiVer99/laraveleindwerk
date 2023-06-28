<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center" href="{{route('backend.home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-gears"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CMS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('frontend.home')}}">
            <i class="fa-solid fa-shop"></i>
            <span>Awesome Sneakers</span></a>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Users -->
    @can('admin')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa-solid fa-users"></i>
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
    <!-- Products -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
           aria-expanded="true" aria-controls="collapseProducts">
            <i class="fa-solid fa-basket-shopping"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="collapseProducts" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('products.index')}}">All products</a>
                <a class="collapse-item" href="{{route('products.create')}}">Create Product</a>
                <a class="collapse-item" href="{{route('brands.index')}}">Brands</a>
                <a class="collapse-item" href="{{route('productcategories.index')}}">Categories</a>
                <a class="collapse-item" href="{{route('genders.index')}}">Genders</a>
                <a class="collapse-item" href="{{route('colors.index')}}">Colors</a>
                <a class="collapse-item" href="{{route('sizes.index')}}">Sizes</a>
            </div>
        </div>
    </li>
    <!-- Orders -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
           aria-expanded="true" aria-controls="collapseOrders">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrders" class="collapse" aria-labelledby="collapseOrders" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Links:</h6>
                <a class="collapse-item" href="{{route('orders.index')}}">All Orders</a>
            </div>
        </div>
    </li>
</ul>
