<header>
    <div class="container">
        <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
            <img src="{{$siteinfo->logo}}" alt="" width="150" height="150" />
            <span class="h1"> Fish Breeder </span>
        </a>
    </div>
    <div class="bg-primary">
        <div class="container d-flex justify-content-between">
            <ul class="nav text-white">
                <li class="nav-item">
                    <a href="#" class="nav-link p-0 m-0 text-capatlize text-white h-100">
                        <img src="{{$siteinfo->logo}}" alt="" class="img-fluid p-0 m-0" width="40" />
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link text-capatlize text-white h-100">Home</a>
                </li>
                @forelse ($headerCategories as $category)
                <li class="nav-item">
                    <a href="
                    {{ route('category', $category->slug) }}
                    " class="nav-link text-capatlize text-white h-100">{{$category->title}}</a>
                </li>
                @empty

                @endforelse



                <li class="nav-item">
                    <a href="#" class="nav-link text-capatlize text-white h-100">
                        Aquarium
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link text-capatlize text-white h-100">Fish Compatiblity</a>
                </li>
            </ul>
            <ul class="nav">
                <li class="nav-item">
                    <a href="#" class="nav-link text-capatlize text-white h-100">Forum</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-capatlize text-white h-100">Login</a>
                </li>
            </ul>
        </div>
    </div>
</header>