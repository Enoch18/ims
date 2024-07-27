<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

use App\Livewire\Dashboards\Dashboard;

use App\Livewire\Products\ListProducts;
use App\Livewire\Products\ShowProduct;
use App\Livewire\Products\AddProduct;
use App\Livewire\Products\EditProduct;

use App\Livewire\Inventories\Inventory;
use App\Livewire\Inventories\InventoryShow;

use App\Livewire\OrderManagements\OrderManagementList;
use App\Livewire\OrderManagements\OrderManagementShow;

use App\Livewire\Suppliers\SuppliersList;
use App\Livewire\Suppliers\SupplierShow;

use App\Livewire\Warehouses\WarehousesList;
use App\Livewire\Warehouses\WarehouseShow;

use App\Livewire\Reports\ReportsList;
use App\Livewire\UserManagements\UserManagementList;
use App\Livewire\Settings\Settings;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    Route::get('/product-management', ListProducts::class)->name('products.list');
    Route::get('/product-management/add', AddProduct::class)->name('products.add');
    Route::get('/product-management/{id}', ShowProduct::class)->name('products.show');
    Route::get('/product-management/{id}/edit', EditProduct::class)->name('products.edit');

    Route::get('/inventories', Inventory::class)->name('inventory.list');
    Route::get('/inventories/{id}', InventoryShow::class)->name('inventory.show');

    Route::get('/order-management', OrderManagementList::class)->name('order-management.list');
    Route::get('/order-management/{id}', OrderManagementShow::class)->name('order-management.show');

    Route::get('/suppliers', SuppliersList::class)->name('suppliers.list');
    Route::get('/suppliers/{id}', SupplierShow::class)->name('suppliers.show');

    Route::get('/warehouses', WarehousesList::class)->name('warehouses.list');
    Route::get('/warehouses/{id}', WarehousesList::class)->name('warehouses.show');

    Route::get('/reports', ReportsList::class)->name('reports.list');

    Route::get('/user-managements', UserManagementList::class)->name('user-managements.list');

    Route::get('/settings', Settings::class)->name('settings.list');
});
