<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SiteController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::prefix('admin/')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/dashboard', function(){ return view('admin.layouts.dashboard'); });

    Route::resources([
      'blog' => BlogController::class,
      'news' => NewsController::class,
   
  ]);
  

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
