<?php

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


Route::post('/student-add', [\App\Http\Controllers\StudentController::class, 'store']);
Route::get('/student-list', [\App\Http\Controllers\StudentController::class, 'index']);
Route::get('/student/{id}', [\App\Http\Controllers\StudentController::class, 'getStudentById']);
Route::post('/student-edit/{id}', [\App\Http\Controllers\StudentController::class, 'update']);
Route::post('/student-delete/{id}', [\App\Http\Controllers\StudentController::class, 'delete']);
