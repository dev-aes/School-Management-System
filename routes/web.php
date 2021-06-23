<?php

// Global Facades

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// Admin Restful Controllers
 
use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeeController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\GradeLevelController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\ParentPaymentController;
use App\Http\Controllers\Admin\PaymentModeController;
use App\Http\Controllers\Admin\StudentFeeController;
use App\Http\Controllers\Admin\PaymentReportController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubjectStudentController;

// User Restful Controllers

use App\Http\Controllers\User\ParentController as UserParentController;
use App\Http\Controllers\User\StudentController as UserStudentController;

// Route::get('/testlink', function() {

    // Artisan::call('optimize');

//     return view('test');
// });


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/test', function () {
    return view('test.index');
});


// Admin Dashboard
Route::middleware(['auth' , 'admin'])->group(function() {

    //DASHBOARD 
        Route::resource('/home', DashboardController::class);
    // End Dashboard

    // Reports

        // display students enroled in a particula academic year
        Route::get('/admin/report/display_student/academic_year/{academic_year}', [ReportController::class, 'report_display_students_by_ay'])->name('report.display_students_by_ay');

         // get student grade form
        Route::get('/admin/report/form_138/display_student_record/{student}', [ReportController::class, 'to_form_138_show_by_student_id'])->name('report.to_form_138_show_by_student_id');

        Route::resource('/admin/report', ReportController::class);
    // end Report



    Route::resource('/admin/school', SchoolController::class);
    Route::resource('/admin/teacher', TeacherController::class);
    Route::resource('/admin/subject', SubjectController::class);
    Route::resource('/admin/grade_level',GradeLevelController::class );
    Route::resource('/admin/student', StudentController::class);
    Route::resource('/admin/fee', FeeController::class);
    Route::resource('/admin/studentfee', StudentFeeController::class);
    Route::resource('/admin/payment', PaymentController::class);
    Route::resource('/admin/payment_report', PaymentReportController::class);
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/parent', ParentController::class);
    Route::resource('/admin/payment_mode', PaymentModeController::class);
    Route::resource('/admin/section', SectionController::class);
    Route::resource('/admin/grade', GradeController::class);
    Route::resource('/admin/academic_year', AcademicYearController::class);
    Route::resource('/admin/role', RoleController::class);



    //Grade()  Assign Grade to Subject 
    //display students and grades
    Route::get('/admin/home/displaygrade', [GradeController::class, 'grade_display_grades_subjects_by_student_id'])->name('grade.grade_display_grades_subjects_by_student_id');

    Route::get('/admin/home/createGrade', [GradeController::class, 'grade_display_subjects_by_student_id'])->name('grade.grade_display_subjects_by_student_id');
    
    Route::post('/admin/home/createGrade', [GradeController::class, 'store'])->name('grade.grade_store_subject');



    // Section add Teacher

    Route::get('/admin/home/createTeacher', [SectionController::class, 'section_create_teacher'])->name('section.section_create_teacher');
    Route::post('/admin/home/createTeacher', [SectionController::class, 'section_store_teacher'])->name('section.section_store_teacher');

    
    // teacher assign subject to student 

        //( Display all Teachers)
        Route::get('/admin/home/teacher/display_teachers', [TeacherController::class, 'teacher_assign_subject_to_student_display_teachers'])->name('teacher.teacher_assign_subject_to_student_display_teachers');

        // (Display all Section by Teachers ID)
        //Route::get('/admin/home/teacher/display_teachers/display_sections/{teacher}', [TeacherController::class, 'teacher_assign_subject_to_student_display_sections'])->name('teacher.teacher_assign_subject_to_student_display_sections');
        Route::get('/admin/home/teacher/display_teachers/display_sections', [TeacherController::class, 'teacher_assign_sections_display_sections'])->name('teacher.teacher_assign_section_display_sections');

    // End
    

    //Display subjects and teachers of student
    Route::get('/admin/home/student/{id}', [StudentController::class, 'display_student_subjects_and_teachers'])->name('student.student_display_subjects_teachers');


    //Display sections by teacher id
    Route::get('/admin/home/teacher/{teacher}', [TeacherController::class, 'display_section_by_teacher'])->name('teacher.display_section_by_teacher');
    //Display subjects by sections grade level id
    Route::get('/admin/home/teacher/section/{section}', [TeacherController::class, 'display_subjects_by_grade_level_id'])->name('teacher.display_subjects_by_grade_level_id');
    Route::post('/admin/home/teacher/section', [TeacherController::class, 'store_subjects_by_grade_level_id'])->name('teacher.store_subjects_by_grade_level_id');


    //Assign Subject Student
    Route::post('/admin/home/teacher/storeAssignSection', [TeacherController::class, 'teacher_assign_section'])->name('teacher.teacher_assign_section');

    
    //End



    // teacher add subject2

    //Teacher Add Subject 6/18/21
    Route::get('/admin/home/addSubject/{teacher}', [TeacherController::class,'teacher_teacher_display_grade_level_by_teacher_id'])->name('teacher.teacher_teacher_display_grade_level_by_teacher_id');

    
    Route::get('/admin/home/createSubject',[TeacherController::class, 'teacher_create_subject_2'])->name('teacher.teacher_create_subject_2');
    Route::get('/admin/home/createSubject/{teacher}',[TeacherController::class, 'teacher_display_by_teacher_id'])->name('teacher.teacher_display_by_teacher_id');
    Route::get('/admin/home/createSubject/teacher/{grade_level}',[TeacherController::class, 'teacher_subject2_display_subjects_by_teacher_grade_level_id'])->name('teacher.teacher_subject2_display_subjects_by_teacher_grade_level_id');
    Route::post('/admin/home/createSubject',[TeacherController::class, 'teacher_store_subject'])->name('teacher.teacher_store_subject2');

    // teacher add student2
    Route::get('/admin/home/createStudent/student/{grade_level}',[TeacherController::class, 'teacher_student2_display_subjects_by_teacher_grade_level_id'])->name('teacher.teacher_student2_display_subjects_by_teacher_grade_level_id');
    Route::post('/admin/home/createStudent',[TeacherController::class, 'teacher_store_student'])->name('teacher.teacher_store_student2');


    // teacher add subject
    Route::post('/admin/teacher/createSubject', [TeacherController::class, 'teacher_store_subject'])->name('teacher.teacher_store_subject');
    Route::delete('/admin/teacher/{teacher}/{subject}', [TeacherController::class, 'teacher_destroy_subject'])->name('teacher.teacher_destroy_subject');

    // teacher add student 
    Route::post('/admin/teacher/createStudent', [TeacherController::class, 'teacher_store_student'])->name('teacher.teacher_store_student');
    // teacher delete student
    Route::delete('/admin/teacher/deleteStudent/{teacher}/{student}', [TeacherController::class, 'teacher_destroy_student'])->name('teacher.teacher_destroy_student');


    //? Teacher show students by its section id 06/19/21
    Route::get('/admin/teacher/show_students/{section}', [TeacherController::class, 'teacher_display_students_by_section_id'])->name('teacher.teacher_display_students_by_section_id');

    //? Teacher Delete Section 
    Route::delete('/admin/teacher/deleteSection/{teacher}/{section}', [TeacherController::class, 'teacher_destroy_section'])->name('teacher.teacher_destroy_section');

    //? Teacher Delete Subject to Section

    Route::put('/admin/teacher/deleteSubject/{teacher}/{subject}/{section}', [TeacherController::class , 'teacher_destroy_section_subject'])->name('teacher.teacher_destroy_section_subject');

    //? Teacher Assign Grade to Student's Subject { DISPLAY ALL TEACHERS}

    Route::get('/admin/teacher/assign_grade_to_student/display_teachers', [TeacherController::class, 'teacher_assign_grade_to_subject_display_teachers'])->name('teacher.teacher_assign_grade_to_subject_display_teachers');

    //? Teacher Assign Grade to Student's Subject { DISPLAY ALL Sections by teacher ID}

    Route::get('/admin/teacher/assign_grade_to_student/display_sections/{teacher}', [TeacherController::class, 'teacher_assign_grade_to_subject_display_sections_by_teacher_id'])->name('teacher.teacher_assign_grade_to_subject_display_sections_by_teacher_id');

    //? Teacher Assign Grade to Student's Subject { DISPLAY ALL Students  by teacher's section ID}

    Route::get('/admin/teacher/assign_grade_to_student/display_students/{section}', [TeacherController::class, 'teacher_assign_grade_to_subject_display_students_by_section_id'])->name('teacher.teacher_assign_grade_to_subject_display_students_by_section_id');

    //? Teacher Assign Grade to Student's Subject { DISPLAY ALL Subjects  by teacher's section ID}

    Route::get('/admin/teacher/assign_grade_to_student/display_subjects/{teacher}/{section}', [TeacherController::class, 'teacher_assign_grade_to_subject_display_subjects_by_teacher_and_section_id'])->name('teacher.teacher_assign_grade_to_subject_display_subjects_by_teacher_and_section_id');




    // student truncate all records
    Route::post('/admin/student/truncateStudent', [StudentController::class , 'truncate'])->name('student.truncate');
    //student display teacher subject
    Route::get('/admin/student/teacher/{id}', [StudentController::class, 'display_student_teacher_subject'])->name('student.teacher_subject');
    //student store student teacher (assign teacher to a student)
    Route::post('/admin/student/createTeacher', [StudentController::class, 'store_student_teacher_subject'])->name('student.store_teacher_subject');
    // student delete subject_teacher
    Route::delete('/admin/student/deleteTeacher/{id}', [StudentController::class, 'delete_student_teacher_subject'])->name('student.delete_teacher_subject');


    // display sub fee by grade_level_id
    Route::get('/admin/fee/grade_level/{grade_level}', [FeeController::class, 'displaySubFeeByGradeLevelID'])->name('fee.display_sub_fee_by_grade_level_id');


    //Student Fee display grade_level by student _id
    Route::get('/admin/studentfee/student/{student}', [StudentFeeController::class, 'displayGradeLevelByStudentID'])->name('studentfee.display_grade_level_by_student_id');



    // Payment display total balance by student_id
    Route::get('/admin/payment/student_fee/{id}', [PaymentController::class, 'displayTotalBalanceByStudentID'])->name('payment.display_total_balance_by_student_id');



    // User display student info 

    Route::get('/admin/user/student/{student}', [UserController::class, 'display_student_info'])->name('user.display_student_info');

    // User display parent info
    Route::get('/admin/user/parent/{parent}', [UserController::class, 'display_parent_info'])->name('user.display_parent_info');


    // Parent display Student 

    Route::get('/admin/home/parent/createStudent', [ParentController::class, 'parent_display_student'])->name('parent.parent_display_student');

    // Parent Store Student

    Route::post('/admin/home/parent/createStudent',[ParentController::class, 'parent_student_store'])->name('parent.parent_student_store');

    // Parent Destroy Student

    Route::delete('/admin/home/parent/deleteStudent/{parent}/{student}', [ParentController::class, 'parent_destroy_student'])->name('parent.parent_destroy_student');

    // Admin Display Parent Payment Request by parent_id && student_id

    Route::get('/admin/payment_request/parent/{parent}/student/{student}', [ParentPaymentController::class, 'edit'])->name('parent_payment_request.edit');

    // Admin Update Payment Request By Parent_id and Student_id

    Route::put('/admin/payment_request/parent/{parent}/student/{student}', [ParentPaymentController::class, 'update'])->name('parent_payment_request.update');

    // Admin Udpate Payment Request by Payment_request_ID
    Route::patch('/admin/payment_request/{parent_payment}', [ParentPaymentController::class, 'admin_update'])->name('parent_payment_request.update_parent_payment_request');

    // Display all Pending Parent Payment Request
    Route::get('/admin/payment_request', [ParentPaymentController::class, 'index'])->name('parent_payment_request.index');

    // Display all Approved Parent Payment Request
    Route::get('/admin/payment_request/approved', [ParentPaymentController::class, 'get_payment_approved_payment_request'])->name('parent_payment_request.get_payment_approved_payment_request');

    // Display all Declined Parent Payment Request
    Route::get('/admin/payment_request/declined', [ParentPaymentController::class, 'get_payment_declined_payment_request'])->name('parent_payment_request.get_payment_declined_payment_request');
    Route::get('/admin/payment_request/declined', [ParentPaymentController::class, 'get_payment_declined_payment_request'])->name('parent_payment_request.get_payment_declined_payment_request');
    
    



    // IMPORTABLES [students, subjects , teachers]
    Route::post('/admin/student/importStudent', [StudentController::class, 'import'])->name('student.import');
    Route::post('/admin/subject/importSubject', [SubjectController::class, 'import'])->name('subject.import');
    Route::post('/admin/teacher/importTeacher', [TeacherController::class, 'import'])->name('teacher.import');



    //Grade Level Assign Subjects
    Route::get('/admin/gradeLevel/addSubjects/{grade_level}', [GradeLevelController::class, 'display_subjects_for_grade_level'])->name('grade_level.display_subjects_for_grade_level');
    Route::post('/admin/gradeLevel/addSubjects', [GradeLevelController::class, 'grade_level_assign_subject_subject_id_store'])->name('grade_level.grade_level_assign_subject_subject_id_store');
    


});



