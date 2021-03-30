<section class="py-4">
    <h3 class="px-2 alert alert-primary">{{ $title }}</h3>
    <div class="row p-0">
        <div class="col-xl-9 my-2">
            <div class="row">
                @foreach ($posts as $post )
                @if($loop->iteration == 1)
                <div class="col-12 col-md-7   ">
                    <div class="card  text-white h-100">
                        <a href="{{ route('post', $post->slug) }}" class="h-100">
                            <img src="{{ $post->featured_image }}" class="card-img h-100" alt="..."
                                style="filter: brightness(60%)">
                        </a>
                        <div class="card-img-overlay  " style="top:unset; bottom: 0;">
                            <a href="{{ route('post', $post->slug) }}"
                                class=" text-decoration-none text-white card-link">
                                <h5 class="card-title">{{ $post->title }}</h5>
                            </a>
                            <div class="d-flex align-items-center w-100">
                                <img src="{{ $post->user->profile_photo_url }}" alt="" width="50"
                                    style="clip-path: circle()" class="d-none d-md-block">
                                <div class="mx-2">
                                    <small class="d-block text-white">
                                        {{ $post->user->name }}</small> <small class="text-white d-block">
                                        {{ $post->postedDate }}
                                    </small>
                                </div>
                                <div class="mx-4">
                                    <small class="text-white mx-2">
                                        {{ $post->views }} Views
                                    </small>
                                    <small class="text-white mx-2">
                                        {{ $post->share }} Shares
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                @if($loop->iteration == 2)
                <div class="col-12 col-md-5 ">
                    @endif
                    <div class="card mb-2  mt-2 mt-lg-0  m-lg-0  m-lg-0 ">
                        <div class="row g-0  m-0">
                            <div class="col-4">
                                <a href="{{ route('post', $post->slug) }}"
                                    class=" text-decoration-none text-white card-link">
                                    <img src="{{ $post->featured_image }}" alt="..." class="img-fluid"
                                        style="width:100%; height:100%; object-fit:cover">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <a href="{{ route('post', $post->slug) }}"
                                        class=" text-decoration-none text-dark card-link">
                                        <small class="card-title">{{ $post->title }}</small>
                                    </a>
                                    <br>
                                    <small class="card-text"><small class="text-muted">{{ $post->postedDate }}</small>
                                        <small class="text-muted">
                                            {{ $post->views }} Views
                                        </small>
                                        <small class="text-muted">
                                            {{ $post->share }} Shares
                                        </small></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($loop->iteration == 5)
                </div>
                @endif
                @endif
                @endforeach
            </div>
        </div>
        <div class="col m-0 p-0 mx-lg-2">
            <div class="border bg-info d-flex justify-content-center align-items-center"
                style="width:100%; height:100%; ">
                <h1>Ad Here</h1>
            </div>
        </div>
    </div>
</section>