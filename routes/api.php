<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\PostController;

Route::get('/status', [StatusController::class, 'index']);

// ✅ Replaces StatusController with PostController for /posts
Route::middleware('auth:sanctum')->get('/posts', [PostController::class, 'index']);
