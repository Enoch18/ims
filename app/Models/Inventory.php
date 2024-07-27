<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inventory extends Model
{
    use HasFactory;

    public function product() : BelongsTo {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function warehouse() : BelongsTo {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function location() : BelongsTo {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function orderItems() : HasMany{
        return $this->hasMany(OrderItem::class, 'inventory_id');
    }
}
