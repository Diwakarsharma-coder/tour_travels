<!DOCTYPE html>
<html lang="">

<head>
    @include('dashboard.layouts.head')
</head>

<body class="sb-nav-fixed">
    @include('dashboard.layouts.header')

    <div id="layoutSidenav">
        
    
    
        @include('dashboard.layouts.menu')


            
            

                <!-- @include('dashboard.layouts.errors') -->
                 <div id="layoutSidenav_content">

                @yield('content')
                    @include('dashboard.layouts.footer')
            </div>

        <!-- @include('dashboard.layouts.settings') -->
    
    </div>
    @include('dashboard.layouts.foot')

 <div class="modal fade" id="alert_confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                    <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                </div>
                <div class="modal-body">
                    <p class="alert_dynamic_message">
                    </p>
                </div>
            </div>
        </div>
    </div> -->
     <div class="modal fade" id="default_confirm" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                </div>
                <div class="modal-body p-lg">
                    <p class="dynamic_message">
                        Are you sure ?
                    </p>
                    <input type="hidden" name="checkbox_data" class="checkbox_data">
                    <input type="hidden" name="checkbox_type" class="checkbox_type">
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">No</button> --}}
                    <button type="button" class="btn btn-danger yes_click">Yes</button>
                </div>
            </div>
        </div>
    </div> 
</body>

</html>
