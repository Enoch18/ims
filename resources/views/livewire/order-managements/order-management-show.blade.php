<div>
    <h4 class="text-xl font-bold text-gray-900">Order Details</h4>

    <div class="grid grid-cols-12 mt-2 gap-5">
        <div class="col-span-12 sm:col-span-12 md:col-span-8 lg:col-span-8 p-3 shadow">
            <h4 class="text-lg font-bold text-gray-600 capitalize">Order {{$order->order_number}}</h4><hr />

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-3 mt-3">
                <x-admin.key-value key="Transaction ID" :value="$order->transaction_id ?? 'N/A'" />
                <x-admin.key-value key="Customer" :value="$order->customer ? $order->customer->first_name . ' ' .  $order->customer->last_name: 'N/A'" />
                <x-admin.key-value key="Status" :value="$order->status ?? 'N/A'" />
                <x-admin.key-value key="Total Amount" :value="$order->total_amount ?? 'N/A'" />
                <x-admin.key-value key="Shipping Address" :value="$order->shipping_address ?? 'N/A'" />
                <x-admin.key-value key="Billing Address" :value="$order->billing_address ?? 'N/A'" />
                <x-admin.key-value key="Payment Method" :value="$order->payment_method ?? 'N/A'" />
                <x-admin.key-value key="Payment Status" :value="$order->payment_status ?? 'N/A'" />
                <x-admin.key-value key="Shipping Method" :value="$order->shipping_method ?? 'N/A'" />
                <x-admin.key-value key="Shipping Cost" :value="$order->shipping_cost ?? 'N/A'" />
                <x-admin.key-value key="Discount Amount" :value="$order->discount_amount ?? 'N/A'" />
                <x-admin.key-value key="Tax Amount" :value="$order->tax_amount ?? 'N/A'" />
                <x-admin.key-value key="Delivery Date" :value="$order->delivery_date ?? 'N/A'" />
                <x-admin.key-value key="Notes" :value="$order->notes ?? 'N/A'" />
            </div>
        </div>

        <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4 p-3 shadow">
            <h4 class="text-lg font-bold text-gray-600 capitalize">Order Items</h4><hr />

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                    <th scope="col" class="px-6 py-3">
                        Product
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Unit Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Price
                    </th>
                </thead>

                <tbody>
                    @foreach($order_items as $item)
                        <tr class="bg-white border-b light:bg-gray-800 light:border-gray-700 hover:bg-gray-50 light:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                                {{$item->inventory->product->name}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                                {{$item->price}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                                {{$item->quantity}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                                {{$item->total}}
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if(count($order_items) == 0)
                <p class="p-3 text-center">No order items</p>
            @endif
        </div>
    </div>
</div>