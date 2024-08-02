<div class="relative">
    <label class="block mb-2 text-sm font-medium text-gray-900 light:text-white">
        {{$label}} 
        @if(isset($required) && $required == 'true')<x-required />@endif
    </label>

    <input type="text" wire:model.live.debounce.500ms="query" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Search {{$searchType}}..." />

    @if($query && $show == true)
        <div class="absolute left-0 right-0 bg-white shadow p-2 z-50 max-h-80 overflow-scroll">
            <ul>
                @if(count($items) > 0)
                    @foreach($items as $item)
                        <button type="button" class="w-[100%] text-left" wire:click="selectedId({{$item->id}})">
                            <li class="p-2 bg-gray-200 mt-0.5 rounded cursor-pointer">
                                {{$item->name}}
                            </li>
                        </button>
                    @endforeach
                @endif


                @if(count($items) == 0)
                    <li>No Item found</li>
                @endif  
            </ul>
        </div>
    @endif
</div>