
@stack('before-scripts')
        <script src="{{ asset('dashboard/js/scripts.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
       {{--  <script src="{{ asset('dashboard/assets/demo/chart-area-demo.js')}} "></script>
        <script src="{{ asset('dashboard/assets/demo/chart-bar-demo.js')}} "></script> --}}
        <script src="{{ asset('dashboard/js/datatables-simple-demo.js')}}"></script>

       <script type="text/javascript" src="{{ asset('dashboard/js/code.jquery.com_jquery-3.7.0.min.js') }}"></script>


        <script src="{{ asset('dashboard/DataTables/datatables.min.js')}}"></script>
        <script src="{{ asset('dashboard/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@stack('after-scripts')
