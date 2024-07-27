<?php

namespace App\Livewire\Products;

use Livewire\Component;

use App\Models\Product;

class ListProducts extends Component
{
    public function render()
    {
        return view('livewire.products.list-products', [
            'products' => Product::paginate(15)
        ]);
    }
}
