<?php

use Illuminate\Support\Facades\Route;

//fronsite
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', LandingController::class);

Route::group(['middleware' => ['auth::sactum', 'verified']], function(){
    //payment pages
    Route::resource('payment', PaymentController::class);
    
    
    //appointment pages
    Route::resource('appointment', AppointmentController::class);
});

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth::sactum', 'verified']], function(){
    
    return view('dashboard');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
