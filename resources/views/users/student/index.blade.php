@extends('users.layouts.userdashboard')


@section('avatar')
<span class="align-middle">
    
    @php
         $student = DB::table('students')->where('id', auth()->user()->student_id)->first();

    @endphp

   
    <form id="student_form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <img src="{{ asset('images/user_img.png') }}" alt="student_avatar" width="130" id="upload_profile">
            <input type="file" name="student_avatar" id="student_avatar" style="display:none" accept="image/*" onchange="student_change_profile({{auth()->user()->student_id}})">
        </div>
    </form>


</span>
@endsection

@section('content')

<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3 class="text-muted"><strong>Student </strong> Dashboard</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Student</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    <li class="breadcrumb-item"><a href="#"></a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
       <div class="col-md-12">
           <div class="card w-100">
               <div class="card-header">
                   <div class="card-body bg-info">
                        <h3 class="text-white">Complete Credentials (6/1/2021)</h3>
                   </div>
               </div>
           </div>
       </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header">
                   <h4 class="text-muted">My Subjects</h4>
                </div>
                 <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="bg-secondary text-white">
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th>Teacher</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($student_subject_teacher as $credential )
                                    <tr>
                                        <td>{{ $credential->name }}</td>
                                        <td>{{ $credential->description }}</td>
                                        <td>{{ $credential->first_name }} {{$credential->last_name}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No data found ...</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                     </div>
                 </div>
            </div>
        </div>
     </div>

</div>
@endsection