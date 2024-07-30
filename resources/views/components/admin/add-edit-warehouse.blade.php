@props(['categories', 'suppliers'])

<div class="grid xs:grid-cols-1 sm:grid-cols-1 md:grid-cols-12 mt-3 gap-5">
    <div class="col-span-12 min-h-7 shadow rounded p-3">
        <h4 class="text-lg">Warehouse Details</h4><hr />

        {{-- Form for the warehouse that is being added --}}
        <form class="mt-2" wire:submit.prevent="submitWarehouse">
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
                    <x-inputs.input-field :id="'name'" :type="'text'" :label="'Warehouse Name'" />
                    @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'address'" :type="'text'" :label="'Address'" />
                    @error('address') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'city'" :type="'text'" :label="'City'" />
                    @error('city') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'state'" :type="'text'" :label="'State'" />
                    @error('state') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'postal_code'" :type="'text'" :label="'Postal Code'" />
                    @error('postal_code') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'country'" :type="'text'" :label="'Country'" />
                    @error('country') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'manager_name'" :type="'text'" :label="'Manager Name'" />
                    @error('manager_name') <span class="error text-red-500">{{ $message }}</span> @enderror
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
                    <x-inputs.input-field :id="'capacity'" :type="'number'" :label="'Capacity'" />
                    @error('capacity') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-span-12">
                <x-inputs.input-field :id="'current_usage'" :type="'number'" :label="'Current Usage'" />
                @error('current_usage') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-12 flex flex-row justify-end mt-5">
                <button class="theme-btn-bg p-1 min-w-24 rounded text-white flex flex-row items-center justify-center gap-1">
                    <i class="fa fa-save text-lg"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>