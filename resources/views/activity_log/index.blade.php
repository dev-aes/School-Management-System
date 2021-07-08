@extends('layouts.admindashboard')

@section('title', 'Admin · Activity Blog')

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body" id="post-data">
                            <h1 class="display-6 text-muted text-center">Activity Logs</h1><br><br>
                            <div class="table-responsive">
                                <table class="table table-hover al_DT" >
                                    <thead>
                                        <tr>
                                            <th>Activity</th>
                                            <th>Date</th>
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
