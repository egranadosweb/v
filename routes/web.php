<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\CallCenterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/offices', function () {
    return view('offices.index');
});

//Route::get('/customers', [CustomersController::class, "index"]);

Route::get('/customers/find', [CustomersController::class, 'find']);
Route::resource("customers" , CustomersController::class);

Route::get('/licenses/expired', [LicenseController::class, 'expired']);
Route::resource("licenses" , LicenseController::class);


Route::resource("callcenter" ,CallCenterController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
