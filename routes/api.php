<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\TaskController;


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
Route::post('/',[App\Http\Controllers\UserController::class,'register']);
Route::post('admin/login', [App\Http\Controllers\UserController::class,'authenticate']);
Route::get('admin/open', [App\Http\Controllers\DataController::class,'open']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('admin/user', [App\Http\Controllers\UserController::class,'getAuthenticatedUser']);
    Route::get('admin/closed', [App\Http\Controllers\DataController::class,'closed']);
});
Route::post('/checkClient',[App\Http\Controllers\TaskController::class,'checkClient']);

Route::apiResource('/task_approve',App\Http\Controllers\TaskController::class);
