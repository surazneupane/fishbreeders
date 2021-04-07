@extends('layouts.main')

@section('content')

<section style="background-color: #f1f3f5" class="py-4">
    <div class="container">
        <h1>Forum</h1>
        <div class="row">
            <div class="col-9">


                @foreach ($forums as $forum )

                <div class="card w-100 border-0">
                    <div class="card-body">
                        <a href="{{ route('forums.show', $forum->id) }}"
                            class=" text-decoration-none text-dark card-link  ">
                            <h5 class="card-title">
                                {{ $forum->title }}
                            </h5>
                        </a>
                        <p class="card-text text-truncate text-muted">
                            <small>
                                {{ $forum->description }}
                            </small>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <img src="{{ $forum->user->profile_photo_url }}" alt="" class="rounded-circle"
                                    width="35" />
                                <small class="text-capitalize">
                                    {{ $forum->user->name }}
                                </small>
                                <small class="text-muted">
                                    {{ $forum->created_at->diffForHumans() }}
                                </small>
                                <small class="text-muted">
                                    {{ $forum->answers->count() }} Answers
                                </small>
                            </div>
                            <div class="d-flex">
                                @foreach ($forum->categories->take(3) as $category)
                                <div class="badge bg-success d-flex align-items-center px-2 mx-1">
                                    <span> {{ $category->title }} </span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @include('_include.forum-sidebar')
        </div>
    </div>
</section>


@endsection