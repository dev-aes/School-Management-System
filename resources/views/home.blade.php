@extends('layouts.admindashboard')
@section('title', "$user_role · Dashboard ")

@section('content')


<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Analytics</strong> Dashboard</h3>
        </div>
     
        <div class="col-auto ms-auto text-end mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboards</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Analytics</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body" style="background-color:#2980b9">
                                <h5 class="card-title mb-4 text-white">Total Users</h5>
                                <h1 class="mt-1 mb-3 text-white">{{$users}}</h1>
                                <div class="mb-1">
                                    {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                    <span class="text-muted">Since last week</span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body" style="background-color:#c0392b">
                                <h5 class="card-title mb-4 text-white">Total Students</h5>
                                <h1 class="mt-1 mb-3 text-white">{{$students}}</h1>
                                <div class="mb-1">
                                    {{-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                                    <span class="text-muted">Since last week</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body" style="background-color:#f1c40f">
                                <h5 class="card-title mb-4 text-white">Total Staff</h5>
                                <h1 class="mt-1 mb-3 text-white">{{$get_total_staff}}</h1>
                                <div class="mb-1">
                                    {{-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
                                    <span class="text-muted">Since last week</span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card" style="background-color:#8e44ad">
                            <div class="card-body">
                                <h5 class="card-title mb-4 text-white">Total Parents</h5>
                                <h1 class="mt-1 mb-3 text-white">{{$parents}}</h1>
                                <div class="mb-1">
                                    {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                                    <span class="text-muted">Since last week</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body" style="background-color:#2ecc71">
                                <h5 class="card-title mb-4 text-white">Total Enrollee</h5>
                                <h1 class="mt-1 mb-3 text-white">{{$get_total_enrollee}}</h1>
                                <div class="mb-1">
                                    {{-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
                                    <span class="text-muted">Since last week</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card" style="background-color:#95a5a6">
                            <div class="card-body">
                                <h5 class="card-title mb-4 text-white">Total Teachers</h5>
                                <h1 class="mt-1 mb-3 text-white">{{$teachers}}</h1>
                                <div class="mb-1">
                                    {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                                    <span class="text-muted">Since last week</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                  <div class="card-header">
                    <h5 class="card-title mb-0"># Students by Grade Level</h5>
                </div>
                <div class="card-body px-4">
                    <div class="chart chart-sm">
                        <canvas id="chart_gl"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
            <div class="card flex-fill w-100">
                <div class="card-header">

                    <h5 class="card-title mb-0">Yearly Sales</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="py-3">
                            <div class="chart chart-xs">
                                {{-- <canvas id="chartjs-dashboard-pie"></canvas> --}}
                                 <h1 class="display-5">₱ {{ number_format($yearly_sales->total) }}</h1>
                                <canvas id="chart_ys"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Monthly Sales</h5>
                </div>
                <div class="card-body py-3">
                    <div class="chart chart-sm">
                        <canvas id="chart_ms"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Calendar</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="chart">
                            <div id="datetimepicker-dashboard"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    {{-- <h5 class="card-title mb-0">Latest Projects</h5> --}}
                </div>
                <table class="table table-hover my-0  p-5" id="dashboard_user_DT">
                    <caption class="p-3">List of users <i class="fas fa-user-shield"></i></caption>
                    <thead style="background: none">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th class="d-none d-xl-table-cell">Role</th>
                            <th class="d-none d-xl-table-cell">Status</th>
                            <th class="d-none d-md-table-cell">Date</th>
                        </tr>
                    </thead>
                    <tbody id="dashboard_display_user">
                       {{--Display Fetch Users--}}
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">

                    <h5 class="card-title mb-0">Activity Log</h5>
                </div>
                <div class="card-body d-flex w-100">
                    {{-- <div class="align-self-center chart chart-lg">
                        <canvas id="chartjs-dashboard-bar"></canvas>
                    </div> --}}
                    <div class="activity_log">
                        {{--Display Activity Logs--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('optional_script')


	{{--Monthly Sale--}}
	<script>

		const my_chart = document.getElementById('chart_ms');

		const chart_ms = new Chart(my_chart,{
			type:'line', // bar , horizontal, line ,doughnut ,radar , polarArea
			data:{
				labels:{!!json_encode($months)!!},
				datasets:[{
					label:'Monthly Sales for AY 2020-2021',
					data: {!!json_encode($sales)!!},
					backgroundColor:[
					'rgba(26, 188, 156,1.0)',
					'rgba(52, 152, 219,1.0)',
					'rgba(155, 89, 182,1.0)',
					'rgba(52, 73, 94,1.0)',
					'rgba(230, 126, 34,1.0)',
					'rgba(241, 196, 15,1.0)'
				]
				}],
				
			},
			options:{
				title: {
					display: true,
					text: 'Monthly Sales'
				}
			}
		});


        const my_chart2 = document.getElementById('chart_gl');
        const chart_gl = new Chart(my_chart2,{
			type:'doughnut', // bar , horizontal, line ,doughnut ,radar , polarArea
			data:{
				labels:['Grade 1','Grade 2','Grade 3', 'Grade 4' , 'Grade 5' , 'Grade 6'],
				datasets:[{
					label:'Students by Grade Level',
					data:[
                        {!!json_encode($g1)!!},
                        {!!json_encode($g2)!!},
                        {!!json_encode($g3)!!},
                        {!!json_encode($g4)!!},
                        {!!json_encode($g5)!!},
                        {!!json_encode($g6)!!}
                    ],
					backgroundColor:
                    [
                    'rgba(26, 188, 156,1.0)',
					'rgba(52, 152, 219,1.0)',
					'rgba(155, 89, 182,1.0)',
					'rgba(52, 73, 94,1.0)',
					'rgba(230, 126, 34,1.0)',
					'rgba(241, 196, 15,1.0)'
                    ],
                    hoverOffset: 6
				}],
				
			},
			options:{
				// title: {
				// 	display: true,
				// 	text: 'Monthly Sales'
				// }
			}
		});

        document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: "<span title=\"Previous month\">&laquo;</span>",
            nextArrow: "<span title=\"Next month\">&raquo;</span>",
        });
    });


	</script>

@endsection