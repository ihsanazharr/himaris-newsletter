{{-- Premium Custom Pagination Template --}}
@if ($paginator->hasPages())
    <nav class="custom-pagination" role="navigation" aria-label="Pagination Navigation" style="display:flex;justify-content:center;align-items:center;gap:6px;margin:32px 0 16px;flex-wrap:wrap;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span style="padding:8px 14px;border:1.5px solid var(--gray-light);color:var(--gray);border-radius:var(--radius);font-size:0.8rem;font-weight:600;cursor:not-allowed;background:rgba(0,0,0,0.02)">&larr; Prev</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" 
               style="padding:8px 14px;border:2px solid var(--black);background:var(--white);color:var(--black);box-shadow:2px 2px 0 var(--black);border-radius:var(--radius);font-size:0.8rem;font-weight:700;text-decoration:none;transition:all 0.1s;display:inline-flex;align-items:center;"
               onmouseover="this.style.transform='translate(-1px,-1px)';this.style.boxShadow='3px 3px 0 var(--black)'"
               onmouseout="this.style.transform='none';this.style.boxShadow='2px 2px 0 var(--black)'">&larr; Prev</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span style="color:var(--gray);font-weight:600;padding:0 6px;font-size:0.8rem;">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span style="padding:8px 14px;border:2px solid var(--black);background:var(--gold);color:var(--black);box-shadow:2px 2px 0 var(--black);border-radius:var(--radius);font-size:0.8rem;font-weight:700;">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" 
                           style="padding:8px 14px;border:1.5px solid var(--gray-light);background:var(--white);color:var(--gray);border-radius:var(--radius);font-size:0.8rem;font-weight:600;text-decoration:none;transition:all 0.15s;"
                           onmouseover="this.style.borderColor='var(--black)';this.style.color='var(--black)'"
                           onmouseout="this.style.borderColor='var(--gray-light)';this.style.color='var(--gray)'">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
               style="padding:8px 14px;border:2px solid var(--black);background:var(--white);color:var(--black);box-shadow:2px 2px 0 var(--black);border-radius:var(--radius);font-size:0.8rem;font-weight:700;text-decoration:none;transition:all 0.1s;display:inline-flex;align-items:center;"
               onmouseover="this.style.transform='translate(-1px,-1px)';this.style.boxShadow='3px 3px 0 var(--black)'"
               onmouseout="this.style.transform='none';this.style.boxShadow='2px 2px 0 var(--black)'">Next &rarr;</a>
        @else
            <span style="padding:8px 14px;border:1.5px solid var(--gray-light);color:var(--gray);border-radius:var(--radius);font-size:0.8rem;font-weight:600;cursor:not-allowed;background:rgba(0,0,0,0.02)">Next &rarr;</span>
        @endif
    </nav>
@endif
