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





Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('contacts')->as('contacts:')->group(function () {
        route::get('/', App\Http\Controllers\Api\Contacts\IndexController::class)->name('index');
    });
});





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/testme', function (Request $request) {
    dd($request);
});
