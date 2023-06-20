<meta charset="utf-8"/>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">

<meta name="apple-mobile-web-app-title" content="Smartend">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="mobile-web-app-capable" content="yes">

        <link href="{{ asset('dashboard/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
      


       <link href="{{ asset('dashboard/DataTables/datatables.min.css')}} " rel="stylesheet"/>
       <link href="{{ asset('dashboard/bootstrap/css/bootstrap.min.css')}} " rel="stylesheet"/>
 



{{-- @stack('after-styles') --}}
