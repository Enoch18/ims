<div>
    <h4 class="text-xl font-bold text-gray-900">{{$product->name}}</h4>

    <div class="grid grid-cols-12 mt-2 gap-5">
        <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-3 p-3 shadow">
            <img id="preview" src="{{ str_contains($product->image_url, ".") ? "/storage/$product->image_url" : "/images/no_product.png" }}" alt="No Product Image" class="w-[100%] rounded" />
        </div>

        <div class="col-span-12 sm:col-span-12 md:col-span-8 lg:col-span-9 p-3 shadow">
            <h4 class="text-lg font-bold text-gray-600">Product Details</h4>

            <div class="grid sm:grid-cols-1 md:grid-cols-4 gap-3">
                <x-admin.key-value :key="'Product Name'" :value="$product->name" />

                <x-admin.key-value :key="'Product Description'" :value="$product->description" />

                <x-admin.key-value :key="'Category'" :value="$product->category->name" />

                <x-admin.key-value :key="'Supplier'" :value="$product->supplier->name" />

                <x-admin.key-value :key="'SKU'" :value="$product->sku" />

                <x-admin.key-value :key="'Price'" :value="$product->price" />

                <x-admin.key-value :key="'Cost'" :value="$product->cost" />
                
                <x-admin.key-value :key="'Quantity'" :value="$product->quantity" />

                <x-admin.key-value :key="'Reorder Level'" :value="$product->reorder_level" />

                <x-admin.key-value :key="'Manufacturer'" :value="$product->manufacturer" />

                <x-admin.key-value :key="'Barcode'" :value="$product->barcode" />

                <x-admin.key-value :key="'Status'" :value="$product->status" />
            </div>
        </div>
    </div>

    <h4 class="mt-8 text-lg font-bold text-gray-600">Product Inventory</h4>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Batch Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Warehouse
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Location
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Minimum Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Maximum Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Restocked
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Sold
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Expiration Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach($inventories as $inventory)
                    <tr>
                        <td class="px-6 py-4">{{$inventory->batch_lot_number}}</td>
                        <td class="px-6 py-4">{{$inventory->warehouse->name}}</td>
                        <td class="px-6 py-4"></td>
                        <td class="px-6 py-4">{{$inventory->quantity}}</td>
                        <td class="px-6 py-4">{{$inventory->minimum_quantity}}</td>
                        <td class="px-6 py-4">{{$inventory->maximum_quantity}}</td>
                        <td class="px-6 py-4">{{$inventory->last_restocked}}</td>
                        <td class="px-6 py-4">{{$inventory->last_sold}}</td>
                        <td class="px-6 py-4">{{$inventory->expiration_date}}</td>
                        <td class="px-6 py-4"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if(count($inventories) == 0)
            <p class="text-center p-2">No inventories to show</p>
        @endif
    </div>
</div>
