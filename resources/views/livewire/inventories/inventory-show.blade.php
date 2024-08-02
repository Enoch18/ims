<div>
    <h4 class="text-xl font-bold text-gray-900">Inventory Details</h4>

    <div class="grid grid-cols-12 mt-2 gap-5">
        <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-3 p-3 shadow">
            @php $image = $inventory->product->image_url @endphp
            <img id="preview" src="{{ str_contains($image, ".") && !str_contains($image, "no_product") ? "/storage/$image" : "/images/no_product.png" }}" alt="No Product Image" class="w-[100%] rounded" />

            <h4 class="text-lg font-bold text-gray-600 capitalize mt-5">Warehouse Details</h4>
            <div class="flex flex-row gap-3">
                <p class="font-semibold">Warehouse Name: </p>
                <p>{{$inventory->warehouse->name}}</p>
            </div>

            <div class="flex flex-row gap-3">
                <p class="font-semibold">Location in warehouse: </p>
                <p>{{$inventory?->warehouse?->location?->code ?? 'N/A'}}</p>
            </div>
        </div>

        <div class="col-span-12 sm:col-span-12 md:col-span-8 lg:col-span-9 p-3 shadow">
            <h4 class="text-lg font-bold text-gray-600 capitalize">{{$inventory->product->name}} Details</h4><hr />

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 mt-3">
                <x-admin.key-value key="Batch Number" :value="$inventory->batch_lot_number" />
                <x-admin.key-value key="Quantity" :value="$inventory->quantity" />  
                <x-admin.key-value key="Expiration Date" :value="$inventory->expiration_date" />  
                <x-admin.key-value key="Last Restocked" :value="$inventory->last_restocked" />  
                <x-admin.key-value key="Last Sold" :value="$inventory->quantity" /> 
                <x-admin.key-value key="Reorder Level" :value="$inventory->reorder_level" />
                <x-admin.key-value key="Minimum Quantity" :value="$inventory->minimum_quantity" /> 
                <x-admin.key-value key="Maximum Quantity" :value="$inventory->maximum_quantity" />   
                <x-admin.key-value key="Cost Price" :value="$inventory->cost_price" /> 
                <x-admin.key-value key="Selling Price" :value="$inventory->selling_price" />
                <x-admin.key-value key="Total Value" :value="$inventory->total_value" />
                <x-admin.key-value key="Notes" :value="$inventory->notes" />
                <x-admin.key-value key="Tags" :value="$inventory->tags" />
                <x-admin.key-value key="Status" :value="$inventory->status" />  
            </div>
        </div>
    </div>
</div>
