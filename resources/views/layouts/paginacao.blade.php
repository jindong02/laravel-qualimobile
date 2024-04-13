@if ($paginator->hasPages())
<section class="py-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <nav aria-label="...">
                    <ul class="pagination pagination-lg" role="navigation">
                        <?php
                        $start = $paginator->currentPage() - 2; // show 3 pagination links before current
                        $end = $paginator->currentPage() + 2; // show 3 pagination links after current
                        if ($start < 1) {
                            $start = 1; // reset start to 1
                            $end += 1;
                        }
                        if ($end >= $paginator->lastPage())
                            $end = $paginator->lastPage(); // reset end to last page
                        ?>

                        @if($start > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->url(1) }}">{{1}}</a>
                        </li>
                        @endif
                        @for ($i = $start; $i <= $end; $i++)
                        <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $paginator->url($i) }}">{{$i}}</a>
                        </li>
                        @endfor
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endif