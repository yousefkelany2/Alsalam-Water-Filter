<?php

use App\Http\Controllers\Dashboard\Api\Admin\AdminAuthController;
use App\Http\Controllers\Dashboard\Api\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Admin Authentication
Route::prefix('authAdmin')->group(function () {
    Route::post('login', [AdminAuthController::class, 'login']);
});

//Admin Routes with Middleware
Route::prefix('admin')->group(function () {
    Route::middleware(['is.admin'])->group(function () {

        Route::post('logout', [AdminAuthController::class, 'logout']);
        Route::post('refresh', [AdminAuthController::class, 'refresh']);
        Route::get('me', [AdminAuthController::class, 'me']);
        Route::get('profile', [AdminController::class, 'profile']);

        Route::post('admins/{id}/restore', [AdminController::class, 'restore']);
        Route::delete('admins/{id}/force', [AdminController::class, 'forceDelete']);
        Route::delete('admins/{id}/soft', [AdminController::class, 'softDelete']);

        Route::get('admins', [AdminController::class, 'index']);
        Route::post('admins', [AdminController::class, 'store']);
        Route::get('admins/{id}', [AdminController::class, 'show']);
        Route::post('admins/{id}', [AdminController::class, 'update']);

   });
});
