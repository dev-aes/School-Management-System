
@if (url()->current() == route('school.index'))
    {{--Start SCHOOL Modal--}}

    <div class="modal fade" id="school_modal" tabindex="-1" role="dialog" aria-labelledby="school_modal_label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" id="school_modal_header">
              <h5 class="modal-title text-primary" id="school_modal_label">{{--Modal Title--}}</h5>
              <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
              </button>
            </div>
                {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="school_div_err" role="alert" style="display:none">
                <ul id="school_err"></ul>
            </div>

            <div class="modal-body">
              <form id="school_form" autocomplete="off" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label class='form-label'>School Name </label>
                            <input class="form-control" name="school_name" type="text" id="school_name" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class='form-label'>DepEd No. </label>
                            <input class="form-control" name="depEd_no" type="text" id="depEd_no" value="">
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class='form-label'>City</label>
                            <input class="form-control" name="city" type="text" id="city" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class='form-label'>Province</label>
                            <input class="form-control" name="province" type="text" id="province" value="">
                        </div>
                    </div>
                </div>
           
                <div class="form-group">
                    <label class='form-label'>Country</label>
                    <input class="form-control" type="text" name="country" id="country" value="">
                </div>
    
                <div class="form-group">
                    <label class='form-label'>Address</label>
                    <input class="form-control" type="text" name="address" id="address" value="">
                </div>
    
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class='form-label'>Contact No.</label>
                            <input class="form-control" type="text" name="contact" id="contact" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class='form-label'>Email</label>
                            <input class="form-control" type="text" name="email" id="email" value="">
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class='form-label'>Facebook: </label>
                            <input class="form-control" type="text" name="facebook" id="facebook" value="">
                        </div>
            
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class='form-label'>Website</label>
                            <input class="form-control" type="text" name="website" id="website" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label  class='form-label'>School Logo</label>
                    <input class="form-control" name="school_logo" type="file" accept="image/*" id="school_logo" value="" onchange="previewImg(event);">
                </div>
                <div class="preview mt-2">
                    <img id="preview_school_img" style="display:none" width="100">
                </div>
                <br><br>
                <h4 class="text-muted">Settings <i class="fas fa-wrench"></i> </h4>
                <div class="border border-3 border-light p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class='form-label'>No of Months </label>
                                <input class="form-control" min="1" name="months_no" type="number" id="months_no" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class='form-label'>Date Started:</label>
                                <input class="form-control" name="date_started" type="date" id="date_started" value="">
                            </div>
                        </div>
                    </div>
                </div>

              </form>
            </div>
    
            
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="btn_add_school" onclick="createSchool()">Submit</button>
              <button type="button" class="btn btn-success" id="btn_update_school" style="display:none" onclick="updateSchool()">Save</button>
            </div>
          </div>
        </div>
      </div>
    

{{--End SCHOOL Modal--}}

@endif


@if(url()->current() == route('teacher.index'))
{{--Start TEACHER Modal--}}

    <div class="modal fade" id="teacher_modal" tabindex="-1" role="dialog" aria-labelledby="teacher_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary" id="teacher_modal_header">
              <h5 class="modal-title text-white" id="teacher_modal_label">{{--Modal Title--}}</h5>
              <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
              </button>
            </div>

             {{--Alert--}}
             <div class="alert alert-danger p-3 fade show" id="teacher_div_err" role="alert" style="display:none">
                <ul id="teacher_err"></ul>
            </div>

            <div class="modal-body">
              <form id="teacher_form" autocomplete="off" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class='form-label'>First Name </label>
                            <input class="form-control" name="first_name" type="text" id="teacher_first_name" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class='form-label'>Middle Name</label>
                            <input class="form-control" name="middle_name" type="text" id="teacher_middle_name" value="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class='form-label'>Last Name</label>
                            <input class="form-control" name="last_name" type="text" id="teacher_last_name" value="">
                        </div>
                    </div>
                    
                </div>
    
                <div class="row">
                   
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class='form-label'>Birth Date</label>
                            <input class="form-control" name="birth_date" type="date" id="teacher_birth_date" value="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class='form-label'>Gender</label>
                            <select class="form-select" aria-label="Gender" name="gender" id="teacher_gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        {{-- <label class='form-label'>Gender</label>
                        <input class="form-control" type="text" name="gender" id="teacher_gender" value=""> --}}
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class='form-label'>City</label>
                            <input class="form-control" type="text" name="city" id="teacher_city" value="">
                        </div>
                    </div>

                </div>

    
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class='form-label'>Province</label>
                            <input class="form-control" type="text" name="province" id="teacher_province" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class='form-label'>Country</label>
                            <input class="form-control" type="text" name="country" id="teacher_country" value="Philippines" placeholder="Philippines" readonly>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class='form-label'>Address </label>
                            <input class="form-control" type="text" name="address" id="teacher_address" value="">
                        </div>
            
                    </div>
                  
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class='form-label'>Contact</label>
                            <input class="form-control" min="0" type="number" name="contact" id="teacher_contact" value="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class='form-label'>Facebook</label>
                            <input class="form-control" type="text" name="facebook" id="teacher_facebook" value="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class='form-label'>Email</label>
                            <input class="form-control" type="text" name="email" id="teacher_email" value="">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label class='form-label'>Avatar</label>
                    <input class="form-control" name="teacher_avatar" type="file" accept="image/*" id="teacher_avatar" value="" onchange="previewImg(event);">
                </div>
                <div class="preview mt-2">
                    <img id="preview_teacher_img" style="display:none" width="100">
                </div>
              </form>
            </div>
    
            
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="btn_add_teacher" onclick="createTeacher()">Submit</button>
              <button type="button" class="btn btn-success" id="btn_update_teacher" style="display:none" onclick="updateTeacher()">Save</button>
            </div>
          </div>
        </div>
      </div>
 
    
    {{--SHOW Teacher MODAL--}}

    <div class="modal fade " id="show_teacher_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" id="show_teacher_modal_header">
                    <h4 class="modal-title text-white" id="myLargeModalLabel">Teacher Information <i class="fas fa-info-circle"></i> </h4>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </div>
            <div class="modal-body" >
                <div class="row justify-content-center">
                    <div class="card w-100">
                        <div class="card-body">
                            <div id="show_teacher_info">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    {{--END SHOW Teacher MODAL--}}

{{--End TEACHER Modal--}}
@endif

 
@if(url()->current() == route('subject.index'))
{{--Start Subject Modal--}}

    <div class="modal fade" id="subject_modal" tabindex="-1" role="dialog" aria-labelledby="subject_modal_label" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered " role="document">
          <div class="modal-content">
            <div class="modal-header" id="subject_modal_header">
              <h5 class="modal-title text-primary" id="subject_modal_label">{{--Modal Title--}}</h5>
              <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
              </button>
            </div>
            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="subject_div_err" role="alert" style="display:none">
                <ul id="subject_err"></ul>
            </div>
            
            <div class="modal-body">
              <form id="subject_form" autocomplete="off" enctype="multipart/form-data">
                @csrf

               <div class="form-group">
                    <label class='form-label'>Select Grade Level </label>
                    <select class="form-select " name="grade_val" type="text" id="grade_val" > 
                        {{--Display Grade Levels --}}
                    </select>    
                </div> 

                
                <div class="form-group">
                    <label class='form-label'>Subject Name </label>
                    <input class="form-control " name="name" type="text" id="subject_name" >
                </div>
                <div class="form-group">
                    <label class='form-label'>Description </label>
                    <input class="form-control " name="description" type="text" id="subject_description">
                </div>

            
              </form>
            </div>
    
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="btn_add_subject" onclick="createSubject()">Submit</button>
              <button type="button" class="btn btn-success" id="btn_update_subject" style="display:none" onclick="updateSubject()">Save</button>
            </div>
          </div>
        </div>
      </div>


    {{--SHOW Subject MODAL--}}
    
     <div class="modal fade " id="show_subject_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header" id="show_subject_modal_header">
                    <h4 class="modal-title text-white" id="myLargeModalLabel">Subject Information <i class="fas fa-info-circle"></i> </h4>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
              </div>
              <div class="modal-body" >
                  <div class="card">
                      <div class="card-header">
                          <div class="card-body">
                             <div class="row justify-content-center">
                                 <div class="card w-75">
                                     <div class="card-body">
                                        <div id="show_subject_info">
                                    
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
      </div>
      
     {{--END SHOW Subject MODAL--}}

{{--End Subject Modal--}}
@endif


@if(url()->current() == route('academic_year.index'))
{{--Start Accademic Year Modal--}}
    <div class="modal fade" id="accademic_year_modal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="accademic_year_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="accademic_year_modal_header">
            <h5 class="modal-title text-primary" id="accademic_year_modal_label">{{--Modal Title--}}</h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="accademic_year_div_err" role="alert" style="display:none">
                <ul id="accademic_year_err"></ul>
            </div>

            <div class="modal-body">
            <form id="accademic_year_form" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class='form-label'>Add Year *</label>
                    <input class="form-control" name="name" type="text" id="accademic_year" value="" >
                    <span id="accademic_year_err"></span>
                </div>
            </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_accademic_year" onclick="createAY()">Submit</button>
            <button type="button" class="btn btn-success" id="btn_update_accademic_year" style="display:none" onclick="updateAY()">Save</button>
            </div>
        </div>
        </div>
    </div>


{{--End Accademic Year Modal--}}
@endif


@if(url()->current() == route('grade_level.index'))
{{-- Start Grade Level Modal --}}

    <div class="modal fade" id="grade_level_modal" tabindex="-1" role="dialog" aria-labelledby="grade_level_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="grade_level_modal_header">
            <h5 class="modal-title text-primary" id="grade_level_modal_label">{{--Modal Title--}}</h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="grade_level_div_err" role="alert" style="display:none">
                <ul id="grade_level_err"></ul>
            </div>

            <div class="modal-body">
            <form id="grade_level_form" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class='form-label'>Grade Name </label>
                    <input class="form-control" name="name" type="text" id="grade_level_name" value="">
                    <span id="grade_level_name_err"></span>
                </div>
                <div class="form-group">
                    <label class='form-label'>Grade Level </label>
                    <input class="form-control" name="grade_val" type="number" min="0" max="12" id="grade_level_grade_val" value="">
                    <span id="grade_level_name_err"></span>
                </div>
                <div class="form-group">
                    <label class='form-label'>Description </label>
                    <input class="form-control" name="description" type="text" id="grade_level_description" value="">
                    <span id="grade_level_description_err"></span>

                </div>
            </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_grade_level" onclick="createGradeLevel()">Submit</button>
            <button type="button" class="btn btn-success" id="btn_update_grade_level" style="display:none" onclick="updateGradeLevel()">Save</button>
            </div>
        </div>
        </div>
    </div>



     {{--SHOW Grade Level MODAL--}}
    
     <div class="modal fade " id="show_grade_level_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content ">
              <div class="modal-header" id="show_grade_level_modal_header">
                    <h4 class="modal-title text-white" id="myLargeModalLabel">Grade Level Information <i class="fas fa-info-circle"></i> </h4>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
              </div>
              <div class="modal-body" >
                <div class="row justify-content-center">
                    <div class="card w-100">
                        <div class="card-body py-5">
                           <div id="show_grade_level_info">
                               {{--Display Grade Level and its assigned Subject(s)--}}
                           </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      
     {{--END SHOW Subject MODAL--}}


