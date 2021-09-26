<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AnnouncerController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SliderController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/retrieve_faq', [FaqController::class, 'retrieveFaq']);

Route::middleware('auth:sanctum')->get('/retrieve_popup', [AnnouncerController::class, 'retrieve_popup']);

Route::middleware('auth:sanctum')->get('/retrieve_banner', [BannerController::class, 'retrieve_banner']);

Route::middleware('auth:sanctum')->get('/retrieve_slider', [SliderController::class, 'retrieve_slider']);