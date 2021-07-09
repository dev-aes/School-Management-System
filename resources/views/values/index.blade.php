@extends('layouts.admindashboard')

@section('title', "$user_role · Values Information")

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class=" float-end btn btn-info me-3" href="javascript:void(0)" id="add_values">Add Values <i class="ms-1 fas fa-plus-circle"></i></a><br><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover values_DT">
                                    <caption>List of Values <i class="fas fa-graduation-cap"></i>  </caption>
                                    <thead style="">
                                        <tr>
                                            <th>#</th>
                                            <th>Core Values</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="display_values">
                                        {{--Display Values Information--}}
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
