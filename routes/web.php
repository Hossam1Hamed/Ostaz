<?php

use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\InstructorController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
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

Route::middleware(['auth', 'role:Admin|Employee'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');  
    Route::resource('users',UserController::class);
    Route::get('instructors/upgrade/{id}',[InstructorController::class ,'upgrade'])->name('instructors.upgrade');
    Route::post('upgrade/{id}',[InstructorController::class ,'handleUpgrade'])->name('instructors.handleUpgrade');

  
});

Route::middleware(['auth', 'role:Admin'])->group(function(){
    Route::resource('employees', EmployeeController::class);
    Route::resource('roles', RoleController::class);
    Route::post('roles/block/{role}', [RoleController::class, 'block'])->name('roles.block');

});



require __DIR__.'/auth.php';
