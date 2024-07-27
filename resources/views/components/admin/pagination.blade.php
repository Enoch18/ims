@props(['items'])

<div class="max-w-[400px]">
    @if ($items->hasPages())
        <nav class="flex justify-between items-center">
            {{-- Previous Page Link --}}
            @if ($items->onFirstPage())
                <span class="text-gray-500 cursor-not-allowed">&laquo; Previous</span>
            @else
                <a href="{{ $items->previousPageUrl() }}" class="text-blue-500 hover:text-blue-700">&laquo; Previous</a>
            @endif

            {{-- Pagination Elements --}}
            <div class="flex space-x-1">
                {{-- Show First Page --}}
                @if ($items->currentPage() > 4)
                    <a href="{{ $items->url(1) }}" class="px-3 py-1 border border-gray-300 text-gray-700 hover:bg-gray-200">1</a>
                    <a href="{{ $items->url(2) }}" class="px-3 py-1 border border-gray-300 text-gray-700 hover:bg-gray-200">2</a>
                    <a href="{{ $items->url(3) }}" class="px-3 py-1 border border-gray-300 text-gray-700 hover:bg-gray-200">3</a>
                    <span class="px-3 py-1 border border-gray-300 text-gray-700">...</span>
                @endif

                {{-- Show Pages Around Current Page --}}
                @if ($items->currentPage() <= 4)
                    @for ($i = 1; $i <= min($items->lastPage() - 1, 3); $i++)
                        @if ($i == $items->currentPage())
                            <span class="px-3 py-1 border border-blue-500 text-blue-500 font-semibold">{{ $i }}</span>
                        @else
                            <a href="{{ $items->url($i) }}" class="px-3 py-1 border border-gray-300 text-gray-700 hover:bg-gray-200">{{ $i }}</a>
                        @endif
                    @endfor
                @else
                    {{-- Previous Pages Around Current Page --}}
                    @for ($i = $items->currentPage() - 1; $i <= $items->currentPage() + 1; $i++)
                        @if ($i > 0 && $i < $items->lastPage())
                            @if ($i == $items->currentPage())
                                <span class="px-3 py-1 border border-blue-500 text-blue-500 font-semibold">{{ $i }}</span>
                            @else
                                <a href="{{ $items->url($i) }}" class="px-3 py-1 border border-gray-300 text-gray-700 hover:bg-gray-200">{{ $i }}</a>
                            @endif
                        @endif
                    @endfor
                @endif

                {{-- Show Last Page --}}
                @if ($items->currentPage() < $items->lastPage() - 3)
                    @if ($items->currentPage() < $items->lastPage() - 1)
                        <span class="px-3 py-1 border border-gray-300 text-gray-700">...</span>
                    @endif
                    <a href="{{ $items->url($items->lastPage()) }}" class="px-3 py-1 border border-gray-300 text-gray-700 hover:bg-gray-200">{{ $items->lastPage() }}</a>
                @endif
            </div>

            {{-- Next Page Link --}}
            @if ($items->hasMorePages())
                <a href="{{ $items->nextPageUrl() }}" class="text-blue-500 hover:text-blue-700">Next &raquo;</a>
            @else
                <span class="text-gray-500 cursor-not-allowed">Next &raquo;</span>
            @endif
        </nav>
    @endif
</div>