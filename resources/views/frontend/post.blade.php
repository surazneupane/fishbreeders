@extends('layouts.main')

@section('title', $post->title ." - ".env('APP_NAME'))

@section('head')
<meta name="description" content="{{ $post->seo_description }}" />
<meta name="keywords" content="{{ $post->seo_keywords }}" />
<meta name="author" content="{{ $post->author}}" />
@endsection

@section('content')

<div class="container">
    <div class="row ">
        <div class="col-lg-9 p-2 mx-auto">

            <div class="text-center my-5">
                <div class="alert alert-secondary text-capitalize">
                    home > {{ $post->categories->first()->title }} > {{ $post->title }}
                </div>
                <h1 class=" text-center">{{ $post->title }}</h1>
                <div>
                    <small>
                        Written by {{ $post->user->name}}
                    </small>

                    <small class="border-right h-100 border-secondary mx-3" style="height: 10px; border-right: 2px solid #eee "></small>

                    <small>
                        Published by {{date("F jS, Y", strtotime($post->created_at))}}
                    </small>
                </div>
                {{-- <div class="my-2">
                    <a href="" class="btn btn-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#3b5998"
                            class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                    </a>
                    <a href="" class="btn btn-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#1da1f2"
                            class="bi bi-twitter" viewBox="0 0 16 16">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                        </svg>
                    </a>
                </div> --}}
            </div>
            <div>
                <img src="{{ $post->featured_image }}" alt="" class="img-fluid mb-4">
            </div>

            <div class="img-fluid">
                {!! $post->content !!}
            </div>

            <div>
                <h3>References</h3>
                <div>
                    {!! $post->refrence !!}
                </div>
            </div>

            @if($post->breeding)
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="position: fixed; right: 50px; bottom: 50px;">
                    Breeding
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Breeding</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! $post->breeding !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div>
                <h3>Related Post</h3>
                <div class="row gx-3 my-3 p-0">
                    @foreach ($post->relatedPost as $post )
                    @include('_include.post-card')
                    @endforeach
                </div>
            </div>




        </div>

    </div>
</div>

@endsection
