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

                @if(Auth::user())
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white dropdown-toggle shadow-none" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bell" viewBox="0 0 16 16">
                                <path
                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                            </svg>
                        </button>
                        <?php $notifications = Auth::user()->userNotification()  ?> 
                        <div class="dropdown-menu dropdown-menu-end p-2 " aria-labelledby="dropdownMenuButton1"
                            style="width: 300px;margin-top:5px">
                            @foreach ($notifications as $notification)
                            {{-- <div @if($notification->status == 0) style="background-color:#d4d2cd" @endif> --}}

                                <hr>
                            <p class="text-muted w-100  " >
                              <strong>  {{$notification->notificationFrom->name}} {{$notification->message}}
                              </strong>
                          <a href="{{route('forums.show',$notification->notifiable_id)}}">    ({{$notification->notifiable->title}}) </a>
                            </p>

                            <hr>
                        {{-- </div> --}}

                            @endforeach
                           

                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-transparent dropdown-toggle shadow-none text-white" type="button"
                            id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="" width="24"
                                class="img-fluid rounded-circle">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
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
                <li class="nav-item">
                    <a href="{{ route('ext-login') }}" class="nav-link text-capatlize text-white h-100">Login</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</header>