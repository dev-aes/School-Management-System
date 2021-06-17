@extends('layouts.admindashboard')

@section('title', 'Admin · Grade Information')

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class=" float-end btn btn-sm btn-info me-3" href="javascript:void(0)" id="add_grade_level">Add Grade  <i class="ms-1 fas fa-plus-circle"></i></a><br><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="grade_level_DT">
                                    <caption>List of Grades <i class="fas fa-chart-bar"></i> </caption>
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Grade Level</th>
                                            <th>English</th>
                                            <th>Math</th>
                                            <th>Filipino</th>
                                            <th>Science</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="display_grade">
                                        {{--Display Grade  Information--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--End CONTAINER--}}


  

@endsection
