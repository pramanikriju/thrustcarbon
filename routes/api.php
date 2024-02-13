<?php

use App\Http\Controllers\Api\PlantController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('plant',[PlantController::class, 'create']);

Route::get('/plant/{plant}/environment',[PlantController::class, 'getEnvironment'])->name('get-environment');
Route::post('/plant/{plant}/environment',[PlantController::class, 'SetEnvironment'])->name('set-environment');
