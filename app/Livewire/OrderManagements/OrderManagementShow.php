<?php

namespace App\Livewire\OrderManagements;

use Livewire\Component;

use App\Models\Order;

use App\Models\OrderItem;

class OrderManagementShow extends Component
{
    public $order;

    public function mount($id){
        $this->order = Order::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.order-managements.order-management-show', [
            'order_items' => OrderItem::where('order_id', '=', $this->order->id)->paginate(20)
        ]);
    }
}
