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
    <div class="bg-dark py-5">
        <div class="container text-center text-white py-2">
            <h3 class="">
                Become a Fish Breeding Super Subscriber
            </h3>
            <p class="w-75 mx-auto">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, recusandae. Nostrum accusantium, debitis quasi deserunt consequatur corporis sunt? Ab, consequuntur. Doloribus a itaque eveniet quam porro perspiciatis eos culpa optio esse voluptas eum corporis dolorem nemo, mollitia at ducimus tempora corrupti deserunt atque. Veniam, est quae laborum fugit id nostrum doloribus officia laboriosam et fuga.
            </p>
            <div>
                <a href="#" class="btn btn-primary rounded-pill btn-lg m-2">
                    Subscribe Now
                </a>
                <a href="#" class="btn btn-outline-light rounded-pill btn-lg m-2 ">
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
@endsection


@section('bottom')

@endsection
