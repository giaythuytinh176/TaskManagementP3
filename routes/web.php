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


Route::prefix("customers")->group(function (){
    Route::get("list", [\App\Http\Controllers\CustomerController::class, "index"])->name("customers.list");

    Route::get("add", [\App\Http\Controllers\CustomerController::class, 'add'])->name("customers.add");

    Route::post("update", [\App\Http\Controllers\CustomerController::class, 'store'])->name("customers.store");

    Route::get("delete/{id}", [\App\Http\Controllers\CustomerController::class, 'destroy'])->where('id', "[\d]+")->name("customers.delete");
    Route::get("edit/{id}", [\App\Http\Controllers\CustomerController::class, 'edit'])->where('id', '[\d]+')->name("customers.edit");



});
