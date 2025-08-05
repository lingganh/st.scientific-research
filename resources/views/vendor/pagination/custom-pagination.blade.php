{{-- File: resources/views/vendor/pagination/custom-pagination.blade.php --}}
@if ($paginator->hasPages())
    <div class="pagination-container" aria-label="Pagination">
        <ul class="pagination__list">
            {{-- Nút Previous --}}
            <li class="pagination__item {{ $paginator->onFirstPage() ? 'pagination__item--disabled' : '' }}">
                <button type="button" class="pagination__link" wire:click="previousPage" @if ($paginator->onFirstPage()) disabled @endif>
                    &lsaquo;
                </button>
            </li>

            {{-- Các phần tử số trang --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="pagination__item pagination__item--disabled"><span class="pagination__link">{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination__item pagination__item--active"><span class="pagination__link">{{ $page }}</span></li>
                        @else
                            <li class="pagination__item"><button type="button" class="pagination__link" wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Nút Next --}}
            <li class="pagination__item {{ !$paginator->hasMorePages() ? 'pagination__item--disabled' : '' }}">
                <button type="button" class="pagination__link" wire:click="nextPage" @if (!$paginator->hasMorePages()) disabled @endif>
                    &rsaquo;
                </button>
            </li>
        </ul>
    </div>

@endif
