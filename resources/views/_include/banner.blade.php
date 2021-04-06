<section style="position: relative">
    <div>
        <img src="{{ $siteinfo->banner}}" alt="" class="img-fluid" style="
                                height: 500px;
                                width: 100%;
                                object-fit: cover;
                                filter: brightness(70%);
                            " />
    </div>
    <div class="" style="
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                        ">
        <div class="container d-flex justify-content-start align-items-center h-100">
            <div class="p-4" style="background: #23c4ed50; max-width: 700px">
                <h1 class="text-white mb-4 h3" style="letter-spacing: 0.1rem">
                    {!! $siteinfo->banner_text !!}
                </h1>
                <a href="#" class="btn btn-light btn-lg px-4">Join Now</a>
            </div>
        </div>
    </div>
</section>