{{-- resources/views/vendor/pagination/custom-pagination.blade.php --}}

@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&laquo; Previous</span>
            </li>
        @else
            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">&laquo; Previous</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">Next &raquo;</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">Next &raquo;</span>
            </li>
        @endif
    </ul>
@endif
