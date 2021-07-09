@extends('layouts.admindashboard')

@section('title', "$user_role · Activity logs")

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body" id="post-data">
                            <h1 class="display-6 text-muted text-center">Activity Logs <i class="fas fa-history"></i> </h1><br><br>
                            <div class="table-responsive">
                                <table class="table table-hover al_DT" >
                                    <thead>
                                        <caption>List of Activity</caption>
                                        <tr>
                                            <th>Activity <i class="fas fa-history"></i></th>
                                            <th>Date <i class="fas fa-calendar"></i></th>
                                        </tr>
                                    </thead>
                                </table>
                                <tbody>
                                    {{--Display Activity Logs--}}
                                </tbody>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--End CONTAINER--}}


  

@endsection
