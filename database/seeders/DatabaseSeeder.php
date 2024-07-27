<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Location;
use App\Models\WareHouse;
use App\Models\Inventory;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::count() == 0 && User::factory(2)->create();
        Category::count() == 0 && Category::factory(10)->create();
        Supplier::count() == 0 && Supplier::factory(10)->create();
        Product::count() == 0 && Product::factory(200)->create();
        WareHouse::count() == 0 && WareHouse::factory(10)->create();
        Location::count() == 0 && Location::factory(100)->create();
        Inventory::count() == 0 && Inventory::factory(200)->create();
        Customer::count() == 0 && Customer::factory(10)->create();
        Order::count() == 0 && Order::factory(10)->create();
        OrderItem::count() == 0 && OrderItem::factory(20)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
