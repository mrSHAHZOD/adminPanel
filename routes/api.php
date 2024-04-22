<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
  
});

Route::apiResource('blog',BlogController::class ); 
Route::apiResource('news',NewsController::class ); 


// routes/api.php

/* Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('blog',BlogController::class ); 
    Route::apiResource('news',NewsController::class ); 

 Boshqa tasdiqlangan marshrutlaringizni bu erga qo'shing
}); */

Route::post('/login', 'AuthController@login');
