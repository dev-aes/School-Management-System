
<!DOCTYPE html>
<html lang="en">

<head>
    {{--Meta--}}
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="School E-cloud Manager">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	{{--Favicon--}}
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/fav/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/fav/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href=""{{ asset('images/fav/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('images/fav/site.webmanifest') }}">


    {{--Fonts--}}
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    {{--Favicon--}}
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>@yield('title', 'Main Dashboard')</title>

    {{--Styles--}}
	<link href="{{ asset('admin/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

	

    {{--DataTables--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">

    {{--icons--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  

</head>

<body>
	<div class="wrapper">
	@include('users.layouts.modal')
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="javascript:void(0)">
                   @yield('avatar')
                </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						<div class="online_check">
							{{--Display if Online--}}
						</div>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="#">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="#">
                             <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                        </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="#">
                            <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Inbox</span>
                        </a>
					</li>

					@if (auth()->user()->hasRole('parent')) 
					<li class="sidebar-item">
						<a class="sidebar-link" href="javascript:void(0)" id="mop">
                            <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Mode of Payment</span>
                        </a>
					</li>
					@endif
                </ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
                    <i class="hamburger align-self-center"></i>
                </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						@php
							$student = DB::table('students')->where('id', auth()->user()->student_id)->first();
						@endphp
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                			<i class="align-middle" data-feather="settings"></i>
              				</a>
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<span class="text-dark">{{ Auth::user()->name }}</span>
                            </a>
							<div class="dropdown-menu dropdown-menu-end">

								{{--Check if the user is student or parent--}}
								@if (auth()->user()->hasRole('student')) 

									<a class="dropdown-item" href="javascript:void(0)" onclick="editProfile()"><i class="align-middle me-1" data-feather="user" ></i> Profile</a>
								@elseif (auth()->user()->hasRole('parent'))
									<a class="dropdown-item" href="javascript:void(0)" onclick="editProfile()"><i class="align-middle me-1" data-feather="user" ></i> Profile</a>
								@else
									<a class="dropdown-item" href="javascript:void(0)" onclick="editProfile()"><i class="align-middle me-1" data-feather="user" ></i> Profile</a>
								@endif

								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="user-settings"> {{ __('Logout') }}</a>
							</div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				@yield('content')
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>School Name Here</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

    {{--Scripts--}}
    @routes 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- JavaScript Bundle with Popper -->

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="{{ asset('admin/js/app.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/prev.js') }}"></script>
    <script src="{{ asset('js/user/ajax.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



</body>

</html>