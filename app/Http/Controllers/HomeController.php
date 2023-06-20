<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\company;
use App\Models\Product;

class HomeController extends Controller
{
   public function index()
   {    
         $employee = employee::where('status', '!=', '2')->limit(4)->orderBy('id', 'desc')->get();

          $product0 = Product::where('status', '!=', '2')->orderBy('id', 'desc')->skip(0)->take(1)->get();

          $product1 = Product::where('status', '!=', '2')->orderBy('id', 'desc')->skip(1)->take(1)->get();

          $product2 = Product::where('status', '!=', '2')->orderBy('id', 'desc')->skip(2)->take(1)->get();

          $product3 = Product::where('status', '!=', '2')->orderBy('id', 'desc')->skip(3)->take(1)->get();


          $awesomePackages = Product::where('status', '!=', '2')->limit(3)->orderBy('id', 'desc')->get();
        return view('welcome', compact('employee','product0', 'product1', 'product2', 'product3', 'awesomePackages'));
   }


   public function Travle_guide()
   {    
        $employee = employee::where('status', '!=', '2')->orderBy('id', 'desc')->get();
        return view('guide', compact('employee'));
   }
}
