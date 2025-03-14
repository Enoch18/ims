@props(['heading', 'add_route'])

<div>
    <h1 class="text-xl">{{$heading}}</h1>

    <div class="flex flex-row flex-wrap mt-3">
        <div class="flex flex-row flex-1">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 light:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Search for items">
                </div>
            </div>
        </div>

        <div class="flex flex-row items-center flex-wrap gap-5">
            <button class="pl-5 pr-5 pb-2 pt-2 border border-gray-400 rounded bg-white flex flex-row gap-2 items-center">
                <i class="fa fa-download"></i> Import
            </button>

            <button class="pl-5 pr-5 pb-2 pt-2 border border-gray-400 rounded flex flex-row gap-2 items-center">
                <i class="fa fa-upload"></i> Export
            </button>

            <button class="pl-5 pr-5 pb-2 pt-2 border border-gray-400 rounded flex flex-row gap-2 items-center">
                <i class="fa fa-filter"></i> Sort by
            </button>

            <a href="{{route($add_route)}}" class="pl-5 pr-5 pb-2 pt-2 theme-btn-bg text-white rounded flex flex-row items-center gap-2 cursor-pointer">
                <i class="fa fa-plus"></i> Add new
            </a>
        </div>
    </div>
</div>