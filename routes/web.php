<?php

use App\Http\Controllers\FormController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::view('/form','form')->name('form');

    Route::post('store',[FormController::class,'store'])->name('store');

    Route::get('table',[FormController::class,'index'])->name('table');

    Route::get('edit/{id}',[FormController::class,'edit'])->name('edit');

    Route::post('update/{id}',[FormController::class,'update'])->name('update');

    Route::get('delete/{id}',[FormController::class,'delete'])->name('delete');
    //
});








