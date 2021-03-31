@extends('layouts.main')

@section('content')

<div class="container py-4">

    <div class="row">
        <div class="col-lg-9">
            <h3 class="alert alert-info">
                {{ $category->title }}
            </h3>

            <div>

                @foreach ($posts as $post )
                <div class="card  my-2">
                    <div class="row g-0  m-0">
                        <div class="col-md-4">
                            <a href="{{ route('post', $post->slug) }}"
                                class=" text-decoration-none text-white card-link">
                                <img src="{{ $post->featured_image }}" alt="..." class="img-fluid"
                                    style="width:100%; height:100%; object-fit:cover">
                            </a>
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <a href="{{ route('post', $post->slug) }}"
                                    class=" text-decoration-none text-dark card-link">
                                    <div class="card-title">{{ $post->title }}</div>
                                </a>

                                <p>
                                    <small>
                                        {{ $post->excerpt }}
                                    </small>
                                </p>
                                <div class="card-text">
                                    <div class="d-flex align-items-center w-100">
                                        <img src="{{ $post->user->profile_photo_url }}" alt="" width="32"
                                            class="d-none d-md-block" style="clip-path: circle()">
                                        <div class="mx-md-2">
                                            <small class="d-block">
                                                {{ $post->user->name }}
                                            </small>
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <small class="card-text"><small class="text-muted">{{ $post->postedDate }}</small><br>
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
                @endforeach
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>


</div>


@endsection