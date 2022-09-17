<?php

use Illuminate\Support\Facades\Route;

//fronsite
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;

//backsite
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\HospitalPatientController;
use App\Http\Controllers\Backsite\ReportAppointmentController;
use App\Http\Controllers\Backsite\ReportTransactionController;
use App\Http\Controllers\Backsite\DoctorController;

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

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    //payment pages
    Route::resource('payment', PaymentController::class);
    
    Route::resource('appointment', AppointmentController::class);
    
    //appointment pages
});

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function(){
    
    //dashboard
    Route::resource('dashboard', DashboardController::class);

    //management_access
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('type_user', TypeUserController::class);
    Route::resource('user', UserController::class);

    //master data
    Route::resource('specialist', SpecialistController::class);
    Route::resource('consultation', ConsultationController::class);
    Route::resource('config_payment', ConfigPaymentController::class);

    //operational
    Route::resource('hospital_patient', HospitalPatientController::class);
    Route::resource('appointment', ReportAppointmentController::class);
    Route::resource('transaction', ReportTransactionController::class);
    Route::resource('doctor', DoctorController::class);
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
