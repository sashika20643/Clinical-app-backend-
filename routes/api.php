<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WaitingController;


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
Route::post('/login',[AuthController::class,'login']);

Route::post('/register',[AuthController::class,'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/isauth', function (Request $request) {

        return true;
    });

    Route::post('/addchanel', [WaitingController::class, 'store']);
    Route::post('/yettogo', [WaitingController::class, 'yettogo']);
    Route::post('/checkchennels', [WaitingController::class, 'allchanels']);
    Route::post('/chaneldetails', [WaitingController::class, 'chaneldetails']);
    Route::post('/deletechanel', [WaitingController::class, 'deletechanel']);



});
// Route::post('/addchanel', [WaitingController::class, 'store']);
