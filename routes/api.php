<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
use App\Http\Controllers\TodosController;

Route::get('/todos', [TodosController::class, 'getAllTodos']);
Route::get('/todos/{id}', [TodosController::class, 'getTodoById']);
Route::post('/todos', [TodosController::class, 'createTodo']);
Route::put('/todos/{id}', [TodosController::class, 'updateTodo']);
Route::delete('/todos/{id}', [TodosController::class, 'deleteTodo']);


