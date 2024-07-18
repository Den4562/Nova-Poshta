<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\Populate_areaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


// Statuses
Route::get('/super_admin/create_status', [StatusController::class, 'create'])->name('create_status');
Route::post('/super_admin/create_status', [StatusController::class, 'store'])->name('store_status');
Route::get('/admin/create_status', [StatusController::class, 'createAdmin'])->name('admin_create_status');
Route::post('/admin/create_status', [StatusController::class, 'storeAdmin'])->name('admin_store_status');

// Countries
Route::get('/super_admin/create_country', [CountryController::class, 'create'])->name('create_country');
Route::post('/super_admin/create_country', [CountryController::class, 'store'])->name('store_country');
Route::get('/admin/create_country', [CountryController::class, 'createAdmin'])->name('admin_create_country');
Route::post('/admin/create_country', [CountryController::class, 'storeAdmin'])->name('admin_store_country');
// Regions
Route::get('/super_admin/create_region', [RegionController::class, 'create'])->name('create_region');
Route::post('/super_admin/create_region', [RegionController::class, 'store'])->name('store_region');
Route::get('/admin/create_region', [RegionController::class, 'createAdmin'])->name('admin_create_region');
Route::post('/admin/create_region', [RegionController::class, 'storeAdmin'])->name('admin_store_region');

// Populated Areas
Route::get('/super_admin/create_populated_area', [Populate_areaController::class, 'create'])->name('create_populated_area');
Route::post('/super_admin/create_populated_area', [Populate_areaController::class, 'store'])->name('store_populated_area');
Route::get('/admin/create_populated_area', [Populate_areaController::class, 'createAdmin'])->name('admin_create_populated_area');
Route::post('/admin/create_populated_area', [Populate_areaController::class, 'storeAdmin'])->name('admin_store_populated_area');


//START Controller
Route::get('/super_admin/create_client', [ClientController::class, 'create'])->name('create_client');
Route::post('/super_admin/create_client', [ClientController::class, 'store'])->name('store_client');
//END Controller


Route::get('/super_admin/create_order', [OrderController::class, 'create'])->name('create_order');
Route::post('/super_admin/create_order', [OrderController::class, 'store'])->name('store_order');
Route::get('/admin/create_order', [OrderController::class, 'createAdmin'])->name('admin_create_order');
Route::post('/admin/create_order', [OrderController::class, 'storeAdmin'])->name('admin_store_order');
Route::get('/super_admin/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/super_admin/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/super_admin/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/super_admin/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/super_admin/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/super_admin/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/super_admin/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

Route::get('/admin/orders', [OrderController::class, 'indexAdmin'])->name('admin.orders.index');
Route::get('/admin/orders/create', [OrderController::class, 'createAdmin'])->name('admin.orders.create');
Route::post('/admin/orders', [OrderController::class, 'storeAdmin'])->name('admin.orders.store');
Route::get('/admin/orders/{order}', [OrderController::class, 'showAdmin'])->name('admin.orders.show');
Route::get('/admin/orders/{order}/edit', [OrderController::class, 'editAdmin'])->name('admin.orders.edit');
Route::put('/admin/orders/{order}', [OrderController::class, 'updateAdmin'])->name('admin.orders.update');
Route::delete('/admin/orders/{order}', [OrderController::class, 'destroyAdmin'])->name('admin.orders.destroy');