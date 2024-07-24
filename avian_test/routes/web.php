<?php

use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\HotelTypeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\AreaSalesController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('history', HistoryController::class);
Route::post('history/getEditForm', [HistoryController::class, 'getEditForm'])->name('history.getEditForm');

Route::resource('areaSales', AreaSalesController::class);
Route::post('areaSales/getEditForm', [AreaSalesController::class, 'getEditForm'])->name('areaSales.getEditForm');

Route::resource('penjualan', PenjualanController::class);
Route::post('penjualan/getEditForm', [PenjualanController::class, 'getEditForm'])->name('penjualan.getEditForm');

Route::resource('sales', SalesController::class);
Route::post('sales/getEditForm', [SalesController::class, 'getEditForm'])->name('sales.getEditForm');
Route::get('sales/export/excel', [SalesController::class, 'exportExcel'])->name('sales.exportExcel');
Route::get('sales/export/pdf', [SalesController::class, 'exportPDF'])->name('sales.exportPDF');