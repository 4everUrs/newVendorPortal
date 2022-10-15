<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
       
    <!-- Vendor CSS Files -->
    <link href="{{asset('welcomePage/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('welcomePage/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('welcomePage/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('welcomePage/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('welcomePage/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('welcomePage/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('welcomePage/assets/css/style.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('welcomePage/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  @livewireStyles
  
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo me-auto">

                <a href="{{route('home')}}"><img src="{{asset('welcomePage/assets/img/logo-full.png')}}" alt="" class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                   
                    @auth
                        <li><a class="nav-link scrollto" href="{{route('dashboard')}}">Dashboard</a></li>
                    @endauth
                    <li class="dropdown"><a href="#"><span>About</span></a></li>
                    <li><a class="nav-link scrollto" href="{{route('posting')}}">Listing</a></li>
                    <li><a class="nav-link scrollto " href="{{route('shop')}}">Shop</a></li>
                    @guest
                        <form action="{{route('login')}}">
                            <button type="submit" class="btn btn-primary mx-3">LOGIN</button>
                        </form>
                    @endguest
                    @auth
                    <li class="nav-item btn-rotate">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();"
                            class="nav-link">Logout</a>
                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </li>
                    @endauth
                   
                </ul>
                
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            

        </div>
    </header><!-- End Header -->
    <div class="main-content">
        {{$slot}}
    </div>
    @include('sweetalert::alert')
    @stack('modals')
    
    @livewireScripts
    
    @stack('scripts')
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                <p>Disclaimer: This is for educational purposes only, made by the student of <a href="https://bcp.edu.ph/">Bestlink College of the Philippines</a></p>
                <p>No Copyright infringement intended.</p>
                &copy; Copyright <strong><span>BootstrapMade</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
            
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>   
    <!-- Vendor JS Files -->
    <script src="{{asset('welcomePage/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('welcomePage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('welcomePage/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('welcomePage/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('welcomePage/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('welcomePage/assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('welcomePage/assets/js/main.js')}}"></script>

</body>

</html>