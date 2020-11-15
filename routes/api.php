<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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


Route::resource('teachers', App\Http\Controllers\API\TeacherAPIController::class);

Route::resource('students', App\Http\Controllers\API\StudentAPIController::class);

Route::resource('periods', App\Http\Controllers\API\PeriodAPIController::class);


 
Route::group(
    [
        'middleware' => 'api',
        'namespace' => 'App\Http\Controllers',
    ],
    function ($router) {

     Route::get('/ccache', function() { 
         $exitCode = Artisan::call('config:clear');
         $exitCode = Artisan::call('cache:clear');
         $exitCode = Artisan::call('config:cache'); return 'DONE';
         //Return anything
        });
      Route::post('login', [AuthController::class, 'login']);
      Route::post('logout',[ AuthController::class ,'logout']);
      Route::post('refresh', [AuthController::class ,'refresh']);
      Route::post('me', [AuthController::class ,'me']);
      Route::post('login-members', [AuthController::class ,'loginStudentOrTeacher']);
});