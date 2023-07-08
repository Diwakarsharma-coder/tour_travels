@extends('dashboard.layouts.master')
@section('title','Booking Details')
@push("after-styles")

@endpush
@section('content')


                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Booking Details</h1>
                    </div>





                        {{ Form::open(['method' => 'post', 'id' => 'updateAll']) }}


                        <div class="card mb-4 mt-4">
                            {{-- <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div> --}}
                            <div class="card-body">
                                 {{ Form::open(['method' => 'post']) }}
                                    <div class="table-responsive">
                                        <table class="table  m-a-0" id="label">
                                            <thead class="dker table-dark">
                                                <tr>

                                                    <th>Sr No</th>
                                                    <th>Order ID</th>
                                                    <th>RazorPay ID</th>
                                                    <th>Product ID</th>
                                                    <th>Amount</th>
                                                    <th>Start Date</th>
                                                    <th>Start Time</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="ProductTable">
                                            </tbody>
                                        </table>

                                    </div>
                                  {{ Form::close() }}
                            </div>
                        </div>


                </main>

@endsection
@push("after-scripts")
   <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>



        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            load_data();

            function load_data() {

                var action_url = "{!! route('booking.data') !!} ";

                $('#label').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ordering: true,
                    searching: true,
                    columnDefs: [{
                        'bSortable': false,
                        'aTargets': [ 8]
                    }],
                    ajax: {
                        url: action_url,
                        type: 'POST',
                    },
                    columns: [

                        {
                            data: 'id',
                            name: 'id',
                            // visible: false
                        },
                        {
                            data: 'order_id',
                            name: 'order_id'
                        },
                        {
                            data: 'razorpay_id',
                            name: 'razorpay_id'
                        },
                        {
                            data: 'product_id',
                            name: 'product_id'
                        },
                        {
                            data: 'price',
                            name: 'price'
                        },
                        {
                            data: 'start_date',
                            name: 'start_date'
                        },
                        {
                            data: 'start_time',
                            name: 'start_time'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action'
                        }
                    ],
                    order: []
                });
            }

        });

        /////////////////////////////
          $("#filter_btn").click(function() {
            $("#filter_div").slideToggle();
        });

        $("#find_q").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#doctorTypeTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $(document).ready(function() {
            setTimeout(function() {
                $('.validate').hide();
            }, 5000);
        });

        ////////////////////////////


         // single delete
        $('#label').on('click', '#single_label[data-remote]', function(e) {
            e.preventDefault();
            var csrf = "{{ csrf_token() }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf
                },
            });
            var allVals = [];
            var id = $(this).attr('data-id');
            allVals.push(id);
            var msg = "Are you sure you want to delete this record?";
            var type = 2;
            $(document).find('#default_confirm').modal('show');
            $(document).find('#default_confirm').find('.dynamic_message').text(msg);
            var join_selected_values = allVals.join(",");
            $(document).find('#default_confirm').find('.checkbox_data').val(join_selected_values);
            $(document).find('#default_confirm').find('.checkbox_type').val(type);

            $(document).on('click', '.yes_click', function(e) {
                $(document).find('#default_confirm').modal('hide');

            });
        });
        ///////////////////////////////////////////////

        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });


        $(document).on('submit', '#updateAll', function(e) {

            e.preventDefault();
            var allVals = [];
            var check = false;

            var select_row = "{{ __('Please Select Record') }}";

            var select_status = "{{ __('Please Select Status') }}";

            var type = $(document).find('#action').val();

            if (type == 'no') {

                $(document).find('#alert_confirm').modal('show');
                $(document).find('#alert_confirm').find('.alert_dynamic_message').text(select_status);

            } else {

                $(".has-value:checked").each(function() {

                    var idvalue = $(this).attr('data-id');
                    if (typeof idvalue === "undefined") {

                    } else {
                        allVals.push(idvalue);
                    }
                });

                if (allVals.length <= 0) {

                    $(document).find('#alert_confirm').modal('show');
                    $(document).find('#alert_confirm').find('.alert_dynamic_message').text(select_row);
                } else {
                    var msg = "";

                    if (type == 0) {
                        msg = "Are you sure you want to inactive this record?";

                    } else if (type == 1) {
                        msg = "Are you sure you want to active this record?";
                    } else {
                        msg = "Are you sure you want to delete this record?";
                    }

                    $(document).find('#default_confirm').modal('show');
                    $(document).find('#default_confirm').find('.dynamic_message').text(msg);
                    var join_selected_values = allVals.join(",");
                    $(document).find('#default_confirm').find('.checkbox_data').val(join_selected_values);
                    $(document).find('#default_confirm').find('.checkbox_type').val(type);

                }

            }
        });


         $(document).on('click', '.yes_click', function(e) {
            var join_selected_values = $(document).find('#default_confirm').find('.checkbox_data').val();
            var type = $(document).find('#default_confirm').find('.checkbox_type').val();
            var csrf = "{{ csrf_token() }}";
            ajaxUpdateAll(csrf, join_selected_values, type);
        });
        $(document).on('click', '.delete-package', function(e) {
            e.preventDefault();
            var package_id = $(this).attr('data-id');
            var allVals = [];
            allVals.push(package_id);
            var type = 2;
            var msg = "Are you sure you want to delete?";

            $(document).find('#default_confirm').modal('show');
            $(document).find('#default_confirm').find('.dynamic_message').text(msg);
            var join_selected_values = allVals.join(",");
            $(document).find('#default_confirm').find('.checkbox_data').val(join_selected_values);
            $(document).find('#default_confirm').find('.checkbox_type').val(type);
        });


         function ajaxUpdateAll(csrf, join_selected_values, type) {
            // alert(join_selected_values);
            $.ajax({
                url: "{{ route('employee.updateAll') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf
                },
                data: 'ids=' + join_selected_values + '&status=' + type,
                success: function(data) {

                    if (data.success == true) {
                        $('#success_file_popup').append(messages('alert-success', data.msg));
                        setTimeout(function() {
                            $('#success_file_popup').empty();
                        }, 5000);


                        $(document).find('#default_confirm').modal('hide');
                        var tabe = $('#label').DataTable();
                        $(document).find('#action').prop('selectedIndex', 0);
                        tabe.ajax.reload(null, false);
                        $("#checkAll").prop('checked', false);

                    } else {

                        $('#success_file_popup').append(messages('alert-danger', data.error));

                        setTimeout(function() {
                            $('#success_file_popup').empty();
                        }, 5000);
                    }
                },
                error: function(data) {

                    alert(data.responseText);
                }
            });
        }

         function messages(classname, msg) {
            return '<div class="alert ' + classname +
                ' m-b-0"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>' +
                msg + '</div>';
        }
</script>
@endpush