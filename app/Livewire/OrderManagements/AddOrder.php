<?php

namespace App\Livewire\OrderManagements;

use Livewire\Component;

use App\Models\Customer;

use App\Models\Product;

class AddOrder extends Component
{
    public $customer_id;
    public $status;
    public $total_amount;
    public $shipping_address;
    public $billing_address;
    public $payment_method;
    public $payment_status;
    public $shipping_method;
    public $shipping_cost;
    public $discount_amount;
    public $tax_amount;
    public $notes;
    public $order_products = [];
    public $products_count = 1;


    // System generated order number, transaction_id and delivery_date

    public function render()
    {
        return view('livewire.order-managements.add-order', [
            'customers' => Customer::all(),
            'products' => Product::orderBy('created_at', 'DESC')->limit(15)->get()
        ]);
    }

    public function submitOrder(){
        $this->validate([
            'customer_id' => 'nullable|sometimes|integer',
            'status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
            'total_amount' => 'required|numeric',
            'shipping_address' => 'nullable|sometimes|string',
            'billing_address' => 'nullable|sometimes|string',
            'payment_method' => 'nullable|sometimes|string',
            'payment_status' => 'required|in:Paid,Unpaid,Pending',
            'shipping_method' => 'nullable|sometimes|string',
            'shipping_cost' => 'nullable|sometimes|numeric',
            'discount_amount' => 'nullable|sometimes|numeric',
            'tax_amount' => 'nullable|sometimes|numeric',
            'notes' => 'nullable|sometimes|string'
        ]);
        session()->flash('message', 'Form submitted successfully.');
    }

    public function increaseProductCount(){
        $this->products_count++;
    }

    public function decreaseProductCount(){
        $this->products_count--;
    }
}
