<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

use App\Http\Requests\CategoryRequest;

Route::get('/', [DefaultController::class, 'viewDefault']);

Route::get('/register-view', [AuthController::class, 'viewRegister'])->name('register');
Route::get('/login-view', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/post-register', [AuthController::class, 'register']);
Route::post('/post-login', [AuthController::class, 'login']);

Route::prefix('/user')->middleware('checkAuth')->group(function () {
    Route::get('/', [UserController::class, 'viewProfile'])->name('profile-user');
});

Route::prefix('/admin')->middleware('checkRole')->group(function () {
    Route::get('/', [AdminController::class, 'viewAddProduct'])->name('admin');
    Route::get('/viewInformationProduct', [AdminController::class, 'viewInformationProduct'])->name('viewInformationProduct');
});


Route::post('/post-profile', [UserController::class, 'updateProfileUser']);
Route::post('/post-category', [AdminController::class, 'postCategory']);
Route::post('/post-supplier', [AdminController::class, 'postSupplier']);
Route::post('/post-product', [AdminController::class, 'postProduct']);

// Route::get('/test-supplier', function () {
//     $repo = app(\App\Repositories\ProductRepository::class);
//     // $service = app(\App\Services\CategoryService::class);
//     $data = [
//         'product_name' => 'điện thoại',
//         'category_id' => 15,
//         'supplier_id' => 15,
//         'product_price' => '20000000',
//         'product_quantity' => '15',
//         'product_image' => 'hình điện thoại',
//         'product_code' => 'điện thoạis',
//         'product_decription' => 'mô tả',
//         'created_at' => now(),
//     ];

//     return $repo->postProduct($data);
// });
