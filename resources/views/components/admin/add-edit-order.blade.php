@props(['customers', 'products_count'])

{{-- Form for the product that is being added --}}
<form class="mt-2" wire:submit.prevent="submitOrder">
    <div class="grid xs:grid-cols-1 sm:grid-cols-1 md:grid-cols-12 mt-3 gap-5">
        <div class="xs:col-span-12 sm:col-span-12 md:col-span-8 min-h-7 shadow rounded p-3">
            <h4 class="text-lg">Order Details</h4><hr />
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
            
            <div class="grid gap-6 mb-6 xs:cols-1 sm:cols-1 md:grid-cols-2 mt-3">
                <div>
                    <label for="customer_id" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Customer</label>
                    <select id="customer_id" wire:model="customer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500">
                        <option value="">--Select Customer--</option>
                        @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
                        @endforeach
                    </select>
                    @error('customer_id') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'total_amount'" :type="'number'" :label="'Total Amount'" :required="'true'" />
                    @error('total_amount') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'shipping_address'" :type="'text'" :label="'Shipping Address'" />
                    @error('shipping_address') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'billing_address'" :type="'text'" :label="'Billing Address'" />
                    @error('billing_address') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Payment Method</label>
                    <select id="payment_method" wire:model="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500">
                        <option value="">--Select Payment Method--</option>
                        <option value="Card">Card</option>
                        <option value="Card">Cash</option>
                        <option value="Card">Online</option>
                        <option value="Card">Other</option>
                    </select>
                    @error('customer_id') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="payment_status" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Payment Status <x-required /></label>
                    <select id="payment_status" wire:model="payment_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500">
                        <option value="">--Select Status--</option>
                        <option value="Paid">Initiated</option>
                        <option value="Unpaid">Processed</option>
                        <option value="Pending">Rejected</option>
                    </select>
                    @error('status') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'shipping_method'" :type="'text'" :label="'Shipping Method'" />
                    @error('shipping_method') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'shipping_cost'" :type="'text'" :label="'Shipping Cost'" />
                    @error('shipping_cost') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'discount_amount'" :type="'number'" :label="'Discount Amount'" />
                    @error('discount_amount') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'tax_amount'" :type="'number'" :label="'Tax Amount'" />
                    @error('tax_amount') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="xs:col-span-12 sm:col-span-12 md:col-span-12 mt-5">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Status <x-required /></label>
                <select id="status" wire:model="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500">
                    <option value="">--Select Status--</option>
                    <option value="Paid">Paid</option>
                    <option value="Unpaid">Unpaid</option>
                    <option value="Pending">Pending</option>
                </select>
                @error('status') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="xs:col-span-12 sm:col-span-12 md:col-span-12 mt-5">
                <div>
                    <label for="notes" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Notes</label>
                    <textarea id="notes" wire:model="notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Enter the product description"></textarea>
                
                </div>
                @error('notes') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Order items --}}
        <div class="col-span-4 min-h-7 shadow rounded p-3 relative">
            <h4 class="text-lg">Order Products</h4><hr />

            {{-- Displaying the products that have been added --}}
            <div class="mt-3">
                <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                        <tr>
                            <th class="px-4 py-2">Product</th>
                            <th class="px-4 py-2">Quantity</th>
                            <th class="px-4 py-2">Unit Price</th>
                            <th class="px-4 py-2">Total Price</th>
                            @if($products_count > 1)
                            <th class="px-4 py-2"></th>
                            @endif
                        </tr>
                    </thead>
                    
                    <tbody>
                        @for($i = 0; $i < $products_count; $i++)
                            <tr>
                                <td class="w-4 p-4">
                                    <input type="text" class="h-8 text-sm rounded" placeholder="Enter Product" autofocus />
                                </td>

                                <td class="w-4 p-4">
                                    <input type="number" class="h-8 text-sm rounded w-20" />
                                </td>

                                <td class="w-4 p-4">
                                    500
                                </td>

                                <td class="w-4 p-4">
                                    5000
                                </td>

                                @if($products_count > 1)
                                    <td class="w-4 p-4">
                                        <button wire:click="decreaseProductCount" class="mt-2 bg-red-700 text-white w-8 h-8 rounded-full shadow"><i class="fa fa-close"></i></button>
                                    </td>
                                @endif
                            </tr>
                        @endfor
                    </tbody>
                </table>

                <div class="flex flex-row justify-end">
                    <button wire:click="increaseProductCount" class="mt-2 bg-green-700 text-white w-11 h-11 rounded-full shadow"><i class="fa fa-plus text-2xl"></i></button>
                </div>
            </div>

            <div class="absolute bottom-3 right-3">
                <button class="theme-btn-bg p-1 min-w-24 pl-3 pr-3 rounded text-white flex flex-row items-center justify-center gap-1">
                    <i class="fa fa-save text-lg"></i> Save Order
                </button>
            </div>
        </div>
    </div>
</form>