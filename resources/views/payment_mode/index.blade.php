@extends('layouts.admindashboard')

@section('title', 'Admin · Mode of Payment')

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-primary update text-uppercase" id="payment_mode_info">Mode Of Payment <i class="fas fa-info-circle"></i></h1>
                        <a class=" float-end btn btn-sm btn-info me-3" href="javascript:void(0)" id="add_payment_mode">Add mode +</a><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="payment_mode_DT">
                                    <caption>List of MOP <i class="fab fa-cc-paypal"></i> </caption>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
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
