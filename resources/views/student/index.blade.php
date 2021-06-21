@extends('layouts.admindashboard')

@section('title', 'Admin · Student Information')

@section('content')


{{-- CONTAINER --}}
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                                            <th>Grade Level</th>
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
                <a class="btn  btn-info" href="javascript:void(0)" id="imp_student"><i class="fas fa-upload"></i> Import</a>
                <a class="btn  btn-info" href="javascript:void(0)" id="exp_student"><i class="fas fa-file-export"></i> Export</a>
                <a class="btn  btn-danger" href="javascript:void(0)" id="delete_all_student"><i class="fas fa-trash-alt"></i> Delete Record</a>

            </div>
        </div>
    </div>
{{--End CONTAINER--}}
  

@endsection
