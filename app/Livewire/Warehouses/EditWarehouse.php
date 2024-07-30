<?php

namespace App\Livewire\Warehouses;

use Livewire\Component;

use App\Models\Warehouse;

class EditWarehouse extends Component
{
    public $name;
    public $address;
    public $city;
    public $state;
    public $postal_code;
    public $country;
    public $phone_number;
    public $email;
    public $manager_name;
    public $capacity;
    public $current_usage;

    public $warehouse_id;

    public function mount($id){
        $warehouse = Warehouse::findOrFail($id);

        $this->name = $warehouse->name;
        $this->address = $warehouse->address;
        $this->city = $warehouse->city;
        $this->state = $warehouse->state;
        $this->postal_code = $warehouse->postal_code;
        $this->country = $warehouse->country;
        $this->phone_number = $warehouse->phone_number;
        $this->email = $warehouse->email;
        $this->manager_name = $warehouse->manager_name;
        $this->capacity = $warehouse->capacity;
        $this->current_usage = $warehouse->current_usage;

        $this->warehouse_id = $id;
    }

    public function render()
    {
        return view('livewire.warehouses.edit-warehouse');
    }

    public function submitWarehouse(){
        $this->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|string',
            'manager_name' => 'required|string',
            'capacity' => 'required|integer',
            'current_usage' => 'required|integer'
        ]);

        try{
            $warehouse = Warehouse::findOrFail($this->warehouse_id);
            $warehouse->name = $this->name;
            $warehouse->address = $this->address;
            $warehouse->city = $this->city;
            $warehouse->state = $this->state;
            $warehouse->postal_code = $this->postal_code;
            $warehouse->country = $this->country;
            $warehouse->phone_number = $this->phone_number;
            $warehouse->email = $this->email;
            $warehouse->manager_name = $this->manager_name;
            $warehouse->capacity = $this->capacity;
            $warehouse->current_usage = $this->current_usage;
            $warehouse->save();
            
            session()->flash('message', 'Form submitted successfully.');

            // Redirect to products page
            return redirect(route('warehouses.list'));
        }catch(\Exception $e){
            session()->flash('error', 'An error occurred! ' . $e->getMessage());
        }
    }
}
