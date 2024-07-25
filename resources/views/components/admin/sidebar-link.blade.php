@props(['links'])

@foreach($links as $link)
    <a href="{{ $link['endpoint'] }}">
        <div class="p-2 text-white bg-gray-500 rounded flex flex-row items-center gap-2 mt-3">
            {!! $link['icon'] !!}
            <p>{{ $link['link'] }}</p>
        </div>
    </a>
@endforeach