// User check for online / offline status

// Route::put('/admin/home/{user}', [UserController::class, 'isOnline'])->name('user.isOnline');

// Display Users On Admin Dashboard







 // Student Dashboard

    Route::get('/dashboard/student', [UserStudentController::class , 'index'])->name('student.dashboard');
    Route::patch('/dashboard/user/student/{student}', [UserStudentController::class, 'update'])->name('student.student_update');


 // End Student Dashboard



 // Parent Dashboard

    Route::get('/dashboard/parent', [UserParentController::class , 'index'])->name('parent.dashboard');


    // Parent Create Downpayment or Monthly Payment by student id
    // Parent Show Payment_ledger by student id (CREATE / PAY MONTHLY PAYMENT)

    Route::get('/dashboard/parent/{student}', [UserParentController::class, 'parent_show_payment_ledger'])->name('parent.parent_show_payment_ledger');

    // Parent add payment to Student  (STORE MONTHLY PAYMENT)
    Route::post('/dashboard/parent', [UserParentController::class, 'parent_store_payment_to_student'])->name('parent.parent_store_payment_to_student');

    // Parent add downpayment to Student (STORE DOWN PAYMENT)
    Route::post('/dashboard/parent/store_downpayment', [UserParentController::class, 'parent_store_down_payment_to_student'])->name('parent.parent_store_down_payment_to_student');

    // Parent Show Payment History by student id and parent id

    Route::get('/dashboard/parent/{parent}/{student}', [UserParentController::class, 'parent_show_payment_history'])->name('parent.parent_show_payment_history');

    // Parent Show Payment Receipt / Details by Payment_id

    Route::get('/dashboard/payment/{payment}', [UserParentController::class, 'parent_show_payment'])->name('parent.parent_payment_show');



// End Parent Dashboard



Auth::routes(['register' => false]);
