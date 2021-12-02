{{-- namespace App\Http\Controllers\ComplaintsController]; --}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <script src="{{URL::asset('js/solid.js')}}"></script>
     <script type="text/javascript" src="{{URL::asset('js/fontawesome.js')}}"></script>
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">

     <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    
</head>


<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header mt-5">
                <h3>Sema Na Rais</h3>
            </div>

            

            <ul class="list-unstyled " style="font-size:13px;">
                <li class="">
                    <a href="/Adminhome" aria-expanded="false"><i class="fas fa-tachometer-slowest mr-1"></i>Dashboard</a>
                    {{-- <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul> --}}
                </li>

                <li>
                    <a href="/AdminViewUsers" aria-expanded="false"><i class="fas fa-user mr-2"></i>Users</a>

                </li>

                <li>
                    <a href="/complaints/view" aria-expanded="false"><i class="fas fa-envelope mr-2"></i>Complaints</a>

                </li>

                <li>
                    <a href="/AdminViewMinistries" aria-expanded="false"><i class="fas fa-building mr-2"></i>Ministries</a>

                </li>
{{-- 
                <li>
                    <a href="/settings" aria-expanded="false"><i class="fas fa-cog mr-2"></i>Settings</a>

                </li> --}}
                {{-- <li>
                    <a href="#">About</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li> --}}
            </ul>

            
        </nav>


    <div id="page-container">
    <div id="app">
        <nav class="navbar navbar-dark navbar-expand-md shadow-sm" style="background-color: #306Fa0; color:white;">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/home') }}" style="color:white;">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}

                <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-bars" style="color:white;"></i>
                </button>  
                <a class="navbar-brand" href="{{ url('/Adminhome') }}" style="color:white;">
                    {{ _('SEMA NA RAIS') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" >
                    <span class="navbar-toggler-icon" style="color:white; border-color: white;"></span>
                </button>

                <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">



                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        {{-- <li class="nav-item mr-4">
                            <a class="nav-link" href="{{ route('login') }}" style="color:white;">{{ __('Dashboard') }}</a>
                        </li> --}}
                    {{-- </ul>

                    Right Side Of Navbar
                    <ul class="navbar-nav ml-auto"> --}}
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item" >
                                    <a class="nav-link" href="{{ route('login') }}" style="color:white;">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item" style="color:white;">
                                    <a class="nav-link" href="{{ route('register') }}" style="color:white;">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:white;">
                                 <i class="fas fa-user-check mr-lg-1"></i>   {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="" id="dismissClick">
            @yield('content')
        </main>
    

<style type="text/css">
    /*#footer{
        position: absolute;
        bottom:0;
        width: 100%;
        height:5rem;
    }*/

    #page-container{
        position: relative;
        min-height: 100vh;
    }

    #app{
        padding-bottom: 5rem;
    }

</style>

        <div class="mt-2 text-center dismissClick" style="background-color: #306FA0; color: white; font-size: 13px;" id="footr">
            <p class="py-4 mt-2" style="color:white;"> Sema na Raisi  &copy;<span id="year"></span></p>

            <script>
                document.getElementById("year").innerHTML = new Date().getFullYear();
            </script>
        </div>
    </div>
    </div>
</div>
<div class="overlay"></div>

    <script src="{{URL::asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <!-- Popper.JS -->
    <script src="{{URL::asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    {{-- <script src="{{URL::asset('js/bootstrap.min.js')}}"></script> --}}

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
            });

            $('#dismiss, #dismissClick, .dismissClick').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });
            
        });


    </script>



</body>
</html>
