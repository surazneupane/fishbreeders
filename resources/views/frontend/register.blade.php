@extends('layouts.main')
@section('content')

<div class=" d-flex justify-content-center align-items-center ">
    <div style="width: 24rem; margin: 50px 0" class="p-4 border rounded shadow">
        <h3>
            Sign Up - {{ env('APP_NAME') }}
        </h3>
        <form action="{{ route('ext-register.user') }}" method="post">
            @csrf
            <div class="form-group my-3">
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Full Name">
            </div>

            <div class="form-group my-3">
                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email">
            </div>

            <div class="form-group my-3">
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Password">
            </div>
            <div class="form-group my-3">
                <input type="password" name="password-confirmation" id="password-confirmation"
                    class="form-control @error('password-confirmation') is-invalid @enderror"
                    placeholder="Confirm Password">
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-primary">
                    Sign Up
                </button>
                <a href="{{ route('ext-login') }}" class="btn btn-success">Login</a>
            </div>
        </form>
        <div class="my-3">
            <h5 class="text-center">
                OR
            </h5>
            <div class="d-flex justify-content-around flex-column">
                <a href=""
                    class="btn btn-transparentw-100 d-flex justify-content-between border rounded-pill my-2 shadow-sm align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#3b5998" class="bi bi-facebook"
                        viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                    <span>
                        Sign Up with Facebook
                    </span>
                </a>
                <a href=""
                    class="btn btn-transparent w-100 d-flex justify-content-between border rounded-pill my-2 shadow-sm align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 326667 333333" width="32" height="32"
                        shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
                        image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd">
                        <path
                            d="M326667 170370c0-13704-1112-23704-3518-34074H166667v61851h91851c-1851 15371-11851 38519-34074 54074l-311 2071 49476 38329 3428 342c31481-29074 49630-71852 49630-122593m0 0z"
                            fill="#4285f4" />
                        <path
                            d="M166667 333333c44999 0 82776-14815 110370-40370l-52593-40742c-14074 9815-32963 16667-57777 16667-44074 0-81481-29073-94816-69258l-1954 166-51447 39815-673 1870c27407 54444 83704 91852 148890 91852z"
                            fill="#34a853" />
                        <path
                            d="M71851 199630c-3518-10370-5555-21482-5555-32963 0-11482 2036-22593 5370-32963l-93-2209-52091-40455-1704 811C6482 114444 1 139814 1 166666s6482 52221 17777 74814l54074-41851m0 0z"
                            fill="#fbbc04" />
                        <path
                            d="M166667 64444c31296 0 52406 13519 64444 24816l47037-45926C249260 16482 211666 1 166667 1 101481 1 45185 37408 17777 91852l53889 41853c13520-40185 50927-69260 95001-69260m0 0z"
                            fill="#ea4335" /></svg>
                    <span>
                        Sign Up with Google
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>



@endsection