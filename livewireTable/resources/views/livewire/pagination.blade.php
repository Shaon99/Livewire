@if ($paginator->hasPages())
    <div class="flex items-center justify-between mb-4">
        <!-- Total Records and Current Page Range -->
        <span class="text-sm text-gray-500">
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} records
        </span>
    </div>
    <nav aria-label="Pagination Navigation">
        <ul class="flex items-center -space-x-px h-8 text-sm">
            <!-- Previous Page Link -->
            @if ($paginator->onFirstPage())
                <li aria-disabled="true" aria-label="Previous">
                    <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-400 bg-white border border-gray-300 rounded-s-lg">
                        <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1L1 5l4 4" />
                        </svg>
                    </span>
                </li>
            @else
                <li>
                    <button wire:click="previousPage" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700" rel="prev" aria-label="Previous">
                        <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1L1 5l4 4" />
                        </svg>
                    </button>
                </li>
            @endif

            <!-- Pagination Elements -->
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li aria-disabled="true">
                        <span class="px-3 h-8 leading-tight text-gray-500">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page">
                                <span class="z-10 px-3 h-8 leading-tight text-blue-600">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <button wire:click="gotoPage({{ $page }})" class="px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $page }}</button>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <!-- Next Page Link -->
            @if ($paginator->hasMorePages())
                <li>
                    <button wire:click="nextPage" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700" rel="next" aria-label="Next">
                        <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 9l4-4-4-4" />
                        </svg>
                    </button>
                </li>
            @else
                <li aria-disabled="true" aria-label="Next">
                    <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-400 bg-white border border-gray-300 rounded-e-lg">
                        <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 9l4-4-4-4" />
                        </svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
