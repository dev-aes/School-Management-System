@extends('layouts.admindashboard')

@section('title', "$user_role · Subject Information")

@section('content')


{{-- CONTAINER --}}
   <div class="container-fluid" data-aos="zoom-in" data-aos-duration="1000">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class=" float-end btn btn-info me-3" href="javascript:void(0)" id="add_subject">Add Subject <i class="ms-1 fas fa-plus-circle"></i></a><br><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover subject_DT">
                                    <caption>List of Subjects <i class="fas fa-book"></i> </caption>
                                    <thead style="">
                                        <tr>
                                            <th>#</th>
                                            <th>Subject</th>
                                            <th>Description</th>
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
                <a class="btn text-info  btn-default d-block d-sm-inline-block" href="javascript:void(0)" id="imp_subject"><i class="fas fa-upload"></i> Import</a>
                <a class="btn text-info  btn-default d-block d-sm-inline-block" href="javascript:void(0)" id="exp_subject"><i class="fas fa-file-export"></i> Export</a>
                
                @if(auth()->user()->hasRole('admin'))
                <a class="btn text-danger btn-default d-block d-sm-inline-block" href="javascript:void(0)" id="delete_all_subject"><i class="fas fa-trash-alt"></i> Delete Record</a>
                @endif
            </div>
        </div>
    </div>

{{--End CONTAINER--}}


  

@endsection
