<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    public function order() : BelongsTo {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function inventory() : BelongsTo {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }
}
