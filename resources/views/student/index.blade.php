@extends('layouts.admindashboard')

@section('title', "$user_role · Student Information")

@section('content')


{{-- CONTAINER --}}
<div class="container-fluid" data-aos="zoom-in" data-aos-duration="1000">
                <div class="card">
                    <div class="card-header">
                        {{-- <a class="btn btn-primary" href="#"><i class="fas fa-file-import"></i></a> --}}
                        <a class=" float-end btn btn-info me-3" href="javascript:void(0)" id="add_student"> Add Student <i class="ms-1 fas fa-user-plus"></i></a>
                        <br><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover student_DT">
                                    <caption>List of Students</caption>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Gender</th>
                                            <th>Section</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Avatar</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="display_student">
                                        {{--Display Student Information--}}
                                        
                                    </tbody>
                                   
                                </table>
                            </div>
                            <form onsubmit="false" enctype="multipart/form-data" id="student_import_form">
                                @csrf
                                <input type="file" name="students" id="student_file" style="display:none" onchange="import_student()" accept=".xlsx,.csv">
                            </form>
                        </div>
                    </div>
                </div>
                <a class="btn text-info  btn-default d-block d-sm-inline-block" href="javascript:void(0)" id="imp_student"><i class="fas fa-upload"></i> Import</a>
                <a class="btn text-info  btn-default d-block d-sm-inline-block" href="{{ route('student.export') }}" id="exp_student"><i class="fas fa-file-export"></i> Export</a>

                @if(auth()->user()->hasRole('admin'))
                <a class="btn text-danger  btn-default d-block d-sm-inline-block" href="javascript:void(0)" id="delete_all_student"><i class="fas fa-trash-alt"></i> Delete Record</a>
                @endif

</div>
{{--End CONTAINER--}}
  

@endsection
