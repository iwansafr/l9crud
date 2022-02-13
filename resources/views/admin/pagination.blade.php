@push('css')
    <style>
        ul.pagination {
            display: inline-block;
            padding: 0;
            margin: 0;
        }

        ul.pagination li {
            display: inline;
        }

        ul.pagination > li.active > a{
            color: red;
            font-weight: bold;
        }

        ul.pagination li a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }
        ul.pagination li a.disabled {
            color: grey;
        }

    </style>
@endpush
@if ($paginator->hasPages())
  <nav aria-label="Page navigation">
    <ul class="pagination">
      @if ($paginator->onFirstPage())
          <li class="page-item disabled"><a class="page-link disabled" href="#">Previous</a></li>
      @else
          <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a></li>
      @endif
      @foreach ($elements as $element)
          @if (is_string($element))
              <li class="disabled"><a>{{ $element }}</a></li>
          @endif
          @if (is_array($element))
              @foreach ($element as $page => $url)
                  @if ($page == $paginator->currentPage())
                      <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                  @else
                      <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                  @endif
              @endforeach
          @endif
      @endforeach
      @if ($paginator->hasMorePages())
          <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
      @else
          <li class="page-item disabled"><a>Next</a></li>
      @endif
    </ul>
  </nav>
@endif