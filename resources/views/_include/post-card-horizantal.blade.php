<div class="card my-1" style="max-width: 540px">
    <div class="row g-0">
        <div class="col-4">
            <a href="{{ route('post', $post->slug) }}" class=" text-decoration-none text-dark card-link">
                <img src="{{ $post->featured_image }}" class="img-fluid w-100 h-100 object-cover" alt="..." />
            </a>
        </div>
        <div class="col-8">
            <div class="card-body">
                <a href="{{ route('post', $post->slug) }}" class=" text-decoration-none text-dark card-link">
                    <h6 class="card-title">{{ $post->title }}</h6>
                </a>
                <p class="card-text">
                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                    <small class="text-muted">{{ $post->views}} Views</small>
                </p>

            </div>
        </div>
    </div>
</div>