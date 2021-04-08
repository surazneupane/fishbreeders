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
                @foreach ($breedingPosts->take(5) as $post )
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

                @foreach ($freshWaterPosts->take(5) as $post )
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

                @foreach ($saltWaterPosts->take(5) as $post )
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
    <div class="container my-4">
        <div class="text-primary">
            <h3>Recently Asked Questions</h3>
            <hr class="border-primary" style="border-top: 5px solid" />
        </div>
        <div class="d-lg-flex justify-content-lg-around">
            @foreach($questions as $question)
            <div class="card w-5 m-1" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $question->title }}</h5>
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
@endsection


@section('bottom')

@endsection