<header>
    <div class="container py-lg-4 d-lg-flex justify-content-between align-items-center px-0">
        <div class="text-center">
            <a href="#">
                @include('_include.logo')
            </a>
        </div>
        <div class="border bg-info d-flex justify-content-center align-items-center my-2 mx-auto mx-lg-0 my-lg-0"
            style="height: 120px; max-width: 600px; width: 100%">
            <h1>Ad Here</h1>
        </div>
    </div>
    <div class=" d-flex align-items-center justify-content-between bg-primary">
        <nav class="container d-flex align-items-center ">
            <button class="btn btn-danger text-white shadow-none  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <ul class="nav d-none d-lg-flex">
                @foreach ($categories as $category )
                <li class="nav-item ">
                    <a href="#" class="nav-link nav-hover mx-1 text-white">{{ $category->title }}</a>
                </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>