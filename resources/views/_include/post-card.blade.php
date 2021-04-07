<div class="card   border-0 p-0 px-1 py-2" style=" width: 18rem">
    <a href="{{ route('post', $post->slug) }}" class=" text-decoration-none text-white card-link">
        <img src="{{ $post->featured_image }}" class="card-img-top img-fluid " alt="..."
            style="height: 160px;object-fit:cover; ">
    </a>
    <div class="card-body p-1 p-md-2">
        <a href="{{ route('post', $post->slug) }}" class=" text-decoration-none text-dark card-link">
            <h6 class="card-title">{{ $post->title }}</h6>
        </a>
        <div class="d-flex align-items-center w-100">

            <div class="mx-md-2">
                <small class="d-block">
                    {{ $post->postedDate }}
                </small>
            </div>

        </div>
    </div>
</div>