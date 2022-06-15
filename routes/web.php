<?php

use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\SpecializationController;
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

Route::middleware(['auth', 'role:Admin|Employee'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

});

Route::middleware(['auth', 'role:Admin'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('employees', EmployeeController::class);
});


require __DIR__.'/auth.php';

Route::resource('specs',SpecializationController::class);