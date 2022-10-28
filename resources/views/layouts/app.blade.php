<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> --}}
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">
        <!-- CSS Files -->
        <link href="{{asset('dashboardPage/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('dashboardPage/assets/css/paper-dashboard.css')}}" rel="stylesheet" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" integrity="sha256-8g4waLJVanZaKB04tvyhKu2CZges6pA5SUelZAux/1U=" crossorigin="anonymous">

        @livewireStyles

        <!-- Scripts -->
        
    </head>
    <body class="font-sans antialiased bg-light">
       <div class="wrapper ">
            <div class="sidebar" data-color="white" data-active-color="danger">
                <div class="logo">
                    <a href="{{route('home')}}" class="simple-text logo-normal">
                        <div class="logo-image-big">
                            <img src="{{asset('dashboardPage/assets/img/logo-full.png')}}"width="120px">
                        </div>
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav nav-sidebar">
                        <li class="menu">
                            <a href="{{route('dashboard')}}">
                                <i class="nc-icon nc-tile-56"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('cart')}}">
                                <i class="nc-icon nc-diamond"></i>
                                <p>Cart</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('orders')}}">
                                <i class="nc-icon nc-diamond"></i>
                                <p>Orders</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('record')}}">
                                <i class="nc-icon nc-pin-3"></i>
                                <p>Purchase Orders</p>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="nc-icon nc-pin-3"></i>
                                <p>Invoices</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel" style="height: 100vh;">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <div class="navbar-toggle">
                                <button type="button" class="navbar-toggler">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </button>
                            </div>
                           
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <ul class="navbar-nav">
                                <li class="nav-item btn-rotate">
                                    <a href="{{ route('profile.show') }}" class="nav-link">Settings</a>   
                                </li>
                                <li class="nav-item btn-rotate">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
                                                                             <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                                                                @csrf
                                                                            </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            {{$slot}}
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
        
       

        <script src="{{asset('dashboardPage/assets/js/core/jquery.min.js')}}"></script>
        <script type="text/javascript">
           var url = window.location;
            
            // for sidebar menu entirely but not cover treeview
            $('ul.nav-sidebar a').filter(function() {
            return this.href == url;
            }).addClass('active');
        </script>
       <script src="{{ mix('js/app.js') }}" defer></script>
       @include('sweetalert::alert')
        @stack('modals')
        
        @livewireScripts
        
        @stack('scripts')
        <script src="{{asset('dashboardPage/assets/js/core/popper.min.js')}}"></script>
        <script src="{{asset('dashboardPage/assets/js/core/bootstrap.min.js')}}"></script>
        <script src="{{asset('dashboardPage/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
        <!--  Google Maps Plugin    -->
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
        <!-- Chart JS -->
        {{-- <script src="{{asset('dashboardPage/assets/js/plugins/chartjs.min.js')}}"></script> --}}
        <!--  Notifications Plugin    -->
        {{-- <script src="{{asset('dashboardPage/assets/js/plugins/bootstrap-notify.js')}}"></script> --}}
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        {{-- <script src="{{asset('dashboardPage/assets/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script>
        --}}
    </body>
</html>
