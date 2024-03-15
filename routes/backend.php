<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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


        Route::get('/Profile', [UserController::class, 'profile'])->middleware(['auth', 'verified'])->name('profile');
        Route::post('/Profile/update', [UserController::class, 'updateProfile'])->middleware(['auth', 'verified'])->name('profile.update');

        Route::get('/users', [UserController::class, 'showUsers'])->middleware(['auth', 'verified'])->name('users.index');
        Route::post('/users/update', [UserController::class, 'updateUser'])->middleware(['auth', 'verified'])->name('users.update');

        ############################################ Products #################################################


        Route::get('/products', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('products.index');
        Route::get('/products/add', [ProductController::class, 'add'])->middleware(['auth', 'verified'])->name('products.add');
        Route::get('/products/create', [ProductController::class, 'create'])->middleware(['auth', 'verified'])->name('products.create');
        Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->middleware(['auth', 'verified'])->name('products.edit');
        Route::post('/products/store', [ProductController::class, 'store'])->middleware(['auth', 'verified'])->name('products.store');
        Route::post('/products/update', [ProductController::class, 'update'])->middleware(['auth', 'verified'])->name('products.update');
        Route::post('/products/destroy', [ProductController::class, 'destroy'])->middleware(['auth', 'verified'])->name('products.destroy');

        Route::get('/improve/product', [ProductController::class, 'improve'])->middleware(['auth', 'verified'])->name('improve.product');
        Route::post('/improve/product', [ProductController::class, 'improveProduct'])->middleware(['auth', 'verified'])->name('improve.product');

        require __DIR__ . '/auth.php';
    }
);
