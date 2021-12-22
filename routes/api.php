<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BooksController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('v1/auth/register', [AuthController::class, 'register']);
Route::post('v1/auth/login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function() {    
    Route::post('v1/auth/logout',   [AuthController::class, 'logout']);
  });     
Route::middleware('auth:sanctum')->prefix('v1')->group( function () {
    Route::apiResource('books', BooksController::class);

});
