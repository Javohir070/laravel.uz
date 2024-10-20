<?php

use App\Http\Controllers\Api\AuthApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('loginapi', [AuthApiController::class, 'loginAPI']);

Route::get('news', [AuthApiController::class, "news"]);

Route::get('annoucement', [AuthApiController::class, "annoucement"]);

Route::get('responsible', [AuthApiController::class, "responsible"]);

