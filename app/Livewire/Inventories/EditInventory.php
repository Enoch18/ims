<?php

namespace App\Livewire\Inventories;

use Livewire\Component;

use App\Models\Product;

use App\Models\Warehouse;

use App\Models\Location;

use App\Models\Inventory;

class EditInventory extends Component
{
    public $product_id;
    public $warehouse_id;
    public $location_id;
    public $quantity;
    public $expiration_date;
    public $last_restocked;
    public $last_sold;
    public $reorder_level;
    public $minimum_quantity;
    public $maximum_quantity;
    public $cost_price;
    public $selling_price;
    public $discount;
    public $total_value;
    public $notes;
    public $tags;
    public $status;
    public $inventory_id;

    public function mount($id){
        $inventory = Inventory::findOrFail($id);

        $this->product_id = $inventory->product_id;
        $this->warehouse_id = $inventory->warehouse_id;
        $this->location_id = $inventory->location_id;
        $this->quantity = $inventory->quantity;
        $this->expiration_date = $inventory->expiration_date;
        $this->last_restocked = $inventory->last_restocked;
        $this->last_sold = $inventory->last_sold;
        $this->reorder_level = $inventory->reorder_level;
        $this->minimum_quantity = $inventory->minimum_quantity;
        $this->maximum_quantity = $inventory->maximum_quantity;
        $this->cost_price = $inventory->cost_price;
        $this->selling_price = $inventory->selling_price;
        $this->discount = $inventory->discount;
        $this->total_value = $inventory->total_value;
        $this->notes = $inventory->notes;
        $this->tags = $inventory->tags;
        $this->status = $inventory->status;

        $this->inventory_id = $id;
    }

    public function render()
    {
        return view('livewire.inventories.edit-inventory', [
            'products' => Product::orderBy('created_at', 'desc')->get(),
            'warehouses' => Warehouse::limit(20)->get(),
            'locations' => Location::limit(20)->get(),
        ]);
    }

    public function submitInventory(){
        $this->validate([
            'product_id' => 'required|integer',
            'warehouse_id' => 'required|integer',
            'location_id' => 'nullable|sometimes|integer',
            'quantity' => 'required|integer',
            'expiration_date' => 'nullable|sometimes|date',
            'last_restocked' => 'nullable|sometimes|date',
            'last_sold' => 'nullable|sometimes|date',
            'reorder_level' => 'nullable|sometimes|integer',
            'minimum_quantity' => 'nullable|sometimes|integer',
            'maximum_quantity' => 'nullable|sometimes|integer',
            'cost_price' => 'nullable|sometimes|numeric',
            'selling_price' => 'nullable|sometimes|numeric',
            'discount' => 'nullable|sometimes|numeric',
            'total_value' => 'nullable|sometimes|numeric',
            'notes' => 'required|string',
            'tags' => 'required|string',
            'status' => 'required|string'
        ]);

        try{
            $inventory = Inventory::findOrFail($this->inventory_id);
            $inventory->product_id = $this->product_id;
            $inventory->warehouse_id = $this->warehouse_id;
            $inventory->location_id = $this->location_id;
            $inventory->quantity = $this->quantity;
            $inventory->expiration_date = $this->expiration_date;
            $inventory->last_restocked = $this->last_restocked;
            $inventory->last_sold = $this->last_sold;
            $inventory->reorder_level = $this->reorder_level;
            $inventory->minimum_quantity = $this->minimum_quantity;
            $inventory->maximum_quantity = $this->maximum_quantity;
            $inventory->cost_price = $this->cost_price;
            $inventory->selling_price = $this->selling_price;
            $inventory->discount = $this->discount;
            $inventory->total_value = $this->total_value;
            $inventory->notes = $this->notes;
            $inventory->tags = $this->tags;
            $inventory->status = $this->status;
            $inventory->save();
            
            session()->flash('message', 'Form updated successfully.');

            // Redirect to products page
            return redirect(route('inventory.list'));
        }catch(\Exception $e){
            session()->flash('error', 'An error occurred! ' . $e->getMessage());
        }
    }
}
