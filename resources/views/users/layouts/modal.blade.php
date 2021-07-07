
{{--ALL USER MODAL ()--}}

    <div class="modal fade end_user_modal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="end_user_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="end_user_modal_header">
                    <h5 class="modal-title text-primary" id="end_user_modal_label">{{--Modal Title--}}</h5>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card w-100 mx-auto">
                        <div class="card-header">
                            {{--DATE--}}
                            <div class='float-end' id="date">
                                {{ "Date: " . date('m/d/Y')}}
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="user_form" class='col-md-10 bg-info text-white border p-5 mx-auto rounded-3' autocomplete="off" onsubmit="false" enctype="multipart/form-data">
                                @csrf
                                
                                {{--Display Input field by User Role--}}
                                @if (auth()->user()->hasRole('student'))
                                        <div class="form-group mb-4">
                                            <label class="form-label">Change Profile <i class="fas fa-user"></i></label>
                                            <input class="form-control" type="file" name="student_avatar" accept="image/*" onchange="user_change_profile({{auth()->user()->student_id}},'.user_form','student.student_update')">
                                        </div>
                                @elseif (auth()->user()->hasRole('parent'))
                                        <div class="form-group mb-4">
                                            <label class="form-label">Change Profile <i class="fas fa-user"></i></label>
                                            <input class="form-control" type="file" name="parent_avatar" accept="image/*" onchange="user_change_profile({{auth()->user()->parent_id}},'.user_form','parent.parent_update')">
                                        </div>
                                @else
                                        <div class="form-group mb-4">
                                            <label class="form-label">Change Profile <i class="fas fa-user"></i></label>
                                            <input class="form-control" type="file" name="teacher_avatar" accept="image/*" onchange="user_change_profile({{auth()->user()->teacher_id}},'.user_form','teacher.teacher_update')">
                                        </div>
                                @endif
                               

                                <div class="form-group ">
                                    <label class="form-label">Change Password <i class="fas fa-key"></i></label>
                                    <input class="form-control user_student_password" type="password" name="password" placeholder="********">
                                </div>


                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn_update_student_profile" onclick="update_password({{auth()->user()->id}}, '.user_student_password')">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--End User Student--}}


