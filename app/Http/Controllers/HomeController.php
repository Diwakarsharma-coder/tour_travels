<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\company;
use App\Models\Product;
use DB;
use App\Models\Customer;
use App\Models\Booking;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
   public function index()
   {    
         $employee = employee::where('status', '=', '1')->limit(4)->orderBy('id', 'desc')->get();

          $product0 = Product::where('status', '=', '1')->orderBy('id', 'desc')->skip(0)->take(1)->get();

          $product1 = Product::where('status', '=', '1')->orderBy('id', 'desc')->skip(1)->take(1)->get();

          $product2 = Product::where('status', '=', '1')->orderBy('id', 'desc')->skip(2)->take(1)->get();

          $product3 = Product::where('status', '=', '1')->orderBy('id', 'desc')->skip(3)->take(1)->get();


          $awesomePackages = Product::where('status', '=', '1')->limit(3)->orderBy('id', 'desc')->get();

          // dd($product0);
          
        return view('welcome', compact('employee','product0', 'product1', 'product2', 'product3', 'awesomePackages'));
   }


   public function Travle_guide()
   {    
        $employee = employee::where('status', '=', '1')->orderBy('id', 'desc')->get();
        return view('guide', compact('employee'));
   }

   public function  product_details($id)
   {
     $product = Product::where('id',$id)->first();

     $awesomePackages = Product::where('status', '=', '1')->limit(4)->orderBy('id', 'desc')->get();

     // dd($product->image);

     return view('product-details', compact('product','awesomePackages'));

   }


   public function booking(Request $request){

     
      // $date = $request->date;
      $person = $request->person;

      $data = [
         // 'date'=>$date,
         'person'=>$person,
      ];

      return $data;
      // return view('booking_details',compact('product','country'));
   }
   public function booking_details_page($id){

      // dd($person);
      
     $product = Product::where('id',$id)->first();
      $country = DB::Select('select * from country');
         $awesomePackages = Product::where('status', '=', '1')->limit(4)->orderBy('id', 'desc')->get();
      return view('booking_details',compact('product','country','awesomePackages'));
   }

   public function Book_now(Request $request){

      // dd($request->all());
        $validated = $request->validate([
        'first_name'=>"required",
        'last_name'=>"required",
        'email'=>"required",
        'phone' => 'required',
        'start_date'=>'required',
        'person'=>'required',

    ]);

        // dd($request->all());
        // exit;


        $cust_details = Customer::where('email',$request->email)->first();
        $cust_id = "";
        if(empty($cust_details))
        {
             $insert = new Customer();
             $insert->first_name =$request->first_name;
             $insert->last_name =$request->last_name;
             $insert->email =$request->email;
             $insert->phone =$request->phone;
             $insert->save();

             $cust_id = $insert->id;
        }
        else
        {
               $update_phone = Customer::find( $cust_details->id);
               $update_phone->phone =  $request->phone;
               $update_phone->save();
               $cust_id =  $cust_details->id;
        }

       

    

          $booking = new Booking();
          $booking->product_id = $request->product_id;
          $booking->start_date = $request->start_date;
          $booking->person = $request->person;
          $booking->price = $request->price;
          $booking->status = 1;
          $booking->cust_id = $cust_id;
          $booking->location = $request->location;
          $booking->save();

             $details = [
              'title' => 'Mail from Tour my choice',
              'body' => 'This is for testing email using smtp'
             ];
            
            \Mail::to($request->email)->send(new \App\Mail\MyTestMail($details));

    $return_array['success'] = 1;
    $return_array['cust_id'] = $cust_id;

   return json_encode($return_array);
   



   }


   public function success($id)
   {
      $cust = Customer::find($id);
      return view('success', compact('cust'));

   }


   public function packages()
   {
       $awesomePackages = Product::where('status', '!=', '2')->limit(3)->orderBy('id', 'desc')->get();

       return view('packege', compact('awesomePackages'));
   }


   public function destination()
   {  
       $product = Product::where('status', '!=', '2')->orderBy('id', 'desc')->get();
      return view('destination', compact('product'));
   }
}
