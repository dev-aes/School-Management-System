@extends('layouts.admindashboard')

@section('title', 'Admin · Student Fee Information')

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class=" float-end btn btn-info me-3" href="javascript:void(0)" id="add_student_fee">Add new entry <i class="ms-1 fas fa-plus-circle"></i></a><br><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="student_fee_DT">
                                    <caption>List of Student Fees <i class="fas fa-money-check-alt"></i> </caption>
                                    <thead>
                                        <tr>
                                            <th>Enrolment No.</th>
                                            <th>Name</th>
                                            <th>Amount Payable</th>
                                            <th>No. of Months </th>
                                            <th>Downpayment</th>
                                            <th>Paid</th>
                                            <th>Balance</th>
                                            <th>Monthly Payment</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="display_student_fee">
                                        {{--Display Student Fee Information--}}
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
