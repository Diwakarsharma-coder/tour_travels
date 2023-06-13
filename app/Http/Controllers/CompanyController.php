<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;

class CompanyController extends Controller
{
   public function index(){

        $data = company::get();

        return view('dashboard.company.index', compact('data'));

   }

   public function create()
   {
    return view('dashboard.company.create');
   }


   public function store(Request $request)
   {

    $validated = $request->validate([
        'name'=>"required",
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',

    ]);


    // |dimensions:width=500,height=500

    $imageName = "";
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
    }


        $insert = new company();

        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->website = $request->website;
        $insert->logo = $imageName;
        $insert->save();
        

        return  redirect()->route('company.index')->with('success','Create success');

   }

   public function view($id)
   {

    $data = Company::find($id);

    return view('dashboard.company.view', compact('data'));

   }


   public function edit($id)
   {

    $data = Company::find($id);

    return view('dashboard.company.edit', compact('data'));

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