{{-- END Grade Level Modal --}}
@endif


@if(url()->current() == route('section.index'))
{{--Start Section Modal--}}

    <div class="modal fade" id="section_modal" tabindex="-1" role="dialog" aria-labelledby="section_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header" id="section_modal_header">
            <h5 class="modal-title text-primary" id="section_modal_label">{{--Modal Title--}}</h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="section_div_err" role="alert" style="display:none">
                <ul id="section_err"></ul>
            </div>
            
            <div class="modal-body">
            <form id="section_form" autocomplete="off" >
                @csrf
                <div class="form-group">
                    <label class='form-label'>Select Grade Level</label>
                    <select class="form-select" id="section_grade_level" name="grade_level_id">
                        {{--Display all grade levels--}}
                    </select>
                </div>

                <div class="form-group">
                    <label class='form-label'>Section Name </label>
                    <input class="form-control " name="name" type="text" id="section_name" value="">
                </div>
                <div class="form-group">
                    <label class='form-label'>Description </label>
                    <input class="form-control " name="description" type="text" id="section_description" value="">
                </div>
            </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_section" onclick="createSection()">Submit</button>
            <button type="button" class="btn btn-success" id="btn_update_section" style="display:none" onclick="updateSection()">Save</button>
            </div>
        </div>
        </div>
    </div>

    {{--Show Section Modal--}}

    <div class="modal fade " id="show_section_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
          <div class="modal-content ">
              <div class="modal-header" id="show_section_modal_header">
                    <h4 class="modal-title text-white" id="myLargeModalLabel">Section Information <i class="fas fa-info-circle"></i> </h4>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
              </div>
              <div class="modal-body" >
                <div class="row justify-content-center">
                    <div class="card w-100 ">
                        <div class="card-body py-5">
                           <div id="show_section_info">
                               {{--Display Section and its assigned Teachers & Students--}}
                           </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>

    {{--End Section Modal--}}




{{--End Section Modal--}}
@endif


{{-- Start Grading  Modal --}}

    <div class="modal fade" id="grade_modal" tabindex="-1" role="dialog" aria-labelledby="grade_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="grade_modal_header">
            <h5 class="modal-title text-primary" id="grade_modal_label">{{--Modal Title--}}</h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="grade_div_err" role="alert" style="display:none">
                <ul id="grade_err"></ul>
            </div>

            <div class="modal-body">
            <form id="grade_form" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class='form-label'>Select Student</label>
                    <select class="form-select" id="grade_student_id" name="student_id" onchange="grade_display_subjects_by_student_id()">
                        {{--Display all Students --}}
                    </select>
                </div>
                
                <div id="grade_display_subjects">
                    {{--Display all the subjects by student ID --}}
                </div>
            </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_grade" onclick="createGrade()">Submit</button>
            <button type="button" class="btn btn-success" id="btn_update_grade" style="display:none" onclick="updateGrade()">Save</button>
            </div>
        </div>
        </div>
    </div>

 

{{-- END Grading Modal --}}


@if(url()->current() == route('student.index'))
{{--Start Student Modal--}}

  <div class="modal fade" id="student_modal" tabindex="-1" role="dialog" aria-labelledby="student_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header" id="student_modal_header">
          <h5 class="modal-title text-primary" id="student_modal_label">{{--Modal Title--}}</h5>
          <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"
          </button>
        </div>

          {{--Alert--}}
          <div class="alert alert-danger p-3 fade show" id="student_div_err" role="alert" style="display:none">
            <ul id="student_err"></ul>
          </div>

        <div class="modal-body">
          <form id="student_form" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>

                <div class="col-md-4">
                   <div class="form-group">
                       <label class="form-label">LRN *</label>
                       <input class="form-control" name="lrn" min="0" type="number" id="student_lrn">
                       <div class="form-text">Learner Reference Number</div>
                   </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class='form-label'>First Name * </label>
                        <input class="form-control" name="first_name" type="text" id="student_first_name" value="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class='form-label'>Middle Name *</label>
                        <input class="form-control" name="middle_name" type="text" id="student_middle_name" value="">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class='form-label'>Last Name *</label>
                        <input class="form-control" name="last_name" type="text" id="student_last_name" value="">
                    </div>
                </div>
                
            </div>

            <div class="row">
               
                <div class="col-md-4">
                    <div class="form-group">
                        <label class='form-label'>Birth Date *</label>
                        <input class="form-control" name="birth_date" type="date" id="student_birth_date" value=""  max="2015-12-31">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class='form-label'>Gender *</label>
                        <select class="form-select" name="gender" id="student_gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class='form-label'>Section *</label>
                        <select class='form-select' name="section_id" id="student_section_id">
                           
                        </select>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class='form-label'>Nationality *</label>
                        <input class="form-control" type="text" name="nationality" id="student_nationality" value="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class='form-label'>City *</label>
                        <input class="form-control" type="text" name="city" id="student_city" value="">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class='form-label'>Province * </label>
                        <input class="form-control" type="text" name="province" id="student_province" value="">
                    </div>
        
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 mb-1">
                    <div class="form-group">
                        <label class='form-label'>Country *</label>
                        <input class="form-control" type="text" name="country" id="student_country" value="Philippines" placeholder="Philippines" readonly>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label class='form-label'>Address *</label>
                        <input class="form-control" type="text" name="address" id="student_address" value="">
                    </div>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class='form-label'>Contact *</label>
                        <input class="form-control" min="0" type="number" name="contact" id="student_contact" value="">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class='form-label'>Facebook *</label>
                        <input class="form-control" type="text" name="facebook" id="student_facebook" value="">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class='form-label'>Email *</label>
                        <input class="form-control" type="text" name="email" id="student_email" value="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class='form-label'>Avatar *</label>
                        <input class="form-control" name="student_avatar" type="file" accept="image/*" id="student_avatar" value="" onchange="previewImg(event);">
                    </div>
                    <div class="preview mt-1 mb-2">
                        <img id="preview_student_img" style="display:none" width="100" alt="student">
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <label>Requirement *</label>
                    <br>
                    <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">PSA</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">Form 137</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2">
                        <label class="form-check-label" for="inlineCheckbox3">All</label>
                    </div>
                </div>
            </div>
          </form>
        </div>

        
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn_add_student" onclick="createStudent()">Submit</button>
          <button type="button" class="btn btn-success" id="btn_update_student" style="display:none" onclick="updateStudent()">Save</button>
        </div>
      </div>
    </div>
  </div>

  {{--SHOW Student MODAL--}}
    
        <div class="modal fade " id="show_student_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header" id="show_student_modal_header">
                        <h4 class="modal-title text-white" id="myLargeModalLabel">Student Information <i class="fas fa-info-circle"></i> </h4>
                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body" >
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div id="show_student_info">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
  
  {{--END SHOW Student MODAL--}}

{{--End Student Modal--}}
@endif

