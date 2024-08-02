<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Product;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\Supplier;
use App\Models\Warehouse;

class Autocomplete extends Component
{
    public $items = [];
    public $query;
    public $searchType;
    public $id;
    public $label;
    public $required;
    public $defaultValue;
    public $show;

    public function updatedQuery($value)
    {   
        $this->show = true;

        if($this->searchType == 'Product'){
            $this->items = Product::where('name', 'LIKE', '%' . $value . '%')->take(15)->get();
        }
    }

    public function mount(){
        $this->query = $this->defaultValue;
    }

    public function render()
    {
        return view('livewire.autocomplete');
    }

    public function selectedId($id){
        $this->id = $id;
        $this->items = [];

        $item = Product::find($id);
        $this->query = $item?->name;

        $this->show = false;

        $this->dispatch('selectedItemId', item_id: $id);
    }
}
