@if ($paginator->lastPage() > 1)
<section class="py-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <nav aria-label="...">
                    <ul class="pagination pagination-lg">
                        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                        <li class="page-item {{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                            <a class="page-link " href="{{ $paginator->url($i) }}">{{ $i }}</a>
                        </li>
                        @endfor
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endif


