<section>
    <div class="" style="background-color: #120e43">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="text-white border-light border-bottom py-2">
                        About Us
                    </h4>
                    <div class="text-white">
                        {!! $siteinfo->about_us !!}
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4 class="text-white border-light border-bottom py-2">
                        Site Links
                    </h4>
                    <ul class="nav d-flex flex-column">

                        <li class="d-block">
                            <a href="/" class="nav-link text-white">
                                <small> Home </small>
                            </a>
                        </li>
                        @foreach ($footerCategories as $category)
                        <li class="d-block">
                            <a href="{{ route('category', $category->slug) }}" class="nav-link text-white">
                                <small>{{ $category->title }} </small>
                            </a>
                        </li>
                        @endforeach
                        <li class="d-block">
                            <a href="#" class="nav-link text-white">
                                <small> Aquarium Calculator</small>
                            </a>
                        </li>
                        <li class="d-block">
                            <a href="{{ route('forums') }}" class="nav-link text-white">
                                <small> Forum </small>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 d-flex justify-content-center align-items-center flex-column">
                    <p class="text-white">
                        <small>
                            If your want to give us a feedback then,
                        </small>
                    </p>
                    <button class="btn btn-light btn-lg rounded-pill px-5 py-2">
                        Click here &rarr;
                    </button>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="container py-2 text-white">
                <small>
                    Copyright &copy; 2021 - fish breeders - all rights
                    reserved
                </small>
            </div>
        </div>
    </div>
</section>