@include('components._frontend-header')

<body class="container-fluid">

<div class="row">
    <!-- start NAV -->
    @include('components._frontend-nav')
    <!-- end NAV -->
    <!-- start CONTENT -->
    @yield('content')
    <!-- end CONTENT -->
</div>

@include('components._frontend-footer')
