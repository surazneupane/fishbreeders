@extends('layouts.main')



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
                Search For : {{ $search }}
            </h3>

            <div class="d-flex flex-wrap justify-content-around">
                @forelse ($posts as $post )
                @include('_include.post-card')
                @empty
                <h4 class="text-muted my-2">
                    Sorry! No Results Found.
                </h4>
                @endforelse
            </div>
        </div>
    </div>


</div>


@endsection