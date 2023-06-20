<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        return  view('dashboard.Customer.index');
    }


    public function create()
    {
        return view('dashboard.Customer.create');
    }


   public function store(Request $request)
   {

    $validated = $request->validate([
        'first_name'=>"required",
        'last_name'=>"required",
        'email'=>"required",
        'phone' => 'required',
        'image' => 'nullable',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6'

    ]);

    $input=$request->all();
    $images=array();
    if($files=$request->file('image')){
        foreach($files as $file){
            $name=rand().'.'.$file->extension();
            $file->move(public_path('customer'),$name);
            $images[]=$name;
        }
    }


    $insert = new Customer();
    $insert->first_name =$input['first_name'];
    $insert->last_name =$input['last_name'];
    $insert->email =$input['email'];
    $insert->phone =$input['phone'];
    $insert->password =Hash::make($input['password']);
    $insert->image=   implode("|",$images);
    $insert->save();

    return  redirect()->route('customer.index')->with('success','Create success');

   }

      public function view($id)
       {

        $data = Customer::find($id);

        return view('dashboard.Customer.view', compact('data'));

       }

     public function anyData()
    {
        $data = Customer::where('status', '!=', '2')->orderBy('id', 'desc')->get();


        return DataTables::of($data)
            ->addColumn('checkbox', function ($data) {
                $x = '<label class="ui-check m-a-0"> <input type="checkbox" name="ids[]" value="' . $data->id . '" class="has-value" data-id="' . $data->id . '"><i class="dark-white"></i> <input class="form-control row_no has-value" name="row_ids[]" type="hidden" value="' . $data->id . '"> </label>';
                return $x;
            })
            ->editColumn('first_name', function ($data) {

                return $data->first_name;
            })
            ->editColumn('last_name', function ($data) {

                return $data->last_name;
            })->editColumn('email', function ($data) {

                return $data->email;
            })
            ->editColumn('phone', function ($data) {

                return $data->phone;
            })

            ->addColumn('action', function ($data) {
                $blofShow = route('customer.show', ['id' => $data->id]);
                // $blogEdit = route('product.edit', ['id' => $data->id]);
                // $branddelete = route('product.delete', ['id' => $data->id]);

                $customerOrderList = '#';

                $x = '<a href="' . $blofShow . '"  class="btn btn-sm btn-clean btn-icon" title="View Details"> <i class="fas fa-eye"></i> </a>
                   
                     ';
                    //   <a href="' . $blogEdit . '" class="btn btn-sm btn-clean btn-icon" title="Edit Details"><i class="fas fa-edit"></i> </a>
                    // <a class="btn btn-sm btn-clean btn-icon" id="single_label"  role="button" data-remote="' . $branddelete . '" title="Delete" data-id="' . $data->id . '"><i class="far fa-trash-alt"></i> </a>
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
            ->rawColumns(['checkbox', 'first_name','last_name','email','phone','action', 'title', 'status'])
            ->make(true);
    }

    public function CustomerStatusUpdate(Request $request)
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
                Customer::whereIn('id', $ids)->update(['status' => $status]);

                return response()->json(['success' => true, 'msg' => $message]);
            }
            return response()->json(['success' => false, 'msg' => 'Something went wrong!!']);
        }
        abort(404);

    }

}
