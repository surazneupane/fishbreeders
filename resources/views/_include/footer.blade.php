<section class="mt-auto">
    <div class="" style="background-color: #120e43">
        <div class="container py-4">
            <div class="row d-lg-flex justify-content-between">
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
                    <button class="btn btn-light btn-lg rounded-pill px-5 py-2" data-bs-toggle="modal" data-bs-target="#feedbackmodal">
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



{{-- modal ffeedback --}}


<div class="modal fade " id="feedbackmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.addFeedback')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label ">Title</label>
                        <input type="text" class="form-control" name="title" id="title" required placeholder="Feedback title">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label ">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required placeholder="Email Address">
                    </div>
                    <div class="mb-3">
                        <label for="feedback" class="form-label ">Feedback</label>
                        <textarea class="form-control" name="feedback" id="feedback" rows="5" required placeholder="Your Feedback"></textarea>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary my-2 rounded-pill px-5">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
