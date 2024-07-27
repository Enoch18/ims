<?php

namespace App\Livewire\OrderManagements;

use Livewire\Component;

use App\Models\Order;

class OrderManagementList extends Component
{
    public function render()
    {
        return view('livewire.order-managements.order-management-list', [
            'orders' => Order::paginate(15)
        ]);
    }
}
