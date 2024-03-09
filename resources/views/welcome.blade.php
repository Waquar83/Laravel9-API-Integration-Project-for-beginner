<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Rest API | JWT</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800;900&display=swap");

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                scroll-behavior: smooth;
            }
            html {
                font-family: "Poppins", sans-serif;
            }
            .navbar {
                background: #131313;
                padding: 1rem 8rem;
                z-index: 1000;
            }

            .navbar .navbar-brand {
                font-size: 1.4rem;
                font-weight: 700;
            }

            #navbarSupportedContent > ul > li:nth-child(n) > a {
                color: #fff;
                font-size: 1.1rem;
                padding: 0 0.8rem;
            }
            #navbarSupportedContent > ul > li:nth-child(n) > a:hover,
            #navbarSupportedContent > ul > li:nth-child(n) > a:active {
                color: #00bf85;
            }
            #navbarSupportedContent > button {
                background: #00bf85;
                font-weight: 600;
                padding: 0.4rem 1.4rem;
                border-radius: 30px;
            }
            .mid {
                background: #000;
                width: 100%;
                height: 100vh;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-content: center;
                text-align: center;
            }
            .mid video {
                width: 100%;
                height: 100%;
                pointer-events: none;
                object-fit: cover;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .mid .hero {
                position: relative;
            }
            .mid .hero p {
                width: 55%;
                font-size: 1.1rem;
                letter-spacing: 0.2px;
                padding-bottom: 1.1rem;
            }
            .mid .hero a {
                background: #00bf85;
                padding: 0.6rem 1.4rem;
                font-weight: 600;
                border-radius: 30px;
                text-decoration: none;
            }

            .mid .hero a:hover {
                background: #fff;
            }
            .about {
                background: #000;
            }
            .about .text {
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                margin: auto;
            }
            .about .text h6 {
                color: #00bf7f;
                font-weight: 800;
                font-size: 1rem;
                letter-spacing: 2px;
            }
            .about .text h2 {
                color: #f7f5f4;
                font-weight: 700;
                font-size: 2.7rem;
            }
            .about .text p {
                color: #f7f5f4;
                font-weight: 400;
                font-size: 1.1rem;
                letter-spacing: 0.5px;
            }
            .about .text a {
                background: #00bf85;
                padding: 0.6rem 1.4rem;
                font-weight: 600;
                border-radius: 30px;
                text-decoration: none;
                color: #111;
            }

            .discovery .text {
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                margin: auto;
            }
            .discovery .text h6 {
                color: #00bf7f;
                font-weight: 800;
                font-size: 1rem;
                letter-spacing: 2px;
            }
            .discovery .text h2 {
                color: #111;
                font-weight: 700;
                font-size: 2.7rem;
            }
            .discovery .text p {
                font-weight: 400;
                font-size: 1.1rem;
                letter-spacing: 0.5px;
            }
            .discovery .text a {
                background: #111;
                padding: 0.6rem 1.4rem;
                font-weight: 500;
                border-radius: 30px;
                text-decoration: none;
                color: #fff;
            }

            .service {
                background: #000;
            }
            .service .one {
                background: #fff;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                padding: 2rem 1.5rem;
                border-radius: 7px;
            }

            .sign .text {
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                margin: auto;
            }
            .sign .text h6 {
                color: #00bf7f;
                font-weight: 800;
                font-size: 1rem;
                letter-spacing: 2px;
            }
            .sign .text h2 {
                color: #111;
                font-weight: 700;
                font-size: 2.7rem;
            }
            .sign .text p {
                font-weight: 400;
                font-size: 1.1rem;
                letter-spacing: 0.5px;
            }
            .sign .text a {
                background: #111;
                padding: 0.6rem 1.4rem;
                font-weight: 500;
                border-radius: 30px;
                text-decoration: none;
                color: #fff;
            }

            body > footer {
                background: #111 !important;
            }
            body > footer > ul.list-unstyled.list-inline.text-center.py-2 > li:nth-child(2) > a {
                background: #00bf85;
                padding: 0.4rem 1.4rem;
                font-weight: 600;
                border-radius: 30px;
                border: none;
            }
            body > footer > ul.list-unstyled.list-inline.text-center.py-2 > li:nth-child(2) > a:hover {
                color: #00bf77;
            }

            @media screen and (max-width: 988px) {
                .navbar {
                    padding: 1rem;
                }
                #navbarSupportedContent > ul {
                    padding-left: 0.8rem;
                }
                #navbarSupportedContent > ul > li:nth-child(n) > a {
                    padding: 0.8rem 0;
                }
                .mid .hero h2 {
                    font-size: 2.5rem;
                }
                .mid .hero p {
                    font-size: 1rem;
                }
                .mid .hero a {
                    font-size: 0.9rem;
                }
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body data-spy="scroll" data-target="#navbarSupportedContent">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="fas fa-bolt"></i> Rest API JWT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/Waquar83">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('api.docs') }}">Docs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create.account') }}">Sing up</a>
                        </li>
                    </ul>
                    <a href="{{ route('login.account') }}" class="btn btn-success text-white">Login</a>
                </div>
            </div>
        </nav>
        <div class="mid">
            <video autoplay muted loop>

                <source class="embed-responsive" src="https://www.dropbox.com/s/92h4pvpy00dmmpe/video.mp4?dl=0" type="video/mp4" />
            </video>
            <div class="hero text-center">
                <h2 class="text-light display-4 font-weight-bold">Rest API Web Developer</h2>
                <p class="text-light mx-auto">
                    REST API in PHP refers to rules for creating web services that allow communication between different systems. A RESTful API, also known as a RESTful web service, is an architectural style for developing web services based on representational state transfer (REST) technology.
                </p>
                <a class="text-dark" href="#">Get Started</a>
            </div>
        </div>

        <section id="about" class="about py-5">
            <div class="row align-items-center container my-5 mx-auto">
                <div class="text col-lg-6 col-md-6 col-12 w-50 pt-5 pd-5">
                    <h6>Free Rest API</h6>
                    <h2>Unlimited Testing</h2>
                    <p>
                        REST API in PHP refers to rules for creating web services that allow communication between different systems. A RESTful API, also known as a RESTful web service, is an architectural style for developing web services based on representational state transfer (REST) technology.
                    </p>
                    <a href="#">Learn more</a>
                </div>
                <div class="img col-lg-6 col-md-6 col-12 w-50">
                    <img class="img-fluid" src="https://img.freepik.com/free-vector/flat-design-technology-api-infographic_23-2149356397.jpg?w=740&t=st=1709315776~exp=1709316376~hmac=ddf63f2dfa7e75d549a88a72123a7af96e1409ac19218b75cf4d8f4b3c592b40" alt="about" />
                </div>
            </div>
        </section>
        <section id="discovery" class="discovery py-5">
            <div class="row align-items-center container my-5 mx-auto">
                <div class="img col-lg-6 col-md-6 col-12 w-50">
                    <img class="img-fluid" src="https://t4.ftcdn.net/jpg/03/53/40/91/360_F_353409114_VXRFZIyWncYL2yfSbpG6xovgQnlkG8ib.jpg" alt="discovery" />
                </div>
                <div class="text col-lg-6 col-md-6 col-12 w-50 pt-5 pd-5">
                    <h6>UNLIMITED ACCESS</h6>
                    <h2>Login to your account to any time</h2>
                    <p>
                        REST API in PHP refers to rules for creating web services that allow communication between different systems. A RESTful API, also known as a RESTful web service, is an architectural style for developing web services based on representational state transfer (REST) technology.
                    </p>
                    <a href="#">Learn more</a>
                </div>
            </div>
        </section>

        <section id="service" class="service py-5">
            <div class="col mx-auto align-items-center my-5">
                <div class="heading text-center pt-5">
                    <h2 class="font-weight-bold pb-5 text-light">Our API's</h2>
                </div>
                <div class="row mx-auto justify-content-center align-items-center text-center container">
                    <div class="one col-lg-3 col-md-3 col-12 w-25 m-2">
                        <img
                            class="img-fluid w-75"
                            src="https://thumbs.dreamstime.com/b/transaction-history-vector-flat-color-icon-e-wallet-application-mobile-banking-app-using-payment-bill-checking-payments-report-210123397.jpg"
                            alt="one"
                        />
                        <h5 class="font-weight-bold pt-4">Register, Login, Forgot</h5>
                        <p></p>
                    </div>
                    <div class="one col-lg-3 col-md-3 col-12 w-25 m-2">
                        <img
                            class="img-fluid w-75"
                            src="https://thumbs.dreamstime.com/b/transaction-history-vector-flat-color-icon-e-wallet-application-mobile-banking-app-using-payment-bill-checking-payments-report-210123397.jpg"
                            alt="two"
                        />
                        <h5 class="font-weight-bold pt-4">Logout, Refresh Token</h5>
                        <p></p>
                    </div>
                    <div class="one col-lg-3 col-md-3 col-12 w-25 m-2">
                        <img
                            class="img-fluid w-75"
                            src="https://thumbs.dreamstime.com/b/transaction-history-vector-flat-color-icon-e-wallet-application-mobile-banking-app-using-payment-bill-checking-payments-report-210123397.jpg"
                            alt="three"
                        />
                        <h5 class="font-weight-bold pt-4">Session Token</h5>
                        <p></p>
                    </div>
                </div>
            </div>
        </section>

        <section id="sing" class="sign py-5">
            <div class="row align-items-center container my-5 mx-auto">
                <div class="text col-lg-6 col-md-6 col-12 w-50 pt-5 pd-5">
                    <h6>JOIN OUR TEAM</h6>
                    <h2>Creating an account is extremely easy</h2>
                    <p>
                        REST API in PHP refers to rules for creating web services that allow communication between different systems. A RESTful API, also known as a RESTful web service, is an architectural style for developing web services based on representational state transfer (REST) technology.
                    </p>
                    <a href="#">Start Now</a>
                </div>
                <div class="img col-lg-6 col-md-6 col-12 w-50">
                    <img class="img-fluid" src="https://img.freepik.com/free-vector/application-programming-interface-concept-set-software-development-process-website-interface-design-improvement-programming-coding-it-profession-isolated-flat-vector-illustration_613284-2579.jpg?w=740&t=st=1709315160~exp=1709315760~hmac=4dafeac15680836cfbcd37895934031411d71062a585532b16d4b4e53696f43a" alt="team" />
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="page-footer font-small stylish-color-dark pt-4 text-light">
            <!-- Footer Links -->
            <div class="container text-center text-md-left">
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-4 mx-auto">
                        <!-- Content -->
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">{{ env('APP_NAME') }} {{ app()->version() }}</h5>
                        <p>"" Here you can create an api to manage laravel authenctiaction package ""</p>
                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-2 mx-auto">
                        <!-- Links -->
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">API</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">Login</a>
                            </li>
                            <li>
                                <a href="#!">Register</a>
                            </li>
                            <li>
                                <a href="#!">Forgot</a>
                            </li>
                            <li>
                                <a href="#!">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-2 mx-auto">
                        <!-- Links -->
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Authentication</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">Auth</a>
                            </li>
                            <li>
                                <a href="#!">Passport</a>
                            </li>
                            <li>
                                <a href="#!">Sanctum</a>
                            </li>
                            <li>
                                <a href="#!">JWT</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-2 mx-auto">
                        <!-- Links -->
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Package</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">Breeze</a>
                            </li>
                            <li>
                                <a href="#!">Jetstream</a>
                            </li>
                            <li>
                                <a href="#!">Fortify</a>
                            </li>
                            <li>
                                <a href="#!"></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
            <!-- Footer Links -->

            <hr />

            <!-- Call to action -->
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <h5 class="mb-1">Register for free</h5>
                </li>
                <li class="list-inline-item">
                    <a href="#!" class="btn btn-danger btn-rounded">Sign up!</a>
                </li>
            </ul>
            <!-- Call to action -->

            <hr />

            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                    <a class="btn-floating btn-fb mx-1">
                        <i class="fab fa-facebook-f"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-tw mx-1">
                        <i class="fab fa-twitter"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-gplus mx-1">
                        <i class="fab fa-google-plus-g"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-li mx-1">
                        <i class="fab fa-linkedin-in"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-dribbble mx-1">
                        <i class="fab fa-dribbble"> </i>
                    </a>
                </li>
            </ul>
            <!-- Social buttons -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">
                {{ env('APP_NAME') }} {{ app()->version() }} © {{ Carbon\Carbon::now()->format('Y') }} Copyright: 
                <a href="{{ url('/') }}"> {{ url('/') }}</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>