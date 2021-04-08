@extends('layouts.main')

@section('content')

<section>
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-9">
                <h4>
                    Profile Setting
                </h4>
                <hr>
                <div>
                    <div>
                        Current Profile Photo
                    </div>
                    <div>
                        <img src="{{ $user->profile_photo_url }}" alt="" width="70" class="img-fluid rounded-circle">
                    </div>
                </div>
                <form action="{{route('ext-user.profileupdate',$user->id)}}" method="post" class="form mb-5"
                    enctype="multipart/form-data">
                    @csrf
                    <div class=" form-group py-2">
                        <label for="profile_photo">
                            Profile Photo
                        </label>
                        <input type="file" name="profile_photo" id="profile_photo" class="form-control" />
                    </div>
                    <div class="form-group py-2">
                        <label for="name">
                            Name
                        </label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                    </div>
                    <div class="form-group py-2">
                        <label for="password">
                            Password
                        </label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror">
                    </div>
                    <div class="form-group py-2">
                        <label for="password-confirmation">
                            Confirm Password
                        </label>
                        <input type="password" name="password-confirmation" id="password-confirmation"
                            class="form-control @error('password-confirmation') is-invalid @enderror">
                    </div>
                    <div class="py-2 d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection