<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\company;
use App\Models\Rating;
use App\Models\Product;
use DB;
use App\Models\Customer;
use App\Models\Booking;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Price_detail;
use Session;
use Razorpay\Api\Api;


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

     $price_detail = Price_detail::where('product_id',$id)->where('status',1)->get();


     // dd($product);

     $average_rating = 0;
      $total_review = 0;
      $five_star_review = 0;
      $four_star_review = 0;
      $three_star_review = 0;
      $two_star_review = 0;
      $one_star_review = 0;
      $total_user_rating = 0;
      $review_content = array();
      $array_image = array();

      $result = Rating::where('product_id',$id)->get();

      foreach($result as $row)
      {
         $array_image = explode("|", $row->image);

         $review_content[] = array(
            'user_name'    => $row["user_name"],
            'user_review'  => $row["user_review"],
            'rating'    => $row["user_rating"],
            'date_time'    => date($row["date_time"]),
            'image_url' =>asset('rating/'),
            'array_image' => $array_image
         );



         // foreach($array_image as $val){
         //             $image[] = array(
         //                'image_url' => asset('rating/'.$val)
         //             );

         // }


         if($row["user_rating"] == '5')
         {
            $five_star_review++;
         }

         if($row["user_rating"] == '4')
         {
            $four_star_review++;
         }

         if($row["user_rating"] == '3')
         {
            $three_star_review++;
         }

         if($row["user_rating"] == '2')
         {
            $two_star_review++;
         }

         if($row["user_rating"] == '1')
         {
            $one_star_review++;
         }

         $total_review++;

         $total_user_rating = $total_user_rating + $row["user_rating"];

      }

      if(count($result) > 0 )
      {
         $average_rating = $total_user_rating / $total_review;
      }



      $output = array(
         'average_rating'  => ceil(number_format($average_rating, 1)),
         'total_review'    => $total_review,
         'five_star_review'   => $five_star_review,
         'four_star_review'   => $four_star_review,
         'three_star_review'  => $three_star_review,
         'two_star_review' => $two_star_review,
         'one_star_review' => $one_star_review,
         'review_data'     => $review_content,

      );

      $object = json_decode(json_encode($output), FALSE);


     return view('product-details', compact('product','awesomePackages','price_detail','object'));

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
   public function booking_details_page($id, Request $request){

    //   dd($request->all());

      $product = Product::where('id',$id)->first();
      $country = DB::Select('select * from country');
         $awesomePackages = Product::where('status', '=', '1')->limit(4)->orderBy('id', 'desc')->get();

      $pri = Price_detail::find($request->price_id);
      $price = $pri->price_value;
      // dd($pri);


      $data = $request->all();

      Session::put('price_id', $request->price_id);
      Session::put('person', $request->person);
      Session::put('date', $request->date);
      Session::put('start_time', $request->start_time);




      // dd($data);


      return view('booking_details',compact('product','country','awesomePackages','data','price'));
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

      $pri = Price_detail::find($request->price_id);
      $price = $pri->price_value;

        // dd($request->price_id);
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


         $order_id = rand(1111111, 9999999);
        $api_key = "rzp_test_CMs4i82vwHK8pQ";
         $api_secret = "OejL1fuDvfIXhg1DRHAjtsqZ";

         $api = new Api($api_key, $api_secret);

        $orderData = [
            'receipt'         => 'rcptid_11',
            'amount'          => ( floatval($price) * 100),
            'currency'        => 'INR',
            'notes'=>[
               'order_id' => $order_id,
            ],
         ];

         $razorpayOrder = $api->order->create($orderData);

          $booking = new Booking();
          $booking->product_id = $request->product_id;
          $booking->order_id = $order_id;
          $booking->start_date = $request->start_date;
          $booking->start_time = $request->start_time;
          $booking->person = $request->person;
          $booking->price = $price;
          $booking->status = 2;
          $booking->cust_id = $cust_id;
          $booking->guide = $request->guide;
          $booking->location = $request->location;
          $booking->razorpay_id = $razorpayOrder->id;
          $booking->price_id = $request->price_id;
          $booking->save();

             $details = [
              'title' => 'Mail from Tour my choice',
              'body' => 'This is for testing email using smtp'
             ];

       \Mail::to($request->email)->send(new \App\Mail\MyTestMail($details));


    $return_array['success'] = 1;
    $return_array['cust_id'] = $cust_id;
    $return_array['cust_first_name'] = $request->first_name;
    $return_array['cust_last_name'] = $request->last_name;
    $return_array['phone'] = $request->phone;
    $return_array['email'] = $request->email;

    $return_array['order_id'] = $order_id;
    // $return_array['amount'] = $price;
    $return_array['razorpay_id'] = $razorpayOrder->id;
    $return_array['razorpay_amount'] = $razorpayOrder->amount;




   return json_encode($return_array);




   }


   public function success($id)
   {


      $booking_details = Booking::where('razorpay_id',$id)->first();
      $booking_details->status = 1;
      $booking_details->save();

      $cust = Customer::find($booking_details->cust_id);
      // dd($booking_details);

      return view('success', compact('cust','booking_details'));

   }


   public function packages()
   {
       $awesomePackages = Product::where('status', '!=', '2')->orderBy('id', 'desc')->get();

       return view('packege', compact('awesomePackages'));
   }


   public function destination()
   {
       $product = Product::where('status', '!=', '2')->orderBy('id', 'desc')->get();
      return view('destination', compact('product'));
   }


   public function form()
   {
      return view('payment');
   }
   public function make_order(Request $request)
   {
      $api_key = "rzp_test_X3XAEKMbiYxv5I";
      $api_secret = "6AsRIjYYmfn7BZ3hZlOtBHGv";

      $api = new Api($api_key, $api_secret);
      $order_id = rand(111111, 999999);
     $orderData = [
         'receipt'         => 'rcptid_11',
         'amount'          => $request->amount * 100, // 39900 rupees in paise
         'currency'        => 'INR',
         'notes'=>[
            'order_id' => $order_id,
         ],
      ];

      $razorpayOrder = $api->order->create($orderData);
      return view('payment-details', compact('razorpayOrder','order_id'));
      // dd($razorpayOrder);

   }

   public function rating(Request $request){



       $input=$request->all();
       // dd($input);
       $images=array();
       if($files=$request->file('image')){
           foreach($files as $file){
               $name=rand().'.'.$file->extension();
               $file->move(public_path('rating'),$name);
               $images[]=$name;
           }
       }

          $insert = new Rating();
          $insert->product_id =$input['product_id'];
          $insert->user_name =$input['full_name'];
          $insert->user_rating =$input['rating_data'];
          $insert->user_review =$input['desc'];
          $insert->email =$input['email'];
          $insert->image=   implode("|",$images);
          $insert->date_time = date('Y/m/d');
          $insert->save();


         return  redirect()->route('product_details',$input['product_id']);


   }

   public function display_rating(Request $request)
   {

      // dd($request->product_id);

      $average_rating = 0;
      $total_review = 0;
      $five_star_review = 0;
      $four_star_review = 0;
      $three_star_review = 0;
      $two_star_review = 0;
      $one_star_review = 0;
      $total_user_rating = 0;
      $review_content = array();
      $image = array();

      $result = Rating::where('product_id',$request->product_id)->get();

      foreach($result as $row)
      {


         if($row["user_rating"] == '5')
         {
            $five_star_review++;
         }

         if($row["user_rating"] == '4')
         {
            $four_star_review++;
         }

         if($row["user_rating"] == '3')
         {
            $three_star_review++;
         }

         if($row["user_rating"] == '2')
         {
            $two_star_review++;
         }

         if($row["user_rating"] == '1')
         {
            $one_star_review++;
         }

         $total_review++;

         $total_user_rating = $total_user_rating + $row["user_rating"];

      }

      $average_rating = $total_user_rating / $total_review;

      $output = array(
         'average_rating'  => number_format($average_rating, 1),
         'total_review'    => $total_review,
         'five_star_review'   => $five_star_review,
         'four_star_review'   => $four_star_review,
         'three_star_review'  => $three_star_review,
         'two_star_review' => $two_star_review,
         'one_star_review' => $one_star_review,
      );

      echo json_encode($output);

   }



}
