<?php

use App\Http\Controllers\Dashboard\Api\Admin\AdminAuthController;
use App\Http\Controllers\Dashboard\Api\Admin\AdminController;
use App\Http\Controllers\Dashboard\Api\Category\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Admin Authentication
Route::prefix('authAdmin')->group(function () {
    Route::post('login', [AdminAuthController::class, 'login']);
});

//Admin Routes with Middleware
Route::prefix('admin')->middleware(['is.admin'])->group(function () {

//Admin Authentication
    Route::post('logout', [AdminAuthController::class, 'logout']);
    Route::post('refresh', [AdminAuthController::class, 'refresh']);
    Route::get('me', [AdminAuthController::class, 'me']);
    Route::get('profile', [AdminController::class, 'profile']);
//Admin Routes
    Route::get('admins/trashed', [AdminController::class, 'trashed']);
    Route::post('admins/{id}/restore', [AdminController::class, 'restore']);
    Route::delete('admins/{id}/force', [AdminController::class, 'forceDelete']);
    Route::delete('admins/{id}/soft', [AdminController::class, 'softDelete']);

    Route::get('admins', [AdminController::class, 'index']);
    Route::post('admins', [AdminController::class, 'store']);
    Route::get('admins/{id}', [AdminController::class, 'show']);
    Route::post('admins/{id}', [AdminController::class, 'update']);

//Category Routes
    Route::get('categories/trashed', [CategoryController::class, 'trashed']);
    Route::post('categories/{id}/restore', [CategoryController::class, 'restore']);
    Route::delete('categories/{id}/force', [CategoryController::class, 'forceDelete']);
    Route::delete('categories/{id}/soft', [CategoryController::class, 'softDelete']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::post('categories', [CategoryController::class, 'store']);
    Route::get('categories/{id}', [CategoryController::class, 'show']);
    Route::post('categories/{id}', [CategoryController::class, 'update']);

});
