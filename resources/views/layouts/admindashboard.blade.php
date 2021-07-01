<!DOCTYPE html>
<html lang="en" >

<head>
    {{--Meta--}}
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="School E-cloud Manager">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--Fonts--}}
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    {{--Favicon--}}
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/fav/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/fav/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href=""{{ asset('images/fav/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('images/fav/site.webmanifest') }}">

	<title>@yield('title', 'Admin Dashboard')</title>

    {{--Styles--}}
	<link href="{{ asset('admin/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> --}}

    {{--DataTables--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap5.min.css">

	{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> --}}

    {{--icons--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

	{{-- Notify--}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

	{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" /> --}}
	{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script> --}}

	{{-- <link rel="stylesheet" href="{{ asset('css/tagsinput.css') }}"> --}}

	{{--Tags Input--}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />

	{{--E-one--}}
	<link rel="stylesheet" href="{{ asset('css/eone.min.css') }}">


</head>

<body>
    {{-- @include('layouts.modal') --}}
    @include('layouts.modal')
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
                    <span class="align-middle"><img src="{{ asset('images/admin/admin.png') }}" alt="admin_logo" width="130"></span>
                </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						<div class="online_check">
							{{--Display Online Status--}}
							{{-- <p class="ms-5 check_status">Online <span class="circle"><i class="fas fa-circle text-success"></i></span> </p> --}}
						</div>
					</li>
					
					<li class="sidebar-item active">
						<a class="sidebar-link" href="{{ route('home.index') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
					</li>

					<li class="sidebar-item">
						<a href="#teacher" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Teacher</span>
                        </a>
						<ul id="teacher" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" id="" href="{{ route('teacher.index') }}">Manage Teacher</a></li>
							<li class="sidebar-item"><a class="sidebar-link" id="teacher_assign_subject_section" href="javascript:void(0)">Assign Subject to Section</a></li>
							<li class="sidebar-item"><a class="sidebar-link" id="teacher_assign_grade_to_student" href="javascript:void(0)">Assign Grade to Student</a></li>
						</ul>
					</li>


					<li class="sidebar-item">
						<a href="#student" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Student</span>
                        </a>
						<ul id="student" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" id="student_add_parent" href="javascript:void(0)">Add Parent</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('student.index') }}">Manage Student</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('subject.index') }}">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Subject</span>
                        </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('grade_level.index') }}">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Grade Level</span>
                        </a>
					</li>


					<li class="sidebar-item">
						<a href="#section" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="hexagon"></i> <span class="align-middle">Section</span>
                        </a>
						<ul id="section" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('section.index') }}">Manage Section</a></li>
							<li class="sidebar-item"><a class="sidebar-link" id="section_add_teacher" href="javascript:void(0)">Assign Teacher</a></li>

						</ul>
					</li>

					
					<li class="sidebar-item">
						<a href="#billing" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Billing</span>
                        </a>
						<ul id="billing" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('fee.index') }}">Fee management</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('studentfee.index') }}">Student fee</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('payment.index') }}">Payment</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('payment_report.index') }}">Payment Report</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('parent_payment_request.index') }}">
							<i class="align-middle" data-feather="bell"></i> <span class="align-middle">Payment Request</span>
                        </a>
					</li>


					{{-- <li class="sidebar-item">
						<a class="sidebar-link" href="javascript:void(0)" title="coming soon">
							<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">POS & Inventory</span>
                        </a>
					</li> --}}

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('report.index') }}" title="coming soon">
							<i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">Reports</span>
                        </a>
					</li>

					<li class="sidebar-item" id="s">
						<a href="#to_school" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="settings" ></i><span class="align-middle">Settings</span>
                        </a>
						<ul id="to_school" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('school.index') }}"><i class="fas fa-wrench"></i>Manage School</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('user.index')}}"><i class="fas fa-users-cog"></i> Manage User </a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('parent.index')}}"><i class="fas fa-user-plus"></i> Parent Registration </a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('payment_mode.index')}}"><i class="far fa-credit-card"></i> Mode of Payment</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('academic_year.index')}}"><i class="fas fa-calendar"></i> Academic Year</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('role.index')}}"> <i class="fas fa-key"></i> Roles</a></li>
							<a href="#to_values" data-bs-toggle="collapse" class="sidebar-link collapsed">
								<i class="align-middle fas fa-graduation-cap"></i></i><span class="align-middle">Learner Values</span>
							</a>
							<ul id="to_values" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#s">
								<li class="sidebar-item"><a class="sidebar-link" href="{{route('values.index')}}"><i class="fas fa-graduation-cap"></i>Values</a></li>
							</ul>
						</ul>


					</li>
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
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator" id="notification_count">
										{{-- NOTIFICATION COUNT --}}
									</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header" id="notification_details">
									{{-- NOTIFICATION Details --}}
									
								</div>
								<div class="list-group" id="list_of_parent_payment_logs">
									{{--LIST OF NOTIFICATIONS--}}
									
								</div>
								<div class="dropdown-menu-footer">
									<a href="{{ route('parent_payment_request.index') }}" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												{{-- <img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker"> --}}
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												{{-- <img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris"> --}}
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												{{-- <img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason"> --}}
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												{{-- <img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman"> --}}
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                				<i class="align-middle" data-feather="settings"></i>
             			    </a>

							 <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
               				 	<img src="{{ asset('images/admin/admin.png') }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">{{ Auth::user()->name }}</span>
              				 </a>

							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="javascript:void(0)"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="{{ route('home.index') }}"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								
								<a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();" class="user-settings">
                                 {{ __('Logout') }}</a>
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
								<a href="index.html" class="text-muted"><strong>School Name </strong> <i class="fas fa-robot"></i> </a> &copy;
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
	<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

	{{-- <script src="js/jq.js"></script> --}}
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="{{ asset('admin/js/app.js') }}"></script>

	{{--DT--}}
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>

	{{--SA--}}
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	{{--Toastr--}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	{{--Tags--}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>

	{{--E-one--}}
    <script src="{{ asset('js/eone.min.js') }}"></script>


	{{--Scripts--}}
    <script src="{{ asset('js/preview.js') }}"></script>
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    {{-- <script src="{{ asset('js/statistic.js') }}"></script> --}}
     
	@yield('optional_script')

</body>

</html>