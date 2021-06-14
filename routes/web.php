<?php

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


// Authentication Routes...
Route::group(['prefix' => 'fishi'], function () {

    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);
});


Route::get("/{id}",[App\Http\Controllers\CustomerController::class, 'home'])->name('customer.home');

Route::get("/get/file/{url}",[App\Http\Controllers\LinkController::class, 'download'])->name('customer.download.link');

Route::get('/fishi/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/fishi/media/', [App\Http\Controllers\MediaController::class, 'addMedia'])->name('media.add');

Route::get('/fishi/link/', [App\Http\Controllers\LinkController::class, 'index'])->name('links.index');

Route::post('/fishi/link/create', [App\Http\Controllers\LinkController::class, 'create'])->name('links.create');

Route::get('/fishi/customer/', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');

Route::post('/fishi/customer/', [App\Http\Controllers\CustomerController::class, 'addCustomer'])->name('customer.add');

Route::get("/shs/cachec",function (){
                Artisan::call('config:clear');
                return "done";
});
Route::get("/shs/migrate",function (){
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
});
