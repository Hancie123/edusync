<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InstitutionController;
use App\Http\Controllers\Api\StudentClassController;
use App\Http\Controllers\Api\StudentController;
use App\Models\Announcement;
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

Route::post('login',[AuthController::class,'login']);


Route::group(['middleware'=>'auth:api'],function(){

    Route::get('institution/{id}',[InstitutionController::class,'show']);

    Route::apiResource('student-class',StudentClassController::class);

    Route::apiResource('students',StudentController::class);

    Route::apiResource('announcement',Announcement::class);
    
});