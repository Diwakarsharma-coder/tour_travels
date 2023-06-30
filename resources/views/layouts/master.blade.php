<!DOCTYPE html>
<html lang="">

<head>
    @include('layouts.head')
</head>

<body class="sb-nav-fixed">
    
      <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End --> 
    @include('layouts.header')
    @yield('content')
    

    @include('layouts.footer')
    @include('layouts.foot')
</body>
</html>
