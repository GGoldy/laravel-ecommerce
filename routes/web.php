<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');

Route::get('search', [\App\Http\Controllers\CatalogController::class, 'search'])->name('search');
Route::get('catalog/{slug?}', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog.index');
Route::get('product/{slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');


Route::group(['middleware' => 'auth'], function() {


    Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('exportExcel', [\App\Http\Controllers\Admin\DashboardController::class, 'exportExcel'])->name('dashboard.exportExcel');
        Route::get('exportPdf', [\App\Http\Controllers\Admin\DashboardController::class, 'exportPdf'])->name('dashboard.exportPdf');
        Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
        Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);
        Route::post('/products/remove-image', [\App\Http\Controllers\Admin\ProductController::class, 'removeImage'])->name('products.removeImage');
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);


    });
});

Auth::routes();

