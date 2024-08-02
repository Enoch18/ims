<?php

namespace App\Livewire\Inventories;

use Livewire\Component;

use App\Models\Inventory;

class InventoryShow extends Component
{
    public $inventory;

    public function mount($id){
        $this->inventory = Inventory::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.inventories.inventory-show');
    }
}
