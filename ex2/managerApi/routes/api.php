<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TodoController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::post('/todos', [TodoController::class, 'store']);
Route::put('/todos/{id}', [TodoController::class, 'isDone']);
Route::get('/todos', [TodoController::class, 'paginate']);
Route::delete('/todos/{id}', [TodoController::class, 'delete']);
Route::get('/todos/{id}', [TodoController::class, 'todo']);

Route::post('/projects', [ProjectController::class, 'store'])->middleware('auth:sanctum');
Route::get('/projects', [ProjectController::class, 'paginate'])->middleware('auth:sanctum');


