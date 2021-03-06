@extends('layouts.admindashboard')

@section('title', "$user_role · Roles & Permissions")

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid" data-aos="zoom-in" data-aos-duration="1000">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class=" float-end btn btn-info me-3" href="javascript:void(0)" id="add_role">Add Role <i class="ms-1 fas fa-plus-circle"></i></a><br><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover role_DT">
                                    <caption>List of User Roles <i data-feather='user'></i> </caption>
                                    <thead style="">
                                        <tr>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="display_role">
                                        {{--Display Role Information--}}
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
