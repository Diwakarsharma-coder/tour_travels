<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');

Route::POST('/booking-details/',[HomeController::class,'booking'])->name('booking_details');

Route::get('/booking_details_page/{per}/',[HomeController::class,'booking_details_page'])->name('booking_details_page');


Route::get('product-details/{id}',[HomeController::class,'product_details'])->name('product_details');

Route::post('/book-now',[HomeController::class,'Book_now'])->name('booknow');

Route::get(base64_encode('/success/').'{id}',[HomeController::class,'success'])->name('success');
// Route::get('/', function () {
//     return view('welcome');
// })->name('home');



Route::get('/about-us', function () {
    return view('about');
})->name('about-us');


Route::get('/service', function () {
    return view('service');
})->name('service');


Route::get('/packege', [HomeController::class,'packages'])->name('packege');



Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');



Route::get('/destination',[HomeController::class,"destination"])->name('destination');


Route::get('/booking', function () {
    return view('booking');
})->name('booking');


Route::get('/guide',[HomeController::class,'Travle_guide'])->name('guide');

Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// mlwccoqfjhttcbjp

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('diwakarsharma923@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});


Route::get('form',[HomeController::class,'form'])->name('form');
Route::post('make-order',[HomeController::class,'make_order'])->name('make-order');


require __DIR__.'/auth.php';


// rzp_test_LEYYuERprlwZCs
// 3RRi8C4j1wRdsJI3yKH66EG6