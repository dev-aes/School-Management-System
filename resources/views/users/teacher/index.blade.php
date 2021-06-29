@extends('users.layouts.userdashboard')

@section('avatar')
<span class="align-middle">

    @php
         $teacher = DB::table('teachers')->where('id', auth()->user()->teacher_id)->first();

    @endphp

   
    <form class="teacher_form" enctype="multipart/form-data">
        @csrf

        @if ($teacher->teacher_avatar == null)

                <div class="form-group">
                    <img src="{{ asset('images/user_img.png') }}" alt="teacher_avatar" width="130" id="upload_profile">
                    <input type="file" name="teacher_avatar" id="student_avatar" style="display:none" accept="image/*" onchange="user_change_profile({{$teacher->id}},'.teacher_form', 'teacher.teacher_update')">
                </div>
            
        @else
                <div class="form-group">
                    <img src="{{ asset("/storage/uploads/teacher/$teacher->teacher_avatar") }}" alt="teacher_avatar" width="130" id="upload_profile">
                </div>
        @endif
       
    </form>

</span>
@endsection

@section('content')

<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3 class="text-muted"><strong>My </strong> Dashboard</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Teacher</a></li>
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
                        <h3 class="text-white">School Announcement 🔔</h3>
                   </div>
               </div>
           </div>
       </div>
    </div>
    <!--
    <div class="row mb-3">
        <div class="col-md-5">
            {{--Display CHART Student's by grade level --}}
        </div>
        <div class="col-md-4">
            {{--Display CHART Subjects's by grade level --}}

        </div>
        <div class="col-md-3">
            <form >
                <div class="form-group">
                    <label class="form-label">Add Announcement</label>
                    <textarea class="form-control" rows="10"></textarea>
                </div>
            </form>
        </div>
    </div>
    !-->
    <div class="row">
            <div class="col-md-12">
                <div class="card w-100">
                    <div class="card-header">
                    <h4 class="text-muted">My Sections</h4>
                    </div>
                    <div class="card-body">
                        {{-- <table class="table table-hover teacher_student_DT">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Section</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table> --}}
                        <div id="teacher_display_sections_with_students">
                            {{--Display Teacher's Handled Sections--}}
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection