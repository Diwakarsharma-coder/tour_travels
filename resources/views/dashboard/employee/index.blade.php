@extends('dashboard.layouts.master')
@section('title','Employee')
@push("after-styles")

@endpush
@section('content')


                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Employee</h1>
                    </div>

                        <a href="{{ route('employee.create')}}" class="btn btn-primary" style=" position: absolute; right: 0px;">ADD</a>

                    {{-- 
                    <div class="box-tool">
                    <ul class="nav">
                        <li class="nav-item inline">
                            <a class="btn btn-fw primary" href="{{ route('product.create') }}">
                                <i class="brand-icons">&#xe7fe;</i> 
                                <i class="far fa-plus-square "></i>
                                &nbsp; Add New
                            </a>
                        </li>
                    </ul>
                </div>
 --}}

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        {{ Form::open(['method' => 'post', 'id' => 'updateAll']) }}
                        <div class="bulk-action" style="display: flex; width: 200px;">
                            <select name="action" id="action" class="form-control c-select w-sm inline v-middle" required>
                                <option value="no">Action</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                                {{-- <option value="2">Delete</option> --}}
                            </select>
                            <button type="submit" id="submit_all" class="btn btn-apply">Apply</button>
                        </div>

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
                                                    <th class="width20 dker no-sort">
                                                        <label class="ui-check m-a-0">
                                                            <input id="checkAll" type="checkbox"><i></i>
                                                        </label>
                                                    </th>
                                                    <th>Sr No</th>
                                                    <th>First Name </th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
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

                var action_url = "{!! route('employee.data') !!} ";

                $('#label').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ordering: true,
                    searching: true,
                    columnDefs: [{
                        'bSortable': false,
                        'aTargets': [0, 6,7]
                    }],
                    ajax: {
                        url: action_url,
                        type: 'POST',
                    },
                    columns: [{
                            data: 'checkbox'
                        },
                        {
                            data: 'id',
                            name: 'id',
                            visible: false
                        },
                        {
                            data: 'first_name',
                            name: 'first_name'
                        },
                        {
                            data: 'last_name',
                            name: 'last_name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
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
