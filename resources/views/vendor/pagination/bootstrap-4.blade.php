@if ($paginator->hasPages())
    <div class="my-5 ">
        <ul class="pagination flex ">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled " aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link px-10" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link px-10" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        style="color: red !important" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span
                            class="page-link px-10">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link p-2 text-white"
                                    style="background-color: red !important; border: 1px solid red">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item " style="color: red !important "><a class="page-link p-2"
                                    href="{{ $url }}" style="color: red !important">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item ">
                    <a class="page-link mx-10" href="{{ $paginator->nextPageUrl() }}" style="color: red !important"
                        rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link mx-10" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </div>
@endif
