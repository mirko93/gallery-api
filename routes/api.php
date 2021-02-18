<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GalleriesController;

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

Route::post('/posts', [PostController::class, 'store']);

// /my-galleries - /galleries
// Route::post('/galleries', [GalleriesController::class, 'store']);
// Route::patch('/galleries/{gallery}', [GalleriesController::class, 'update']);
// Route::delete('/galleries/{gallery}', [GalleriesController::class, 'destroy']);
