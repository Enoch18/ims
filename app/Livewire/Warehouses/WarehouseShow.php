<?php

namespace App\Livewire\Warehouses;

use Livewire\Component;

use App\Models\Warehouse;

use App\Models\Inventory;

class WarehouseShow extends Component
{
    public $warehouse;

    public function mount($id){
        $this->warehouse = Warehouse::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.warehouses.warehouse-show', [
            'inventories' => Inventory::where('warehouse_id', '=', $this->warehouse->id)->paginate(10)
        ]);
    }
}
