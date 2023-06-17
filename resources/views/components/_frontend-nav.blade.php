<nav class="navbar fixed-top navbar-expand-lg">
    <div class="container-fluid col-12 col-lg-10 col-1">
        <a class="brand fs-5 text-decoration-none ff-pmr" href="{{ route('frontend.home') }}">Awesome Sneakers</a>
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler bg-white" data-bs-target="#navbarSupportedContent"
                data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item ps-4">
                    <a href="{{ route('frontend.home') }}" class="nav-link ff-rmv">Home</a>
                </li>
                <li class="nav-item ps-4">
                    <a class="nav-link ff-rmv" href="{{route('frontend.shop')}}">Shop</a>
                </li>
                <li class="nav-item ps-4">
                    @livewire('cart-counter')
                </li>
                @can('admin')
                <li class="nav-item ps-4">
                    <a href="{{ route('backend.home') }}" class="nav-link ff-rmv">Backend</a>
                </li>
                @endcan
                @guest
                <li class="nav-item ps-4">
                    <a href="{{ route('login') }}" class="nav-link ff-rmv"><i
                            class="bi bi-person-circle"></i> Log in</a>
                </li>
                <li class="nav-item ps-4">
                    <a href="{{ route('register') }}" class="nav-link ff-rmv">Register</a>
                </li>
                @endguest
                @auth
                    <li class="nav-item dropdown ps-4">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item ff-rmv" href="{{route('frontend.orders')}}">Orders</a></li>
                            <li class="nav-item">
                                <a class="dropdown-item ff-rmv" href="{{route('logout')}}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                    Out
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                        <path fill-rule="evenodd"
                                              d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                    </svg>
                                </a>
                                <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
