<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\PasswordResetLinkController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//    echo 'admin';
// });
// Route::middleware(['prefix' => env('BACKEND_PATH'), 'auth:sanctum', 'verified'])->group(function () {

// });

Route::middleware('guest')->group(function () {


    Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('/', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});


Route::middleware(['auth', 'verified'])->group(function () {

// Customer Route



Route::get('product',[ProductController::class,'index'])->name('product.index');
Route::POST('product/anydata',[ProductController::class,'anyData'])->name('product.data');
Route::get('product/create',[ProductController::class,'create'])->name('product.create');
Route::post('product/store',[ProductController::class,'store'])->name('product.store');
Route::get('product/view/{id}',[ProductController::class,'view'])->name('product.show');
Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
Route::post('product/updateAll', [ProductController::class, 'ProductStatusUpdate'])->name('product.updateAll');






Route::get('employee',[EmployeeController::class,'index'])->name('employee.index');
Route::get('employee/create',[EmployeeController::class,'create'])->name('employee.create');
Route::post('employee/store',[EmployeeController::class,'store'])->name('employee.store');
Route::get('employee/view/{id}',[EmployeeController::class,'view'])->name('employee.view');
Route::get('employee/edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit');
Route::post('employee/update/{id}',[EmployeeController::class,'update'])->name('employee.update');
Route::get('employee/delete/{id}',[EmployeeController::class,'delete'])->name('employee.delete');

Route::POST('employee/anydata',[EmployeeController::class,'anyData'])->name('employee.data');

Route::post('employee/updateAll', [EmployeeController::class, 'EmployeeStatusUpdate'])->name('employee.updateAll');




Route::get('booking',[bookingController::class,'index'])->name('booking.index');

Route::get('booking/view/{id}',[bookingController::class,'view'])->name('booking.view');
Route::POST('booking/anydata',[bookingController::class,'anyData'])->name('booking.data');




Route::get('customer',[CustomerController::class,'index'])->name('customer.index');
Route::POST('customer/anydata',[CustomerController::class,'anyData'])->name('customer.data');
Route::get('customer/create',[CustomerController::class,'create'])->name('customer.create');
Route::post('customer/store',[CustomerController::class,'store'])->name('customer.store');
Route::get('customer/view/{id}',[CustomerController::class,'view'])->name('customer.show');
Route::get('customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
Route::post('customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');
Route::get('customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
Route::post('customer/updateAll', [CustomerController::class, 'CustomerStatusUpdate'])->name('customer.updateAll');


});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

