<?php

namespace App\Livewire\Products;

use Livewire\Component;

use App\Models\Product;

use App\Models\Inventory;

class ShowProduct extends Component
{
    public $product;
    public $product_id;

    public function mount($id){
        $this->product_id = $id;
        $this->product = Product::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.products.show-product', [
            'inventories' => Inventory::where('product_id', '=', $this->product_id)->paginate(20)
        ]);
    }
}
