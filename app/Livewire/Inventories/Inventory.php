<?php

namespace App\Livewire\Inventories;

use Livewire\Component;

use App\Models\Inventory as InventoryList;

class Inventory extends Component
{
    public function render()
    {
        return view('livewire.inventories.inventory', [
            'inventories' => InventoryList::orderBy('created_at', 'desc')->paginate(15)
        ]);
    }
}
