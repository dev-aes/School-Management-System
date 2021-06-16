
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



{{--Start TEACHER Modal--}}

    <div class="modal fade" id="teacher_modal" tabindex="-1" role="dialog" aria-labelledby="teacher_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
                    <div class="col-md-5"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class='form-label'>Grade Level</label>
                            <select class='form-select' name="grade_level_id" id="teacher_grade_level">
                               
                            </select>
                        </div>
                    </div>
                </div>
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
                <div class="modal-header">
                        <h4 class="modal-title text-info" id="myLargeModalLabel">Teacher Information <i class="fas fa-info-circle"></i> </h4>
                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body" >
                    <div class="card">
                        <div class="card-header">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="card w-75">
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
            </div>
            </div>
        </div>
        
     {{--END SHOW Teacher MODAL--}}


      {{--Teacher Add Subject MODAL--}}
    
        <div class="modal fade " id="teacher_addSubject_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                        <h4 class="modal-title text-info" id="myLargeModalLabel">Add Subject <i class="fas fa-plus-circle"></i> </h4>
                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body" >
                    <div class="card">
                        <div class="card-header">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="card w-75">
                                        <div class="card-body">
                                            <form id="teacher_add_subject_form" autocomplete="off" onsubmit="false">
                                                @csrf
                                                <div class="form-group">
                                                    <label class='form-label h3 text-success'>Select Subject</label> <span class="float-end" onclick="back()" role="button">  <i class="fas fa-long-arrow-alt-left"></i> Back </span>

                                                    <div id="teacher_subject">
                                                        {{--Display Available Subject by grade Level--}}
                                                    </div>

                                                    <!--
                                                    <select class="form-select" id="teacher_subject" name="subject_id">
                                                        {{--Display Available Subject by grade Level--}}
                                                    </select>
                                                    -->
                                                    
                                                </div>
                                                <input type="hidden" id="teacher_id" name="teacher_id" >
                                                <button type="submit" class="btn btn-primary float-end mt-2" onclick="teacher_storeSubject(event)">Submit</button>
                                            </form>
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
      
     {{--END Teacher Add Subject MODAL--}}

     {{--Teacher Add Student--}}

        <div class="modal fade " id="teacher_addStudent_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                        <h4 class="modal-title text-info" id="myLargeModalLabel">Add Student <i class="fas fa-plus-circle"></i> </h4>
                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body" >
                    <div class="card">
                        <div class="card-header">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="card w-75">
                                        <div class="card-body">
                                            <form id="teacher_add_student_form" autocomplete="off" onsubmit="false">
                                                @csrf
                                                <div class="form-group">
                                                    <h3 class='form-label text-success'>Select student</h3> <span class="float-end" onclick="back()" role="button">  <i class="fas fa-long-arrow-alt-left"></i> Back </span> <br>
                                                    <div id="teacher_student">
                                                        {{--Display Available Student by grade Level--}}
                                                    </div>
                                                </div>
                                                <input type="hidden" name='teacher_id' id="_teacher_id">
                                                <button type="submit" class="btn btn-sm btn-primary float-end mt-2" onclick="teacher_storeStudent(event)">Submit</button>
                                            </form>
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

     {{-- End Teacher Add Student--}}

      {{-- TEACHER ADD SUBJECT II --}}
        <div class="modal fade" id="teacher_subject2_modal" tabindex="-1" role="dialog" aria-labelledby="teacher_subject2_modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header" id="teacher_add_subject2_modal_header">
                <h5 class="modal-title text-primary" id="teacher_subject2_modal_label">{{--Modal Title--}}</h5>
                <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                </button>
                </div>

                {{--Alert--}}
                <div class="alert alert-warning fade show" id="teacher_subject2_div_err" role="alert" style="display:none">
                    <ul id="teacher_subject2_err"></ul>
                </div>
                
                <div class="modal-body">
                <form id="teacher_subject2_form" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label class='form-label'>Select Teacher</label>
                        <select class="form-select" id="teacher_subject2_teacher" name="teacher_id" onchange="teacher_subject2_display_grade_level()">
                            {{--Select Teacher--}}
                        </select>
                    </div>
                    <br>

                    <div class="form-group">
                        <label class="form-label">Grade Level</label>
                        <input class="form-control" type="text" id="teacher_subject2_grade_level_id" name="teacher_subject2_grade_level_id" readonly>
                    </div>
                    <br>
                    <label class='form-label'>Select Subject</label>
                    <div id="teacher_subject2_subject">
                        {{--Display Available Subject by Teacher's grade Level--}}
                    </div>
                </form>
                </div>
        
                <div class="modal-footer">
                <button type="button" class="btn btn-primary"  onclick="teacher_subject_2_store_teacher_subject()">Submit</button>
                </div>
            </div>
            </div>
        </div>
      {{--End Teacher Add Subject II--}}

      {{-- TEACHER ADD STUDENT II --}}
      
            <div class="modal fade" id="teacher_student2_modal" tabindex="-1" role="dialog" aria-labelledby="teacher_student2_modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content">
                    <div class="modal-header" id="teacher_add_student2_modal_header">
                    <h5 class="modal-title text-primary" id="teacher_student2_modal_label">{{--Modal Title--}}</h5>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                    </button>
                    </div>

                    {{--Alert--}}
                    <div class="alert alert-warning fade show" id="teacher_student_div_err" role="alert" style="display:none">
                        <ul id="teacher_student2_err"></ul>
                    </div>
                    
                    <div class="modal-body">
                    <form id="teacher_student2_form" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label class='form-label'>Select Teacher</label>
                            <select class="form-select" id="teacher_student_teacher" name="teacher_id" onchange="teacher_student2_display_grade_level()">
                                {{--Select Teacher--}}
                            </select>
                        </div>
                        <br>

                        <div class="form-group">
                            <label class="form-label">Grade Level</label>
                            <input class="form-control" type="text" id="teacher_student2_grade_level_id" name="teacher_student2_grade_level_id" readonly>
                        </div>
                        <br>
                        <label class='form-label'>Select Student</label>
                        <div id="teacher_student2_subject">
                            {{--Display Available Student by Teacher's grade Level--}}
                        </div>
                    </form>
                    </div>
            
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary"  onclick="teacher_student2_store_teacher_subject()">Submit</button>
                    </div>
                </div>
                </div>
            </div>
                
      {{--End Teacher Add STUDENT II--}}
        


      {{--Teacher Assign Subject to Student--}}

        <div class="modal fade" id="teacher_assign_subject_to_student_modal" tabindex="-1" role="dialog" aria-labelledby="teacher_assign_subject_to_student_label" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" id="teacher_assign_subject_to_student_header">
                <h5 class="modal-title text-primary" id="teacher_assign_subject_to_student_label">{{--Modal Title--}}</h5>
                <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                </button>
                </div>

                {{--Alert--}}
                <div class="alert alert-danger p-3 fade show" id="teacher_assign_subject_to_student_div_err" role="alert" style="display:none">
                    <ul id="teacher_assign_subject_to_student_err"></ul>
                </div>

                <div class="modal-body">
                <form id=teacher_assign_subject_to_student_form" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class='form-label'>Select Teacher</label>
                                <select class="form-select" id="teacher_assign_subject_to_student_teacher_id" name="teacher_id" onchange="teacher_assign_subject_to_student_display_section()">
                                    {{--Display all Teachers --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class='form-label'>Select Section</label>
                            <select class="form-select" id="teacher_assign_subject_to_student_section_id" name="section_id">
                                {{--Display all the Sections assigned to teacher ID --}}
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div id="teacher_assign_subject_to_student_display_subjects">
                                {{--Display all the subjects assigned to teacher ID --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class='form-label'>Select Student</label>
                            <select class="form-select" id="teacher_assign_subject_to_student_student_id" name="student_id">
                                {{--Display all the Students By Teacher's Grade Level_id --}}
                            </select>
                        </div>
                    </div>
                   
                    
                </form>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn_add_grade" onclick="teacher_assign_subject_to_student()">Submit</button>
                {{-- <button type="button" class="btn btn-success" id="btn_update_grade" style="display:none" onclick="updateGrade()">Save</button> --}}
                </div>
            </div>
            </div>
        </div>

      {{--End Teacher Assign Subject to Student--}}


{{--End TEACHER Modal--}}



    
{{--Start Subject Modal--}}

    <div class="modal fade" id="subject_modal" tabindex="-1" role="dialog" aria-labelledby="subject_modal_label" aria-hidden="true">
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
                {{-- <div class="form-group">
                    <label class='form-label'>Select Grade Level</label>
                    <select class="form-select" id="subject_grade_level" name="grade_level_id">
                   
                    </select>
                </div> --}}

                <div class="form-group">
                    <label class='form-label'>Subject Name </label>
                    <input class="form-control " name="name" type="text" id="subject_name" value="">
                </div>
                <div class="form-group">
                    <label class='form-label'>Description </label>
                    <input class="form-control " name="description" type="text" id="subject_description" value="">
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
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content ">
              <div class="modal-header" id="show_grade_level_modal_header">
                    <h4 class="modal-title text-white" id="myLargeModalLabel">Grade Level Information <i class="fas fa-info-circle"></i> </h4>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
              </div>
              <div class="modal-body" >
                  <div class="card">
                      <div class="card-header">
                          <div class="card-body">
                             <div class="row justify-content-center">
                                 <div class="card w-75">
                                     <div class="card-body">
                                        <div id="show_grade_level_info">
                                    
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


{{-- END Grade Level Modal --}}


    
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
                    
                    <div class="form-group">
                        <label class='form-label'>Select Section</label>
                        <select class="" id="section_section_id" name="section_id" style="width: 100%">
                            {{--Select Section--}}
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class='form-label'>Select Teacher</label>
                        <select class="" id="section_teacher_id" name="teacher_id" style="width: 100%">
                            {{--Select Teacher--}}
                        </select>
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




{{--End Section Modal--}}



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
                        <label class='form-label'>Grade Level *</label>
                        <select class='form-select' name="grade_level_id" id="student_grade_level">
                           
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
                <div class="col-md-4">
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
                <div class="col-md-8 mt-4 bg-light">
                    <div class="">
                        <div class="row border p-3">
                            <h4 class="text-muted">Parent Info *</h4>
                            <div class="col-md-4 b">
                                <div class="form-group">
                                    <label class='form-label'>Name</label>
                                    <input class="form-control" type="text" name="guardian_name" id="student_guardian_name" value="">
                                </div>
                            </div>
        
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class='form-label'>Contact</label>
                                    <input class="form-control" min="0" type="number" name="guardian_contact" id="student_guardian_contact" value="">
                                </div>
                            </div>
        
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class='form-label'>Facebook</label>
                                    <input class="form-control" type="text" name="guardian_facebook" id="student_guardian_facebook" value="">
                                </div>
                            </div>
                        </div>
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
                <div class="modal-header">
                        <h4 class="modal-title text-info" id="myLargeModalLabel">Student Information <i class="fas fa-info-circle"></i> </h4>
                        <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body" >
                    <div class="card">
                        <div class="card-header">
                            <div class="card-body">
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
            </div>
            </div>
        </div>
  
  {{--END SHOW Student MODAL--}}

{{--End Student Modal--}}



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
                    <div class="card w-50">
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
                                                <input class="form-control" min="0" type="number"  name="fee_amount[]">
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


{{--Start Student Enrolment Fee Modal--}}

  <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="student_fee_modal" tabindex="-1" role="dialog" aria-labelledby="subject_fee_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
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

                <div class="form-group">
                    <label class='form-label'>Select Student</label><br>
                    <select class="" id="student_fee_student_id" name="student_fee_student_id" onchange="student_fee_display_grade_level_by_student_id()" style="width:100%">
                        {{--Display all student--}}
                    </select>
                </div>
                <div class="form-group">
                    <label class='form-label'>Grade Level</label>
                    {{-- If the user selected the student it will automatically populate its grade level in this input--}}
                    <input class="form-control" name="student_fee_grade_level_id" type="text" id="student_fee_grade_level_id" value="" readonly>
                </div>
                <div class="form-group">
                    <label class='form-label'>Add Discount <small class="text-muted">(Optional)</small> </label>
                    <select class="form-select" id="student_fee_discount" name="student_fee_discount" onchange="student_fee_display_discounted_fee_by_student_id()" aria-describedby="discountHelp">
                       <option></option>
                       <option value="0.05">5%</option>
                       <option value="0.10">10%</option>
                       <option value="0.15">15%</option>
                       <option value="0.20">20%</option>
                       <option value="0.25">25%</option>
                       <option value="0.30">30%</option>
                       <option value="0.35">35%</option>
                       <option value="0.40">40%</option>
                       <option value="0.50">50%</option>
                       <option value="0.60">60%</option>
                       <option value="0.70">70%</option>
                       <option value="0.80">80%</option>
                       <option value="0.90">90%</option>
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
          <div class="modal-header">
                <h4 class="modal-title text-info lead" id="myLargeModalLabel">Student Fee Details <i class="fas fa-info-circle"></i> </h4>
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
                
                <div class="form-group col-md-5">
                    <label class="form-label">Official Receipt</label>
                    <input type='number' min='0' class="form-control" name="payment_official_receipt" id="payment_payment_official_receipt">
                 </div>

                <div class="form-group">
                    <label class='form-label'>Select Student</label>
                    <select class="" id="payment_student_fee_id" name="payment_student_fee_id" onchange="payment_display_balance_by_student_id()" style="width:100%">
                        {{--Display all student--}}
                    </select>
                </div>
                <div class="form-group">
                    <label class='form-label'>Total Balance</label>
                    {{-- If the user selected the student it will automatically populate its remaining balance in this input--}}
                    <input class="form-control" name="payment_total_balance" type="text" id="payment_total_balance" value="" readonly>
                </div>
                <div class="form-group">
                    <label class='form-label'>Monthly Payment</label>
                    {{-- If the user selected the student it will automatically populate its monthly payment in this input--}}
                    <input class="form-control" name="payment_monthly_payment" type="text" id="payment_monthly_payment" value="" readonly>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class='form-label mt-1 '>Enter Amount <span class="text-muted"> <small id="amount_to_pay">(Amount to pay)</small></span> </label>
                            <input class="form-control" min="0" name="payment_amount" type="number" id="payment_amount" value="">
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
                <div class="form-group">
                    <label class="form-label">Remarks</label>
                    <select class="form-select" id="payment_remarks" name="payment_remarks">
                        <option></option>
                        <option value="Down Payment">Down Payment </option>
                        <option value="Monthly Payment">Monthly Payment </option>
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
            </div>
        </div>
        </div>
    </div>

      {{--SHOW Payment MODAL--}}
    
   <div class="modal fade " data-bs-backdrop="static" id="show_payment_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
                <h4 class="modal-title text-info" id="myLargeModalLabel">Payment Details </h4>
                <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
          </div>
          <div class="modal-body" >
              <div class="card border border-light">
                  <div class="card-header">
                      <div class="card-body">
                         <div class="row justify-content-center">
                             <div class="card w-100 border border-secondary">
                                   <div class="card-body" id="print">
                                    <div class="card-header p-0">
                                        <div class="row">
                                           <div class="col-md-6">
                                               <h1 class="display-5">Receipt</h1>
                                               <h5>School name Inc.</h5>
                                               <h5>Juna Subd. Matina Davao City,8000</h5>
                                               <h5>09659212003</h5>
                                               <h5>school.edu.ph</h5>
                                           </div>
                                           <div class="col-md-6">
                                               <img class="float-end" src="{{asset('images/logo.png')}}" alt="sample_logo" width="250">
                                           </div>
                                        </div>
                                       </div><br>
                                       <div class="row">
                                            <div class="col-md-6">
                                                <h5 >Enrolment Fee No. <span class="h5 fw-bold" id="payment_enrolment_fee_no">{{--Display enrolment fee no--}}</span></h5>
                                                <h5 >Student ID No. <span class="h5 fw-bold" id="payment_student_id_no">{{--Display student id no--}}</span></h5>
                                                <h5 >Student: <span class="h5 fw-bold" id="payment_student_name">{{--Display Student Name--}}</span> </h5>
                                                <h5 >Grade Level: <span class="h5 fw-bold" id="payment_grade_level">{{--Display Student's Grade Level--}}</span> </h5>
                                            </div>

                                            <div class="col-md-6">
                                                <h5>Date: <span class="h5 fw-bold" id="payment_date"> {{--Display Payment date--}}</span></h5>
                                                <h5>OR No: <span class="h5 fw-bold" id="payment_official_receipt"> {{--Display Payment Official Receipt--}}</span></h5>
                                                <h5>Amount paid: <span class="h5 fw-bold" id="payment_payment_amount"> {{--Display Payment amount--}}</span></h5>
                                                <h5>Remark: <span class="h5 fw-bold" id="payment_payment_remarks"> {{--Display Payment Remarks--}}</span></h5>
                                            </div>
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
                                                <div id="payment_sf_type">
                                                    {{-- display subfees--}}
                                                </div>
                                                <h5 class="fw-bold">Sub Total</h5>
                                                <h5 class="fw-bold">Total Discount</h5>
                                                <h5 class="fw-bold">Total</h5>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <h5>Amount</h5>
                                                <div id="payment_sf_amount">
                                                    {{-- display subfees--}}
                                                </div>
                                                <h5 class="fw-bold" id="payment_sf_total">{{--Display Sub Total--}}</h5>
                                                <h5 class="fw-bold" id="payment_sf_total_discount">{{--Display Total Discount--}}</h5>
                                                <h5 class="fw-bold" id="payment_sf_total_discounted_amount">{{--Display Total Discounted Amount--}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border border-dark  p-2">
                                        <div class="row">
                                            <h5>Payment Details</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 ">
                                             <h5>Date</h5>
                                            <div class="text-start" id="payment_sf_date">
                                                {{--Display payment date--}}
                                            </div>
                                            </div>

                                            <div class="col-md-6">
                                                <h5 class="text-end">Amount</h5>
                                                <div class="text-end" id="payment_sf_payment">
                                                    {{--display payments amount--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5>Total</h5>
                                                </div>
                                                <div>
                                                    <h5 id="payment_sf_payment_total"></h5>
                                                   {{-- Display total Payments--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Total Payable</h5>
                                                <h5>Total Paid</h5>
                                                <h5>Balance</h5>
                                            </div>

                                            <div class="col-md-6 text-end">
                                                <h5 id="payment_sf_total_payable"></h5>
                                                <h5 id="payment_sf_total_paid"></h5>
                                                <h5 id="payment_sf_balance"></h5>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                 </div>
                                 <div class="form-group p-3">
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
  
 {{--END SHOW Payment MODAL--}}


{{--End Student Payments Modal--}}


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
                        <div class="form-group">
                            <label class='form-label'>Select Student</label>
                            <select class="form-select" id="user_student_id" name="student_id"  aria-describedby="studentHelp" onchange="display_student_info_on_user_modal()">
                                {{--Display Student--}}
                            </select>
                            <div id="studentHelp" class="form-text text-success">Select only for student's account registration</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class='form-label'>Select Parent</label>
                            <select class="form-select" id="user_parent_id" name="parent_id"  aria-describedby="parenttHelp" onchange="display_parent_info_on_user_modal()">
                                {{--Display Parent--}}
                            </select>
                            <div id="parentHelp" class="form-text text-success">Select only for parent's account registration</div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class='form-label'>Name</label>
                    <input class="form-control " name="user_full_name" type="text" id="user_full_name" value="">
                </div>
                <div class="form-group">
                    <label class='form-label'>Email</label>
                    <input class="form-control " name="user_email" type="email" id="user_email" value="">
                </div>

                <div class="form-group">
                    <label class='form-label'>Password</label>
                    <input class="form-control " name="user_password" type="password" id="user_password" value="">
                </div>

                <div class="role_wrapper">
                    {{--Admin--}}
                    <div class="form-group col-md-5" id="role_div">
                        <label for="form-label">Role</label>
                        <select class="form-select" name="user_role" id="user_role">
                        </select>
                    </div>

                    {{--Student--}}
                    <div class="form-group" id='student_role_div'>
                        <label class='form-label'>Role </label>
                        <input class="form-control " name="user_role" type="text" id="user_student_role"  disabled>
                    </div>
                    
                    {{--Parent--}}
                    <div class="form-group" id='parent_role_div'>
                        <label class='form-label'>Role </label>
                        <input class="form-control " name="user_role" type="text" id="user_parent_role"  disabled>
                    </div>  

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


    {{-- Parent ADD STUDENT II --}}
      
        <div class="modal fade" id="parent_student_modal" tabindex="-1" role="dialog" aria-labelledby="parent_student_modal" aria-hidden="true">
            <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-primary" id="parent_student_modal_label">{{--Modal Title--}}</h5>
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
                        <select class="" id="parent_parent_id" name="parent_id" style="width: 100%">
                            {{--Select Parent--}}
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class='form-label'>Select Student</label>
                        <select class="" id="parent_student_id" name="student_id" style="width: 100%">
                            {{--Select Student--}}
                        </select>
                    </div>
                </form>
                </div>
        
                <div class="modal-footer">
                <button type="button" class="btn btn-primary"  onclick="parent_student_store()">Submit</button>
                </div>
            </div>
            </div>
        </div>
        
    {{--End Parent Add STUDENT II--}}


    {{--Show Parent --}}

    <div class="modal fade" id="show_parent_modal" tabindex="-1" role="dialog" aria-labelledby="show_parent_modal" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="show_parent_modal_label">{{--Modal Title--}}</h5>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card w-50 mx-auto">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="parent_info">
                                {{--Display Parent--}}
                            </div>
                        </div>
                    </div>

                    <div class="card w-50 mx-auto">
                        <div class="card-header"></div>
                        <div class="card-body">
                            {{-- <h3>Students</h3> --}}
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <caption>List of students</caption>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Grade Level</th>
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
                <div class="form-group">
                    <label class='form-label'>Payment Mode:</label>
                    <input class="form-control" name="title" type="text" id="payment_mode_title" value="">
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



{{-- Start Assign Subjects --}}

    <div class="modal fade " id="grade_level_assign_subject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="grade_level_assign_subject" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="grade_level_modal_header">
            <h5 class="modal-title text-primary" id="grade_level_label">Assign Subjects</h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close">
            </button>
            </div>

            {{--Alert--}}
            <div class="alert alert-danger p-3 fade show" id="grade_level_assign_subject_div_err" role="alert" style="display:none">
                <ul id="grade_level_assign_subject_err"></ul>
            </div>

            <div class="modal-body">
            <form id="grade_level_assign_subject_form" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    
                    <select  class="form-select" id="grade_level_assign_subject_subject_id" onchange="grade_level_assign_subject_fetch_subjects()">
                    {{-- Display Subjects to be added on grade level--}}
                    </select>
                    
                </div>
                <br>
                <div class="form-group">
                    <input type="text" class="form-control" id="grade_level_assign_subject_fetch_subject_name" name="subject_name">
                    {{-- Fetch id here this must be hidden--}}
                    <input type="text" class="form-control" id="grade_level_assign_subject_fetch_subject_id" name="subject_id" style="display:none">
                </div>
                
            </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_grade_level_assign_subject" onclick="">Submit</button>
            <button type="button" class="btn btn-success" id="btn_update_grade_level_assign_subject" style="display:none" onclick="">Save</button>
            </div>
        </div>
        </div>
    </div>


{{--End Assign Subjects--}}