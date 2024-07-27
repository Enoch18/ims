<?php

namespace App\Livewire\Warehouses;

use Livewire\Component;

use App\Models\Warehouse;

class WarehousesList extends Component
{
    public function render()
    {
        return view('livewire.warehouses.warehouses-list', [
            'warehouses' => Warehouse::paginate(15)
        ]);
    }
}
