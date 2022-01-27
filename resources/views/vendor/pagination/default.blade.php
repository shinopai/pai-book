@if ($paginator->hasPages())
<nav>
    <ul class="pagination flex gap-2 mt-10">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled hidden" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">&lsaquo;</span>
        </li>
        @else
        <li class="px-4 py-2 border text-sm font-medium">
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">前へ</a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active bg-indigo-50 border-indigo-500 text-indigo-600 px-4 py-2 border text-sm font-medium" aria-current="page"><span>{{ $page }}</span></li>
        @else
        <li class="px-4 py-2 border text-sm font-medium"><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="px-4 py-2 border text-sm font-medium">
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">次へ</a>
        </li>
        @else
        <li class="disabled hidden" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">&rsaquo;</span>
        </li>
        @endif
    </ul>
</nav>
@endif
