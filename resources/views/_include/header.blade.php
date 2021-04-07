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
                    <a href="{{ route('forums') }}" class="nav-link text-capatlize text-white h-100">Forum</a>
                </li>
                <li class="nav-item">
                    @if(Auth::user())

                    <div class="dropdown">
                        <button class="btn btn-transparent dropdown-toggle shadow-none text-white" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="" width="24"
                                class="img-fluid rounded-circle">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="">
                            <li>
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>

                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a href="{{ route('ext-login') }}" class="nav-link text-capatlize text-white h-100">Login</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</header>