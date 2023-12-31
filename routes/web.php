<?php

use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Models\Products;
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

Route::get('stratification',[IndexController::class,'stratification'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

// recources
Route::resource('Products',ProductsController::class);
Route::resource('User',UserController::class);


Route::get('create',[OrderController::class,'create'])->name('order.create');
Route::post('store',[OrderController::class,'store'])->name('order.store');
Route::delete('delete/{id}',[OrderController::class,'delete'])->name('order.delete');

//pdf
Route::get('/generate-pdf', [PDFController::class,'generatePDF']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



//test chart
