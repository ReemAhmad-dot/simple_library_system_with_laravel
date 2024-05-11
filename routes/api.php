<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

route::group(["middleware"=>["auth:sanctum",'role:member']],function(){
    Route::post('review-book{book_id}',[ App\Http\Controllers\BookController::class,'rateBook']);
    Route::post('add-favorite/{book}',[ App\Http\Controllers\BookController::class,'addToFavorite']);
});