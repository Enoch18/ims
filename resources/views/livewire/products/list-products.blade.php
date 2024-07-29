<div class="mt-2">
    <x-admin.list-heading-and-actions :heading="'Our Products'" :add_route="'products.add'" />

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 light:focus:ring-blue-600 light:ring-offset-gray-800 light:focus:ring-offset-gray-800 focus:ring-2 light:bg-gray-700 light:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
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
                @foreach($products as $product)
                    <tr class="bg-white border-b light:bg-gray-800 light:border-gray-700 hover:bg-gray-50 light:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 light:focus:ring-blue-600 light:ring-offset-gray-800 light:focus:ring-offset-gray-800 focus:ring-2 light:bg-gray-700 light:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                            {{$product->name}}
                        </th>

                        <td class="px-6 py-4">
                            {{$product->category->name}}
                        </td>

                        <td class="px-6 py-4">
                            {{$product->price}}
                        </td>

                        <td class="px-6 py-4 capitalize">
                            {{$product->status}}
                        </td>

                        <td class="px-6 py-4 flex flex-row items-center gap-5">
                            <a href="{{route('products.show', $product->id)}}" class="font-medium text-green-600 light:text-blue-500 hover:underline">
                                <i class="fa fa-eye text-xl"></i>
                            </a>

                            <a href="{{route('products.edit', $product->id)}}" class="font-medium text-blue-600 light:text-blue-500 hover:underline">
                                <i class="fa fa-edit text-xl"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <x-no-item-found :items="$products" />
    </div>

    <div class="mt-5 mb-5">
        <x-admin.pagination :items="$products" />
    </div>
</div>