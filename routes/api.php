<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StaffController;
use App\Http\Controllers\Api\AuthController;
// Public routes
Route::apiResource('staff', StaffController::class);
Route::apiResource('jantina', App\Http\Controllers\Api\JantinaController::class);
Route::apiResource('bangsa', App\Http\Controllers\Api\BangsaController::class);
Route::apiResource('agama', App\Http\Controllers\Api\AgamaController::class);
Route::apiResource('jawatan', App\Http\Controllers\Api\JawatanController::class);
Route::apiResource('jenis-lantikan', App\Http\Controllers\Api\JenisLantikanController::class);
Route::apiResource('jenis-rekod', App\Http\Controllers\Api\JenisRekodController::class);
Route::apiResource('gred', App\Http\Controllers\Api\GredController::class);
Route::apiResource('bahagian', \App\Http\Controllers\Api\BahagianController::class);
Route::apiResource('cawangan', \App\Http\Controllers\Api\CawanganController::class);
Route::apiResource('seksyen', \App\Http\Controllers\Api\SeksyenController::class);
Route::apiResource('status-gred', \App\Http\Controllers\Api\StatusGredController::class);
Route::apiResource('status', \App\Http\Controllers\Api\StatusController::class);
Route::apiResource('gelaran', \App\Http\Controllers\Api\GelaranController::class);
Route::apiResource('persis-login', \App\Http\Controllers\Api\PersisLoginController::class);
Route::apiResource('kumpulan', \App\Http\Controllers\Api\KumpulanController::class);

// Authentication routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/logout-all', [AuthController::class, 'logoutAll'])->middleware('auth:sanctum');
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');