@if ($paginator->hasPages())
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite">
                Showing
                {{ $paginator->firstItem() }}
                To
                {{ $paginator->lastItem() }}
                Of
                {{ $paginator->total() }}
                Entries
            </div>
        </div>
        <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_3_paginate">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="paginate_button page-item disabled" id="DataTables_Table_3_previous"><a
                                href="#" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0"
                                class="page-link">Previous</a></li>
                    @else
                        <li class="paginate_button page-item" id="DataTables_Table_3_previous"><a
                                href="{{ $paginator->previousPageUrl() }}" aria-controls="DataTables_Table_3"
                                data-dt-idx="0" tabindex="0"
                                class="page-link">Previous</a></li>
                    @endif


                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li>
                                <span class="disabled">{{ $element }}</span>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="paginate_button page-item active"><a href="#"
                                                                                    aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"
                                                                                    class="page-link">{{ $page }}</a></li>
                                @else
                                    <li class="paginate_button page-item"><a href="{{ $url }}"
                                                                             aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"
                                                                             class="page-link">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach



                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="paginate_button page-item" id="DataTables_Table_3_next"><a
                                href="{{ $paginator->nextPageUrl() }}" aria-controls="DataTables_Table_3"
                                data-dt-idx="2" tabindex="0"
                                class="page-link">Next</a>
                        </li>
                    @else
                        <li>
                        <li class="paginate_button page-item disabled" id="DataTables_Table_3_next"><a href="#"
                                                                                                       aria-controls="DataTables_Table_3" data-dt-idx="2" tabindex="0"
                                                                                                       class="page-link">Previous</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
