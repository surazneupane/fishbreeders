<header>
    <div class="container">

        <div class="d-flex justify-content-between align-items-center my-1 flex-wrap flex-column flex-lg-row">
            <a href="/" class="text-decoration-none text-dark d-flex align-items-center mx-auto mx-lg-0">
                <img src="{{$siteinfo->logo}}" alt="" height="100" class="my-1" />
                {{-- <span class="h1"> Fish Breeder </span> --}}
            </a>

            <style>
                .search {
                    width: 500px;

                }

                @media (max-width: 1200px) {
                    .search {
                        width: 300px;
                    }
                }

                @media (max-width: 1000px) {
                    .search {
                        width: 400px;
                    }
                }

                @media (max-width: 500px) {
                    .search {
                        width: 300px;
                    }
                }

            </style>

            <div class="mx-auto mx-lg-0 search my-2" style="">
                <form action="{{ route('search') }}" class="w-100">
                    <div class="d-flex border  align-content-center border-primary p-0 justify-content-between w-100 ">
                        <input type="text" name="search" placeholder="Search Here..." id="search" class="form-control pr-0   shadow-none rounded-0 w-100 border-0 " value="{{$search ?? ""}}">
                        <button type="submit" class="btn btn-primary shadow-none   border shadow-0 outline-none border-top-0 border-right-0 border-bottom-0 m-0 rounded-0  m-0 border-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <ul class="nav mx-auto mx-lg-0">

                @if(Auth::user())
                <?php $user=Auth::user(); ?>
                <?php $notifications = $user->userNotification()  ?>
                <li class="nav-item d-flex align-items-center">
                    <div class="dropdown d-flex align-items-center">
                        <button class="btn btn-transparent  dropdown-toggle shadow-none d-flex align-items-center " style="position: relative;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="bg-primary text-white" style="font-size: .8rem; position: absolute;top: -10px; right:10px; z-index: inherit;  clip-path: circle(); padding:5px">
                                <span>{{ $notifications->where('status',0)->count() }}</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end  p-0 notification" aria-labelledby="dropdownMenuButton1" style="width: 400px;margin-top:5px; max-height: 500px; overflow-y: scroll ;ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;">
                            <h6 class="bg-success text-white p-2 m-0" style="position: sticky; top: 0">All
                                Notifications</h6>
                            @forelse ($notifications as $notification)
                            {{-- <div @if($notification->status == 0) style="background-color:#d4d2cd" @endif> --}}

                            <hr class="my-0">
                            <div @if($notification->status == 0) style="background:#f0f0f0" @else style="background: #fff;" @endif class="d-flex align-items-center">

                                <div>
                                    @if($notification->notificationFrom)
                                    <img src="{{$notification->notificationFrom->profile_photo_url}}" alt="" width="40" height="40" class="m-1">
                                    @else
                                    @endif

                                </div>
                                <div class="p-1">
                                    <div>
                                        @if($notification->notificationFrom)
                                        {{$notification->notificationFrom->name}}
                                        @else
                                        Unknown User
                                        @endif

                                    </div>
                                    <div>
                                        <small class="text-muted">
                                            {{$notification->message}}
                                        </small>
                                    </div>
                                    @if($notification->notifiable_type == 'App\Models\Question')
                                    <a href="{{route('notification.show',$notification->id)}}" class="text-decoration-none">
                                        <small>
                                            {{$notification->notifiable->title}}
                                        </small> </a>

                                    @else
                                    <a href="{{route('notification.reply.show',$notification->id)}}" class="text-decoration-none">
                                        <small>
                                            {{$notification->notifiable->description}}
                                        </small> </a>

                                    @endif
                                </div>
                                <div class="p-1" style="margin-left: auto !important; align-self: flex-start ">
                                    <small class="text-muted">
                                        {{$notification->created_at->diffForHumans()}}
                                    </small>
                                </div>
                            </div>

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
                        <button class="btn btn-transparent dropdown-toggle shadow-none d-flex align-items-center " type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ $user->profile_photo_url }}" alt="" width="45" class="img-fluid rounded-circle mx-2 border border-primary border-2 ">
                            <span>

                                {{ $user->name }}
                                @if($user->roles->contains(1) ||$user->roles->contains(2))
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                </svg>
                                @endif
                            </span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <li>
                                <a href="{{route('chat')}}" class="dropdown-item">Messages</a>
                            </li>
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
                    <a href="{{ route('ext-login') }}" class="nav-link text-capatlize  h-100 btn btn-outline-primary rounded-pill border border-primary border-2 px-4 py-1">Login</a>
                </li>
                <li class="nav-item mx-1">
                    <a href="{{ route('ext-register') }}" class="nav-link text-capatlize  h-100 btn btn-outline-secondary rounded-pill border border-secondary border-2 px-4 py-1">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="bg-primary">
        <nav class=" navbar navbar-expand-xl navbar-primary bg-primary">

            <div class="container">
                <button class="navbar-toggler btn btn-light bg-light shadow-none my-2 " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="margin-left:auto ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>

                </button>


                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav text-white  w-100   navbar-nav">

                        <li class=" nav-item my-1 my-xl-0 mx-2">
                            <a href="{{route('home')}}" class="nav-link px-2 text-capatlize text-white h-100 nav-hover @if(request()->routeIs('home')) bg-danger @endif ">Home</a>
                        </li>
                        @forelse ($headerCategories as $category)
                        <li class="nav-item my-1 my-xl-0 mx-2">
                            <a href="
                    {{ route('category', $category->slug) }}
                    " class="nav-link px-2 text-capatlize text-white h-100 nav-hover @if(request()->url() == route('category', $category->slug)) bg-danger @endif">{{$category->title}}
                            </a>
                        </li>
                        @empty

                        @endforelse
                        <li class="nav-item my-1 my-xl-0 mx-2">
                            <a href="{{ route('calculator') }}" class="nav-link px-2 text-capatlize text-white h-100 nav-hover @if(request()->routeIs('calculator')) bg-danger @endif">
                                Aquarium Calculator
                            </a>
                        </li>

                        <li class="nav-item my-1 my-xl-0 mx-2">
                            <a href="{{ route('fish.compactibility') }}" class="nav-link px-2 text-capatlize text-white h-100 nav-hover @if(request()->routeIs('fish.compactibility')) bg-danger @endif">Fish Compatiblity</a>
                        </li>
                        <li class="nav-item my-1 my-xl-0 ml-auto mx-2">
                            <a href="{{ route('forums') }}" class="nav-link px-2 text-capatlize text-white nav-hover  h-100  @if(request()->routeIs('forums')) bg-danger @endif ">Forum</a>
                        </li>
                        <li class="nav-item my-1 my-xl-0 mx-2">
                            <a href="{{ route('aboutus') }}" class="nav-link px-2 text-capatlize text-white nav-hover  h-100  @if(request()->routeIs('aboutus')) bg-danger @endif ">About Us</a>

                        </li>
                    </ul>

                </div>

            </div>
        </nav>
    </div>
</header>
