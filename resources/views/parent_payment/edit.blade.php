@extends('layouts.admindashboard')

@section('title', 'Admin · Show Payment Request')

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-primary update text-uppercase">Payment Request <i class="fas fa-info-circle"></i></h1>
                        <br>
                        <div class="card-body">
                            <form class="col-md-5 mx-auto p-5 border bg-light" id="parent_payment_request_form" onsubmit="false">
                                <div class="form-group mb-3">

                                    <label>Sender:</label>
                                    <input class="form-control" type="text" value="{{$parent_payment_request->name}}" readonly>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label>To: <small> (Student ID && Student Name) </small> </label>
                                    <input class="form-control" type="text" value="{{$parent_payment_request->student_id}} - {{$parent_payment_request->first_name}} {{$parent_payment_request->last_name}}" aria-describedby="studentHelp" readonly>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Receipt Code</label>
                                    <input class="form-control" type="text" value="{{$parent_payment_request->official_receipt}}" readonly aria-describedby="official_receipt_help">
                                    <div id="official_receipt_help" class="form-text">* Transaction No. / Reference No. </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Amount Paid</label>
                                    <input class="form-control" type="text" value="{{$parent_payment_request->amount}}" readonly>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Receipt Image</label>
                                    <br>
                                    <img class="img-thumbnail" src='{{asset("storage/uploads/receipt/$parent_payment_request->screenshot")}}' alt="{{$parent_payment_request->screenshot}}" width="200" role="button" title="view" id="to_show_receipt">
                                </div>

                                <div class="form-group mb-3">
                                    <label>Remark</label>
                                    <select class="form-select" id="payment_request_remark" type="text" value={{$parent_payment_request->remark}}>
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approve</option>
                                        <option value="declined">Decline</option>
                                    </select>
                                </div>

                                <button type="button" class="btn btn-primary float-end" id="btn_update_payment_request" onclick="parent_update_payment_request({{$parent_payment_request->parent_id}}, {{$parent_payment_request->student_id}})">Update</button>

                            </form>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--End CONTAINER--}}


  

@endsection
