@extends('layouts.admindashboard')

@section('title', "$user_role · Parent Information")

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid" data-aos="zoom-in" data-aos-duration="1000">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class=" float-end btn btn-info me-3" href="javascript:void(0)" id="add_parent">Add Parent <i class="ms-1 fas fa-user-plus"></i></a><br><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover parent_DT">
                                    <caption>List of Parents <i class="fas fa-book-reader"></i> </caption>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Facebook</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="display_parent">
                                        {{--Display Parent Information--}}
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
