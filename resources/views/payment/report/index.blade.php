@extends('layouts.admindashboard')

@section('title', 'Admin · Payment Report')

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-primary update" id="payment_info">Payment Report <i class="fas fa-info-circle"></i></h1>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="payment_report_DT">
                                    <caption>List of Payments <i class="fas fa-money-check-alt"></i> </caption>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Enrolment No.</th>
                                            <th>Student #</th>
                                            <th>Fist Name</th>
                                            <th>Last Name</th>
                                            <th>Paid Amount</th>
                                            <th>Remark</th>
                                            <th>Official Receipt #</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="payment_report">
                                        {{--Display Payment Report Information--}}
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
