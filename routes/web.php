<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

use App\Livewire\Dashboards\Dashboard;
use App\Livewire\Products\ListProducts;
use App\Livewire\InventoryTrackings\InventoryTrackingsList;
use App\Livewire\OrderManagements\OrderManagementList;
use App\Livewire\Suppliers\SuppliersList;
use App\Livewire\Locations\LocationList;
use App\Livewire\Reports\ReportsList;
use App\Livewire\UserManagements\UserManagementList;
use App\Livewire\Settings\Settings;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    Route::get('/product-management', ListProducts::class)->name('products.list');

    Route::get('/inventory-trackings', InventoryTrackingsList::class)->name('inventory.list');

    Route::get('/order-management', ListProducts::class)->name('order-management.list');

    Route::get('/suppliers', SuppliersList::class)->name('suppliers.list');

    Route::get('/locations', LocationList::class)->name('locations.list');

    Route::get('/reports', ReportsList::class)->name('reports.list');

    Route::get('/user-managements', UserManagementList::class)->name('user-managements.list');

    Route::get('/settings', Settings::class)->name('settings.list');
});
