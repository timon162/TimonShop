<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admins\ProductController;
use App\Http\Controllers\Admins\CartController;
use App\Http\Controllers\Admins\HomeController;

Route::get('/', [DefaultController::class, 'viewDefault']);

Route::get('/register-view', [AuthController::class, 'viewRegister'])->name('register');
Route::get('/login-view', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/post-register', [AuthController::class, 'register'])->name('post.register');
Route::post('/post-login', [AuthController::class, 'login'])->name('post.login');

Route::prefix('/user')->middleware('checkAuth')->group(function () {
    Route::get('/', [UserController::class, 'viewProfile'])->name('profile.user');
});

Route::prefix('/admin')->middleware('checkRole')->group(function () {
    Route::get('/', [HomeController::class, 'viewHome'])->name('home.view');
    Route::get('/profile', [AdminController::class, 'viewProfileAdmin'])->name('profile.admin.view');
    Route::get('/add-product', [ProductController::class, 'viewAddProduct'])->name('add.product.view');
    Route::get('/information-product', [ProductController::class, 'viewInformationProduct'])->name('information.product.view');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::get('/detail-product/{id}', [ProductController::class, 'viewDetailProduct'])->name('detail.view');
    Route::get('/update-product/{product_id}', [ProductController::class, 'viewUpdateProduct'])->name('update.product.view');
});

Route::post('/post-profile', [UserController::class, 'updateProfileUser'])->name('post.profile');
Route::post('/post-category', [ProductController::class, 'postCategory'])->name('post.category');
Route::post('/post-supplier', [ProductController::class, 'postSupplier'])->name('post.supplier');
Route::post('/post-product', [ProductController::class, 'postProduct'])->name('post.product');
Route::post('/post-cart', [CartController::class, 'addToCart'])->name('add.cart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');
Route::post('/post-bill', [CartController::class, 'createBill'])->name('create.bill');
Route::delete('/delete-supplier', [ProductController::class, 'deleteSupplier'])->name('delete.supplier');
Route::post('/update-supplier', [ProductController::class, 'updateSupplier'])->name('update.supplier');
Route::delete('/delete-category', [ProductController::class, 'deleteCategory'])->name('delete.category');
Route::post('/update-category', [ProductController::class, 'updateCategory'])->name('update.category');

Route::get('/test-supplier', function () {
    $repo = app(\App\Repositories\ProductRepository::class);
    $service = app(\App\Services\CategoryService::class);
    $controller = app(ProductController::class);
    $dataSessionCart = [];

    foreach (session('cart', []) as $items) {
        $dataSessionCart[] = [
            'product_id' => $items['product_id'],
            'buy_option_id' => 5,
            'bill_quantity' =>  $items['product_quantity'],
            'bill_price' => $items['total_price_product'],
            'created_at' => now(),
        ];
    }

    $data = [
        'category_id' => 14,

        'category_name' => 'Samssung',
    ];
    $dataRepo = $repo->deleteProduct(25);
    // $dataRepo = $controller->deleteCart();
    // $data = $dataRepo->map(function ($item) {
    //     return $item->supplier?->supplier_name;
    // });

    return response()->json($dataRepo);
});
