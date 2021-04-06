<div class="card my-1" style="max-width: 540px">
    <div class="row g-0">
        <div class="col-4">
            <img src="{{ $post->featured_image }}" class="img-fluid w-100 h-100 object-cover" alt="..." />
        </div>
        <div class="col-8">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">
                    <small class="text-muted">Last updated {{ $post->created_at->diffForHumans() }}</small>
                </p>
            </div>
        </div>
    </div>
</div>