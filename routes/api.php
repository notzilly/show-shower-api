<?php

use App\Http\Controllers\CreditController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:sanctum')->group(function () {
    Route::get('credits/{id}/characters', [CreditController::class, 'characters']);
    
    Route::apiResources([
        'shows' => ShowController::class,
        'credits' => CreditController::class,
    ]);
});


Route::post('/tokens/create', [TokenController::class, 'authenticate']);
