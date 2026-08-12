<?php

use App\Http\Controllers\Dashboard\Api\Admin\AdminAuthController;
use App\Http\Controllers\Dashboard\Api\Admin\AdminController;
use App\Http\Controllers\Dashboard\Api\Category\CategoryController;
use App\Http\Controllers\Dashboard\Api\ContactMessage\ContactMessageController;
use App\Http\Controllers\Dashboard\Api\Order\OrderController;
use App\Http\Controllers\Dashboard\Api\Product\ProductController;
use App\Http\Controllers\Dashboard\Api\Review\ReviewController;
use App\Http\Controllers\Dashboard\Governorate\GovernorateController;
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

//Product Routes
    Route::get('products/trashed', [ProductController::class, 'trashed']);
    Route::post('products/{id}/restore', [ProductController::class, 'restore']);
    Route::delete('products/{id}/force', [ProductController::class, 'forceDelete']);
    Route::delete('products/{id}/soft', [ProductController::class, 'softDelete']);

    Route::get('products', [ProductController::class, 'index']);
    Route::post('products', [   ProductController::class, 'store']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::post('products/{id}', [ProductController::class, 'update']);

//Governorate Routes
    Route::get('governorates/trashed', [GovernorateController::class, 'trashed']);
    Route::post('governorates/{id}/restore', [GovernorateController::class, 'restore']);
    Route::delete('governorates/{id}/force', [GovernorateController::class, 'forceDelete']);
    Route::delete('governorates/{id}/soft', [GovernorateController::class, 'softDelete']);

    Route::get('governorates', [GovernorateController::class, 'index']);
    Route::post('governorates', [GovernorateController::class, 'store']);
    Route::get('governorates/{id}', [GovernorateController::class, 'show']);
    Route::post('governorates/{id}', [GovernorateController::class, 'update']);

//Review Routes
    Route::get('reviews/trashed', [ReviewController::class, 'trashed']);
    Route::post('reviews/{id}/restore', [ReviewController::class, 'restore']);
    Route::delete('reviews/{id}/force', [ReviewController::class, 'forceDelete']);
    Route::delete('reviews/{id}/soft', [ReviewController::class, 'softDelete']);

    Route::get('reviews', [ReviewController::class, 'index']);
    Route::post('reviews', [ReviewController::class, 'store']);
    Route::get('reviews/{id}', [ReviewController::class, 'show']);
    Route::post('reviews/{id}', [ReviewController::class, 'update']);

//Order Routes
    Route::get('orders/trashed', [OrderController::class, 'trashed']);
    Route::post('orders/{id}/restore', [OrderController::class, 'restore']);
    Route::delete('orders/{id}/force', [OrderController::class, 'forceDelete']);
    Route::delete('orders/{id}/soft', [OrderController::class, 'softDelete']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::post('orders', [ OrderController::class, 'store']);
    Route::get('orders/{id}', [OrderController::class, 'show']);
    Route::post('orders/{id}', [OrderController::class, 'update']);

//Contact Message Routes
    Route::get('messages/trashed', [ContactMessageController::class, 'trashed']);
    Route::post('messages/{id}/restore', [ContactMessageController::class, 'restore']);
    Route::delete('messages/{id}/force', [ContactMessageController::class, 'forceDelete']);
    Route::delete('messages/{id}/soft', [ContactMessageController::class, 'softDelete']);

    Route::get('messages', [ContactMessageController::class, 'index']);
    Route::post('messages', [ContactMessageController::class, 'store']);
    Route::get('messages/{id}', [ContactMessageController::class, 'show']);
    Route::post('messages/{id}', [ContactMessageController::class, 'update']);

});
