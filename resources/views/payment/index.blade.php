@extends('layouts.admindashboard')

@section('title', 'Admin · Payments')

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-primary update text-uppercase" id="payment_info">Payment Information <i class="fas fa-info-circle"></i></h1>
                        <a class=" float-end btn btn-sm btn-info me-3" href="javascript:void(0)" id="add_payment">Add new entry +</a><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="payment_DT">
                                    <caption>List of Payments <i class="fas fa-money-check-alt"></i> </caption>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fist Name</th>
                                            <th>Last Name</th>
                                            <th>Paid Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="payment_fee">
                                        {{--Display Payment Information--}}
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
