<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Api\Contacts\IndexController;
use App\Http\Controllers\Api\Contacts\ShowController;
use App\Http\Controllers\Api\Contacts\StoreController;
use App\Http\Controllers\Api\Contacts\UpdateController;

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





Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('contacts')->as('contacts:')->group(function () {

        route::get('/',IndexController::class)->name('index');
        route::post('/',StoreController::class)->name('store');
        route::get('{uuid}',ShowController::class)->name('show');
        route::put('{uuid}',UpdateController::class)->name('update');
   
    });


    Route::prefix('interaction')->as('interaction:')->group(function (){

        route::get('/',App\Http\Controllers\Api\Interactions\IndexController::class)->name('index');
        route::post('/',App\Http\Controllers\Api\Interactions\StoreController::class)->name('store');


    });



});





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/testme', function (Request $request) {
    dd($request);
});
