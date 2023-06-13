<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\company;

class EmployeeController extends Controller
{
    public function index(){

        $data = employee::get();

        return view('dashboard.employee.index', compact('data'));

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
        

    ]);


    // |dimensions:width=500,height=500

  


        $insert = new employee();

        $insert->first_name = $request->first_name;
        $insert->last_name= $request->last_name;
        $insert->email = $request->email;
        $insert->phone = $request->phone;
        $insert->company_id = $request->company_id;
        
        $insert->save();
        

        return  redirect()->route('employee.index')->with('success','Create success');

   }

   public function view($id, $com)
   {
    $company = company::find($com);
    $data = employee::find($id);

    return view('dashboard.employee.view', compact('data', 'company'));

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
        

    ]);
    $insert =  employee::find($id);

 
    $insert->first_name = $request->first_name;
    $insert->last_name= $request->last_name;
    $insert->email = $request->email;
    $insert->phone = $request->phone;
    $insert->company_id = $request->company_id;
    
    $insert->save();

        return  redirect()->route('employee.index')->with('success','Update success');

   }

   public function delete($id)
   {


    $res=employee::where('id',$id)->delete();
    return  redirect()->route('employee.index')->with('success','Delete success');

        

   }

}
