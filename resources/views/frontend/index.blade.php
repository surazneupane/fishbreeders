@extends('layouts.main')

@section('content')
<div class="container my-5 ">
    <section class="row p-0 m-0">
        <h3 class=" px-2 alert alert-primary">Latest News</h3>
        <div class="featured col-xl-9 d-flex flex-wrap d-lg-grid m-0 p-0 row">
            @foreach ($posts->take(6) as $post )
            <div class="featured1 m-0 p-0 my-2 my-xl-0 @if ($loop->iteration == 1) 
                col-12 
                @else
                col-md-6 col-lg-12 px-1 py-1
            @endif)">
                @if($loop->iteration == 1)
                <div class="card mb-3" style="width:100%; height:100%">
                    <a href="{{ route('post', $post->slug) }}" class=" text-decoration-none text-dark card-link">
                        <img src="{{ $post->featured_image }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <a href="{{ route('post', $post->slug) }}" class=" text-decoration-none text-dark card-link">
                            <h5 class="card-title">{{ $post->title }}</h5>
                        </a>
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
                            <a href="{{ route('post', $post->slug) }}"
                                class=" text-decoration-none text-dark card-link">
                                <img src="{{ $post->featured_image }}" alt="..." class="img-fluid"
                                    style="width:100%; height:100%; object-fit:cover">
                            </a>
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <a href="{{ route('post', $post->slug) }}"
                                    class=" text-decoration-none text-dark card-link">
                                    <small class="card-title">{{ $post->title }}</small>
                                </a><br>
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
    </section>
    <section class="row p-0 m-0 mt-5">
        <h3 class="px-2 alert alert-primary ">Trending News</h3>
        <div class="row m-0 w-100 p-0">

            <div class="trending col-xl-9 d-flex flex-wrap d-md-grid m-0 p-0 row">
                @foreach ($posts->take(3) as $post )
                <div class="trending1 m-0 p-0  my-xl-0 @if ($loop->iteration == 1) 
                    col-12
                    @else
                    col-md-6 col-lg-12   w-100 
                @endif">
                    @if($loop->iteration == 1)
                    <div class="card mb-3" style=" height:100%">
                        <img src="{{ $post->featured_image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{ route('post', $post->slug) }}"
                                class=" text-decoration-none text-white card-link">
                                <h5 class="card-title">{{ $post->title }}</h5>
                            </a>
                            @if($loop->iteration == 1)
                            <p class="card-text text-sm">{{ $post->excerpt }}</p>
                            @endif
                            <p class="card-text">

                            </p>
                            <div class="d-flex align-items-center w-100">
                                <img src="{{ $post->user->profile_photo_url }}" alt="" width="50"
                                    style="clip-path: circle()">
                                <div class="mx-2">
                                    <small class="d-block">
                                        {{ $post->user->name }}</small> <small class="text-muted d-block">
                                        {{ $post->postedDate }}
                                    </small>
                                </div>
                                <div class="mx-4">
                                    <small class="text-muted mx-2">
                                        {{ $post->views }} Views
                                    </small>
                                    <small class="text-muted mx-2">
                                        {{ $post->share }} Shares
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card mb-2  mt-2 mt-lg-0  m-lg-0  m-lg-0 ">
                        <div class="row g-0  m-0">
                            <div class="col-4">
                                <a href="{{ route('post', $post->slug) }}"
                                    class=" text-decoration-none text-dark card-link">
                                    <img src="{{ $post->featured_image }}" alt="..." class="img-fluid"
                                        style="width:100%; height:100%; object-fit:cover">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <a href="{{ route('post', $post->slug) }}"
                                        class=" text-decoration-none text-dark card-link">
                                        <small class="card-title">{{ $post->title }}</small>
                                    </a><br>
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
            <div class="col m-0 p-0 mx-lg-2">
                <div class="border bg-info d-flex justify-content-center align-items-center"
                    style="width:100%; height:100%; ">
                    <h1>Ad Here</h1>
                </div>
            </div>
        </div>

        <div class="col-12 m-0 p-0 my-2">
            <div class="border bg-info d-flex justify-content-center align-items-center"
                style="width:100%; height:100%; ">
                <h1>Ad Here</h1>
            </div>
        </div>

        <div>
            <div class="row gx-3 my-3 p-0">
                @foreach ($posts->slice(3)->take(8) as $post )
                <div class="card col-6 col-md-4 col-lg-3  border-0 p-0 px-1" style="">
                    <a href="{{ route('post', $post->slug) }}" class=" text-decoration-none text-white card-link">
                        <img src="{{ $post->featured_image }}" class="card-img-top img-fluid " alt="..."
                            style="height: 160px;object-fit:cover; max-width:300px">
                    </a>
                    <div class="card-body p-0 p-md-2">
                        <a href="{{ route('post', $post->slug) }}" class=" text-decoration-none text-dark card-link">
                            <h6 class="card-title">{{ $post->title }}</h6>
                        </a>
                        <div class="d-flex align-items-center w-100">
                            <img src="{{ $post->user->profile_photo_url }}" alt="" width="32" class="d-none d-md-block"
                                style="clip-path: circle()">
                            <div class="mx-md-2">
                                <small class="d-block">
                                    {{ $post->user->name }}</small> <small class="text-muted d-block">
                                    {{ $post->postedDate }}
                                </small>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </section>
    <x-news-section title="International News" :posts="$posts" />
    <x-news-section title="Sport News" :posts="$posts" />
    <x-news-section title="Bussiness News" :posts="$posts" />

</div>
@endsection


@section('bottom')

@endsection