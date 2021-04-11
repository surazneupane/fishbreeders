@extends('layouts.main')

@section('content')

@include('_include.banner')

<section class="container py-4 bg-white">
    <div class="text-primary">
        <h3>Most Popular</h3>
        <hr class="border-primary" style="border-top: 5px solid" />
    </div>
    <div class="d-flex justify-content-around flex-wrap" style="flex-wrap: wrap">
        @foreach ($popularPosts->take(6) as $post)
        @include('_include.post-card')
        @endforeach
    </div>
</section>

<section class="container">
    <div class="row">
        <div class="col-lg-4">
            <div>
                <h3 class="text-primary">Breeding Articles</h3>
                <hr class="border-primary" style="border-top: 5px solid" />
            </div>
            <div class="px-2">
                @foreach ($breedingPosts->take(4) as $post )
                @include('_include.post-card-horizantal')
                @endforeach
            </div>
        </div>
        <div class="col-lg-4">
            <div>
                <h3 class="text-primary">FreshWater Fish</h3>
                <hr class="border-primary" style="border-top: 5px solid" />
            </div>
            <div class="px-2">

                @foreach ($freshWaterPosts->take(4) as $post )
                @include('_include.post-card-horizantal')
                @endforeach


            </div>
        </div>
        <div class="col-lg-4">
            <div>
                <h3 class="text-primary">SaltWater Fish</h3>
                <hr class="border-primary" style="border-top: 5px solid" />
            </div>
            <div class="px-2">

                @foreach ($saltWaterPosts->take(4) as $post )
                @include('_include.post-card-horizantal')
                @endforeach

            </div>
        </div>
    </div>
</section>


<section>
    <div class="container my-4">
        <div class="text-primary">
            <h3>Recent Articles</h3>
            <hr class="border-primary" style="border-top: 5px solid" />
        </div>
        <div class="d-flex justify-content-around flex-wrap">
            @foreach ($posts->take(6) as $post )
            @include('_include.post-card')
            @endforeach
        </div>
    </div>
</section>

<section>
    <div class=" py-5"  style="
    background: linear-gradient(0deg, #00000050,#00000090),  url('@if($siteinfo->small_banner == "")/static/images/fishes.jpg @else {{$siteinfo->small_banner}} @endif'); background-repeat: no-repeat; background-position: center; background-size: cover; ">

        <div class="container text-center text-white py-2">
            <h3 class="">
                {{$siteinfo->small_banner_text}}
            </h3>
            <p class="w-75 mx-auto">
                {{$siteinfo->small_banner_description}}
            </p>
            <div>
                <a @if(Auth::check()) href="#" data-bs-toggle="modal" data-bs-target="#suberfeedback" @endif class="btn btn-primary rounded-pill btn-lg m-2">
                    Subscribe Now
                </a>
                <a href="{{route('ext-register')}}" class="btn btn-outline-light rounded-pill btn-lg m-2 ">
                    Register Now
                </a>

            </div>
        </div>

    </div>
</section>

<section>
    <div class="container my-4">
        <div class="text-primary">
            <h3>Recently Asked Questions</h3>
            <hr class="border-primary" style="border-top: 5px solid" />
        </div>
        <div class="d-lg-flex justify-content-lg-around">
            @foreach($questions as $question)
            <div class="card w-5 m-1" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title text-truncate">{{ $question->title }}</h5>
                    <p class="card-text text-truncate w-100">
                        {{$question->description}}
                    </p>

                    <a href="{{route('forums.show',$question->id)}}" class="btn btn-primary">View Answers</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- modal super Suscriber --}}



<div class="modal fade " id="suberfeedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subscriber Feedback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('superfeedback.give')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label ">Title</label>
                        <input type="text" class="form-control" name="title" id="title" required placeholder="Feedback title">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label ">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required placeholder="Email Address">
                    </div>
                    <div class="mb-3">
                        <label for="feedback" class="form-label ">Feedback</label>
                        <textarea class="form-control" name="feedback" id="feedback" rows="5" required placeholder="Your Feedback"></textarea>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary my-2 rounded-pill px-5">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


@endsection


@section('bottom')

@endsection
