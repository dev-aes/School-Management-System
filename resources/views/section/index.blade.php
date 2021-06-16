@extends('layouts.admindashboard')

@section('title', 'Admin · Section Information')

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class=" float-end btn btn-sm btn-info me-3" href="javascript:void(0)" id="add_section">Add Section +</a><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="section_DT">
                                    <caption>List of Sections <i class="fas fa-book-reader"></i> </caption>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Section</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="display_section">
                                        {{--Display Section Information--}}
                                    </tbody>
                                </table>
                            </div>
                            {{-- <form onsubmit="false" enctype="multipart/form-data" id="subject_import_form">
                                @csrf
                                <input type="file" name="subjects" id="subject_file" style="display:none" onchange="import_subject()" accept=".xlsx,.csv">
                            </form> --}}
                        </div>
                    </div>
                </div>
                {{-- <a class="btn btn-info" href="javascript:void(0)" id="imp_subject"><i class="fas fa-upload"></i> Import</a>
                <a class="btn  btn-info" href="javascript:void(0)" id="exp_subject"><i class="fas fa-file-export"></i> Export</a>
                <a class="btn  btn-danger" href="javascript:void(0)" id="delete_all_subject"><i class="fas fa-trash-alt"></i> Delete Record</a> --}}
            </div>
        </div>
    </div>

{{--End CONTAINER--}}


  

@endsection
