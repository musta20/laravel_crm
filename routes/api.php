<?php

use App\Models\Contact;
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
        
        //auth()->loginUsingId(App\Models\User::factory()->create()->id);
        //Contact::factory(10)->create();
        
        route::get('/',IndexController::class)->name('index');
        route::post('/',StoreController::class)->name('store');
        route::get('{uuid}',ShowController::class)->name('show');
        route::put('{uuid}',UpdateController::class)->name('update');
    });
});





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/testme', function (Request $request) {
    dd($request);
});
