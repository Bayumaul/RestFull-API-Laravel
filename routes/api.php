<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FormController;
use Illuminate\Http\Request;
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

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);


    return ['token' => $token->plainTextToken];
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    // Route::get('/form',[FormController::class,'index']); 
    Route::post('/create',[FormController::class,'create']); 
    Route::get('/logout',[AuthController::class,'logout']);

});

Route::post('/login',[AuthController::class,'login']);
