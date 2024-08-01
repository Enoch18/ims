@props(['categories', 'suppliers', 'image', 'current_image'])

{{-- Form for the product that is being added --}}
<form class="mt-2" wire:submit.prevent="submitProduct">
    <div class="grid xs:grid-cols-1 sm:grid-cols-1 md:grid-cols-12 mt-3 gap-5">
        {{-- Product image grid --}}
        <div class="col-span-3 min-h-7 shadow rounded p-3">
            <h4 class="text-lg">Product Photo</h4><hr />
            
            <label for="image">
                <div class="relative cursor-pointer">
                    <img id="preview" src="{{ $image?->temporaryUrl() ?? $current_image ?? '/images/no_product.png' }}" alt="No Product" class="w-[100%] rounded" />

                    <div class="absolute left-0 right-0 top-0 bottom-0 bg-[rgba(0,0,0,0.5)] hover:bg-[rgba(0,0,0,0.6)] rounded flex flex-row justify-center items-center">
                        <div class="m-5 text-center">
                            <p class="text-xl text-white">Click to add/change photo</p>
                            <i class="fa fa-camera text-3xl text-white"></i>
                        </div>
                    </div>
                </div>
            </label>
            <input type="file" id="image" wire:model="image" accept="image/*" onchange="previewImage(event)" class="hidden" />
        </div>

        {{-- Product details grid --}}
        <div class="col-span-9 min-h-7 shadow rounded p-3">
            <h4 class="text-lg">Product Details</h4><hr />        
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
                    <x-inputs.input-field :id="'name'" :type="'text'" :label="'Product Name'" />
                    @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'price'" :type="'number'" :label="'Price'" />
                    @error('price') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-inputs.input-field :id="'cost'" :type="'number'" :label="'Cost'" />
                    @error('cost') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Quantity</label>
                    <input type="number" id="quantity" wire:model="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Enter Product Quantity" />
                    @error('quantity') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="reorder_level" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Reorder Level</label>
                    <input type="number" id="reorder_level" wire:model="reorder_level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Enter Product Reorder Level" />
                    @error('reorder_level') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="manufacturer" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Manufacturer</label>
                    <input type="text" id="manufacturer" wire:model="manufacturer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Enter Product Manufacturer" />
                    @error('manufacturer') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="barcode" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Barcode</label>
                    <input type="text" id="barcode" wire:model="barcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Enter Product Barcode" />
                    @error('barcode') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Category</label>
                    <select id="category_id" wire:model="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500">
                        <option value="">--Select Category--</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="supplier_id" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Suppliers</label>
                    <select id="supplier_id" wire:model="supplier_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500">
                        <option value="">--Select Category--</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                    @error('supplier_id') <span class="error text-red-500">{{ $message }}</span> @enderror
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

            <div class="col-span-12">
                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Product Description</label>
                    <textarea id="description" wire:model="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Enter the product description"></textarea>
                
                </div>
                @error('description') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-12 flex flex-row justify-end mt-5">
                <button class="theme-btn-bg p-1 min-w-24 rounded text-white flex flex-row items-center justify-center gap-1">
                    <i class="fa fa-save text-lg"></i> Save
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    function previewImage(event){
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById('preview');
            preview.src = reader.result;
        };
        console.log(input.files[0])
        reader.readAsDataURL(input.files[0]);
    }
</script>