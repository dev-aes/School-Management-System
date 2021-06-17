@extends('layouts.admindashboard')

@section('title', 'Admin · Grade Level Information')

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class=" float-end btn btn-info me-3" href="javascript:void(0)" id="add_grade_level">Add Grade Level  <i class="ms-1 fas fa-plus-circle"></i></a><br><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="grade_level_DT">
                                    <caption>List of Grade Level <i class="fas fa-chart-bar"></i> </caption>
                                    <thead>
                                        <tr>
                                            <th>Grade Name</th>
                                            <th>Grade Description</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="display_grade_level">
                                        {{--Display Grade Level Information--}}
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
