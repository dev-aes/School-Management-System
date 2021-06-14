@extends('layouts.admindashboard')

@section('title', 'Admin · Payment Request Information')

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-primary update text-uppercase" id="payment_info">Payment Request Information <i class="fas fa-info-circle"></i></h1>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-info" id="parent_payment_request_DT" >
                                    <caption>List of Payment Request <i class="fas fa-money-check-alt"></i> </caption>
                                    <thead>
                                        <tr >
                                            <th>#</th>
                                            <th>Sender</th>
                                            <th>Send to</th>
                                            <th>Amount Paid</th>
                                            <th>Official Receipt</th>
                                            <th>Remark</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        {{--Display Payment Request Information--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-primary update text-uppercase" id="">Approved Request <i class="fas fa-check-circle"></i></h1>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped  table-success" id="parent_approved_payment_request_DT">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sender</th>
                                            <th>Send to</th>
                                            <th>Amount Paid</th>
                                            <th>Official Receipt</th>
                                            <th>Remark</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        {{--Display Payment Request Information--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-primary update text-uppercase" id="">Declined Request <i class="fas fa-times-circle"></i></h1>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-danger" id="parent_declined_payment_request_DT">
                                    <thead >
                                        <tr>
                                            <th>#</th>
                                            <th>Sender</th>
                                            <th>Send to</th>
                                            <th>Amount Paid</th>
                                            <th>Official Receipt</th>
                                            <th>Remark</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        {{--Display Payment Request Information--}}
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
