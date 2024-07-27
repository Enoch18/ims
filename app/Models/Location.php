<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    public function products() : HasMany{
        return $this->hasMany(Product::class, 'location_id');
    }

    public function inventories() : HasMany {
        return $this->hasMany(Inventory::class, 'location_id');
    }
}
