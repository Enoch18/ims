@props(['categories', 'suppliers'])

<div class="grid xs:grid-cols-1 sm:grid-cols-1 md:grid-cols-12 mt-3 gap-5">
    <div class="col-span-12 min-h-7 shadow rounded p-3">
        <h4 class="text-lg">Warehouse Details</h4><hr />

        {{-- Form for the warehouse that is being added --}}
        <form class="mt-2" wire:submit.prevent="submitSupplier">
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

            <div class="grid gap-6 mb-6 md:grid-cols-2 mt-3">
                <div>
                    <x-inputs.input-field :id="'name'" :type="'text'" :label="'Supplier Name'" />
                    @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'contact_person'" :type="'text'" :label="'Contact Person'" />
                    @error('contact_person') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'email'" :type="'text'" :label="'Email'" />
                    @error('email') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'phone_number'" :type="'text'" :label="'Phone Number'" />
                    @error('phone_number') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'address'" :type="'text'" :label="'Address'" />
                    @error('address') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'country'" :type="'text'" :label="'Country'" />
                    @error('country') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'city'" :type="'text'" :label="'City'" />
                    @error('city') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'province'" :type="'text'" :label="'Province'" />
                    @error('province') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'zip_code'" :type="'text'" :label="'Zip Code'" />
                    @error('zip_code') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'website'" :type="'text'" :label="'Website'" />
                    @error('website') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'payment_terms'" :type="'text'" :label="'Payment Terms'" />
                    @error('payment_terms') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'currency'" :type="'text'" :label="'Currency'" />
                    @error('currency') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-span-12">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Status</label>
                <select id="status" wire:model="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500">
                    <option value="">--Select Status--</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                @error('status') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-12 flex flex-row justify-end mt-5">
                <button class="theme-btn-bg p-1 min-w-24 rounded text-white flex flex-row items-center justify-center gap-1">
                    <i class="fa fa-save text-lg"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>