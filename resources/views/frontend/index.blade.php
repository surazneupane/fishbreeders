@extends('layouts.main')

@section('content')

@include('_include.banner')

<section class="container py-4 bg-white">
    <div class="text-primary">
        <h3>Most Popular</h3>
        <hr class="border-primary" style="border-top: 5px solid" />
    </div>
    <div class="d-flex justify-content-between">
        @foreach ($popularPosts as $post)
        @include('_include.post-card')
        @endforeach
    </div>
</section>

<section class="container">
    <div class="row">
        <div class="col-4">
            <div>
                <h3 class="text-primary">Recent Articles</h3>
                <hr class="border-primary" style="border-top: 5px solid" />
            </div>
            <div class="px-2">
                @foreach ($posts as $post )
                @include('_include.post-card-horizantal')
                @endforeach
            </div>
        </div>
        <div class="col-4">
            <div>
                <h3 class="text-primary">FreshWater Fish</h3>
                <hr class="border-primary" style="border-top: 5px solid" />
            </div>
            <div class="px-2">

                @foreach ($posts as $post )
                @include('_include.post-card-horizantal')
                @endforeach


            </div>
        </div>
        <div class="col-4">
            <div>
                <h3 class="text-primary">SaltWater Fish</h3>
                <hr class="border-primary" style="border-top: 5px solid" />
            </div>
            <div class="px-2">

                @foreach ($posts as $post )
                @include('_include.post-card-horizantal')
                @endforeach

            </div>
        </div>
    </div>
</section>

<section>
    <div class="container my-4">
        <div class="text-primary">
            <h3>FAQs</h3>
            <hr class="border-primary" style="border-top: 5px solid" />
        </div>
        <div class="d-flex justify-content-around">
            <div class="card w-5 m-1">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                        With supporting text below as a natural lead-in
                        to additional content.
                    </p>
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div>
            <div class="card w-5 m-1">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                        With supporting text below as a natural lead-in
                        to additional content.
                    </p>
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div>
            <div class="card w-5 m-1">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                        With supporting text below as a natural lead-in
                        to additional content.
                    </p>
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('bottom')

@endsection