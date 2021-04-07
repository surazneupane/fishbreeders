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
                        <h5 class="card-title">
                            {{ $forum->title }}
                        </h5>
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
            <div class="col">
                <div>
                    <a href="#" class="btn btn-success w-100 mb-2">
                        Create Question
                    </a>
                </div>
                <div>
                    <form method="get" action={{ route('forums') }}>
                        <input value="{{ old('query') }}" type="text" name="query" class="m-0 form-control"
                            placeholder="Search here..." />
                        <div class="d-flex justify-content-end py-1">
                            <button class="btn btn-primary m-0">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
                <div>
                    <h5>Tags</h5>
                    <ul class="list-unstyled px-2">
                        <li>
                            <a href="{{ route('forums') }}" class="btn btn-transparent text-capitalize w-100 bg-white">
                                All
                            </a>
                        </li>
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('forums',['name'=>$category->slug]) }}"
                                class="btn btn-transparent text-capitalize w-100">
                                {{ $category->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection