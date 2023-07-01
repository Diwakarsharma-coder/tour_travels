<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Employee;
use App\Models\Price_detail;
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
        'location' => 'required',
        'day' => 'required',
        'person' => 'required',
        'included' => 'required',
        'guider' => 'required',
        'cancel' => 'required',
        'expect' => 'required',
        'image' => 'required',
        'description'=>"required",
        'policy'=>"required",

    ]);

    $input=$request->all();
    // dd($input);
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
    $insert->guider =$input['guider'];
    $insert->cancel =$input['cancel'];
    $insert->included =$input['included'];
    $insert->expect =$input['expect'];
    $insert->image=   implode("|",$images);
    $insert->save();



    $price_title = $request->price_title;
    $price_value = $request->price_value;
    $price_desc = $request->price_desc;
            
    // dd($price_title);
    foreach($price_title as $i => $val)
     {
        $new  = new Price_detail();
        $new->product_id = $insert->id; 
        $new->price_title = $price_title[$i]; 
        $new->price_value = $price_value[$i]; 
        $new->price_desc = $price_desc[$i]; 
        $new->save();
        
     }   




    return  redirect()->route('product.index')->with('success','Create success');

   }

   public function view($id)
   {

    $data = Product::find($id);
 $price_detail = Price_detail::where('product_id',$id)->where('status',1)->get();
    return view('dashboard.product.view', compact('data','price_detail'));

   }


   public function edit($id)
   {

    $data = Product::find($id);
    $price_detail = Price_detail::where('product_id',$id)->where('status',1)->get();
    // dd($price_detail);
    return view('dashboard.product.edit', compact('data', 'price_detail'));

   }




   public function update($id,Request $request)
   {

        

           
        // dd($request->all());
        // exit;


            $insert = Product::find($id);
            $validated = $request->validate([
               'title'=>"required",
                'price'=>"required",
                'location' => 'required',
                'day' => 'required',
                'person' => 'required',
                'guider' => 'required',
                'cancel' => 'required',
                'included' => 'required',
                'expect' => 'required',
                'image' => 'nullable',
                'description'=>"required",
                'policy'=>"required",

                // "price_title.*" => 'required|string|min:3',
                // "price_value.*" => 'required|integer|min:1',
                // "price_desc.*" => "required|string"


            ]);

             $price_title = $request->price_title;
            $price_value = $request->price_value;
            $price_desc = $request->price_desc;
            $price_detail_id = $request->price_detail_id;
            // dd($request->price_detail_id);
            // exit;
            $Data = Price_detail::where('product_id',$id)->get();

            foreach($Data as $i => $val)
            {

                echo $val->id;
                // echo $price_detail_id[$i];
                $find1 = Price_detail::find($val->id);
                $find1->status = 2; 
                $find1->save();
            } 

            if(!empty($price_detail_id ))
            {
                 foreach($price_detail_id as $i => $val)
                    {

                        // echo $price_detail_id[$i];
                        $find = Price_detail::find($price_detail_id[$i]);
                        // if(!empty($find)){
                            $find->price_title = $price_title[$i]; 
                            $find->price_value = $price_value[$i]; 
                            $find->price_desc = $price_desc[$i]; 
                            $find->status = 1; 
                            $find->save();
                        // }   
                    }  
            }
           


            $price_title2 = $request->price_title2;
            $price_value2 = $request->price_value2;
            $price_desc2 = $request->price_desc2;

            if(!empty($price_title2))
            {
             foreach($price_title2 as $i => $val)
             {

                    $new  = new Price_detail();
                    $new->product_id = $id; 
                    $new->price_title = $price_title2[$i]; 
                    $new->price_value = $price_value2[$i]; 
                    $new->price_desc = $price_desc2[$i]; 
                    $new->save();
             } 
            }
            

            


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
            $insert->guider =$input['guider'];
            $insert->cancel =$input['cancel'];
            $insert->included =$input['included'];
            $insert->expect =$input['expect'];
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
