@props(['roles'])

<div class="grid xs:grid-cols-1 sm:grid-cols-1 md:grid-cols-12 mt-3 gap-5">
    <div class="col-span-12 min-h-7 shadow rounded p-3">
        <h4 class="text-lg">User Details</h4><hr />

        <form class="mt-4" wire:submit.prevent="submitUser">
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
                    <x-inputs.input-field :id="'first_name'" :type="'text'" :label="'First Name'" />
                    @error('first_name') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'last_name'" :type="'text'" :label="'Last Name'" />
                    @error('last_name') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-span-12">
                <label for="role_id" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Role</label>
                <select id="role_id" wire:model="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500">
                    <option value="">--Select Role--</option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
                @error('status') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-inputs.input-field :id="'email'" :type="'text'" :label="'Email'" />
                @error('email') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mt-6">
                <x-inputs.input-field :id="'password'" :type="'password'" :label="'Password'" />
                @error('password') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div> 

            <div class="mt-6">
                <x-inputs.input-field :id="'confirm_password'" :type="'password'" :label="'Confirm Password'" />
                @error('confirm_password') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            
            <div class="col-span-12 flex flex-row justify-end mt-5">
                <button class="theme-btn-bg p-1 min-w-24 rounded text-white flex flex-row items-center justify-center gap-1">
                    <i class="fa fa-save text-lg"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>