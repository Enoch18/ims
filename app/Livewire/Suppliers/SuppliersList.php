<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;

use App\Models\Supplier;

class SuppliersList extends Component
{
    public function render()
    {
        return view('livewire.suppliers.suppliers-list', [
            'suppliers' => Supplier::paginate(15)
        ]);
    }
}