@if(url()->current() == route('parent.dashboard'))
{{--User Parent()--}}

    {{--Parent Show Payment Ledger --}}

        <div class="modal fade" id="show_parent_payment_ledger_modal" tabindex="-1" role="dialog" aria-labelledby="show_parent_payment_ledger_modal" aria-hidden="true">
            <div class="modal-dialog modal-xl " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="show_parent_payment_ledger_modal_label">{{--Modal Title--}}</h5>
                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card w-100 mx-auto">
                            <div class="card-header">
                                {{--DATE--}}
                                <div class='float-end' id="date">
                                    {{ "Date: " . date('m/d/Y')}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="monthly_payment bg-primary p-5">
                                    <h1 class="text-white">
                                        •  Next Monthly Payment - <span id="next_monthly_payment"> </span>
                                    </h1>
                                    <h2 class="text-white">
                                        •  Remaining Balance - <span id="remaining_balance"> </span>
                                    </h2>
                                </div>
                                <br>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-hover  table-bordered">
                                        <caption>List of payments</caption>
                                        <thead>
                                            <tr class='bg-info text-white'>
                                                <th>Month</th>
                                                <th>Monthly Payment</th>
                                                <th>Official Receipt</th>
                                                <th>Amount Paid</th>
                                                <th>Remark</th>
                                                <th>Balance</th>
                                                <th>Change</th>
                                                <th>Payment Date</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="parent_payment_ledger">
                                                {{--Display Parent's Student Payment Ledger--}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{--END Parent Show Payment Ledger--}}




    {{--SHOW Payment MODAL--}}
        
        <div class="modal fade " data-bs-backdrop="static" id="show_payment_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                        <h4 class="modal-title text-info" id="myLargeModalLabel">Payment Details </h4>
                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body" >
                    <div class="card border border-light">
                        <div class="card-header">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="card w-100 border border-secondary">
                                        <div class="card-body" id="print">
                                                <div class="card-header p-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h1 class="display-5">Receipt</h1>
                                                            <h5>School name Inc.</h5>
                                                            <h5>Juna Subd. Matina Davao City,8000</h5>
                                                            <h5>09659212003</h5>
                                                            <h5>school.edu.ph</h5>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <img class="float-end" src="{{asset('images/logo.png')}}" alt="sample_logo" width="250">
                                                        </div>
                                                    </div>
                                                </div><br>
                                                    <div class="row">
                                                            <div class="col-md-6">
                                                                <h5 >Enrolment Fee No. <span class="h5 fw-bold" id="payment_enrolment_fee_no">{{--Display enrolment fee no--}}</span></h5>
                                                                <h5 >Student ID No. <span class="h5 fw-bold" id="payment_student_id_no">{{--Display student id no--}}</span></h5>
                                                                <h5 >Student: <span class="h5 fw-bold" id="payment_student_name">{{--Display Student Name--}}</span> </h5>
                                                                <h5 >Grade Level: <span class="h5 fw-bold" id="payment_grade_level">{{--Display Student's Grade Level--}}</span> </h5>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <h5>Date: <span class="h5 fw-bold" id="payment_date"> {{--Display Payment date--}}</span></h5>
                                                                <h5>OR No: <span class="h5 fw-bold" id="payment_official_receipt"> {{--Display Payment Official Receipt--}}</span></h5>
                                                                <h5>Amount paid: <span class="h5 fw-bold" id="payment_payment_amount"> {{--Display Payment amount--}}</span></h5>
                                                                <h5>Remark: <span class="h5 fw-bold" id="payment_payment_remarks"> {{--Display Payment Remarks--}}</span></h5>
                                                            </div>
                                                    </div>
                                            <hr>
                                            <h5>Payment Summary</h5>
                                            <div class="row">
                                                <div class="col-md-6 border border-dark border-1 p-2">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h5>Fee Details</h5>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        {{-- Display Sub Fees and Totals --}}
                                                        <div class="col-md-6">
                                                            <h5>Fee Type</h5>
                                                            <div id="payment_sf_type">
                                                                {{-- display subfees--}}
                                                            </div>
                                                            <h5 class="fw-bold">Sub Total</h5>
                                                            <h5 class="fw-bold">Total Discount</h5>
                                                            <h5 class="fw-bold">Total</h5>
                                                        </div>
                                                        <div class="col-md-6 text-end">
                                                            <h5>Amount</h5>
                                                            <div id="payment_sf_amount">
                                                                {{-- display subfees--}}
                                                            </div>
                                                            <h5 class="fw-bold" id="payment_sf_total">{{--Display Sub Total--}}</h5>
                                                            <h5 class="fw-bold" id="payment_sf_total_discount">{{--Display Total Discount--}}</h5>
                                                            <h5 class="fw-bold" id="payment_sf_total_discounted_amount">{{--Display Total Discounted Amount--}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="col-md-6 border border-dark  p-2">
                                                <div class="row">
                                                    <h5>Payment Details</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                    <h5>Date</h5>
                                                    <div class="text-start" id="payment_sf_date">
                                                        {{--Display payment date--}}
                                                    </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <h5 class="text-end">Amount</h5>
                                                        <div class="text-end" id="payment_sf_payment">
                                                            {{--display payments amount--}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h5>Total</h5>
                                                        </div>
                                                        <div>
                                                            <h5 id="payment_sf_payment_total"></h5>
                                                        {{-- Display total Payments--}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5>Total Payable</h5>
                                                        <h5>Total Paid</h5>
                                                        <h5>Balance</h5>
                                                    </div>

                                                    <div class="col-md-6 text-end">
                                                        <h5 id="payment_sf_total_payable"></h5>
                                                        <h5 id="payment_sf_total_paid"></h5>
                                                        <h5 id="payment_sf_balance"></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group p-3">
                                            <button class="btn btn-info float-end" onclick="window.print()"> Print <i class="fas fa-print"></i> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    
    {{--END SHOW Payment MODAL--}}



    {{--Add Monthly Payment to Student Modal--}}
            <div class="modal fade" id="parent_add_student_payment_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="parent_add_student_payment_modal" aria-hidden="true">
                <div class="modal-dialog modal-lg " role="document">
                    <div class="modal-content">
                        <div class="modal-header" id="parent_add_student_payment_modal_header">
                            <h5 class="modal-title text-primary" id="parent_add_student_payment_modal_label">{{--Modal Title--}}</h5>
                            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card w-100 mx-auto">
                                <div class="card-header">
                                    {{--DATE--}}
                                    <div class='float-end' id="date">
                                        {{ "Date: " . date('m/d/Y')}}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="parent_add_student_payment_form" class='col-md-10 bg-light border p-5 mx-auto'  onsubmit="false">
                                        @csrf

                                        <input type="hidden" name="student_id" id="student_id">
                                        <div class="form-group mb-1">
                                            <label class="form-label">Name *</label>
                                            <input class="form-control" type="text" id="student_name" readonly>
                                        </div>
                                        
                                        <div class="form-group mb-1">
                                            <label class="form-label">Monthly Payment *</label>
                                            <input class="form-control" type="number" min="-0" id="monthly_payment" name="monthly_payment" readonly>
                                        </div>

                                        <div class="form-group mb-1">
                                            <label class="form-label">Remaining Balance *</label>
                                            <input class="form-control" type="text" id="total_balance" name="total_balance" readonly>
                                        </div>

                                        <div class="form-group mb-1">
                                            <label class="form-label">Enter Receipt Code *</label>
                                            <input class="form-control" type="number" min="0" id="payment_or" name="official_receipt" aria-describedby="payment_or_help" >
                                            <div id="payment_or_help" class="form-text">* Transaction No. / Reference No. </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <label class="form-label">Enter Amount *</label>
                                            <input class="form-control" type="number" min="0" id="payment_amount" name="amount" >
                                        </div>

                                        <div class="form-group mb-1">
                                            <label class="form-label">Receipt Type *</label>
                                            <select class="form-select" name="payment_mode_id" id="payment_receipt_type">
                                               {{--Display List of Payment Modes--}}
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label></label>
                                            <input class="form-control" type="file" id="payment_screenshot" name="screenshot" aria-describedby="payment_screenshot_help" onchange="previewImg(event)">
                                            <div id="payment_screenshot_help" class="form-text">* Please add a screenshot of your Transaction Receipt <br> as proof of payment.</div>
                                        </div>

                                        <div class="preview mt-2">
                                            <img id="preview_payment_screenshot" style="display:none" width="160">
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="btn_add_payment_to_student" onclick="parent_store_payment_to_student()">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    {{--End Add Monthly Payment to Student Modal--}}



    {{--Add Down Payment to Student Modal--}}
            <div class="modal fade" id="parent_add_student_down_payment_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="parent_add_student_down_payment_modal" aria-hidden="true">
                <div class="modal-dialog modal-lg " role="document">
                    <div class="modal-content">
                        <div class="modal-header" id="parent_add_student_down_payment_modal_header">
                            <h5 class="modal-title text-primary" id="parent_add_student_down_payment_modal_label">{{--Modal Title--}}</h5>
                            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card w-100 mx-auto">
                                <div class="card-header">
                                    {{--DATE--}}
                                    <div class='float-end' id="date">
                                        {{ "Date: " . date('m/d/Y')}}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="parent_add_student_down_payment_form" class='col-md-10 bg-light border p-5 mx-auto'  onsubmit="false">
                                        @csrf

                                        <input type="hidden" name="student_id" id="dp_student_id">
                                        <div class="form-group mb-2">
                                            <label>Name *</label>
                                            <input class="form-control" type="text" id="dp_student_name" readonly>
                                        </div>
                                        
                                        <div class="form-group mb-2">
                                            <label>Total Balance *</label>
                                            <input class="form-control" type="text" id="dp_total_balance" name="total_balance" readonly>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label>Enter Receipt Code *</label>
                                            <input class="form-control" type="number" min="0" id="dp_payment_or" name="official_receipt" aria-describedby="official_receipt_help" >
                                            <div id="official_receipt_help" class="form-text">* Transaction No. / Reference No. </div>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label>Enter Amount *</label>
                                            <input class="form-control" type="number" min="0" id="dp_payment_amount" name="amount" >
                                        </div>

                                        <div class="form-group">
                                            <label>Receipt Type *</label>
                                            <select class="form-select" name="payment_mode_id" id="dp_payment_receipt_type">
                                               {{--Display List of Payment Modes--}}
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label></label>
                                            <input class="form-control" type="file" id="dp_payment_screenshot" name="screenshot" aria-describedby="payment_screenshot_help" onchange="previewImg(event)">
                                            <div id="payment_screenshot_help" class="form-text">* Please add a screenshot of your Transaction Receipt <br> as proof of payment.</div>
                                        </div>

                                        <div class="preview mt-2">
                                            <img id="preview_down_payment_screenshot" style="display:none" width="160">
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="btn_add_down_payment_to_student" onclick="parent_store_down_payment_to_student()">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    {{--End Add Down Payment to Student Modal--}}

    {{--Parent Show Student's Record--}}
        <div class="modal fade" id="parent_student_grade_modal" tabindex="-1" role="dialog" aria-labelledby="parent_student_grade_modal" aria-hidden="true">
            <div class="modal-dialog modal-lg  " role="document">
                <div class="modal-content">
                    <div class="modal-header" id="parent_student_grade_modal_header">
                        <h4 class="modal-title text-white" id="parent_student_grade_modal_label">{{--Modal Title--}}</h4>
                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card w-100">
                            <div class="card-body">
                               <div id="parent_student_display_student_record">
                                    {{--Display Parent's Student's Record--}}
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{--End--}}
     
    {{--Parent Show Payment Mode--}}
        <div class="modal fade" id="parent_show_payment_mode_modal" tabindex="-1" role="dialog" aria-labelledby="parent_show_payment_mode_modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content">
                    <div class="modal-header" id="parent_show_payment_mode_modal_header">
                        <h4 class="modal-title text-white" id="parent_show_payment_mode_modal_label">{{--Modal Title--}}</h4>
                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card w-100">
                            <div class="card-body">
                                <div id="parent_display_payment_modes">
                                        {{--Display School Payment Modes--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{--End--}}

{{--End User Parent()--}}

@endif;


@if(url()->current() == route('teacher.dashboard'))

{{--User Teacher ()--}}


    {{--Teacher Assign Grade To Student's Subjects--}}



    
      {{--Teacher Assign Grade to Student's Subject--}}

        <div class="modal fade "  id="t_assign_grade_to_students_subject" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-xl">
            <div class="modal-content ">
                <div class="modal-header" id="t_assign_grade_to_students_subject_header">
                        <h4 class="modal-title text-white" id="myLargeModalLabel">Add Grade <i class="fas fa-info-circle"></i> </h4>
                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body" >
                    <div class="row justify-content-center">
                        <div class="card w-100">
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <form onsubmit="false">
                                            @csrf
                                            <div class="form-group mb-2">
                                                <label class="form-label"> Grade Level *</label>
                                                <input class="form-control" type="hidden" name="grade_level_id" id="t_grade_level_id">
                                                <input class="form-control" type="text"  id="t_grade_level_name">
                                            </div>

                                            <div class="form-group mb-2">
                                                <label class="form-label"> Section *</label>
                                                <input class="form-control" type="hidden" name="section_id" id="t_section_id">
                                                <input class="form-control" type="text"  id="t_section_name">

                                            </div>

                                        </form>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-6 border p-5">
                                        <div id="t_assign_grade_to_student_subject_display_students">
                                            {{--Display Student By Teacher's Section ID--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3 border p-3" id="t_assign_grade_to_student_display_encoding_of_grade">
                                        {{--Display Form for encoding Student Grades--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>


      {{--End Teacher Assign Grade--}}









    {{--End Teacher Assign Grade--}}








{{--End User Teacher--}}
@endif