@extends('layouts.admindashboard')

@section('title', 'Admin · Subject Information')

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center text-primary update text-uppercase" id="subject_info">Subject Information <i class="fas fa-info-circle"></i></h1>
                        <a class=" float-end btn btn-sm btn-info me-3" href="javascript:void(0)" id="add_subject">Add Subject +</a><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="subject_DT">
                                    <caption>List of Subjects <i class="fas fa-book-reader"></i> </caption>
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Subject Description</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="display_subject">
                                        {{--Display Subject Information--}}
                                    </tbody>
                                </table>
                            </div>
                            <form onsubmit="false" enctype="multipart/form-data" id="subject_import_form">
                                @csrf
                                <input type="file" name="subjects" id="subject_file" style="display:none" onchange="import_subject()" accept=".xlsx,.csv">
                            </form>
                        </div>
                    </div>
                </div>
                <a class="btn btn-info" href="javascript:void(0)" id="imp_subject"><i class="fas fa-upload"></i> Import</a>
                <a class="btn  btn-info" href="javascript:void(0)" id="exp_subject"><i class="fas fa-file-export"></i> Export</a>
                <a class="btn  btn-danger" href="javascript:void(0)" id="delete_all_subject"><i class="fas fa-trash-alt"></i> Delete Record</a>
            </div>
        </div>
    </div>

{{--End CONTAINER--}}


  

@endsection
