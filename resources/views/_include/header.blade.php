<header>
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <a href="/" class="text-decoration-none text-dark d-flex align-items-center">
                <img src="{{$siteinfo->logo}}" alt="" width="150" height="150" />
                <span class="h1"> Fish Breeder </span>
            </a>
            <ul class="nav">


                @if(Auth::user())
                <?php $notifications = Auth::user()->userNotification()  ?>
                <li class="nav-item d-flex align-items-center">
                    <div class="dropdown d-flex align-items-center">
                        <button class="btn btn-transparent  dropdown-toggle shadow-none d-flex align-items-center "
                            style="position: relative;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="bg-primary text-white"
                                style="font-size: .8rem; position: absolute;top: -10px; right:10px; z-index: inherit;  clip-path: circle(); padding:5px">
                                <span>{{ $notifications->count() }}</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bell" viewBox="0 0 16 16">
                                <path
                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end  p-0 notification"
                            aria-labelledby="dropdownMenuButton1" style="width: 300px;margin-top:5px; max-height: 500px; overflow-y: scroll ;ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;">
                            <h6 class="bg-success text-white p-2 m-0" style="position: sticky; top: 0">Your
                                Notifications</h6>
                            @forelse ($notifications as $notification)
                            {{-- <div @if($notification->status == 0) style="background-color:#d4d2cd" @endif> --}}

                            <hr class="my-0">
                            <p class="text-muted w-100  p-2">
                                <strong> {{$notification->notificationFrom->name}} {{$notification->message}}
                                </strong>
                                <a href="{{route('forums.show',$notification->notifiable_id)}}">
                                    ({{$notification->notifiable->title}}) </a>
                            </p>


                            {{-- </div> --}}

                            @empty

                            <p class="text-muted w-100 p-2 text-center ">
                                <small>
                                    You don't have any notifications.
                                </small></p> @endforelse


                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-transparent dropdown-toggle shadow-none d-flex align-items-center "
                            type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="" width="45"
                                class="img-fluid rounded-circle mx-2 border border-primary border-2 ">
                            <span>
                                {{ Auth::user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <li>
                                <a href="{{route('ext-user.myquest')}}" class="dropdown-item">My Questions</a>
                            </li>
                            <li>
                                <a href="{{ route('ext-user.profile') }}" class="dropdown-item">Profile Setting</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>

                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                @else
                <li class="nav-item mx-1">
                    <a href="{{ route('ext-login') }}"
                        class="nav-link text-capatlize  h-100 btn btn-outline-primary rounded-pill border border-primary border-2 px-4 py-1">Login</a>
                </li>
                <li class="nav-item mx-1">
                    <a href="{{ route('ext-register') }}"
                        class="nav-link text-capatlize  h-100 btn btn-outline-secondary rounded-pill border border-secondary border-2 px-4 py-1">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="bg-primary">
        <div class="container d-flex justify-content-between">
            <ul class="nav text-white d-flex align-items-center w-100">
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link p-0 m-0 text-capatlize text-white h-100 nav-hover">
                        <img src="{{$siteinfo->logo}}" alt="" class="img-fluid p-0 m-0" width="40" />
                </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link text-capatlize text-white h-100 nav-hover">Home</a>
                </li>
                @forelse ($headerCategories as $category)
                <li class="nav-item">
                    <a href="
                    {{ route('category', $category->slug) }}
                    " class="nav-link text-capatlize text-white h-100 nav-hover">{{$category->title}}</a>
                </li>
                @empty

                @endforelse



                <li class="nav-item">
                    <a href="#" class="nav-link text-capatlize text-white h-100 nav-hover">
                        Aquarium
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link text-capatlize text-white h-100 nav-hover">Fish Compatiblity</a>
                </li>
                <li class="nav-item  " style="margin-left: auto">
                    <a href="{{ route('forums') }}"
                        class="nav-link text-capatlize text-white nav-hover  h-100 ">Forum</a>
                </li>
            </ul>

        </div>
    </div>
</header>