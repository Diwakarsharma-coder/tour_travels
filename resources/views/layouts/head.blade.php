<meta charset="utf-8"/>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">

<meta name="apple-mobile-web-app-title" content="Smartend">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="mobile-web-app-capable" content="yes">

 <!-- Favicon -->
<link href="{{ asset('frontend/img/favicon.ico') }}" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{ asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
<link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{ asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet">

{{-- <link href="{{ asset('frontend/datepicker/css/cdnjs.cloudflare.com_ajax_libs_bootstrap-datetimepicker_3.1.3_css_bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
<link href="{{ asset('frontend/datepicker/css/maxcdn.bootstrapcdn.com_bootstrap_3.3.2_css_bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('frontend/datepicker/css/maxcdn.bootstrapcdn.com_font-awesome_4.3.0_css_font-awesome.min.css')}}" rel="stylesheet"> --}}

{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com_bootstrap_3.3.2_css_bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com_font-awesome_4.3.0_css_font-awesome.min.css" rel="stylesheet">
 --}}
 <link rel="stylesheet"
        href="{{ asset('frontend/css/datepicker_1.9.0_css_bootstrap-datepicker.min.css') }}" />
        

{{-- @stack('after-styles') --}}
