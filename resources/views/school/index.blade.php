@extends('layouts.admindashboard')

@section('title', "$user_role · School Information ")

@section('content')

{{-- CONTAINER --}}

<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header">
                        <div class="card-body" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);"> 
                            {{-- <div class="card-body" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">  --}}
                      
                            <center><img src="" id="school_img" alt="school_logo" width="150"></center><br>
                            <i class="far fa-edit float-end fa-lg" role="button" onclick='editSchool(1)'></i><br>
                                <div id="school_details">
                                    {{--School Details--}}
                                </div>
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

                <div class="card">
                    <div class="card-body">
                        <h3 class="text-muted">Current [ Academic Year ]</h3><br>
                        <h2 class="text-muted display-4" id="school_display_ay"></h2>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form onsubmit="false">
                            @csrf
                            <div class="form-group">
                                <label for="school_announcement" class="form-label">Add Announcement 🔔</label>
                                <textarea class="form-control" name="" id="school_announcement" rows="5" placeholder="Some text here ... " required></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="button" class="float-end btn btn-sm btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--End CONTAINER--}}


  

@endsection
