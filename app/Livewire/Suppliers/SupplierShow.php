<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;

use App\Models\Supplier;

use App\Models\Product;

class SupplierShow extends Component
{
    public $supplier;

    public function mount($id){
        $this->supplier = Supplier::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.suppliers.supplier-show', [
            'products' => Product::where('supplier_id', '=', $this->supplier->id)->paginate(10)
        ]);
    }
}
