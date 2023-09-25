@extends('clients.master')
@section('content')
    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="wow fadeInUp mb-5" data-wow-delay="0.1s">
                <h1>{{$article->title}}</h1>
                <p>{{$article->author}} - {{date_format($article->created_at, 'd M Y')}}</p>
            </div>
            <div class="row g-4 justify-content-center">
                    {!! html_entity_decode($article->content) !!}
            </div>
        </div>
    </div>
    <!-- Package End -->
@endsection
