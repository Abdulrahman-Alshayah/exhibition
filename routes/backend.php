<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('Dashboard_Admin', [DashboardController::class, 'index']);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {



        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.dashboard');
        })->middleware(['auth'])->name('dashboard.user');

        ############################################ End Profile #################################################

        Route::get('/Profile', [UserController::class, 'profile'])->middleware(['auth', 'verified'])->name('profile');
        Route::post('/Profile/update', [UserController::class, 'updateProfile'])->middleware(['auth', 'verified'])->name('profile.update');

        Route::get('/users', [UserController::class, 'showUsers'])->middleware(['auth', 'verified'])->name('users.index');
        Route::post('/users/update', [UserController::class, 'updateUser'])->middleware(['auth', 'verified'])->name('users.update');

        ############################################ End Profile #################################################

        ############################################ Start Products #################################################

        Route::get('/products', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('products.index');
        Route::get('/product/add', [ProductController::class, 'add'])->middleware(['auth', 'verified'])->name('products.add');
        Route::get('/product/create', [ProductController::class, 'create'])->middleware(['auth', 'verified'])->name('products.create');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->middleware(['auth', 'verified'])->name('products.edit');
        Route::post('/product/store', [ProductController::class, 'store'])->middleware(['auth', 'verified'])->name('products.store');
        Route::post('/product/update', [ProductController::class, 'update'])->middleware(['auth', 'verified'])->name('products.update');
        Route::post('/product/destroy', [ProductController::class, 'destroy'])->middleware(['auth', 'verified'])->name('products.destroy');

        Route::get('/improve/product', [ProductController::class, 'improve'])->middleware(['auth', 'verified'])->name('improve.product');
        Route::post('/improve/product', [ProductController::class, 'improveProduct'])->middleware(['auth', 'verified'])->name('improve.product');

        ############################################ End Products #################################################

        ############################################ Start Categories #################################################

        Route::get('/categories', [CategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('category.index');
        Route::get('/category/add', [CategoryController::class, 'add'])->middleware(['auth', 'verified'])->name('category.add');
        Route::get('/category/create', [CategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('category.create');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('category.edit');
        Route::post('/category/store', [CategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('category.store');
        Route::post('/category/update', [CategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('category.update');
        Route::post('/category/destroy', [CategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('category.destroy');

        ############################################ End Categories #################################################

        require __DIR__ . '/auth.php';
    }
);
