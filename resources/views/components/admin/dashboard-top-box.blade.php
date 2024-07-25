@props(['item'])

<div class="flex flex-row">
    <div>
        @php 
            $border_left_color = isset($item['border_left_color']) && $item['border_left_color'] != '' ? $item['border_left_color'] : 'purple-500';
        @endphp

        <div class="border-{{$border_left_color}} border-l-4 pl-2">
            <h4 class="text-gray-600">{{$item['title']}}</h4>
            <h4 class="text-gray-800 text-2xl font-semibold mt-1">{{$item['item_value']}}</h4>
        </div>

        @php
            $percentange_color = $item['percentage'] < 0 ? 'red' : 'green';
            $percentage = $item['percentage'] > 0 ? "+$item[percentage]" : "$item[percentage]";
        @endphp

        <p class="mt-2"><span class="text-{{$percentange_color}}-700 font-bold">{{$percentage}}%</span> <span class="text-gray-500">Since last week</span></p>
    </div>
</div>