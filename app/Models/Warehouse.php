<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warehouse extends Model
{
    use HasFactory;

    public function products() : HasMany{
        return $this->hasMany(Product::class, 'warehouse_id');
    }

    public function inventories() : HasMany {
        return $this->hasMany(Inventory::class, 'warehouse_id');
    }
}
