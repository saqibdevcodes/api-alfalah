<?php

use App\Http\Controllers\RespondentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

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

Route::get('/example', function (Request $request) {
    return response()->json(['message' => 'Hello from Laravel!']);
});

Route::post('/import', [RespondentController::class, 'import'])->name('import');
Route::get('/get-gender', [RespondentController::class, 'get_gender'])->name('gender');
Route::post('/upload-photo', [UserController::class, 'uploadPhoto']);
Route::post('/user-profile', [UserController::class, 'profile']);
Route::delete('/clear', [RespondentController::class, 'clear_db'])->name('clear');
