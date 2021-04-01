<header>
    <div class="container py-lg-4 d-lg-flex justify-content-between align-items-center px-0">
        <div class="text-center">
            <a href="/">
                @include('_include.logo')
            </a>
        </div>
        <div class="border bg-info d-flex justify-content-center align-items-center my-2 mx-auto mx-lg-0 my-lg-0"
            style="height: 120px; max-width: 700px; width: 100%">
            <h1>Ad Here</h1>
        </div>
    </div>
    <div class=" d-flex align-items-center justify-content-between bg-primary">
        <nav class="container d-flex align-items-center ">
            <button class="btn btn-danger shadow-none text-white" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <svg width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <ul class="nav d-none d-lg-flex">
                @foreach ($headerCategories as $category )
                <li class="nav-item ">
                    <a href="{{ route('category', $category->slug) }}"
                        class="nav-link nav-hover mx-1 text-white @if(request()->url() == route('category', $category->slug)) bg-danger @endif">
                        {{ $category->title }}</a>
                </li>
                @endforeach
            </ul>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Categories</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <nav>
                        <ul class="nav">
                            @foreach ($categories as $category )
                            <li class="nav-item d-block w-100">
                                <a href="{{ route('category', $category->slug) }}"
                                    class="nav-link  mx-1 @if(request()->url() == route('category', $category->slug)) bg-danger text-white @endif ">{{ $category->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </nav>
    </div>
</header>