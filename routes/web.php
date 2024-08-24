<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Logistic\LogisticListController;
use App\Http\Controllers\CategoryController;

Route::get('/', [DashboardController::class, 'index'])->name('dash');

Route::get('/logistic', [LogisticListController::class, 'index'])->name('logistic');
Route::post('/logistic/storeLogistic', [LogisticListController::class, 'storeLogistic'])->name('logistic.storeLogistic');

Route::get('/cate', [CategoryController::class, 'index'])->name('cate');

Route::post('/cate/storeProvince', [CategoryController::class, 'storeProvince'])->name('cate.storeProvince');
Route::put('/cate/{put}/updateProvince', [CategoryController::class, 'updateProvince'])->name('cate.updateProvince');
Route::put('/cate/{put}/removeProvince', [CategoryController::class, 'removeProvince'])->name('cate.removeProvince');
Route::put('/cate/{put}/activeProvince', [CategoryController::class, 'activeProvince'])->name('cate.activeProvince');

Route::post('/cate/storeItemType', [CategoryController::class, 'storeItemType'])->name('cate.storeItemType');
Route::put('/cate/{put}/updateItemType', [CategoryController::class, 'updateItemType'])->name('cate.updateItemType');
Route::put('/cate/{put}/removeItemType', [CategoryController::class, 'removeItemType'])->name('cate.removeItemType');
Route::put('/cate/{put}/activeItemType', [CategoryController::class, 'activeItemType'])->name('cate.activeItemType');

Route::post('/cate/storeProcess', [CategoryController::class, 'storeProcess'])->name('cate.storeProcess');
Route::put('/cate/{put}/updateProcess', [CategoryController::class, 'updateProcess'])->name('cate.updateProcess');
Route::put('/cate/{put}/removeProcess', [CategoryController::class, 'removeProcess'])->name('cate.removeProcess');
Route::put('/cate/{put}/activeProcess', [CategoryController::class, 'activeProcess'])->name('cate.activeProcess');
