<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\employee;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Price_detail;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class bookingController extends Controller
{
    public function index(){
        return view('dashboard.booking.index');

   }


    public function view($id,)
    {
        $data = Booking::find($id);

        $cust= Customer::find($data->cust_id);
        $product= Product::find($data->product_id);
        $price_details = Price_detail::find($data->price_id);
              // $price = $pri->price_value;
        // dd($pri);

        return view('dashboard.booking.view', compact('data','cust','product','price_details'));

   }


    public function anyData()
    {
        $data = Booking::orderBy('id', 'desc')->get();


        return DataTables::of($data)
            // ->addColumn('checkbox', function ($data) {
            //     $x = '<label class="ui-check m-a-0"> <input type="checkbox" name="ids[]" value="' . $data->id . '" class="has-value" data-id="' . $data->id . '"><i class="dark-white"></i> <input class="form-control row_no has-value" name="row_ids[]" type="hidden" value="' . $data->id . '"> </label>';
            //     return $x;
            // })
            ->editColumn('order_id', function ($data) {

                return $data->order_id;
            })
            ->editColumn('razorpay_id', function ($data) {

                return $data->razorpay_id;
            })->editColumn('product_id', function ($data) {

                return $data->product_id;
            })
            ->editColumn('price', function ($data) {

                return $data->price;
            })
            ->editColumn('start_date', function ($data) {

                return $data->start_date;
            })
            ->editColumn('start_time', function ($data) {

                return $data->start_time;
            })

            ->addColumn('action', function ($data) {
                $blofShow = route('booking.view', ['id' => $data->id]);


                $x = '<a href="' . $blofShow . '"  class="btn btn-sm btn-clean btn-icon" title="View Details"> <i class="fas fa-eye"></i> </a>

                     ';

                return $x;

            })
            ->editColumn('status', function ($data) {
                if ($data->status == 1) {
                    return '<button type="button" class="btn btn-success">
                        <span class="badge  badge-success">Active</span>
                      </button>';

                } else {
                    return '<button type="button" class="btn btn-danger">
                        <span class="badge  badge-danger">Inactive</span>
                      </button>';
                }
            })
            ->rawColumns([ 'order_id','razorpay_id','start_date','start_time','product_id','price','action',  'status'])
            ->make(true);
    }


    public function BookingStatusUpdate(Request $request)
    {
        if ($request->ajax()) {
            if ($request->ids != "") {
                $ids = explode(",", $request->ids);
                $status = $request->status;
                if ($request->status == 0) {
                    $message = "Record inactive successfully.";
                } elseif ($request->status == 1) {
                    $message = "Record active successfully.";
                } else {
                    $message = "Record deleted successfully.";
                }
                employee::whereIn('id', $ids)->update(['status' => $status]);

                return response()->json(['success' => true, 'msg' => $message]);
            }
            return response()->json(['success' => false, 'msg' => 'Something went wrong!!']);
        }
        abort(404);

    }

}
