<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BooksController;
use App\Http\Controllers\API\AuthorsController;
use App\Http\Controllers\API\CategoriesController;

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
     
Route::middleware('auth:sanctum')->prefix('v1')->group( function () {
    Route::resource('authors', AuthorsController::class);
    Route::resource('categories', CategoriesController::class);
    Route::apiResource('books', BooksController::class);
});
