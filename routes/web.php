<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/note', [StoryController::class, 'create']);
Route::post('/story', [StoryController::class, 'store']);
Route::get('/home', [StoryController::class, 'index']);
Route::get('/story/{id}/edit', [StoryController::class, 'edit']);
Route::put('/story/{id}', [StoryController::class, 'update']);
Route::delete('/story/{id}', [StoryController::class, 'destroy']);
