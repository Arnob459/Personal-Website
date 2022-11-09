<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\servicepagesController;
use App\Http\Controllers\portfoliopagesController;




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


// Route::get('/index', function () {
//     return view('pages/index');
// });
 Route::get('/',[pagesController::class,'index']);
 Route::get('admin/dashboard',[pagesController::class,'Dashboard'])->name('admin.dashboard');
 Route::get('admin/main',[mainController::class,'index'])->name('admin.main');
 Route::put('admin/main',[mainController::class,'update'])->name('admin.main.update');

 Route::get('admin/about',[pagesController::class,'about'])->name('admin.about');
//Services
 Route::get('admin/services/create',[servicepagesController::class,'create'])->name('admin.services.create');
 Route::post('admin/services/create',[servicepagesController::class,'store'])->name('admin.services.store');
 Route::get('admin/services/list',[servicepagesController::class,'list'])->name('admin.services.list');
 Route::get('admin/services/edit/{id}',[servicepagesController::class,'edit'])->name('admin.services.edit');
 Route::post('admin/services/update/{id}',[servicepagesController::class,'update'])->name('admin.services.update');
 Route::get('admin/services/delete/{id}',[servicepagesController::class,'delete']);
 //Route::delete('admin/services/destroy/{id}',[servicepagesController::class,'destroy'])->name('admin.services.destroy');
//portfolio
Route::get('admin/portfolios/create',[portfoliopagesController::class,'create'])->name('admin.portfolios.create');
Route::put('admin/portfolios/create',[portfoliopagesController::class,'store'])->name('admin.portfolios.store');
Route::get('admin/portfolios/list',[portfoliopagesController::class,'list'])->name('admin.portfolios.list');
Route::get('admin/portfolios/edit/{id}',[portfoliopagesController::class,'edit'])->name('admin.portfolios.edit');
Route::post('admin/portfolios/update/{id}',[portfoliopagesController::class,'update'])->name('admin.portfolios.update');
Route::delete('admin/portfolios/delete/{id}',[portfoliopagesController::class,'delete'])->name('admin.portfolios.delete');



 //Route::get('admin/portfolio',[pagesController::class,'portfolio'])->name('admin.portfolio');
 Route::get('admin/contact',[pagesController::class,'contact'])->name('admin.contact');