@if(url()->current() == route('fee.index'))
{{--Start Fee Modal--}}

    <div class="modal fade" id="fee_modal" tabindex="-1" role="dialog" aria-labelledby="fee_modal_label" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header" id="fee_modal_header">
            <h5 class="modal-title text-primary" id="fee_modal_label">{{--Modal Title--}}</h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="fee_div_err" role="alert" style="display:none">
                <ul id="fee_err"></ul>
            </div>

            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="card w-100">
                        <div class="card-body">
                            <form id="fee_form" autocomplete="off" onsubmit="false">
                                @csrf
                                <div class="form-group">
                                    <div class="fee_edit_details">
                                        <h4 class="text-success">Select Grade Level</h4>
                                        <select class="form-select" aria-label="Default select example" name="grade_level_id" id="display_fee_grade_levels" onchange="displaySubFeeByGradeLevelID()">
                                        </select>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <i class="fas fa-plus-circle float-end mt-3 text-info fa-lg add_sub_fee" onclick="add_extra_sub_fee(event)" role="button"></i> <br><br>
                                </div>
                                <div id="add_sub_fees">
                                    <div class="row p-2" >
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="fee_description">Fee Type</label>
                                                <input class="form-control" type="text"  name="fee_description[]">
                                            </div>
                                        </div>
        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="amount">Amount</label>
                                                <input class="form-control" min="0" type="number"  name="fee_amount[]" oninput="validity.valid||(value='');">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-hover">
                                <thead style="background: none">
                                    <tr>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="display_sub_fee">
                                    {{-- Display Sub Fees --}}
                                </tbody>
                            </table>
                            <br>
                            <br>
                            <div class="row p-2">
                                <div class="col-md-6">Total Fee</div>
                                <div class="col-md-6" id="display_total_sub_fees">
                                    {{--Display Total Sub Fees--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_fee" onclick="addFee()">Save</button>
            <button type="button" class="btn btn-success" id="btn_update_fee" style="display:none" onclick="addFee()">Update</button>
            </div>
        </div>
        </div>
    </div>

{{--End Fee Modal--}}
@endif

@if(url()->current() == route('studentfee.index'))
{{--Start Student Enrolment Fee Modal--}}

  <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="student_fee_modal" tabindex="-1" role="dialog" aria-labelledby="subject_fee_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header" id="student_fee_modal_header">
            <h5 class="modal-title text-primary" id="student_fee_modal_label">{{--Modal Title--}}</h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="student_fee_div_err" role="alert" style="display:none">
                <ul id="subject_fee_err"></ul>
            </div>
            
            <div class="modal-body">
            <form id="student_fee_form" autocomplete="off" enctype="multipart/form-data">
                @csrf
                {{--LEGEND--}}
                
                <div class="legend border border-light border-2 p-4">
                    {{-- <h5 class="mt-2 text-muted">LEGEND</h5> --}}
                    <div class="boxes">
                            <div class="box-00 me-2"></div>
                            <div class="me-2">
                                <h5 class="text-muted">inactive</h5>
                            </div>

                            <div class="box-11 me-2"></div>
                            <div class="me-2">
                                <h5 class="text-muted">active</h5>
                            </div>
                        
                            <div class="box-22 me-2"></div>
                            <div>
                                <h5 class="text-muted">fully paid</h5>
                            </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-2">
                            <label class='form-label'>Select Student</label><br>
                            <select class="" id="student_fee_student_id" name="student_fee_student_id" onchange="student_fee_display_grade_level_by_student_id()" style="width:100%">
                                {{--Display all student--}}
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label class='form-label'>Grade Level</label>
                            {{-- If the user selected the student it will automatically populate its grade level (by grade_level_id) in this input--}}
                            <input class="form-control d-none" name="student_fee_grade_level_id" type="text" id="student_fee_grade_level_id" value="" readonly>
                            <input class="form-control" id="student_fee_grade_level_val" type="text" readonly>
                        </div>

                    </div>
                    <div class="col-6">
                        <center>
                            <div id="student_fee_display_student_avatar">
                                {{--Display Selected Student's Avatar--}}
                            </div>
                        </center>
                    </div>
                </div>
               
             
                <div class="form-group mb-2">
                    <label class='form-label'>Add Discount <small class="text-muted">(Optional)</small> </label>
                    <select class="form-select" id="student_fee_discount" name="student_fee_discount" onchange="student_fee_display_discounted_fee_by_student_id()" aria-describedby="discountHelp">
                       <option></option>
                       <option value="0.01">1%</option>
                            <option value="0.011">1.1%</option>
                            <option value="0.012">1.2%</option>
                            <option value="0.013">1.3%</option>
                            <option value="0.014">1.4%</option>
                            <option value="0.015">1.5%</option>
                            <option value="0.016">1.6%</option>
                            <option value="0.017">1.7%</option>
                            <option value="0.018">1.8%</option>
                            <option value="0.019">1.9%</option>

                            <option value="0.02">2%</option>
                            <option value="0.021">2.1%</option>
                            <option value="0.022">2.2%</option>
                            <option value="0.023">2.3%</option>
                            <option value="0.024">2.4%</option>
                            <option value="0.025">2.5%</option>
                            <option value="0.026">2.6%</option>
                            <option value="0.027">2.7%</option>
                            <option value="0.028">2.8%</option>
                            <option value="0.029">2.9%</option>

                            <option value="0.03">3%</option>
                            <option value="0.031">3.1%</option>
                            <option value="0.032">3.2%</option>
                            <option value="0.033">3.3%</option>
                            <option value="0.034">3.4%</option>
                            <option value="0.035">3.5%</option>
                            <option value="0.036">3.6%</option>
                            <option value="0.037">3.7%</option>
                            <option value="0.038">3.8%</option>
                            <option value="0.039">3.9%</option>

                            <option value="0.04">4%</option>
                            <option value="0.041">4.1%</option>
                            <option value="0.042">4.2%</option>
                            <option value="0.043">4.3%</option>
                            <option value="0.044">4.4%</option>
                            <option value="0.045">4.5%</option>
                            <option value="0.046">4.6%</option>
                            <option value="0.047">4.7%</option>
                            <option value="0.048">4.8%</option>
                            <option value="0.049">4.9%</option>

                            <option value="0.05">5%</option>
                            <option value="0.051">5.1%</option>
                            <option value="0.052">5.2%</option>
                            <option value="0.053">5.3%</option>
                            <option value="0.054">5.4%</option>
                            <option value="0.055">5.5%</option>
                            <option value="0.056">5.6%</option>
                            <option value="0.057">5.7%</option>
                            <option value="0.058">5.8%</option>
                            <option value="0.059">5.9%</option>

                            <option value="0.06">6%</option>
                            <option value="0.061">6.1%</option>
                            <option value="0.062">6.2%</option>
                            <option value="0.063">6.3%</option>
                            <option value="0.064">6.4%</option>
                            <option value="0.065">6.5%</option>
                            <option value="0.066">6.6%</option>
                            <option value="0.067">6.7%</option>
                            <option value="0.068">6.8%</option>
                            <option value="0.069">6.9%</option>

                            <option value="0.07">7%</option>
                            <option value="0.071">7.1%</option>
                            <option value="0.072">7.2%</option>
                            <option value="0.073">7.3%</option>
                            <option value="0.074">7.4%</option>
                            <option value="0.075">7.5%</option>
                            <option value="0.076">7.6%</option>
                            <option value="0.077">7.7%</option>
                            <option value="0.078">7.8%</option>
                            <option value="0.079">7.9%</option>

                            <option value="0.08">8%</option>
                            <option value="0.081">8.1%</option>
                            <option value="0.082">8.2%</option>
                            <option value="0.083">8.3%</option>
                            <option value="0.084">8.4%</option>
                            <option value="0.085">8.5%</option>
                            <option value="0.086">8.6%</option>
                            <option value="0.087">8.7%</option>
                            <option value="0.088">8.8%</option>
                            <option value="0.089">8.9%</option>

                            <option value="0.09">9%</option>
                            <option value="0.091">9.1%</option>
                            <option value="0.092">9.2%</option>
                            <option value="0.093">9.3%</option>
                            <option value="0.094">9.4%</option>
                            <option value="0.095">9.5%</option>
                            <option value="0.096">9.6%</option>
                            <option value="0.097">9.7%</option>
                            <option value="0.098">9.8%</option>
                            <option value="0.099">9.9%</option>

                            <option value="0.10">10%</option>
                            <option value="0.101">10.1%</option>
                            <option value="0.102">10.2%</option>
                            <option value="0.103">10.3%</option>
                            <option value="0.104">10.4%</option>
                            <option value="0.105">10.5%</option>
                            <option value="0.106">10.6%</option>
                            <option value="0.107">10.7%</option>
                            <option value="0.108">10.8%</option>
                            <option value="0.109">10.9%</option>

                            <option value="0.11">11%</option>
                            <option value="0.111">11.1%</option>
                            <option value="0.112">11.2%</option>
                            <option value="0.113">11.3%</option>
                            <option value="0.114">11.4%</option>
                            <option value="0.115">11.5%</option>
                            <option value="0.116">11.6%</option>
                            <option value="0.117">11.7%</option>
                            <option value="0.118">11.8%</option>
                            <option value="0.119">11.9%</option>

                            <option value="0.12">12%</option>
                            <option value="0.121">12.1%</option>
                            <option value="0.122">12.2%</option>
                            <option value="0.123">12.3%</option>
                            <option value="0.124">12.4%</option>
                            <option value="0.125">12.5%</option>
                            <option value="0.126">12.6%</option>
                            <option value="0.127">12.7%</option>
                            <option value="0.128">12.8%</option>
                            <option value="0.129">12.9%</option>

                            <option value="0.13">13%</option>
                            <option value="0.131">13.1%</option>
                            <option value="0.132">13.2%</option>
                            <option value="0.133">13.3%</option>
                            <option value="0.134">13.4%</option>
                            <option value="0.135">13.5%</option>
                            <option value="0.136">13.6%</option>
                            <option value="0.137">13.7%</option>
                            <option value="0.138">13.8%</option>
                            <option value="0.139">13.9%</option>

                            <option value="0.14">14%</option>
                            <option value="0.141">14.1%</option>
                            <option value="0.142">14.2%</option>
                            <option value="0.143">14.3%</option>
                            <option value="0.144">14.4%</option>
                            <option value="0.145">14.5%</option>
                            <option value="0.146">14.6%</option>
                            <option value="0.147">14.7%</option>
                            <option value="0.148">14.8%</option>
                            <option value="0.149">14.9%</option>

                            <option value="0.15">15%</option>
                            <option value="0.151">15.1%</option>
                            <option value="0.152">15.2%</option>
                            <option value="0.153">15.3%</option>
                            <option value="0.154">15.4%</option>
                            <option value="0.155">15.5%</option>
                            <option value="0.156">15.6%</option>
                            <option value="0.157">15.7%</option>
                            <option value="0.158">15.8%</option>
                            <option value="0.159">15.9%</option>

                            <option value="0.16">16%</option>
                            <option value="0.161">16.1%</option>
                            <option value="0.162">16.2%</option>
                            <option value="0.163">16.3%</option>
                            <option value="0.164">16.4%</option>
                            <option value="0.165">16.5%</option>
                            <option value="0.166">16.6%</option>
                            <option value="0.167">16.7%</option>
                            <option value="0.168">16.8%</option>
                            <option value="0.169">16.9%</option>

                            <option value="0.17">17%</option>
                            <option value="0.171">17.1%</option>
                            <option value="0.172">17.2%</option>
                            <option value="0.173">17.3%</option>
                            <option value="0.174">17.4%</option>
                            <option value="0.175">17.5%</option>
                            <option value="0.176">17.6%</option>
                            <option value="0.177">17.7%</option>
                            <option value="0.178">17.8%</option>
                            <option value="0.179">17.9%</option>

                            <option value="0.18">18%</option>
                            <option value="0.181">18.1%</option>
                            <option value="0.182">18.2%</option>
                            <option value="0.183">18.3%</option>
                            <option value="0.184">18.4%</option>
                            <option value="0.185">18.5%</option>
                            <option value="0.186">18.6%</option>
                            <option value="0.187">18.7%</option>
                            <option value="0.188">18.8%</option>
                            <option value="0.189">18.9%</option>

                            <option value="0.19">19%</option>
                            <option value="0.191">19.1%</option>
                            <option value="0.192">19.2%</option>
                            <option value="0.193">19.3%</option>
                            <option value="0.194">19.4%</option>
                            <option value="0.195">19.5%</option>
                            <option value="0.196">19.6%</option>
                            <option value="0.197">19.7%</option>
                            <option value="0.198">19.8%</option>
                            <option value="0.199">19.9%</option>

                            <option value="0.20">20%</option>
                            <option value="0.201">20.1%</option>
                            <option value="0.202">20.2%</option>
                            <option value="0.203">20.3%</option>
                            <option value="0.204">20.4%</option>
                            <option value="0.205">20.5%</option>
                            <option value="0.206">20.6%</option>
                            <option value="0.207">20.7%</option>
                            <option value="0.208">20.8%</option>
                            <option value="0.209">20.9%</option>

                            <option value="0.21">21%</option>
                            <option value="0.211">21.1%</option>
                            <option value="0.212">21.2%</option>
                            <option value="0.213">21.3%</option>
                            <option value="0.214">21.4%</option>
                            <option value="0.215">21.5%</option>
                            <option value="0.216">21.6%</option>
                            <option value="0.217">21.7%</option>
                            <option value="0.218">21.8%</option>
                            <option value="0.219">21.9%</option>

                            <option value="0.22">22%</option>
                            <option value="0.221">22.1%</option>
                            <option value="0.222">22.2%</option>
                            <option value="0.223">22.3%</option>
                            <option value="0.224">22.4%</option>
                            <option value="0.225">22.5%</option>
                            <option value="0.226">22.6%</option>
                            <option value="0.227">22.7%</option>
                            <option value="0.228">22.8%</option>
                            <option value="0.229">22.9%</option>

                            <option value="0.23">23%</option>
                            <option value="0.231">23.1%</option>
                            <option value="0.232">23.2%</option>
                            <option value="0.233">23.3%</option>
                            <option value="0.234">23.4%</option>
                            <option value="0.235">23.5%</option>
                            <option value="0.236">23.6%</option>
                            <option value="0.237">23.7%</option>
                            <option value="0.238">23.8%</option>
                            <option value="0.239">23.9%</option>

                            <option value="0.24">24%</option>
                            <option value="0.241">24.1%</option>
                            <option value="0.242">24.2%</option>
                            <option value="0.243">24.3%</option>
                            <option value="0.244">24.4%</option>
                            <option value="0.245">24.5%</option>
                            <option value="0.246">24.6%</option>
                            <option value="0.247">24.7%</option>
                            <option value="0.248">24.8%</option>
                            <option value="0.249">24.9%</option>

                            <option value="0.25">25%</option>
                            <option value="0.251">25.1%</option>
                            <option value="0.252">25.2%</option>
                            <option value="0.253">25.3%</option>
                            <option value="0.254">25.4%</option>
                            <option value="0.255">25.5%</option>
                            <option value="0.256">25.6%</option>
                            <option value="0.257">25.7%</option>
                            <option value="0.258">25.8%</option>
                            <option value="0.259">25.9%</option>

                            <option value="0.26">26%</option>
                            <option value="0.261">26.1%</option>
                            <option value="0.262">26.2%</option>
                            <option value="0.263">26.3%</option>
                            <option value="0.264">26.4%</option>
                            <option value="0.265">26.5%</option>
                            <option value="0.266">26.6%</option>
                            <option value="0.267">26.7%</option>
                            <option value="0.268">26.8%</option>
                            <option value="0.269">26.9%</option>

                            <option value="0.27">27%</option>
                            <option value="0.271">27.1%</option>
                            <option value="0.272">27.2%</option>
                            <option value="0.273">27.3%</option>
                            <option value="0.274">27.4%</option>
                            <option value="0.275">27.5%</option>
                            <option value="0.276">27.6%</option>
                            <option value="0.277">27.7%</option>
                            <option value="0.278">27.8%</option>
                            <option value="0.279">27.9%</option>

                            <option value="0.28">28%</option>
                            <option value="0.281">28.1%</option>
                            <option value="0.282">28.2%</option>
                            <option value="0.283">28.3%</option>
                            <option value="0.284">28.4%</option>
                            <option value="0.285">28.5%</option>
                            <option value="0.286">28.6%</option>
                            <option value="0.287">28.7%</option>
                            <option value="0.288">28.8%</option>
                            <option value="0.289">28.9%</option>

                            <option value="0.29">29%</option>
                            <option value="0.291">29.1%</option>
                            <option value="0.292">29.2%</option>
                            <option value="0.293">29.3%</option>
                            <option value="0.294">29.4%</option>
                            <option value="0.295">29.5%</option>
                            <option value="0.296">29.6%</option>
                            <option value="0.297">29.7%</option>
                            <option value="0.298">29.8%</option>
                            <option value="0.299">29.9%</option>

                            <option value="0.30">30%</option>
                            <option value="0.301">30.1%</option>
                            <option value="0.302">30.2%</option>
                            <option value="0.303">30.3%</option>
                            <option value="0.304">30.4%</option>
                            <option value="0.305">30.5%</option>
                            <option value="0.306">30.6%</option>
                            <option value="0.307">30.7%</option>
                            <option value="0.308">30.8%</option>
                            <option value="0.309">30.9%</option>

                            <option value="0.31">31%</option>
                            <option value="0.311">31.1%</option>
                            <option value="0.312">31.2%</option>
                            <option value="0.313">31.3%</option>
                            <option value="0.314">31.4%</option>
                            <option value="0.315">31.5%</option>
                            <option value="0.316">31.6%</option>
                            <option value="0.317">31.7%</option>
                            <option value="0.318">31.8%</option>
                            <option value="0.319">31.9%</option>

                            <option value="0.32">32%</option>
                            <option value="0.321">32.1%</option>
                            <option value="0.322">32.2%</option>
                            <option value="0.323">32.3%</option>
                            <option value="0.324">32.4%</option>
                            <option value="0.325">32.5%</option>
                            <option value="0.326">32.6%</option>
                            <option value="0.327">32.7%</option>
                            <option value="0.328">32.8%</option>
                            <option value="0.329">32.9%</option>

                            <option value="0.33">33%</option>
                            <option value="0.331">33.1%</option>
                            <option value="0.332">33.2%</option>
                            <option value="0.333">33.3%</option>
                            <option value="0.334">33.4%</option>
                            <option value="0.335">33.5%</option>
                            <option value="0.336">33.6%</option>
                            <option value="0.337">33.7%</option>
                            <option value="0.338">33.8%</option>
                            <option value="0.339">33.9%</option>

                            <option value="0.34">34%</option>
                            <option value="0.341">34.1%</option>
                            <option value="0.342">34.2%</option>
                            <option value="0.343">34.3%</option>
                            <option value="0.344">34.4%</option>
                            <option value="0.345">34.5%</option>
                            <option value="0.346">34.6%</option>
                            <option value="0.347">34.7%</option>
                            <option value="0.348">34.8%</option>
                            <option value="0.349">34.9%</option>

                            <option value="0.35">35%</option>
                            <option value="0.351">35.1%</option>
                            <option value="0.352">35.2%</option>
                            <option value="0.353">35.3%</option>
                            <option value="0.354">35.4%</option>
                            <option value="0.355">35.5%</option>
                            <option value="0.356">35.6%</option>
                            <option value="0.357">35.7%</option>
                            <option value="0.358">35.8%</option>
                            <option value="0.359">35.9%</option>

                            <option value="0.36">36%</option>
                            <option value="0.361">36.1%</option>
                            <option value="0.362">36.2%</option>
                            <option value="0.363">36.3%</option>
                            <option value="0.364">36.4%</option>
                            <option value="0.365">36.5%</option>
                            <option value="0.366">36.6%</option>
                            <option value="0.367">36.7%</option>
                            <option value="0.368">36.8%</option>
                            <option value="0.369">36.9%</option>

                            <option value="0.37">37%</option>
                            <option value="0.371">37.1%</option>
                            <option value="0.372">37.2%</option>
                            <option value="0.373">37.3%</option>
                            <option value="0.374">37.4%</option>
                            <option value="0.375">37.5%</option>
                            <option value="0.376">37.6%</option>
                            <option value="0.377">37.7%</option>
                            <option value="0.378">37.8%</option>
                            <option value="0.379">37.9%</option>

                            <option value="0.38">38%</option>
                            <option value="0.381">38.1%</option>
                            <option value="0.382">38.2%</option>
                            <option value="0.383">38.3%</option>
                            <option value="0.384">38.4%</option>
                            <option value="0.385">38.5%</option>
                            <option value="0.386">38.6%</option>
                            <option value="0.387">38.7%</option>
                            <option value="0.388">38.8%</option>
                            <option value="0.389">38.9%</option>

                            <option value="0.39">39%</option>
                            <option value="0.391">39.1%</option>
                            <option value="0.392">39.2%</option>
                            <option value="0.393">39.3%</option>
                            <option value="0.394">39.4%</option>
                            <option value="0.395">39.5%</option>
                            <option value="0.396">39.6%</option>
                            <option value="0.397">39.7%</option>
                            <option value="0.398">39.8%</option>
                            <option value="0.399">39.9%</option>

                            <option value="0.40">40%</option>
                            <option value="0.401">40.1%</option>
                            <option value="0.402">40.2%</option>
                            <option value="0.403">40.3%</option>
                            <option value="0.404">40.4%</option>
                            <option value="0.405">40.5%</option>
                            <option value="0.406">40.6%</option>
                            <option value="0.407">40.7%</option>
                            <option value="0.408">40.8%</option>
                            <option value="0.409">40.9%</option>

                            <option value="0.50">50%</option>
                            <option value="0.501">50.1%</option>
                            <option value="0.502">50.2%</option>
                            <option value="0.503">50.3%</option>
                            <option value="0.504">50.4%</option>
                            <option value="0.505">50.5%</option>
                            <option value="0.506">50.6%</option>
                            <option value="0.507">50.7%</option>
                            <option value="0.508">50.8%</option>
                            <option value="0.509">50.9%</option>

                            <option value="0.60">60%</option>
                            <option value="0.601">60.1%</option>
                            <option value="0.602">60.2%</option>
                            <option value="0.603">60.3%</option>
                            <option value="0.604">60.4%</option>
                            <option value="0.605">60.5%</option>
                            <option value="0.606">60.6%</option>
                            <option value="0.607">60.7%</option>
                            <option value="0.608">60.8%</option>
                            <option value="0.609">60.9%</option>

                            <option value="0.61">61%</option>
                            <option value="0.611">61.1%</option>
                            <option value="0.612">61.2%</option>
                            <option value="0.613">61.3%</option>
                            <option value="0.614">61.4%</option>
                            <option value="0.615">61.5%</option>
                            <option value="0.616">61.6%</option>
                            <option value="0.617">61.7%</option>
                            <option value="0.618">61.8%</option>
                            <option value="0.619">61.9%</option>

                            <option value="0.62">62%</option>
                            <option value="0.621">62.1%</option>
                            <option value="0.622">62.2%</option>
                            <option value="0.623">62.3%</option>
                            <option value="0.624">62.4%</option>
                            <option value="0.625">62.5%</option>
                            <option value="0.626">62.6%</option>
                            <option value="0.627">62.7%</option>
                            <option value="0.628">62.8%</option>
                            <option value="0.629">62.9%</option>

                            <option value="0.63">63%</option>
                            <option value="0.631">63.1%</option>
                            <option value="0.632">63.2%</option>
                            <option value="0.633">63.3%</option>
                            <option value="0.634">63.4%</option>
                            <option value="0.635">63.5%</option>
                            <option value="0.636">63.6%</option>
                            <option value="0.637">63.7%</option>
                            <option value="0.638">63.8%</option>
                            <option value="0.639">63.9%</option>

                            <option value="0.64">64%</option>
                            <option value="0.641">64.1%</option>
                            <option value="0.642">64.2%</option>
                            <option value="0.643">64.3%</option>
                            <option value="0.644">64.4%</option>
                            <option value="0.645">64.5%</option>
                            <option value="0.646">64.6%</option>
                            <option value="0.647">64.7%</option>
                            <option value="0.648">64.8%</option>
                            <option value="0.649">64.9%</option>

                            <option value="0.65">65%</option>
                            <option value="0.651">65.1%</option>
                            <option value="0.652">65.2%</option>
                            <option value="0.653">65.3%</option>
                            <option value="0.654">65.4%</option>
                            <option value="0.655">65.5%</option>
                            <option value="0.656">65.6%</option>
                            <option value="0.657">65.7%</option>
                            <option value="0.658">65.8%</option>
                            <option value="0.659">65.9%</option>

                            <option value="0.66">66%</option>
                            <option value="0.661">66.1%</option>
                            <option value="0.662">66.2%</option>
                            <option value="0.663">66.3%</option>
                            <option value="0.664">66.4%</option>
                            <option value="0.665">66.5%</option>
                            <option value="0.666">66.6%</option>
                            <option value="0.667">66.7%</option>
                            <option value="0.668">66.8%</option>
                            <option value="0.669">66.9%</option>

                            <option value="0.67">67%</option>
                            <option value="0.671">67.1%</option>
                            <option value="0.672">67.2%</option>
                            <option value="0.673">67.3%</option>
                            <option value="0.674">67.4%</option>
                            <option value="0.675">67.5%</option>
                            <option value="0.676">67.6%</option>
                            <option value="0.677">67.7%</option>
                            <option value="0.678">67.8%</option>
                            <option value="0.679">67.9%</option>

                            <option value="0.68">68%</option>
                            <option value="0.681">68.1%</option>
                            <option value="0.682">68.2%</option>
                            <option value="0.683">68.3%</option>
                            <option value="0.684">68.4%</option>
                            <option value="0.685">68.5%</option>
                            <option value="0.686">68.6%</option>
                            <option value="0.687">68.7%</option>
                            <option value="0.688">68.8%</option>
                            <option value="0.689">68.9%</option>

                            <option value="0.69">69%</option>
                            <option value="0.691">69.1%</option>
                            <option value="0.692">69.2%</option>
                            <option value="0.693">69.3%</option>
                            <option value="0.694">69.4%</option>
                            <option value="0.695">69.5%</option>
                            <option value="0.696">69.6%</option>
                            <option value="0.697">69.7%</option>
                            <option value="0.698">69.8%</option>
                            <option value="0.699">69.9%</option>

                            <option value="0.70">70%</option>
                            <option value="0.701">70.1%</option>
                            <option value="0.702">70.2%</option>
                            <option value="0.703">70.3%</option>
                            <option value="0.704">70.4%</option>
                            <option value="0.705">70.5%</option>
                            <option value="0.706">70.6%</option>
                            <option value="0.707">70.7%</option>
                            <option value="0.708">70.8%</option>
                            <option value="0.709">70.9%</option>

                            <option value="0.71">71%</option>
                            <option value="0.711">71.1%</option>
                            <option value="0.712">71.2%</option>
                            <option value="0.713">71.3%</option>
                            <option value="0.714">71.4%</option>
                            <option value="0.715">71.5%</option>
                            <option value="0.716">71.6%</option>
                            <option value="0.717">71.7%</option>
                            <option value="0.718">71.8%</option>
                            <option value="0.719">71.9%</option>

                            <option value="0.72">72%</option>
                            <option value="0.721">72.1%</option>
                            <option value="0.722">72.2%</option>
                            <option value="0.723">72.3%</option>
                            <option value="0.724">72.4%</option>
                            <option value="0.725">72.5%</option>
                            <option value="0.726">72.6%</option>
                            <option value="0.727">72.7%</option>
                            <option value="0.728">72.8%</option>
                            <option value="0.729">72.9%</option>

                            <option value="0.73">73%</option>
                            <option value="0.731">73.1%</option>
                            <option value="0.732">73.2%</option>
                            <option value="0.733">73.3%</option>
                            <option value="0.734">73.4%</option>
                            <option value="0.735">73.5%</option>
                            <option value="0.736">73.6%</option>
                            <option value="0.737">73.7%</option>
                            <option value="0.738">73.8%</option>
                            <option value="0.739">73.9%</option>

                            <option value="0.74">74%</option>
                            <option value="0.741">74.1%</option>
                            <option value="0.742">74.2%</option>
                            <option value="0.743">74.3%</option>
                            <option value="0.744">74.4%</option>
                            <option value="0.745">74.5%</option>
                            <option value="0.746">74.6%</option>
                            <option value="0.747">74.7%</option>
                            <option value="0.748">74.8%</option>
                            <option value="0.749">74.9%</option>

                            <option value="0.75">75%</option>
                            <option value="0.751">75.1%</option>
                            <option value="0.752">75.2%</option>
                            <option value="0.753">75.3%</option>
                            <option value="0.754">75.4%</option>
                            <option value="0.755">75.5%</option>
                            <option value="0.756">75.6%</option>
                            <option value="0.757">75.7%</option>
                            <option value="0.758">75.8%</option>
                            <option value="0.759">75.9%</option>

                            <option value="0.76">76%</option>
                            <option value="0.761">76.1%</option>
                            <option value="0.762">76.2%</option>
                            <option value="0.763">76.3%</option>
                            <option value="0.764">76.4%</option>
                            <option value="0.765">76.5%</option>
                            <option value="0.766">76.6%</option>
                            <option value="0.767">76.7%</option>
                            <option value="0.768">76.8%</option>
                            <option value="0.769">76.9%</option>

                            <option value="0.77">77%</option>
                            <option value="0.771">77.1%</option>
                            <option value="0.772">77.2%</option>
                            <option value="0.773">77.3%</option>
                            <option value="0.774">77.4%</option>
                            <option value="0.775">77.5%</option>
                            <option value="0.776">77.6%</option>
                            <option value="0.777">77.7%</option>
                            <option value="0.778">77.8%</option>
                            <option value="0.779">77.9%</option>

                            <option value="0.78">78%</option>
                            <option value="0.781">78.1%</option>
                            <option value="0.782">78.2%</option>
                            <option value="0.783">78.3%</option>
                            <option value="0.784">78.4%</option>
                            <option value="0.785">78.5%</option>
                            <option value="0.786">78.6%</option>
                            <option value="0.787">78.7%</option>
                            <option value="0.788">78.8%</option>
                            <option value="0.789">78.9%</option>

                            <option value="0.79">79%</option>
                            <option value="0.791">79.1%</option>
                            <option value="0.792">79.2%</option>
                            <option value="0.793">79.3%</option>
                            <option value="0.794">79.4%</option>
                            <option value="0.795">79.5%</option>
                            <option value="0.796">79.6%</option>
                            <option value="0.797">79.7%</option>
                            <option value="0.798">79.8%</option>
                            <option value="0.799">79.9%</option>

                            <option value="0.80">80%</option>
                            <option value="0.801">80.1%</option>
                            <option value="0.802">80.2%</option>
                            <option value="0.803">80.3%</option>
                            <option value="0.804">80.4%</option>
                            <option value="0.805">80.5%</option>
                            <option value="0.806">80.6%</option>
                            <option value="0.807">80.7%</option>
                            <option value="0.808">80.8%</option>
                            <option value="0.809">80.9%</option>

                            <option value="0.81">81%</option>
                            <option value="0.811">81.1%</option>
                            <option value="0.812">81.2%</option>
                            <option value="0.813">81.3%</option>
                            <option value="0.814">81.4%</option>
                            <option value="0.815">81.5%</option>
                            <option value="0.816">81.6%</option>
                            <option value="0.817">81.7%</option>
                            <option value="0.818">81.8%</option>
                            <option value="0.819">81.9%</option>

                            <option value="0.82">82%</option>
                            <option value="0.821">82.1%</option>
                            <option value="0.822">82.2%</option>
                            <option value="0.823">82.3%</option>
                            <option value="0.824">82.4%</option>
                            <option value="0.825">82.5%</option>
                            <option value="0.826">82.6%</option>
                            <option value="0.827">82.7%</option>
                            <option value="0.828">82.8%</option>
                            <option value="0.829">82.9%</option>

                            <option value="0.83">83%</option>
                            <option value="0.831">83.1%</option>
                            <option value="0.832">83.2%</option>
                            <option value="0.833">83.3%</option>
                            <option value="0.834">83.4%</option>
                            <option value="0.835">83.5%</option>
                            <option value="0.836">83.6%</option>
                            <option value="0.837">83.7%</option>
                            <option value="0.838">83.8%</option>
                            <option value="0.839">83.9%</option>

                            <option value="0.84">84%</option>
                            <option value="0.841">84.1%</option>
                            <option value="0.842">84.2%</option>
                            <option value="0.843">84.3%</option>
                            <option value="0.844">84.4%</option>
                            <option value="0.845">84.5%</option>
                            <option value="0.846">84.6%</option>
                            <option value="0.847">84.7%</option>
                            <option value="0.848">84.8%</option>
                            <option value="0.849">84.9%</option>

                            <option value="0.85">85%</option>
                            <option value="0.851">85.1%</option>
                            <option value="0.852">85.2%</option>
                            <option value="0.853">85.3%</option>
                            <option value="0.854">85.4%</option>
                            <option value="0.855">85.5%</option>
                            <option value="0.856">85.6%</option>
                            <option value="0.857">85.7%</option>
                            <option value="0.858">85.8%</option>
                            <option value="0.859">85.9%</option>

                            <option value="0.86">86%</option>
                            <option value="0.861">86.1%</option>
                            <option value="0.862">86.2%</option>
                            <option value="0.863">86.3%</option>
                            <option value="0.864">86.4%</option>
                            <option value="0.865">86.5%</option>
                            <option value="0.866">86.6%</option>
                            <option value="0.867">86.7%</option>
                            <option value="0.868">86.8%</option>
                            <option value="0.869">86.9%</option>

                            <option value="0.87">87%</option>
                            <option value="0.871">87.1%</option>
                            <option value="0.872">87.2%</option>
                            <option value="0.873">87.3%</option>
                            <option value="0.874">87.4%</option>
                            <option value="0.875">87.5%</option>
                            <option value="0.876">87.6%</option>
                            <option value="0.877">87.7%</option>
                            <option value="0.878">87.8%</option>
                            <option value="0.879">87.9%</option>

                            <option value="0.88">88%</option>
                            <option value="0.881">88.1%</option>
                            <option value="0.882">88.2%</option>
                            <option value="0.883">88.3%</option>
                            <option value="0.884">88.4%</option>
                            <option value="0.885">88.5%</option>
                            <option value="0.886">88.6%</option>
                            <option value="0.887">88.7%</option>
                            <option value="0.888">88.8%</option>
                            <option value="0.889">88.9%</option>

                            <option value="0.89">89%</option>
                            <option value="0.891">89.1%</option>
                            <option value="0.892">89.2%</option>
                            <option value="0.893">89.3%</option>
                            <option value="0.894">89.4%</option>
                            <option value="0.895">89.5%</option>
                            <option value="0.896">89.6%</option>
                            <option value="0.897">89.7%</option>
                            <option value="0.898">89.8%</option>
                            <option value="0.899">89.9%</option>

                            <option value="0.90">90%</option>
                            <option value="0.901">90.1%</option>
                            <option value="0.902">90.2%</option>
                            <option value="0.903">90.3%</option>
                            <option value="0.904">90.4%</option>
                            <option value="0.905">90.5%</option>
                            <option value="0.906">90.6%</option>
                            <option value="0.907">90.7%</option>
                            <option value="0.908">90.8%</option>
                            <option value="0.909">90.9%</option>

                            <option value="0.91">91%</option>
                            <option value="0.911">91.1%</option>
                            <option value="0.912">91.2%</option>
                            <option value="0.913">91.3%</option>
                            <option value="0.914">91.4%</option>
                            <option value="0.915">91.5%</option>
                            <option value="0.916">91.6%</option>
                            <option value="0.917">91.7%</option>
                            <option value="0.918">91.8%</option>
                            <option value="0.919">91.9%</option>

                            <option value="0.92">92%</option>
                            <option value="0.921">92.1%</option>
                            <option value="0.922">92.2%</option>
                            <option value="0.923">92.3%</option>
                            <option value="0.924">92.4%</option>
                            <option value="0.925">92.5%</option>
                            <option value="0.926">92.6%</option>
                            <option value="0.927">92.7%</option>
                            <option value="0.928">92.8%</option>
                            <option value="0.929">92.9%</option>

                            <option value="0.93">93%</option>
                            <option value="0.931">93.1%</option>
                            <option value="0.932">93.2%</option>
                            <option value="0.933">93.3%</option>
                            <option value="0.934">93.4%</option>
                            <option value="0.935">93.5%</option>
                            <option value="0.936">93.6%</option>
                            <option value="0.937">93.7%</option>
                            <option value="0.938">93.8%</option>
                            <option value="0.939">93.9%</option>

                            <option value="0.94">94%</option>
                            <option value="0.941">94.1%</option>
                            <option value="0.942">94.2%</option>
                            <option value="0.943">94.3%</option>
                            <option value="0.944">94.4%</option>
                            <option value="0.945">94.5%</option>
                            <option value="0.946">94.6%</option>
                            <option value="0.947">94.7%</option>
                            <option value="0.948">94.8%</option>
                            <option value="0.949">94.9%</option>

                            <option value="0.95">95%</option>
                            <option value="0.951">95.1%</option>
                            <option value="0.952">95.2%</option>
                            <option value="0.953">95.3%</option>
                            <option value="0.954">95.4%</option>
                            <option value="0.955">95.5%</option>
                            <option value="0.956">95.6%</option>
                            <option value="0.957">95.7%</option>
                            <option value="0.958">95.8%</option>
                            <option value="0.959">95.9%</option>

                            <option value="0.96">96%</option>
                            <option value="0.961">96.1%</option>
                            <option value="0.962">96.2%</option>
                            <option value="0.963">96.3%</option>
                            <option value="0.964">96.4%</option>
                            <option value="0.965">96.5%</option>
                            <option value="0.966">96.6%</option>
                            <option value="0.967">96.7%</option>
                            <option value="0.968">96.8%</option>
                            <option value="0.969">96.9%</option>

                            <option value="0.97">97%</option>
                            <option value="0.971">97.1%</option>
                            <option value="0.972">97.2%</option>
                            <option value="0.973">97.3%</option>
                            <option value="0.974">97.4%</option>
                            <option value="0.975">97.5%</option>
                            <option value="0.976">97.6%</option>
                            <option value="0.977">97.7%</option>
                            <option value="0.978">97.8%</option>
                            <option value="0.979">97.9%</option>

                            <option value="0.98">98%</option>
                            <option value="0.981">98.1%</option>
                            <option value="0.982">98.2%</option>
                            <option value="0.983">98.3%</option>
                            <option value="0.984">98.4%</option>
                            <option value="0.985">98.5%</option>
                            <option value="0.986">98.6%</option>
                            <option value="0.987">98.7%</option>
                            <option value="0.988">98.8%</option>
                            <option value="0.989">98.9%</option>

                            <option value="0.99">99%</option>
                            <option value="0.991">99.1%</option>
                            <option value="0.992">99.2%</option>
                            <option value="0.993">99.3%</option>
                            <option value="0.994">99.4%</option>
                            <option value="0.995">99.5%</option>
                            <option value="0.996">99.6%</option>
                            <option value="0.997">99.7%</option>
                            <option value="0.998">99.8%</option>
                            <option value="0.999">99.9%</option>

                            <option value="1.00">100%</option>
                    </select>
                </div>
                    
                <div class="form-group">
                    <label class='form-label'>Total Fee </label>
                    {{-- If the user selected the grade_level it will automatically populate its total fee in this input--}}
                    <input class="form-control" name="student_fee_fee" type="text" id="student_fee_fee" value="" readonly>
                </div>

                <div class="form-group">
                    <label class='form-label'>Months to pay</label>
                    {{-- If the user selected the grade_level it will automatically populate its no of months in this input--}}
                    <input class="form-control" name="student_fee_months_no" type="text" id="student_fee_months_no" value="" readonly>
                </div>

            </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_subject" onclick="addStudentFee()">Submit</button>
            <button type="button" class="btn btn-success" id="btn_update_subject" style="display:none" onclick="updateSubject()">Save</button>
            </div>
        </div>
        </div>
  </div>


   {{--SHOW Student Fee MODAL--}}
    
   <div class="modal fade " id="show_student_fee_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header" id="show_student_fee_modal_header">
                <h4 class="modal-title text-white" id="myLargeModalLabel">Student Fee Details <i class="fas fa-info-circle"></i> </h4>
                <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
          </div>
          <div class="modal-body" >
              <div class="card border border-light">
                  <div class="card-header">
                      <div class="card-body">
                         <div class="row justify-content-center">
                             <div class="card w-100">
                                 <div class="card-body" id="print">
                                     <div class="card-header p-0">
                                        <h1 class="display-5">Invoice</h1>
                                        <br>
                                        <h5 >Invoice/Enrolment Fee No. <span class="h5 fw-bold" id="sf_enrolment_fee_no">{{--Display enrolment fee no--}}</span></h5>
                                        <h5 >Student ID No. <span class="h5 fw-bold" id="sf_student_id_no">{{--Display student id no--}}</span></h5>
                                        <h5 >Student: <span class="h5 fw-bold" id="sf_student_name">{{--Display Student Name--}}</span> </h5>
                                        <h5 >Grade Level: <span class="h5 fw-bold" id="sf_grade_level">{{--Display Student's Grade Level--}}</span> </h5>
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
                                                <div id="sf_type">
                                                    {{-- display subfees--}}
                                                </div>
                                                <h5 class="fw-bold">Sub Total</h5>
                                                <h5 class="fw-bold">Total Discount</h5>
                                                <h5 class="fw-bold">Total</h5>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <h5>Amount</h5>
                                                <div id="sf_amount">
                                                    {{-- display subfees--}}
                                                </div>
                                                <h5 class="fw-bold" id="sf_total"></h5>
                                                <h5 class="fw-bold" id="sf_display_total_discount"> {{--Display the discount percentage--}}</h5>
                                                <h5 class="fw-bold" id="sf_display_discounted_total"> {{--Display the discounted amount--}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border border-dark  p-2">
                                        <div class="row">
                                            <h5>Payment Details</h5>
                                        </div>
                                        <hr class="m-0 mt-2">
                                        <div class="row mt-3">
                                            <div class="col-md-6 ">
                                             <h5 class="fw-bold">Date</h5>
                                            <div class="text-start" id="sf_date">
                                                {{--Display payment date--}}
                                            </div>
                                            </div>

                                            <div class="col-md-6">
                                                <h5 class="text-end fw-bold">Amount</h5>
                                                <div class="text-end" id="sf_payment">
                                                    {{--display payments amount--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5 class="fw-bold">Total</h5>
                                                </div>
                                                <div>
                                                    <h5 id="sf_payment_total"></h5>
                                                   {{-- Display total Payments--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="fw-bold">Total Payable</h5>
                                                <h5 class="fw-bold">Total Paid</h5>
                                                <h5 class="fw-bold">Balance</h5>
                                            </div>

                                            <div class="col-md-6 text-end">
                                                <h5 class="fw-bold" id="sf_total_payable"></h5>
                                                <h5 class="fw-bold" id="sf_total_paid"></h5>
                                                <h5 class="fw-bold" id="sf_balance"></h5>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                 </div>
                                 <div class="form-group">
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
  
 {{--END SHOW Student Fee MODAL--}}


{{--End Student Enrolment Fee Modal--}}
@endif

@if(url()->current() == route('payment.index'))
{{--Student Payments Modal--}}

     <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="payment_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" id="payment_modal_header">
            <h5 class="modal-title text-primary" id="payment_modal_label">{{--Modal Title--}}</h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close" id="payment_btn_close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="payment_div_err" role="alert" style="display:none">
                <ul id="payment_err"></ul>
            </div>
            
            <div class="modal-body">
            <form id="payment_form" autocomplete="off" enctype="multipart/form-data">
                @csrf

                {{--LEGEND--}}
                
                <div class="legend border border-light border-2 p-4">
                    {{-- <h5 class="mt-2 text-muted">LEGEND</h5> --}}
                    <div class="boxes">
                            <div class="box-0 me-2"></div>
                            <div class="me-2">
                                <h5 class="text-muted">no down payment</h5>
                            </div>

                            <div class="box-1 me-2"></div>
                            <div class="me-2">
                                <h5 class="text-muted"> down payment</h5>
                            </div>
                        
                            <div class="box-2 me-2"></div>
                            <div>
                                <h5 class="text-muted">fully paid</h5>
                            </div>
                    </div>
                </div>
                <br>

                {{--DATE--}}
                <div class='float-end' id="date">
                    {{ "Date: " . date('m/d/Y')}}
                </div>
                
                <div class="form-group col-md-5 mb-2">
                    <label class="form-label">Official Receipt</label>
                    <input type='number' min='0' class="form-control" name="payment_official_receipt" id="payment_payment_official_receipt">
                 </div>

                <div class="form-group mb-2">
                    <label class='form-label'>Select Student</label>
                    <select class="" id="payment_student_fee_id" name="payment_student_fee_id" onchange="payment_display_balance_by_student_id()" style="width:100%">
                        {{--Display all student--}}
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label class='form-label'>Total Balance</label>
                    {{-- If the user selected the student it will automatically populate its remaining balance in this input--}}
                    <input class="form-control" name="payment_total_balance" type="text" id="payment_total_balance" value="" readonly>
                </div>
                <div class="form-group mb-2">
                    <label class='form-label'>Monthly Payment</label>
                    {{-- If the user selected the student it will automatically populate its monthly payment in this input--}}
                    <input class="form-control" name="payment_monthly_payment" type="text" id="payment_monthly_payment" value="" readonly>
                </div>
                <div class="form-group mb-2">
                    <div class="row">
                        <div class="col-md-6">
                            <label class='form-label mt-1 '>Enter Amount <span class="text-muted"> <small id="amount_to_pay">(Amount to pay)</small></span> </label>
                            <input class="form-control" min="0" name="payment_amount" type="number" id="payment_amount" oninput="validity.valid||(value='')">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label  mt-1 float-end"><span class="text-info">Add Discount <i class="fas fa-plus-circle"></i></span></label>
                            <select class="form-select" id="payment_discount" disabled onchange="payment_display_discount_input_field()">
                                <option></option>
                                <option value="percentage">Percentage </option>
                                <option value="cash">Amount </option>
                            </select>
                        </div>

                        <div id="payment_display_discount_input_field">
                            {{--Display selected Input field (Percentage / Cash)--}}
                        </div>

                    </div>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">Remarks</label>
                    <select class="form-select" id="payment_remarks" name="payment_remarks">
                        <option></option>
                        <option value="Down Payment">Down Payment </option>
                        <option value="Monthly Payment">Monthly Payment </option>
                        {{-- <option value="Others">Others </option> --}}
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Mode of Payment</label>
                    <select class="form-select" id="payment_pm" name="payment_mode_id">
                        {{-- <option value="Others">Others </option> --}}
                    </select>
                </div>

                <div id="payment_display_payment_ledger">
                    {{--Display Student Payment Ledger--}}
                  
                </div>
            </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_payment" onclick="addPayment()">Submit</button>
            <button type="button" class="btn btn-success" id="btn_update_payment" style="display:none" onclick="updatePayment()">Save</button>
            <input type="hidden" id="payment_id" name="payment_id">
            <input type="hidden" id="p_staff_id" value="{{ auth()->id() }}">

            </div>
        </div>
        </div>
    </div>

      {{--SHOW Payment MODAL--}}
    
   <div class="modal fade " data-bs-backdrop="static" id="show_payment_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header" id="show_payment_modal_header">
                <h4 class="modal-title text-white" id="myLargeModalLabel">Payment Details <i class="fas fa-info-circle"></i>  </h4>
                <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
          </div>
          <div class="modal-body" >
              <div class="card border border-light">
                      <div class="card-body">
                         <div class="row justify-content-center">
                             <div class="card w-100 border border-secondary d-none d-md-block">
                                   <div class="card-body" id="print">
                                    <div class="card-header p-0">
                                        <div class="row">
                                           <div class="col">
                                               <h1 class="display-5">Receipt</h1>
                                               <br>
                                               <h6>{{ $school->school_name }}</h6>
                                               <h6>{{ $school->address }}</h6>
                                               <h6>{{ $school->contact }}</h6>
                                               <h6>{{ $school->website }}</h6>
                                           </div>
                                           <div class="col">
                                               <img class="float-end d-none d-lg-block" id="logo_img" src='{{asset("/storage/uploads/school/$school->school_logo")}}' alt="sample_logo" width="120">
                                           </div>
                                        </div>
                                       </div><br>
                                       <div class="row">
                                            <div class="col-6">
                                                <h6 >Enrolment No. <span class="h5 fw-bold" id="payment_enrolment_fee_no">{{--Display enrolment fee no--}}</span></h6>
                                                <h6 >Student ID No. <span class="h5 fw-bold" id="payment_student_id_no">{{--Display student id no--}}</span></h6>
                                                <h6 >Student: <span class="h5 fw-bold" id="payment_student_name">{{--Display Student Name--}}</span> </h6>
                                                <h6 >Grade Level: <span class="h5 fw-bold" id="payment_grade_level">{{--Display Student's Grade Level--}}</span> </h6>
                                                <h6>Date: <span class="h5 fw-bold" id="payment_date"> {{--Display Payment date--}}</span></h6>

                                            </div>

                                            <div class="col-6">
                                                <h6>Transaction No. <span class="h5 fw-bold" id="payment_transaction_no"> {{--Display Payment Official Receipt--}}</span></h6>
                                                <h6>Official Receipt: <span class="h5 fw-bold" id="payment_official_receipt"> {{--Display Payment Official Receipt--}}</span></h6>
                                                <h6>Amount paid: <span class="h5 fw-bold" id="payment_payment_amount"> {{--Display Payment amount--}}</span></h6>
                                                <h6>Remark: <span class="h5 fw-bold" id="payment_payment_remarks"> {{--Display Payment Remarks--}}</span></h6>
                                                <h6>Paid via: <span class="h5 fw-bold" id="payment_payment_mode"> {{--Display Payment Official Receipt--}}</span></h6>

                                            </div>
                                       </div>
                                      <hr>
                                    <h6>Payment Summary</h6>
                                    <div class="row">
                                    <div class="col-6 border border-dark border-1 p-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>Fee Details</h6>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- Display Sub Fees and Totals --}}
                                            <div class="col-6">
                                                <h6>Fee Type</h6>
                                                <div id="payment_sf_type">
                                                    {{-- display subfees--}}
                                                </div>
                                                <h6 class="fw-bold">Sub Total</h6>
                                                <h6 class="fw-bold">Total Discount</h6>
                                                <h6 class="fw-bold">Total</h6>
                                            </div>
                                            <div class="col-6 text-end">
                                                <h6>Amount</h6>
                                                <div id="payment_sf_amount">
                                                    {{-- display subfees--}}
                                                </div>
                                                <h6 class="fw-bold" id="payment_sf_total">{{--Display Sub Total--}}</h6>
                                                <h6 class="fw-bold" id="payment_sf_total_discount">{{--Display Total Discount--}}</h6>
                                                <h6 class="fw-bold" id="payment_sf_total_discounted_amount">{{--Display Total Discounted Amount--}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 border border-dark  p-2">
                                        <div class="row">
                                            <h6>Payment Details</h6>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 ">
                                             <h6>Date</h6>
                                            <div class="text-start" id="payment_sf_date">
                                                {{--Display payment date--}}
                                            </div>
                                            </div>

                                            <div class="col-6">
                                                <h6 class="text-end">Amount</h6>
                                                <div class="text-end" id="payment_sf_payment">
                                                    {{--display payments amount--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6>Total</h6>
                                                </div>
                                                <div>
                                                    <h6 id="payment_sf_payment_total"></h6>
                                                   {{-- Display total Payments--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <h6>Total Payable</h6>
                                                <h6>Total Paid</h6>
                                                <h6>Balance</h6>
                                            </div>

                                            <div class="col-6 text-end">
                                                <h6 id="payment_sf_total_payable"></h6>
                                                <h6 id="payment_sf_total_paid"></h6>
                                                <h6 id="payment_sf_balance"></h6>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                        <input class="text-center" type="text" id="p_signature" readonly  style="display: none">
                                        <h5 id="p_label" style="display: none">Cashier</h5>
                                 </div>
                                 <div class="form-group p-3">
                                    <button class="btn btn-info float-end" onclick="window.print();"> Print <i class="fas fa-print"></i> </button>
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


{{--End Student Payments Modal--}}
@endif

@if(url()->current() == route('user.index'))
{{-- User Modal--}}

    <div class="modal fade" id="user_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="user_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  " role="document">
        <div class="modal-content">
            <div class="modal-header" id="user_modal_header">
            <div class="modal-title text-white" id="user_modal_label">{{--Modal Title--}}</div>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="user_div_err" role="alert" style="display:none">
                <ul id="user_err"></ul>
            </div>
            
            <div class="modal-body">
            <form id="user_form" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3" id="user_select_role">
                            <label class='form-label'>Select Role *</label>
                            <select class="form-select user_display_enduser" id="select_user" onchange="display_user_select_box()">
                                {{--Display Student Parent and Teacher category--}}
                            </select>
                        </div>

                        {{--HIDDEN--}}
                        <div class="form-group" style="display:none" id="p_parent_div">
                            <label class='form-label'>Select Parent *</label>
                            <select  id="user_parent_id" name="parent_id"  onchange="display_parent_info_on_user_modal()" style="width:100%">
                                {{--Display Parent--}}
                            </select>
                            <div id="parentHelp" class="form-text text-success">Select only for parent's account registration</div>
                        </div>

                        <div class="form-group" style="display:none" id="s_student_div">
                            <label class='form-label'>Select Student *</label>
                            <select  id="user_student_id" name="student_id" onchange="display_student_info_on_user_modal()" style="width:100%">
                                {{--Display Student--}}
                            </select>
                            <div class="form-text text-success">Select only for student's account registration</div>
                        </div>

                        <div class="form-group" style="display:none" id="t_teacher_div">
                            <label class='form-label'>Select Teacher *</label>
                            <select  id="user_teacher_id" name="teacher_id"  onchange="display_teacher_info_on_user_modal()" style="width:100%">
                                {{--Display Teacher--}}
                            </select>
                            <div class="form-text text-success">Select only for teacher's account registration</div>
                        </div>

                    </div>
                    <div class="col-md-6">  
                        <div id="user_display_user_avatar">
                            {{--Display Selected User's Avatar--}}
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group mb-1">
                    <label class='form-label'>Name</label>
                    <input class="form-control " name="user_full_name" type="text" id="user_full_name" value="">
                </div>
                <div class="form-group mb-1">
                    <label class='form-label'>Email</label>
                    <input class="form-control " name="user_email" type="email" id="user_email" value="">
                </div>

                <div class="form-group mb-1">
                    <label class='form-label'>Password</label>
                    <input class="form-control " name="user_password" type="password" id="user_password" value="">
                </div>

                
            </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_user" onclick="createUser()">Submit</button>
            <button type="button" class="btn btn-success" id="btn_update_user" style="display:none" onclick="updateUser()">Save</button>
            </div>
        </div>
        </div>
    </div>



{{--End User Modal--}}
@endif


@if(url()->current() == route('parent.index'))
{{--Parent Modal--}}

    <div class="modal fade" id="parent_modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="parent_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary" id="parent_modal_header">
            <h5 class="modal-title text-white" id="parent_modal_label">{{--Modal Title--}}</h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="parent_div_err" role="alert" style="display:none">
                <ul id="parent_err"></ul>
            </div>
            
            <div class="modal-body">
            <form id="parent_form" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class='form-label'>Name</label>
                    <input class="form-control " name="name" type="text" id="parent_name" value="">
                </div>

                <div class="form-group">
                    <label class='form-label'>Email</label>
                    <input class="form-control " name="email" type="email" id="parent_email" value="">
                </div>

                <div class="form-group">
                    <label class='form-label'>Contact </label>
                    <input class="form-control " name="contact" type="number" min="0" id="parent_contact" value="">
                </div>
                
                <div class="form-group">
                    <label class='form-label'>Facebook </label>
                    <input class="form-control " name="facebook" type="text" id="parent_facebook" value="">
                </div>
            </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_parent" onclick="createParent()">Submit</button>
            <button type="button" class="btn btn-success" id="btn_update_parent" style="display:none" onclick="updateParent()">Save</button>
            </div>
        </div>
        </div>
    </div>

    {{--Show Parent --}}
    
    <div class="modal fade" id="show_parent_modal" tabindex="-1" role="dialog" aria-labelledby="show_parent_modal" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header" id="show_parent_modal_header">
                    <h5 class="modal-title text-primary" id="show_parent_modal_label">{{--Modal Title--}}</h5>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card w-100 mx-auto">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="parent_info">
                                {{--Display Parent--}}
                            </div>
                        </div>
                    </div>

                    <div class="card w-100 mx-auto">
                        <div class="card-header"></div>
                        <div class="card-body">
                            {{-- <h3>Students</h3> --}}
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <caption>List of students</caption>
                                    <thead style="background:none">
                                        <tr>
                                            <th>Name</th>
                                            <th>Section</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="parent_student_info">
                                            {{--Display Assigned Student--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    {{--End Show Parent--}}

    

{{--End Parent Modal--}}
@endif



{{-- Start Assign Subjects --}}

    <div class="modal fade " id="grade_level_assign_subject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="grade_level_assign_subject" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="grade_level_assign_subject_modal_header">
            <h5 class="modal-title" id="grade_level_assign_subject_modal_label"></h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="grade_level_assign_subject_div_err" role="alert" style="display:none">
                <ul id="grade_level_assign_subject_err"></ul>
            </div>

            <div class="modal-body">
            <form id="grade_level_assign_subject_form" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="grade_level_id" id="grade_level_assign_subject_grade_level_id">

                @csrf
                <div class="form-group">
                    <label for="grade_level_assign_subject_subject_id" class="form-label">Select Subject *</label>
                    <select  class="grade_level_assign_subject_subject_id" id="grade_level_assign_subject_subject_id" name="subject_id[]" multiple style="width:100%">
                    {{-- Display Subjects to be added on grade level--}}
                    </select>
                </div>
                <br>
               
            </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_grade_level_assign_subject" onclick=" grade_level_assign_subject_subject_id_store()">Submit</button>
            <button type="button" class="btn btn-success" id="btn_update_grade_level_assign_subject" style="display:none" onclick="">Save</button>
            </div>
        </div>
        </div>
    </div>


{{--End Assign Subjects--}}


@if(url()->current() == route('payment_mode.index'))
{{--Payment Mode--}}

    <div class="modal fade " id="payment_mode" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="payment_mode" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="payment_mode_modal_header">
            <h5 class="modal-title text-primary" id="payment_mode_label">{{--Modal Title--}}</h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="payment_mode_div_err" role="alert" style="display:none">
                <ul id="payment_mode_err"></ul>
            </div>

            <div class="modal-body">
            <form id="payment_mode_form" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-1">
                    <label class='form-label'>Payment Mode *</label>
                    <input class="form-control" name="title" type="text" id="pm_title" placeholder="Cebuana Lhuillier">
                </div>
                <div class="form-group mb-1">
                    <label class='form-label'>Account number *</label>
                    <input class="form-control" name="title" type="number" min="0" id="pm_account_number" placeholder="0988832991">
                </div>

                <div id="edit_mop">
                    {{-- only display this form group when the edit button is clicked only--}}
                    <div class="form-group">
                        <label class='form-label'>Status *</label>
                        <select class="form-select" name="status" id="pm_status">
                            <option value="activate">Activate</option>
                            <option value="inactive">Deactivate</option>
                        </select>
                    </div>
                </div>

                
            </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_payment_mode" onclick="createPaymentMode()">Submit</button>
            <button type="button" class="btn btn-success" id="btn_update_payment_mode" style="display:none" onclick="updatePaymentMode()">Save</button>
            </div>
        </div>
        </div>
    </div>


{{--End Payment Mode--}}
@endif

@if(url()->current() == route('role.index'))
{{--Start Roles ()--}}

    <div class="modal fade " id="role_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="role" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="role_modal_header">
            <h5 class="modal-title text-primary" id="role_modal_label">{{--Modal Title--}}</h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="role_div_err" role="alert" style="display:none">
                <ul id="role_err"></ul>
            </div>

            <div class="modal-body">
            <form id="role_form" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class='form-label'>Role :</label>
                    <input class="form-control" name="name" type="text" id="role_title" value="">
                </div>
                
            </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_role" onclick="createRole()">Submit</button>
            <button type="button" class="btn btn-success" id="btn_update_role" style="display:none" onclick="updateRole()">Save</button>
            </div>
        </div>
        </div>
    </div>

{{--End Role--}}
@endif


@if(url()->current() == route('values.index'))

    {{--Values--}}

        {{--Create--}}
            <div class="modal fade " id="values_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="values_modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="values_modal_header">
                    <h5 class="modal-title" id="values_modal_label">{{--Modal Title--}}</h5>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                    </button>
                    </div>

                    {{--Alert--}}
                    <div class="alert alert-danger p-3 fade show" id="values_modal_div_err" role="alert" style="display:none">
                        <ul id="values_modal_err"></ul>
                    </div>

                    <div class="modal-body">
                    <form id="values_form" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label class='form-label'>Core Values *</label>
                            <input class="form-control" name="title" type="text" id="values_title" value="">
                        </div>
                        
                    </form>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn_add_values_modal" onclick="createValues()">Submit</button>
                    </div>
                </div>
                </div>
            </div>

        {{--End Create}}

        {{--Edit--}}

            <div class="modal fade " id="edit_values_statement_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="values_statement_modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="edit_values_statement_modal_header">
                    <h5 class="modal-title" id="edit_values_statement_modal_label">{{--Modal Title--}}</h5>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                    </button>
                    </div>

                    {{--Alert--}}
                    <div class="alert alert-danger p-3 fade show" id="edit_values_statement_modal_div_err" role="alert" style="display:none">
                        <ul id="edit_values_statement_modal_err"></ul>
                    </div>

                    <div class="modal-body">
                    <form id="edit_values_statement_form" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="edit_values_title" class="form-label">Enter Values *</label>
                            <input class="form-control" name="title" id="edit_values_title" type="text">
                        </div>
                    </form>
                    </div>
                    <div class="p-3" id="display_assigned_description">
                        {{--Display assigned descriptions--}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btn_update_values_modal" onclick="updateValues()">Update</button>
                    </div>
                </div>
                </div>
            </div>

        {{--End Edit--}}

        {{--Assign Statement--}}
            <div class="modal fade " id="values_statement_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="values_statement_modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="values_statement_modal_header">
                    <h5 class="modal-title" id="values_statement_modal_label">{{--Modal Title--}}</h5>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                    </button>
                    </div>

                    {{--Alert--}}
                    <div class="alert alert-danger p-3 fade show" id="values_statement_modal_div_err" role="alert" style="display:none">
                        <ul id="values_statement_modal_err"></ul>
                    </div>

                    <div class="modal-body">
                    <form id="values_statement_form" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <h4 class="text-muted text-capitalize fw-bold" id="core_values"></h4><br>
                        <div class="form-group">
                           <textarea class="form-control" name="description" id="values_description"  rows="3" placeholder="Add statement .."></textarea>
                        </div>
                        
                    </form>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn_add_values_statement" onclick="createDescription()">Submit</button>
                    </div>
                </div>
                </div>
            </div>
        {{--End Assign Statement--}}

    {{--End Values--}}


@endif


{{--GLOBAL MODAL--}}

 {{--TEACHERS--}}

    {{--Teacher Assign Grade to Student's Subject--}}

        <div class="modal fade "  id="teacher_assign_grade_to_student_subject_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-xl">
            <div class="modal-content ">
                <div class="modal-header" id="teacher_assign_grade_to_student_subject_header">
                        <h4 class="modal-title text-white" id="myLargeModalLabel">Add Grade <i class="fas fa-chalkboard-teacher"></i> </h4>
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
                                                <label class="form-label" for="grade_assign_grade_to_student_subject_teacher_id">Select Grade Level *</label>
                                                <select name="" id="grade_assign_grade_to_student_subject_teacher_id" onchange="grade_assign_grade_to_student_subject_display_section()" style="width:100%">
                                                    {{--Display Teacher--}}
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="teacher_assign_grade_to_student_subject_section_id">Select Section *</label>
                                                <select name="" id="teacher_assign_grade_to_student_subject_section_id" onchange="teacher_assign_grade_to_student_subject_display_students_by_section_id()" style="width:100%">
                                                    {{--Display Section by Teacher ID--}}
                                                </select>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-6 border p-3 mt-3">
                                        <div id="teacher_assign_grade_to_student_subject_display_students">
                                            {{--Display Student By Teacher's Section ID--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3 border p-3" id="teacher_assign_grade_to_student_display_encoding_of_grade">
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


    {{--Show Assign Teacher's Subject to Section Modal--}}
        <div class="modal fade" id="teacher_assign_subject_section_modal" tabindex="-1" role="dialog" aria-labelledby="teacher_assign_subject_section_label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="teacher_assign_subject_section_header">
                <h5 class="modal-title text-primary" id="teacher_assign_subject_section_label">{{--Modal Title--}}</h5>
                <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                </button>
                </div>

                {{--Alert--}}
                <div class="alert alert-danger p-3 fade show" id="teacher_assign_subject_section_div_err" role="alert" style="display:none">
                    <ul id="teacher_assign_subject_section_err"></ul>
                </div>

                <div class="modal-body">
                <form id="teacher_assign_subject_section_form" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label class='form-label'>Select Teacher </label>
                        <select name="teacher_id" type="text" id="teacher_assign_subject_section_teacher_id" onchange="display_section_by_teacher()" style="width:100%">
                            {{--display teachers --}}
                        </select>   
                    
                    </div>
                    <div class="form-group mb-2">
                        <label class='form-label'>Select Section </label>
                        <select name="section_id" type="text" id="teacher_assign_subject_section_section_id" onchange="display_subject_by_grade_level()" style="width:100%">
                            {{--display sections --}}
                        </select>   
                        
                    </div>
                    <div class="form-group">
                        <label class='form-label'>Select Subjects </label>
                        <select class="teacher_assign_subjects_to_section_display_subjects" name="subject_id[]" type="text" id="teacher_assign_subject_section_subject_id" multiple style="width:100%">
                            {{--display subjects --}}
                        </select>   
                    </div>
                </form>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn_add_subject_to_section_by_teacher_id" onclick="store_subjects_by_grade_level_id()">Submit</button>
                <button type="button" class="btn btn-success" id="btn_update_subject_to_section_by_teacher_id" style="display:none" onclick="update_subjects_by_grade_level_id()">Save</button>
                </div>
            </div>
            </div>
        </div>


    {{--End--}}
 
 {{--SECTION--}}
    {{--Section Add Teacher Modal--}}
        <div class="modal fade" id="section_teacher_modal" tabindex="-1" role="dialog" aria-labelledby="section_teacher_modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header" id="section_teacher_modal_header">
                <h5 class="modal-title text-primary" id="section_teacher_modal_label">{{--Modal Title--}}</h5>
                <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                </button>
                </div>

                {{--Alert--}}
                <div class="alert alert-warning fade show" id="section_teacher_div_err" role="alert" style="display:none">
                    <ul id="section_teacher_err"></ul>
                </div>
                
                <div class="modal-body">
                <form id="section_teacher_form" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class='form-label'>Select Section *</label>
                                <select class="" id="section_section_id" name="section_id" style="width: 100%" onchange=" select_current_adviser() ">
                                    {{--Select Section--}}
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class='form-label'>Select Teacher *</label>
                                <select class="" id="section_teacher_id" name="teacher_id" style="width: 100%">
                                    {{--Select Teacher--}}
                                </select>
                            </div>

                            <div class="form-group mt-2" >
                                <label class="form-label" for="section_adviser">Option</label>
                                <select class="form-select" id="section_adviser" name="adviser" style="width: 100%">
                                    <option ></option>
                                    <option value='1'>Adviser</option>
                                    <option value='2'>Subject Teacher</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div id="section_display_current_adviser">
                                {{--Display Current Adviser--}}
                            </div>
                        </div>
                    </div>
                   
                </form>
                </div>
        
                <div class="modal-footer">
                <button type="button" class="btn btn-primary"  onclick=" section_store_teacher()">Submit</button>
                </div>
            </div>
            </div>
        </div>
{{--End Section Add Teacher Modal--}}

 {{--STUDENT--}}

{{-- Parent ADD STUDENT  --}}
    
    <div class="modal fade" id="parent_student_modal" tabindex="-1" role="dialog" aria-labelledby="parent_student_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header" id="parent_student_modal_header">
            <h4 class="modal-title text-white" id="parent_student_modal_label">{{--Modal Title--}}</h4>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-warning fade show" id="parent_student_div_err" role="alert" style="display:none">
                <ul id="parent_student_err"></ul>
            </div>
            
            <div class="modal-body">
            <form id="parent_student_form" autocomplete="off" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label class='form-label'>Select Parent</label>
                    <select id="parent_parent_id" name="parent_id" style="width: 100%">
                        {{--Select Parent--}}
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label class='form-label'>Select Student</label>
                    <select id="parent_student_id" name="student_id" style="width: 100%">
                        {{--Select Student--}}
                    </select>
                </div>
            </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-info"  onclick="parent_student_store()">Submit</button>
            </div>
        </div>
        </div>
    </div>

{{--End Parent Add STUDENT --}}

{{--END GLOBAL MODAL--}}