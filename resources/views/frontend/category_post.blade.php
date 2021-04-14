@extends('layouts.main')

@section('title', $category->seo_title)

@section('head')
<meta name="description" content="{{ $category->seo_description }}" />
@endsection
@section('content') <div class="container py-4">

    <div class="row">
        <div class="">
            <h3 class=" px-2
            text-uppercase
            text-center
            my-2
            py-3
            text-white
            
            " style="background-color: #5DA3FA; letter-spacing:.1rem">
                {{ $category->title }}
            </h3>

            <div class="d-flex flex-wrap justify-content-around">
                @foreach ($posts as $post )
                @include('_include.post-card')
                @endforeach
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>


</div>


@endsection