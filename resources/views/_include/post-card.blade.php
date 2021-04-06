<div class="card m-1" style="width: 18rem">
    <img src="{{ $post->featured_image }}" class="card-img-top" alt="..." />
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">
            {{ $post->excerpt }}
        </p>
    </div>
</div>