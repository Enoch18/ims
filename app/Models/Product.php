<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    public function supplier() : BelongsTo {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function warehouse() : BelongsTo {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function location() : BelongsTo {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function inventories() : HasMany {
        return $this->hasMany(Inventory::class, 'product_id');
    }
}
