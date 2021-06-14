@extends('layouts.admindashboard')

@section('title', 'Admin · School Information')

@section('content')

{{-- CONTAINER --}}

<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-primary update" id="school_info">School Information <i class="fas fa-info-circle"></i> </h1>
                        <div class="card-body">
                            <center><img src="" id="school_img" alt="school_logo" width="150"></center><br>
                            <i class="far fa-edit float-end" role="button" onclick='editSchool(1)'></i><br>
                            <ul class="list-group" id="school_details" >
                            {{-- School Details--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--End CONTAINER--}}


  

@endsection
