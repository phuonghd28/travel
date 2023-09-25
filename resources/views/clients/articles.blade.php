@extends('clients.master')
@section('content')
    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Danh sách bài viết</h6>
                <h1 class="mb-5">Tất cả bài viết</h1>
            </div>
            <div class="row g-4 justify-content-center mb-5">
                @foreach($article as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="package-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{$item->images}}" alt="" style="height: 300px; object-fit: cover">
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{$item->type_id}}</small>
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-calendar-alt text-primary me-2"></i>{{date_format($item->created_at, 'd M Y')}}</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{$item->author}}</small>
                            </div>
                            <div class="text-center p-4">
                                <p>{{$item->title}}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="{{route('detail', $item->id)}}" class="btn btn-sm btn-primary px-3" style="border-radius: 30px;">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($article->lastPage() > 1)
                <div class="row wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <?php
                        // config
                        $link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
                        ?>
                    <div class="col-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center m-0">
                                <li class="page-item @if($article->currentPage() == 1) disabled @endif">
                                    <a class="page-link rounded-0" href="{{$article->url($article->url(1))}}" aria-label="Previous">
                                        <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $article->lastPage(); $i++)
                                        <?php
                                        $half_total_links = floor($link_limit / 2);
                                        $from = $article->currentPage() - $half_total_links;
                                        $to = $article->currentPage() + $half_total_links;
                                        if ($article->currentPage() < $half_total_links) {
                                            $to += $half_total_links - $article->currentPage();
                                        }
                                        if ($article->lastPage() - $article->currentPage() < $half_total_links) {
                                            $from -= $half_total_links - ($article->lastPage() - $article->currentPage()) - 1;
                                        }
                                        ?>
                                    @if ($from < $i && $i < $to)
                                        <li class="page-item {{ ($article->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $article->url($i) }}">{{ $i }}</a></li>
                                    @endif
                                @endfor
                                <li class="page-item @if($article->currentPage() == $article->lastPage()) disabled @endif">
                                    <a class="page-link rounded-0" href="{{$article->url($article->lastPage())}}" aria-label="Next">
                                        <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Package End -->
@endsection
