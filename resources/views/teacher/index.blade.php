@extends('layouts.admindashboard')

@section('title', 'Admin · Teacher Information')

@section('content')

{{-- CONTAINER --}}

<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class=" float-end btn btn-info me-3" href="javascript:void(0)" id="add_teacher">Add Teacher <i class="ms-1 fas fa-user-plus"></i></a><br><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="teacher_DT">
                                    <caption>List of Teachers</caption>
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Gender</th>
                                            <th>City</th>
                                            <th>Contact</th>
                                            <th>Avatar</th>
                                            <th>Grade Level</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="display_teacher">
                                        {{--Display Teacher Information--}}
                                        
                                    </tbody>
                                </table>
                            </div>
                            <form onsubmit="false" enctype="multipart/form-data" id="teacher_import_form">
                                @csrf
                                <input type="file" name="teachers" id="teacher_file" style="display:none" onchange="import_teacher()" accept=".xlsx,.csv">
                            </form>
                        </div>
                    </div>
                </div>
                <a class="btn btn-lg btn-info" href="javascript:void(0)" id="imp_teacher"><i class="fas fa-upload"></i> Import</a>
                <a class="btn  btn-info" href="javascript:void(0)" id="exp_subject"><i class="fas fa-file-export"></i> Export</a>
                <a class="btn  btn-danger" href="javascript:void(0)" id="delete_all_subject"><i class="fas fa-trash-alt"></i> Delete Record</a>
            </div>
        </div>
    </div>
{{--End CONTAINER--}}



  

@endsection
