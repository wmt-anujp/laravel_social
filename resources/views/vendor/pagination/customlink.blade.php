<nav aria-label="Page navigation example">
@if ($paginator->hasPages())
<ul class="pagination">
    @if ($paginator->onFirstPage())
    {{-- {{dd($paginator)}} --}}
        <li class="disabled page-item">
            <a class="page-link">
                <span>&laquo;</span>
            </a>
        </li>
    @else
        <li class="page-item">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">
                <span>&laquo;</span>
            </a>
        </li>
    @endif

    @foreach ($elements as $element)
    {{-- {{dd($element)}} --}}
        @if (is_string($element))
        {{-- {{dd($element)}}
        {{dd(is_string($element))}} --}}
            <li class="disabled page-item">
                <a class="page-link">
                    <span>{{ $element }}</span>
                </a>
            </li>
        @endif
       
        @if (is_array($element))
        @foreach ($element as $page => $url)
        {{-- {{dd($url)}} --}}
                @if ($page == $paginator->currentPage())
                {{-- {{dd($paginator->currentPage())}} --}}
                    <li class="active page-item">
                        <a class="page-link">
                            <span>{{ $page }}</span>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach
        {{-- {{dd($url)}} --}}
    
    @if ($paginator->hasMorePages())
    {{-- {{dd($paginator->hasMorePages())}} --}}
    {{-- {{dd($paginator->nextPageUrl())}} --}}
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}">&raquo;</a>
        </li>
    @else
        <li class="disabled page-item">
            <a class="page-link">
                <span>&raquo;</span>
            </a>
        </li>
    @endif
</ul>
</nav>
@endif 