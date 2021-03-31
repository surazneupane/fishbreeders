@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-9 p-2">
            <h1 class="my-4">{{ $post->title }}</h1>
            <div class="d-md-flex justify-content-between my-2 align-items-center">
                <div>
                    <small>
                        <svg width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        {{ $post->author }}
                    </small>
                    <small class="mx-2">
                        <svg width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg>
                        {{ $post->location ? $post->location : "Nepal" }}
                    </small>
                    <small>
                        <svg width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                            <path
                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                        </svg>
                        {{  date("F j, Y",strtotime($post->created_at)) }}
                    </small>
                </div>
                <div class="d-flex my-2 my-md-0">
                    <div class="py-1 px-2 bg-primary text-light rounded mr-2 mx-md-2">
                        Share With:
                    </div>
                    <div>
                        <a href="#" class="p-1 mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </a>
                        <a href="#" class="p-1 mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </a>
                        <a href="#" class="p-1 mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-3">
                <img src="{{ $post->featured_image }}" class="img-fluid" alt="">
            </div>
            <div>
                {!! $post->content !!}
            </div>
            <div class="my-3 bg-light px-3 py-2 d-flex align-items-center">
                <img src="{{ $post->user->profile_photo_url }}" alt="" width=60 style="clip-path: circle()">

                <div class="mx-3">
                    {{ $post->user->name }}
                </div>
            </div>
            <div class="my-3 bg-light px-3 py-2 d-flex align-items-center justify-content-between">
                <div>
                    <div>
                        {{ $post->views }} Views
                    </div>
                    <div>
                        {{ $post->share }} Shares
                    </div>
                </div>

                <div class="">
                    <div class="d-flex my-2 my-md-0">
                        <div class="py-1 px-2 bg-primary text-light rounded mr-2 mx-md-2">
                            Share With:
                        </div>
                        <div>
                            <a href="#" class="p-1 mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                            <a href="#" class="p-1 mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                            <a href="#" class="p-1 mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" d-md-flex justify-content-between my-4">
                @if($post->previousPost)
                <div class="bg-light p-4 my-2" style="max-width: 24rem">
                    <div class="text-info">
                        Previous Post
                    </div>
                    <a href="{{ route('post', $post->previousPost->slug) }}"
                        class=" text-decoration-none text-dark card-link">
                        <div class="">
                            {{ $post->previousPost->title }}
                        </div>
                    </a>
                </div>
                @endif
                @if($post->nextPost)
                <div class="bg-light p-4 my-2" style="max-width: 24rem">
                    <div class="text-info">
                        Next Post
                    </div>
                    <a href="{{ route('post', $post->nextPost->slug) }}"
                        class=" text-decoration-none text-dark card-link">
                        <div>
                            {{ $post->nextPost->title }}
                        </div>
                    </a>
                </div>
                @endif
            </div>


            <div>
                <h3>Related Post</h3>
                <div class="row gx-3 my-3 p-0">
                    @foreach ($post->relatedPost as $post )
                    <div class="card col-6  col-lg-3  border-0 p-0 px-1 py-2" style="">
                        <a href="{{ route('post', $post->slug) }}" class=" text-decoration-none text-white card-link">
                            <img src="{{ $post->featured_image }}" class="card-img-top img-fluid " alt="..."
                                style="height: 160px;object-fit:cover; ">
                        </a>
                        <div class="card-body p-1 p-md-2">
                            <a href="{{ route('post', $post->slug) }}"
                                class=" text-decoration-none text-dark card-link">
                                <h6 class="card-title">{{ $post->title }}</h6>
                            </a>
                            <div class="d-flex align-items-center w-100">
                                <img src="{{ $post->user->profile_photo_url }}" alt="" width="32"
                                    class="d-none d-md-block" style="clip-path: circle()">
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
        </div>
        <div class="col m-0 my-5 p-0">
            <div class="border bg-info d-flex justify-content-center align-items-center"
                style="width:100%; height:100%; ">
                <h1>Ad Here</h1>
            </div>
        </div>
    </div>
</div>

@endsection