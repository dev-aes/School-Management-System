@extends('layouts.admindashboard')

@section('title', "$user_role · Reports")

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid" data-aos="zoom-in" data-aos-duration="1000">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="row">
                                <form class='col-md-6 mx-auto'>
                                    <div class="form-group">
                                        <center><label class="form-label h3" for="report_ay">Select Academic Year *</label></center>
                                        <select class="form-select" id="report_ay">
                                              <option></option>
                                            @foreach ($academic_years as $ay )
                                              <option value="{{ $ay->id }}"> {{ $ay->academic_year }}  </option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <center>
                                            <button type="button" class="btn btn-primary btn-default d-block d-sm-inline-block mb-2" onclick="report_display_students_by_ay()">Student List</button>
                                            <button type="button" class="btn btn-success btn-default d-block d-sm-inline-block mb-2" onclick="report_display_teachers_by_ay()">Teacher List</button>
                                            <button type="button" class="btn btn-info btn-default d-block d-sm-inline-block mb-2" onclick="report_display_payments_by_ay()">Payment List</button>
                                            <button type="button" class="btn btn-secondary btn-default d-block d-sm-inline-block mb-2" onclick="report_reset()">Refresh</button>
                                        </center>
                                    </div>
                                 </form>
                            </div>
                            <br><br>
                            <div class="row">
                                <div id="report_display_data">
                                    {{--Display Selected Data --}}
                                </div>
                            </div>

                            {{--Form 138--}}
                            <div class="row mt-5">
                                <div id="report_form_138_display_student_record">
                                    {{--Display Student Record by student ID--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--End CONTAINER--}}


  

@endsection
