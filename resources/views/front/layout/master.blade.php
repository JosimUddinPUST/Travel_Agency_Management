<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TripSummit</title>

        <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

        <!-- All CSS -->
        <link rel="stylesheet" href="{{ asset('dist-font/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-font/css/bootstrap-datepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-font/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-font/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-font/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-font/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-font/css/select2-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-font/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-font/css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-font/css/spacing.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-font/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/iziToast.min.css')}}">
        
        <!-- All Javascripts -->
        <script src="{{ asset('dist-font/js/jquery-3.6.1.min.js') }}"></script>
        <script src="{{ asset('dist-font/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('dist-font/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('dist-font/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('dist-font/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('dist-font/js/wow.min.js') }}"></script>
        <script src="{{ asset('dist-font/js/select2.full.js') }}"></script>
        <script src="{{ asset('dist-font/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('dist-font/js/moment.min.js') }}"></script>
        <script src="{{ asset('dist-font/js/counterup.min.js') }}"></script>
        <script src="{{ asset('dist-font/js/multi-countdown.js') }}"></script>
        <script src="{{ asset('dist-font/js/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('dist/js/iziToast.min.js')}}"></script>

        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
                        <ul>
                            <li class="phone-text"><i class="fas fa-phone"></i> 111-222-3333</li>
                            <li class="email-text"><i class="fas fa-envelope"></i> contact@example.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        <ul class="right">
                            <li class="menu">
                                <a href="{{ route('user_login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                            </li>
                            <li class="menu">
                                <a href="{{ route('user_registration') }}"><i class="fas fa-user"></i> Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @include('front.layout.nav')

        @yield('main_content')
        
        <div class="footer pt_70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="item pb_50">
                            <h2 class="heading">Important Pages</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route('home') }}"><i class="fas fa-angle-right"></i> Home</a></li>
                                <li><a href="{{ route('destinations') }}"><i class="fas fa-angle-right"></i> Destinations</a></li>
                                <li><a href="{{ route('packages') }}"><i class="fas fa-angle-right"></i> Packages</a></li>
                                <li><a href="{{ route('blog') }}"><i class="fas fa-angle-right"></i> Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="item pb_50">
                            <h2 class="heading">Useful Links</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route('faq') }}"><i class="fas fa-angle-right"></i> FAQ</a></li>
                                <li><a href="terms.html"><i class="fas fa-angle-right"></i> Terms of Use</a></li>
                                <li><a href="privacy.html"><i class="fas fa-angle-right"></i> Privacy Policy</a></li>
                                <li><a href="{{ route('contact') }}"><i class="fas fa-angle-right"></i> Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="item pb_50">
                            <h2 class="heading">Contact</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="right">
                                    34 Antiger Lane, USA, 12937
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="right">contact@example.com</div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="right">122-222-1212</div>
                            </div>
                            <ul class="social">
                                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a href=""><i class="fab fa-youtube"></i></a></li>
                                <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="item pb_50">
                            <h2 class="heading">Newsletter</h2>
                            <p>
                                To get the latest news from our website, please
                                subscribe us here:
                            </p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Subscribe Now">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="copyright">
                            Copyright &copy; 2025, TripSummit. All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>

        <script src="{{ asset('dist-font/js/custom.js') }}"></script>

        @if ($errors->any())
        @foreach ($errors->all() as $error)   
            <script>
                iziToast.show({
                    color: 'red',
                    message:'{{ $error }}',
                    position:'topRight'
                })
            </script>
        @endforeach    
        @endif
        @if (session('success'))  
            <script>
                iziToast.show({
                    color: 'green',
                    message:"{{ session('success') }}",
                    position:'topRight'
                })
            </script>      
        @endif

        @if(session('error'))
        <script>
            iziToast.show({
                color: 'red',
                message:"{{ session('error') }}",
                position:'topRight'
            })
        </script>  
        @endif

    </body>
</html>