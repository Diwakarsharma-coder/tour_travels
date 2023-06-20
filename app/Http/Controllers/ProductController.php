<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(){

        $data = Product::get();
        return view('dashboard.product.index', compact('data'));

   }

   public function create()
   {
    return view('dashboard.product.create');
   }


   public function store(Request $request)
   {

    $validated = $request->validate([
        'title'=>"required",
        'price'=>"required",
        'description'=>"required",
        'image' => 'required',
        'location' => 'required',
        'day' => 'required',
        'person' => 'required',

    ]);

    $input=$request->all();
    $images=array();
    if($files=$request->file('image')){
        foreach($files as $file){
            $name=rand().'.'.$file->extension();
            $file->move(public_path('product'),$name);
            $images[]=$name;
        }
    }


    $insert = new product();
    $insert->title =$input['title'];
    $insert->price =$input['price'];
    $insert->description =$input['description'];
    $insert->policy =$input['policy'];
    $insert->location =$input['location'];
    $insert->day =$input['day'];
    $insert->person =$input['person'];
    $insert->image=   implode("|",$images);
    $insert->save();

    return  redirect()->route('product.index')->with('success','Create success');

   }

   public function view($id)
   {

    $data = Product::find($id);

    return view('dashboard.product.view', compact('data'));

   }


   public function edit($id)
   {

    $data = Product::find($id);

    return view('dashboard.product.edit', compact('data'));

   }




   public function update($id,Request $request)
   {
            $insert = Product::find($id);
            $validated = $request->validate([
                'title'=>"required",
                'price'=>"required",
                'description'=>"required",
                'image' => 'nullable',
                'location' => 'required',
                'day' => 'required',
                'person' => 'required',

            ]);
            $input=$request->all();
            $images=array();
            $image_data = $input['old_image'];
            if($files=$request->file('image')){
                foreach($files as $file){
                    $name=rand().'.'.$file->extension();
                    $file->move(public_path('product'),$name);
                    $images[]=$name;
                }
                $image_data = implode("|",$images);
            }



            $insert->title =$input['title'];
            $insert->price =$input['price'];
            $insert->description =$input['description'];
            $insert->policy =$input['policy'];
            $insert->location =$input['location'];
            $insert->day =$input['day'];
            $insert->person =$input['person'];
            $insert->image=   $image_data;
            $insert->save();

        return  redirect()->route('product.index')->with('success','Update success');

   }

   public function delete($id)
   {

    $res=product::where('id',$id)->delete();
    return  redirect()->route('product.index')->with('success','Delete success');
   }



    public function anyData()
    {
        $data = Product::where('status', '!=', '2')->orderBy('id', 'desc')->get();

        return DataTables::of($data)
            ->addColumn('checkbox', function ($data) {
                $x = '<label class="ui-check m-a-0"> <input type="checkbox" name="ids[]" value="' . $data->id . '" class="has-value" data-id="' . $data->id . '"><i class="dark-white"></i> <input class="form-control row_no has-value" name="row_ids[]" type="hidden" value="' . $data->id . '"> </label>';
                return $x;
            })
            ->editColumn('title', function ($data) {

                return $data->title;
              

               

            })
             ->editColumn('price', function ($data) {

                return $data->price;
              

               

            })

            ->addColumn('action', function ($data) {
                $blofShow = route('product.show', ['id' => $data->id]);
                $blogEdit = route('product.edit', ['id' => $data->id]);
                $branddelete = route('product.delete', ['id' => $data->id]);

                $customerOrderList = '#';

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
            ->rawColumns(['checkbox', 'action', 'title', 'status'])
            ->make(true);
    }


    public function ProductStatusUpdate(Request $request)
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
                Product::whereIn('id', $ids)->update(['status' => $status]);

                return response()->json(['success' => true, 'msg' => $message]);
            }
            return response()->json(['success' => false, 'msg' => 'Something went wrong!!']);
        }
        abort(404);

    }



}
