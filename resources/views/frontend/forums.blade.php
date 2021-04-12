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
                                @isset($forum->user->name)
                            <img src="{{ $forum->user->profile_photo_url }}" alt="" class="rounded-circle"
                                    width="35" />
                                <small class="text-capitalize">
                                    {{ $forum->user->name ?? "unknown" }}
                                </small>
                                <?php $user = $forum->user()->first(); ?>
                                @if($user)
                                @if($user->roles->contains(1) || $user->roles->contains(2))
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                  </svg>
                                  @endif
                                  @endif
                                @endisset
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

                <div class="my-4">
                    {{ $forums->links('pagination::bootstrap-4') }}
                </div>

            </div>
            @include('_include.forum-sidebar')
        </div>
    </div>
</section>


@endsection