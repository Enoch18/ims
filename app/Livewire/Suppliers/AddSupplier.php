<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;

use App\Models\Supplier;

class AddSupplier extends Component
{
    public $name;
    public $contact_person;
    public $email;
    public $phone_number;
    public $address;
    public $country;
    public $city;
    public $province;
    public $zip_code;
    public $website;
    public $payment_terms;
    public $currency;
    public $status;

    public function render()
    {
        return view('livewire.suppliers.add-supplier');
    }

    public function addSupplier(){
        $this->validate([
            'name' => 'required|string',
            'contact_person' => 'nullable|sometimes|string',
            'email' => 'nullable|sometimes|string',
            'phone_number' => 'nullable|sometimes|string',
            'address' => 'nullable|sometimes|string',
            'country' => 'nullable|sometimes|string',
            'city' => 'nullable|sometimes|string',
            'province' => 'nullable|sometimes|string',
            'zip_code' => 'nullable|sometimes|string',
            'website' => 'nullable|sometimes|string',
            'payment_terms' => 'nullable|sometimes|string',
            'currency' => 'nullable|sometimes|string',
            'status' => 'required|in:active,inactive'
        ]);

        try{
            $supplier = new Supplier;
            $supplier->name = $this->name;
            $supplier->contact_person = $this->contact_person;
            $supplier->email = $this->email;
            $supplier->phone_number = $this->phone_number;
            $supplier->address = $this->address;
            $supplier->country = $this->country;
            $supplier->city = $this->city;
            $supplier->province = $this->province;
            $supplier->zip_code = $this->zip_code;
            $supplier->website = $this->website;
            $supplier->payment_terms = $this->payment_terms;
            $supplier->currency = $this->currency;
            $supplier->status = $this->status;
            $supplier->save();
            
            session()->flash('message', 'Form submitted successfully.');

            // Redirect to products page
            return redirect(route('suppliers.list'));
        }catch(\Exception $e){
            session()->flash('error', 'An error occurred! ' . $e->getMessage());
        }
    }
}
