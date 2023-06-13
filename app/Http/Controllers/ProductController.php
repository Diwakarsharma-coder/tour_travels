<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

        $data = product::get();

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
    $insert->image=   implode("|",$images);
    $insert->save();

    return  redirect()->route('product.index')->with('success','Create success');

   }

   public function view($id)
   {

    $data = product::find($id);

    return view('dashboard.product.view', compact('data'));

   }


   public function edit($id)
   {

    $data = product::find($id);

    return view('dashboard.product.edit', compact('data'));

   }




   public function update($id,Request $request)
   {

    $validated = $request->validate([
        'name'=>"required",
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',

    ]);
    $insert =  company::find($id);

    // |dimensions:width=500,height=500

    $imageName = $insert->logo;
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    }




        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->website = $request->website;
        $insert->logo = $imageName;
        $insert->save();


        return  redirect()->route('company.index')->with('success','Update success');

   }

   public function delete($id)
   {


    $res=Company::where('id',$id)->delete();
    return  redirect()->route('company.index')->with('success','Delete success');



   }
}
