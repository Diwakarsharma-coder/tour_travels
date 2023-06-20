<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/', function () {
//     return view('welcome');
// })->name('home');



Route::get('/about-us', function () {
    return view('about');
})->name('about-us');


Route::get('/service', function () {
    return view('service');
})->name('service');


Route::get('/packege', function () {
    return view('packege');
})->name('packege');



Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');



Route::get('/destination', function () {
    return view('destination');
})->name('destination');


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



require __DIR__.'/auth.php';
