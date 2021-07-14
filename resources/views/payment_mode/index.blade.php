@extends('layouts.admindashboard')

@section('title', "$user_role · Mode of Payment")

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid" data-aos="zoom-in" data-aos-duration="1000">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class=" float-end btn btn-info me-3" href="javascript:void(0)" id="add_payment_mode">Add mode <i class="ms-1 fas fa-plus-circle"></i></a><br><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover payment_mode_DT">
                                    <caption>List of MOP <i class="fab fa-cc-paypal"></i> </caption>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mode</th>
                                            <th>Account Number</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="display_payment_mode">
                                        {{--Display Subject Information--}}
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
