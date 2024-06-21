<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ConsumableController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('content.dashboard.dashboards-analytics');
});
Route::middleware('auth')->prefix('users')->name('users.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('index');
    // Route::get('customerList', [UserController::class, 'customerList'])->name('customerList');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::post('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::get('/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');
    Route::get('/import-users', [UserController::class, 'importUsers'])->name('import');
    Route::get('/upload-users', [UserController::class, 'uploadUsers'])->name('upload');

    Route::get('export/', [UserController::class, 'export'])->name('export');

});
Route::middleware('auth')->prefix('category')->name('category.')->group(function(){
    Route::get('/index', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/edit/{category_id}', [CategoryController::class, 'edit'])->name('edit');
    Route::post('/update', [CategoryController::class, 'update'])->name('update');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::post('/export', [CategoryController::class, 'export'])->name('export');
    Route::post('/delete/{category_id}', [CategoryController::class, 'delete'])->name('delete');

});

Route::middleware('auth')->prefix('subCategory')->name('subCategory.')->group(function(){
    Route::get('/', [SubCategoryController::class, 'index'])->name('index');
    Route::get('/create', [SubCategoryController::class, 'create'])->name('create');
    Route::post('/edit/{category_id}', [SubCategoryController::class, 'edit'])->name('edit');
    Route::post('/update', [SubCategoryController::class, 'update'])->name('update');
    Route::post('/store', [SubCategoryController::class, 'store'])->name('store');
    Route::post('/delete/{category_id}', [SubCategoryController::class, 'delete'])->name('delete');

});

Route::middleware('auth')->prefix('consumable')->name('consumable.')->group(function(){
    Route::get('/', [ConsumableController::class, 'index'])->name('index');
    Route::get('/create', [ConsumableController::class, 'create'])->name('create');
    Route::post('/edit/{consumable_id}', [ConsumableController::class, 'edit'])->name('edit');
    Route::post('/update', [ConsumableController::class, 'update'])->name('update');
    Route::post('/store', [ConsumableController::class, 'store'])->name('store');
    Route::post('/delete/{consumable_id}', [ConsumableController::class, 'delete'])->name('delete');

});
Route::middleware('auth')->prefix('stock')->name('stock.')->group(function(){
    Route::get('/', [StockController::class, 'index'])->name('index');
    Route::get('/create', [StockController::class, 'create'])->name('create');
    Route::post('/edit/{stock_id}', [StockController::class, 'edit'])->name('edit');
    Route::post('/update', [StockController::class, 'update'])->name('update');
    Route::post('/store', [StockController::class, 'store'])->name('store');
    Route::post('/delete/{stock_id}', [StockController::class, 'delete'])->name('delete');
    Route::get('export/', [StockController::class, 'export'])->name('export');

});

Route::middleware('auth')->prefix('menu')->name('menu.')->group(function(){
    Route::get('/', [MenuController::class, 'index'])->name('index');
    Route::get('/create', [MenuController::class, 'create'])->name('create');
    Route::post('/edit/{stock_id}', [MenuController::class, 'edit'])->name('edit');
    Route::post('/update', [MenuController::class, 'update'])->name('update');
    Route::post('/store', [MenuController::class, 'store'])->name('store');
    Route::post('/delete/{stock_id}', [MenuController::class, 'delete'])->name('delete');
    Route::get('export/', [MenuController::class, 'export'])->name('export');
});
Route::middleware('auth')->prefix('order')->name('order.')->group(function(){
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/create', [OrderController::class, 'create'])->name('create');
    Route::post('/edit/{stock_id}', [OrderController::class, 'edit'])->name('edit');
    Route::post('/update', [OrderController::class, 'update'])->name('update');
    Route::post('/store', [OrderController::class, 'store'])->name('store');
    Route::post('/delete/{stock_id}', [OrderController::class, 'delete'])->name('delete');
    Route::get('export/', [OrderController::class, 'export'])->name('export');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
