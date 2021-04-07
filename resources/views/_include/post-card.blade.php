<div class="card    p-0 px-1 py-2 mx-2 " style=" width: 24rem">
    <a href="{{ route('post', $post->slug) }}" class=" text-decoration-none text-white card-link">
        <img src="{{ $post->featured_image }}" class="card-img-top img-fluid " alt="..."
            style="height: 200px;object-fit:cover; ">
    </a>
    <div class="card-body p-1 p-md-2 text-center py-4" style="position: relative;">
        <div style="
        position: absolute;
        top: -16px;
        left: 50%;
        transform: translateX(-50%);
        padding: 5px 20px;
        white-space: nowrap;

        " class="bg-primary text-white rounded-pill">

            <small class="text-uppercase">
                {{ $post->categories->first()->title }}
            </small>
        </div>
        <a href="{{ route('post', $post->slug) }}" class=" text-decoration-none text-dark card-link  ">
            <h6 class="card-title mt-4 text-uppercase">{{ $post->title }}</h6>
            <small>{{ $post->created_at->diffForHumans() }}</small>
            <small>
                {{ $post->views }} Views
            </small>
        </a>
        <div class="">
            <small>
                {{ $post->excerpt }}
            </small>
        </div>

    </div>
</div>