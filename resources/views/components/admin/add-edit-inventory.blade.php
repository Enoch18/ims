@props(['products', 'warehouses', 'locations', 'defaultValue'])

<div class="grid xs:grid-cols-1 sm:grid-cols-1 md:grid-cols-12 mt-3 gap-5">
    <div class="col-span-12 min-h-7 shadow rounded p-3">
        <h4 class="text-lg">Inventory Details</h4><hr />

        {{-- Form for the product that is being added --}}
        <form class="mt-4" wire:submit.prevent="submitInventory">
            @if (session()->has('message'))
                <div class="mt-4 p-2 bg-green-600 rounded mb-5 text-white">
                    {{ session('message') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="mt-4 p-2 bg-red-600 rounded mb-5 text-white">
                    {{ session('error') }}
                </div>
            @endif
            
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <livewire:autocomplete searchType="Product" label="Product" required="true" :defaultValue="$defaultValue" />
                    @error('product_id') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="warehouse_id" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Warehouse</label>
                    <select id="warehouse_id" wire:model="warehouse_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500">
                        <option value="">--Select Warehouse--</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                        @endforeach
                    </select>
                    @error('warehouse_id') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="location_id" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Location</label>
                    <select id="location_id" wire:model="location_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500">
                        <option value="">--Select Location--</option>
                        @foreach($locations as $location)
                            <option value="{{$location->id}}">{{$location->code}}</option>
                        @endforeach
                    </select>
                    @error('location_id') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'quantity'" :type="'number'" :label="'Quantity'" />
                    @error('quantity') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.date-picker :id="'expiration_date'" :label="'Expiration Date'"/>
                    @error('expiration_date') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.date-picker :id="'last_restocked'" :label="'Last Restocked'" />
                    @error('last_restocked') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.date-picker :id="'last_sold'" :label="'Last Sold'" />
                    @error('last_sold') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'reorder_level'" :type="'number'" :label="'Reorder Level'" />
                    @error('reorder_level') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'minimum_quantity'" :type="'number'" :label="'Minimum Quantity'" />
                    @error('minimum_quantity') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'maximum_quantity'" :type="'number'" :label="'Maximum Quantity'" />
                    @error('maximum_quantity') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'cost_price'" :type="'number'" :label="'Cost Price'" />
                    @error('cost_price') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'selling_price'" :type="'number'" :label="'Selling Price'" />
                    @error('selling_price') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'discount'" :type="'number'" :label="'Discount'" />
                    @error('discount') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'total_value'" :type="'number'" :label="'Total Value'" />
                    @error('total_value') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'tags'" :type="'text'" :label="'Tags'" />
                    @error('tags') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Status</label>
                    <select id="status" wire:model="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500">
                        <option value="">--Select Status--</option>
                        <option value="active">Active</option>
                        <option value="discontinued">Discontinued</option>
                    </select>
                    @error('status') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-span-12 mt-5">
                <div>
                    <label for="notes" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Notes</label>
                    <textarea id="notes" wire:model="notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Enter the product description"></textarea>
                
                </div>
                @error('notes') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-12 flex flex-row justify-end mt-5">
                <button class="theme-btn-bg p-1 min-w-24 rounded text-white flex flex-row items-center justify-center gap-1">
                    <i class="fa fa-save text-lg"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>