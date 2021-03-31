<footer class="footer bg-light">

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg text-center text-lg-right py-3  py-lg-5">
                <a href="/">
                    @include('_include.logo' , ["width" => "180", "height" => "50"] )
                </a>
                <small>
                    <div class=" py-1">
                        info@gmail.com
                    </div>
                    <div class="py-1">
                        Kaushaltar, Bhaktapur, Nepal
                    </div>
                    <div>
                        <span>
                            facebook
                        </span>

                        <span>
                            Twitter
                        </span>
                    </div>
                </small>
            </div>
            <div class="col-12 col-md-6 col-lg text-center text-lg-right py-3  py-lg-5">
                <h4 class="text-primary">
                    Our Team
                </h4>
                <div class=" py-1">
                    <div>
                        <small>
                            Managing Director
                        </small>
                    </div>
                    <div>
                        <small>
                            Anup Shrestha
                        </small>
                    </div>
                </div>
                <div class=" py-1">
                    <div>
                        <small>
                            Managing Director
                        </small>
                    </div>
                    <div>
                        <small>
                            Anup Shrestha
                        </small>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-6 col-lg text-center text-lg-right py-3  py-lg-5">
                <h4 class="text-primary">
                    News
                </h4>
                <div>
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)

                        <li>
                            <small>
                                {{ $category->title }}
                            </small>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg text-center text-lg-right py-3  py-lg-5">
                <h4 class="text-primary">
                    Sports
                </h4>
                <div>
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)

                        <li>
                            <small>
                                {{ $category->title }}
                            </small>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg text-center text-lg-right py-3  py-lg-5">
                <h4 class="text-primary">
                    Bussiness
                </h4>
                <div>
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)

                        <li>
                            <small>
                                {{ $category->title }}
                            </small>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>


        </div>
    </div>

    <div class="container text-dark d-flex justify-content-between py-2">
        <div>
            <small>
                Copyright &copy; 2021 All rights reserved. | Powered by Anup Shrestha
            </small>
        </div>
        <div>
            <small>
                About us | Contact
            </small>
        </div>
    </div>
</footer>