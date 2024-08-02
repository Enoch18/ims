<div>
    <h4 class="text-xl font-bold text-gray-900">Warehouse Details</h4>

    <div class="grid grid-cols-12 mt-2 gap-5">
        <div class="col-span-12 sm:col-span-12 md:col-span-8 lg:col-span-12 p-3 shadow rounded bg-white">
            <h4 class="text-lg font-bold text-gray-600 capitalize">{{$warehouse->name}}</h4><hr />

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 mt-3">
                <x-admin.key-value key="Warehouse Address" :value="$warehouse->address" />
                <x-admin.key-value key="City" :value="$warehouse->city" />
                <x-admin.key-value key="State" :value="$warehouse->state" />
                <x-admin.key-value key="Postal Code" :value="$warehouse->postal_code" />
                <x-admin.key-value key="Country" :value="$warehouse->country" />
                <x-admin.key-value key="Phone Number" :value="$warehouse->phone_number" />
                <x-admin.key-value key="Email" :value="$warehouse->email" />
                <x-admin.key-value key="Manager Name" :value="$warehouse->manager_name" />
                <x-admin.key-value key="Capacity" :value="$warehouse->capacity" />
                <x-admin.key-value key="Current Usage" :value="$warehouse->current_usage" />
            </div>
        </div>

        <div class="col-span-12 sm:col-span-12 md:col-span-8 lg:col-span-12 p-3 shadow rounded bg-white">
            <h4 class="text-lg font-bold text-gray-600 capitalize">Location in warehouse</h4><hr />

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 mt-3">
                <x-admin.key-value key="Code" :value="$warehouse->location->code" />
                <x-admin.key-value key="Description" :value="$warehouse->location->description" />
                <x-admin.key-value key="Storage Type" :value="$warehouse->location->storage_type" />
                <x-admin.key-value key="Capacity" :value="$warehouse->capacity" />
                <x-admin.key-value key="Current Usage" :value="$warehouse->current_usage" />
            </div>
        </div>
    </div>

    {{-- All inventory in that warehouse --}}
    <div class="mt-2 gap-5 shadow bg-white p-3 rounded">
        <h4 class="text-lg font-bold text-gray-600 capitalize">Warehouse Inventory</h4>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400 mt-2">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 light:focus:ring-blue-600 light:ring-offset-gray-800 light:focus:ring-offset-gray-800 focus:ring-2 light:bg-gray-700 light:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Batch/Lot #
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Location
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Restocked
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Sold
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($inventories as $inventory)
                    <tr class="bg-white border-b light:bg-gray-800 light:border-gray-700 hover:bg-gray-50 light:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 light:focus:ring-blue-600 light:ring-offset-gray-800 light:focus:ring-offset-gray-800 focus:ring-2 light:bg-gray-700 light:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                            {{$inventory->batch_lot_number}}
                        </th>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                            {{$inventory->product->name}}
                        </th>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                            {{$inventory->location->code}}
                        </th>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                            {{$inventory->quantity}}
                        </th>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                            {{$inventory->last_restocked}}
                        </th>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                            {{$inventory->last_sold}}
                        </th>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white capitalize">
                            {{$inventory->status}}
                        </th>

                        <td class="px-6 py-4 flex flex-row items-center gap-5">
                            <a href="{{route('inventory.show', $inventory->id)}}" class="font-medium text-green-600 light:text-blue-500 hover:underline">
                                <i class="fa fa-eye text-xl"></i>
                            </a>

                            <a href="{{route('inventory.edit', $inventory->id)}}" class="font-medium text-blue-600 light:text-blue-500 hover:underline">
                                <i class="fa fa-edit text-xl"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <x-no-item-found :items="$inventories" />

        <div class="mt-5 mb-5">
            <x-admin.pagination :items="$inventories" />
        </div>
    </div>
</div>