<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($list->lastPage() > 1)
    <ul class="pagination" style="float: right">
        <li class="{{ ($list->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $list->url(1) }}">First</a>
        </li>
        @for ($i = 1; $i <= $list->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $list->currentPage() - $half_total_links;
            $to = $list->currentPage() + $half_total_links;
            if ($list->currentPage() < $half_total_links) {
                $to += $half_total_links - $list->currentPage();
            }
            if ($list->lastPage() - $list->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($list->lastPage() - $list->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="{{ ($list->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $list->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        <li class="{{ ($list->currentPage() == $list->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $list->url($list->lastPage()) }}">Last</a>
        </li>
    </ul>
@endif
