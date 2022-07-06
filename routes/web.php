<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
// use App\Http\Controllers\FormController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[FrontController::class,'index'])->name('welcome');
Route::get('show/{id}',[BlogController::class,'show'])->name('blog.show');


require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('/form','form')->name('form');



    Route::get('blog/create',[BlogController::class,'create'])->name('blog.create');
    Route::get('update/{id}',[BlogController::class,'update'])->name('blog.simple');



    Route::get('blog/index',[BlogController::class,'index'])->name('blog.index');
    Route::post('store',[BlogController::class,'store'])->name('store');
    Route::get('table',[BlogController::class,'index'])->name('table');
    // Route::get('edit/{id}',[FormController::class,'edit'])->name('edit');
    Route::get('edit/{id}',[BlogController::class,'edit'])->name('blog.simple');
    Route::post('update/{id}',[BlogController::class,'update'])->name('update');
    Route::get('delete/{id}',[BlogController::class,'delete'])->name('delete');
    Route::get('create',[BlogController::class,'create'])->name('blog.create');

    Route::view('category/create','category/create')->name('category.create');
    Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('category/index',[CategoryController::class,'index'])->name('category.index');
    Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');






});








