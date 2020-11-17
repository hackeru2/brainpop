<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\TeacherAPIController;
use App\Http\Controllers\API\PeriodAPIController;
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
 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('teachers', TeacherAPIController::class);
Route::get('teachers/{teacher}/students',[TeacherAPIController::class , 'students']);
Route::get('teachers/{teacher}/periods',[TeacherAPIController::class , 'periods']);


Route::resource('periods', PeriodAPIController::class);
Route::get('periods/{period}/students',[PeriodAPIController::class , 'students']);


Route::resource('students', App\Http\Controllers\API\StudentAPIController::class);

Route::group(
    [
        'middleware' => 'api',
        'namespace' => 'App\Http\Controllers',
    ],
    function ($router) {

    
      Route::post('login', [AuthController::class, 'login']);
      Route::post('logout',[ AuthController::class ,'logout']);
      Route::post('refresh', [AuthController::class ,'refresh']);
      Route::post('me', [AuthController::class ,'me']);
      Route::post('login-members', [AuthController::class ,'loginStudentOrTeacher']);
});

Route::get('/ccache', function() { 
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache'); return 'DONE';
    //Return anything
   });