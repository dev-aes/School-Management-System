<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'School E-cloud Manager')</title>
     {{--Stylesheet--}}
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     {{-- <link rel="stylesheet" href="{{ asset('css/tmpbootstrap.css') }}"> --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
</head>
{{-- <body style="background-color: rgb(26, 32, 44)"> --}}
    <body style=" background-image: linear-gradient(to right, rgb(81, 236, 215) , rgb(77, 230, 158));">
    @auth

    @include('layouts.modal')
    {{--Div Wrapper--}}
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3 class="text-center"><a href="{{route('home')}}"> <img src="{{ asset('images/admin/admin.png') }}" alt="admin.png" width="130"> </a> </h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-home mr-3"></i>Menu</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{route('school.index')}}"><span class="bullet">•</span> School Information</a>
                        </li>
                        <li>
                            <a href="{{ route('teacher.index') }}"><span class="bullet">•</span> Teacher Information</a>
                        </li>
                        <li>
                            <a href="{{ route('student.index') }}"><span class="bullet">•</span> Student Information</a>
                        </li>
                        <li>
                            <a href="{{ route('subject.index') }}"><span class="bullet">•</span> Subject</a>
                        </li>
                        <li>
                            <a href="{{ route('grade_level.index') }}"><span class="bullet">•</span> Grade Level</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
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
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="#" class="download">Back Up Database</a>
                </li>
                
            </ul>
        </nav>
        @endauth
        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-dark" style="style="background-color: rgb(26, 32, 44)"">
                <div class="container-fluid">

                    @auth
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    @endauth
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">
            
                                </ul>
            
                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto" >
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                {{-- <a class="nav-link" href="{{ route('login') }}" id="user-settings">{{ __('Login') }}</a> --}}
                                            </li>
                                        @endif
                                        
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                {{-- <a class="nav-link" href="{{ route('register') }}" id="user-settings">{{ __('Register') }}</a> --}}
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="background:none">
                                                {{ Auth::user()->name }}
                                            </a>
            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();" class="user-settings">
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
                        </ul>
                    </div>
                </div>
            </nav>
            
      @yield('content')
      
         {{--Scripts--}}
     @routes 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    {{-- <script src="{{ asset('js/tmpbootstrap.js') }}"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- <script src="sweetalert2.all.min.js"></script> --}}
    {{-- <script src="{{ asset('js/preview.js') }}"></script>
    <script src="{{ asset('js/ajax.js') }}"></script> --}}
</body>
</html>