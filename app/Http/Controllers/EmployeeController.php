<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\company;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
class EmployeeController extends Controller
{
    public function index(){


        return view('dashboard.employee.index');

   }

   public function create()
   {

    $company = company::get();
    return view('dashboard.employee.create', compact('company'));
   }


   public function store(Request $request)
   {

    $validated = $request->validate([
        'first_name'=>"required",
        'last_name'=>"required",
        'email'=>"required",
        'phone'=>"required",
        'language'=>"required",
        'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'


    ]);


    // |dimensions:width=500,height=500

  
        $imageName = "";
        if($files=$request->file('image')){
            
             $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('employee'), $imageName);

        }


        $insert = new employee();

        $insert->first_name = $request->first_name;
        $insert->last_name= $request->last_name;
        $insert->email = $request->email;
        $insert->phone = $request->phone;
        $insert->language = $request->language;
        $insert->facebook_link = $request->facebook_link;
        $insert->inst_link = $request->inst_link;
        $insert->twi_link = $request->twi_link;
        $insert->image = $imageName;
        
        
        $insert->save();
        

        return  redirect()->route('employee.index')->with('success','Create success');

   }

   public function view($id,)
   {
    $data = employee::find($id);

    return view('dashboard.employee.view', compact('data'));

   }


   public function edit($id)
   {
    $company = company::get();
    $data = employee::find($id);

    return view('dashboard.employee.edit', compact('data','company'));

   }



   
   public function update($id,Request $request)
   {
    $validated = $request->validate([
        
        'first_name'=>"required",
        'last_name'=>"required",
        'email'=>"required",
        'phone'=>"required",
        'language'=>"required",
        'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
         

    ]);

      $imageName = $request->old_image;
        if($files=$request->file('image')){
            
             $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('employee'), $imageName);

        }


    $insert =  employee::find($id);

 
    $insert->first_name = $request->first_name;
    $insert->last_name= $request->last_name;
    $insert->email = $request->email;
    $insert->phone = $request->phone;
    $insert->language = $request->language;
    $insert->facebook_link = $request->facebook_link;
    $insert->inst_link = $request->inst_link;
    $insert->twi_link = $request->twi_link;
    $insert->image = $imageName;

    
    $insert->save();

        return  redirect()->route('employee.index')->with('success','Update success');

   }

   public function delete($id)
   {


    $res=employee::where('id',$id)->delete();
    return  redirect()->route('employee.index')->with('success','Delete success');

        

   }



     public function anyData()
    {
        $data = employee::where('status', '!=', '2')->orderBy('id', 'desc')->get();


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
                $blofShow = route('employee.view', ['id' => $data->id]);
                $blogEdit = route('employee.edit', ['id' => $data->id]);
                $branddelete = route('employee.delete', ['id' => $data->id]);


                $x = '<a href="' . $blofShow . '"  class="btn btn-sm btn-clean btn-icon" title="View Details"> <i class="fas fa-eye"></i> </a>
                    <a href="' . $blogEdit . '" class="btn btn-sm btn-clean btn-icon" title="Edit Details"><i class="fas fa-edit"></i> </a>
                    <a class="btn btn-sm btn-clean btn-icon" id="single_label"  role="button" data-remote="' . $branddelete . '" title="Delete" data-id="' . $data->id . '"><i class="far fa-trash-alt"></i> </a>
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
            ->rawColumns(['checkbox', 'first_name','last_name','email','phone','action',  'status'])
            ->make(true);
    }

    public function EmployeeStatusUpdate(Request $request)
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
