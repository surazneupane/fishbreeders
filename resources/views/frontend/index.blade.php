@extends('layouts.main')

@section('content')
<div class="container my-5 ">
    <div class="row p-0 m-0">
        <h1 class="p-0">Latest News</h1>
        <div class="featured col-xl-9 d-flex flex-wrap d-lg-grid m-0 p-0 row">
            @foreach ($posts as $post )
            <div class="featured1 m-0 p-0 my-2 my-xl-0 @if ($loop->iteration == 1) 
                col-12 
                @else
                col-md-6 col-lg-12 px-1 py-1
            @endif)">
                @if($loop->iteration == 1)
                <div class="card mb-3" style="width:100%; height:100%">
                    <img src="{{ $post->featured_image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        @if($loop->iteration == 1)
                        <p class="card-text text-sm">{{ $post->excerpt }}</p>
                        @endif
                        <p class="card-text">
                            <small class="text-muted">
                                {{ $post->postedDate }}
                            </small>
                            <br />
                            <small class="text-muted">
                                {{ $post->views }} Views
                            </small>
                            <small class="text-muted">
                                {{ $post->share }} Shares
                            </small>
                        </p>
                        <div class="d-flex align-items-center">
                            <img src="{{ $post->user->profile_photo_url }}" alt="" width="50"
                                style="clip-path: circle()">
                            <div class="mx-2">
                                {{ $post->user->name }}
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="card mb-2 mx-lg-2 mt-2 mt-lg-0 h-100">
                    <div class="row g-0 h-100">
                        <div class="col-4">
                            <img src="{{ $post->featured_image }}" alt="..." class="img-fluid"
                                style="width:100%; height:100%; object-fit:cover">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <small class="card-title">{{ $post->title }}</small><br>
                                <small class="card-text"><small class="text-muted">{{ $post->postedDate }}</small>
                                    <small class="text-muted">
                                        {{ $post->views }} Views
                                    </small>
                                    <small class="text-muted">
                                        {{ $post->share }} Shares
                                    </small></small>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
            @endforeach
        </div>
        <div class="col m-0 p-0">
            <div class="border bg-info d-flex justify-content-center align-items-center"
                style="width:100%; height:100%; ">
                <h1>Ad Here</h1>
            </div>
        </div>
    </div>
</div>
@endsection