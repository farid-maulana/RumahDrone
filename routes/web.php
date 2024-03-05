<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\StockManagementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/login');
Route::get('login', [AuthController::class, 'loginForm'])->name('auth.login-form');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard.index');
    Route::resource('items', ItemController::class)->except('show');
    Route::resource('shipments', ShipmentController::class);
    Route::get('stocks', StockManagementController::class)->name('stock-management.index');
    Route::get('inventory_export', [ExportController::class, 'index'])->name('inventory-export.index');
    Route::get('inventory_export/download', [ExportController::class, 'download'])->name('inventory-export.download');
});
