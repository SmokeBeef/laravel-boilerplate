@if ($paginator->hasPages())
    <nav>
        <ul class="join flex-wrap">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="join-item btn-square btn btn-disabled flex justify-center items-center" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <i class="fas fa-chevron-left"></i>
                </li>
            @else
                <li class="">
                    <a class="join-item btn btn-square btn-ghost" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="join-item btn-square flex justify-center items-center" aria-disabled="true">
                        <span>{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="join-item btn-active btn-square btn" aria-current="page">
                                <span>{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a class="join-item btn-square btn-neutral btn btn-ghost" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="join-item btn btn-square btn-ghost" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="join-item btn-disabled btn btn-square" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <i class="fas fa-chevron-right"></i>
                </li>
            @endif
        </ul>
    </nav>
@endif
