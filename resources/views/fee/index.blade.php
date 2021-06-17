@extends('layouts.admindashboard')

@section('title', 'Admin · Fee Information')

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class=" float-end btn btn-info me-3" href="javascript:void(0)" id="add_fee">Add new entry <i class="ms-1 fas fa-plus-circle"></i></a><br><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="fee_DT">
                                    <caption>List of Fees <i class="fas fa-money-check-alt"></i> </caption>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Grade Level</th>
                                            <th>Total Fee</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="fee_DT">
                                        {{--Display Fee Information--}}
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
