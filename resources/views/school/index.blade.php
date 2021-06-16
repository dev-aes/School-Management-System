@extends('layouts.admindashboard')

@section('title', 'Admin · School Information')

@section('content')

{{-- CONTAINER --}}

<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-muted">Select Academic Year <i class="far fa-calendar"></i></h3>
                        <form onsubmit="false">
                            <div class="form-group">
                                    <select class="form-select" name="ay" id="school_ay">
                                        {{----}}
                                    </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg btn-primary form-control mt-2" onclick="activateAY(event)">Activate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--End CONTAINER--}}


  

@endsection
