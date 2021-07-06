
$(()=> {

    //* Cross Site Protection
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    if(window.location.href == route('school.index')) 
    {
        displaySchools(); // after loading the school page ; load the school data
        $('#school_announcement').emojioneArea();

    }


     if(window.location.href == route('teacher.index'))
    {
        let column = 'first_name';
        let teacher_column_data = [ {data: 'id'}, {data: 'first_name'}, {data: 'last_name'}, {data: 'gender'}, {data: 'city'}, {data: 'contact'}, 
                                    {data: 'teacher_avatar', render(data){
                                       return img_catch(data, `storage/uploads/teacher/${data}`);
                                    }},
                                    {data: 'actions', orderable: false, searchable: false} ];

            crud_index('.teacher_DT', 'teacher.index', teacher_column_data, column); // after loading the teacher page ; load the teacher data
  
    }


     if(window.location.href == route('subject.index'))
    {
        let column = 'name';
        let subject_column_data = [ {data:'id'}, {data:'name'}, {data:'description'}, {data:'actions',  orderable: false, searchable: false} ];

        crud_index('.subject_DT', 'subject.index', subject_column_data, column); // after loading the subject page ; load the subject data

    }


     if(window.location.href == route('grade_level.index')) 
    {
        let column = 'name';
        let grade_level_column_data = [ {data:'id'}, {data: 'name'}, {data: 'description'}, {data: 'actions'} ];

        crud_index('.grade_level_DT', 'grade_level.index', grade_level_column_data, column); // after loading the grade level page ; load the grade level data

        $('.grade_level_assign_subject_subject_id').select2({
            dropdownParent: $('#grade_level_assign_subject')
        });
    }


    if(window.location.href == route('section.index'))
    {
        let column = 'name';
        let section_column_data = [{data: 'id'}, {data: 'name'}, {data: 'description'}, {data: 'actions', orderable: false, searchable: false} ];
        crud_index('.section_DT', 'section.index', section_column_data, column); // after loading the section page ; load the section data

        $('#section_section_id').select2({
            dropdownParent: $('#section_teacher_modal')
        });
        $('#section_teacher_id').select2({
            dropdownParent: $('#section_teacher_modal')
        });

    }


    if(window.location.href == route('student.index')) 
    {
        let column = 'first_name';
        let student_column_data = [{data: 'id'}, {data: 'first_name'}, {data: 'last_name'}, {data: 'gender'}, {data: 'name'}, {data: 'address'}, {data: 'contact'},
                                   {data: 'student_avatar', render(data){
                                    return img_catch(data, `storage/uploads/student/${data}`);
                                 }}, 
                                   {data: 'actions'},
                                  ];
        
         crud_index('.student_DT', 'student.index', student_column_data, column); // after loading the student Information page ; load the Student Information data
    }


    if(window.location.href == route('fee.index'))
    {
        let column = 'name';
        let fee_column_data = [ {data: 'name'},
                                {data: 'total_amount', render(data) {
                                return  `₱ ${data.toLocaleString()}`
                                },},
                                {data: 'actions'} ]

        crud_index('.fee_DT', 'fee.index', fee_column_data, column); // after loading the Fee Information page ; load the Fee Information data
    }


    if(window.location.href == route('studentfee.index'))
    {
        let column = 'student_name';

        let student_fee_column_data = [
                                        {data: 'id'},
                                        {data: 'student_name'},
                                        {data: `amount_payable`, render(data) {
                                             let value = parseFloat(data).toFixed(2);
                                             value = parseFloat(date);
                                             res(typeOf(value));
                                             //let value =  roundoff(data);

                                             return (data ? `₱ ${value}` : "0" )
                                        },},
                                        {data: 'months_no'},
                                        {data: 'downpayment'},
                                        {data: 'paid', render(data) {
                                            // let value = parseFloat(data).toFixed(2);
                                            let value =  roundoff(data);
                                            return (data ? `₱ ${value}` : "0" )
                                        },},
                                        {data: 'total_balance', render(data) {
                                            // let value = parseFloat(data).toFixed(2);
                                            let value =  roundoff(data);
                                             return (data ? `₱ ${value}` : "0" )
                                        },},
                                        {data: 'monthly_payment', render(data) {
                                            // let value = parseFloat(data).toFixed(2);
                                            let value =  roundoff(data);
                                            return (data ? `₱ ${value}` : "0" )

                                        },},
                                        {data: 'status', render(data) {
                                            if(data == 'active')
                                            {
                                                return  `<span class='badge bg-success text-uppercase'> ${data.toLocaleString()} </span>`

                                            }
                                            else 
                                            {
                                                return  `<span class='badge bg-primary text-uppercase'> ${data.toLocaleString()} </span>`

                                            }
                                        },},
                                        {data: 'actions'},
                                      ]

            crud_index('.student_fee_DT', 'studentfee.index', student_fee_column_data, column); // after loading the StudentFee Information page ; load the Student Fee Information data
            
            $('#student_fee_student_id').select2({
                dropdownParent: $('#student_fee_modal')
            });
                              
    }


    if(window.location.href == route('payment.index'))
    {
        let column = 'first_name';

        let payment_column_data = [
                                    {data: 'id'},
                                    {data: 'first_name'},
                                    {data: 'last_name'},
                                    {data: `amount`, render(data) {
                                        return  `₱ ${data.toLocaleString()}`
                                    },},
                                    {data: 'actions'}
                                  ];
        crud_index('.payment_DT', 'payment.index', payment_column_data, column); // after loading the Payment Information page ; load the Payment Fee Information data

        $('#payment_student_fee_id').select2({
            dropdownParent: $('#payment_modal')
        });
    }


    if(window.location.href == route('payment_report.index'))
    {
        displayPaymentReport(); // after loading the Payment Report page ; load the Payment Report  data
    }


    if(window.location.href == route('user.index'))
    {
       let column = 'name';
       let user_column_data = [ {data: 'id'}, {data: 'name'}, {data: 'email'}, {data: 'role.name'}, {data: 'actions', orderable: false, searchable: false} ];

       crud_index('.user_DT', 'user.index',user_column_data, column); // after loading the User page ; load the User  data

       
        $('#user_teacher_id').select2({
            dropdownParent: $('#user_modal')
        });

        $('#user_student_id').select2({
            dropdownParent: $('#user_modal')
        });

        $('#user_parent_id').select2({
            dropdownParent: $('#user_modal')
        });
    }

    
    if(window.location.href == route('parent.index'))
    {
        let column = 'name';

        let parent_column_data = [ {data: 'id'}, {data: 'name'}, {data: 'email'}, {data: 'contact'}, {data: 'facebook'}, {data: 'actions'} ];

        crud_index('.parent_DT', 'parent.index', parent_column_data, column); // after loading the Parent page ; load the Parent  data
    }


    if(window.location.href == route('parent_payment_request.index'))
    {
        display_parent_payment_request(); // after loading the Parent payment_request ; load the Parent payment request data

    }


    if(window.location.href == route('payment_mode.index'))
    {
        let column = 'title';

        $('#payment_mode_title').tagsinput();

        let payment_mode_column_data = [
                                            {data: 'id'},
                                            {data: 'title'},
                                            {data: 'created_at', render(data){
                                                let date = new Date(data);
                                                return date.toLocaleDateString();
                                            }},
                                            {data: 'actions'}
                                        ];

        crud_index('.payment_mode_DT','payment_mode.index', payment_mode_column_data, column ); // after loading the  payment mode ; load the payment mode data
    }


    if(window.location.href == route('academic_year.index'))
    {
        let column = 'academic_year';
        $('#accademic_year').tagsinput();
       
        let ay_column_data = [
                              {data:'id'},
                              {data:'academic_year'}, 
                              {data:'status', render(data) {
                                    return (data ==1)? data = `<span class='badge bg-success'>active</span>` : data = `<span class='badge bg-warning'>inactive</span>`;
                              }},
                              {data: 'actions', orderable: false, searchable: false}
                              ];
                            
        crud_index('.academic_year_DT','academic_year.index', ay_column_data, column); // after loading the  Academic Year  ; load the  Academic Year data

    }


    if(window.location.href == route('role.index'))
    {
        let column = 'name';
        let role_column_data = [ {data: 'name'}, {data: 'actions',  orderable: false, searchable: false} ];
        crud_index('.role_DT', 'role.index', role_column_data, column); // after loading the Role ; load the Role data

        $('#role_title').tagsinput(); 
    }

    if(window.location.href == route('values.index'))
    {
        let column = 'title';
        $('#values_title').tagsinput(); 

        let values_column_data = [{data:'id'}, {data: 'title'}, {data: 'actions',  orderable: false, searchable: false} ];
        crud_index('.values_DT', 'values.index', values_column_data, column); // after loading the Role ; load the Role data
    }


    if(navigator.onLine)
    {
        $('.online_check').html(`<p class='ms-5'>Online <i class="fas fa-circle text-success"></i> </p>`)
    }


    window.addEventListener('online', ()=> {
        $('.online_check').html(`<p class='ms-5'>Online <i class="fas fa-circle text-success"></i> </p>`)

    })


    window.addEventListener('offline', ()=> {
        $('.online_check').html(`<p class='ms-5'>Offline <i class="fas fa-circle text-danger"></i> </p>`)

    })


    window.addEventListener("beforeunload",function(e){
        e.preventDefault();
        document.body.className = "page-loading";
    },false);
   

    // for printing
    window.onbeforeprint = function() {
       $('#p_signature').css('display','block');
       $('#p_label').css('display', 'block');
    };



    // select 2 UI FOR DISPLAYING Search box in select input field

        $('.teacher_assign_subjects_to_section_display_subjects').select2({
            dropdownParent: $('#teacher_assign_subject_section_modal')
        });

        $('#teacher_assign_grade_to_student_subject_section_id').select2({
            
            dropdownParent: $('#teacher_assign_grade_to_student_subject_modal')
        });

        $('#grade_assign_grade_to_student_subject_teacher_id').select2({
            dropdownParent: $('#teacher_assign_grade_to_student_subject_modal')
        });

        $('#teacher_assign_subject_section_teacher_id').select2({
            dropdownParent: $('#teacher_assign_subject_section_modal')

        });
        
        $('#teacher_assign_subject_section_section_id').select2({
            dropdownParent: $('#teacher_assign_subject_section_modal')

        });

        $('#section_section_id').select2({
            dropdownParent: $('#section_teacher_modal')

        });
        
        $('#section_teacher_id').select2({
            dropdownParent: $('#section_teacher_modal')

        });

        $('#parent_parent_id').select2({
            dropdownParent: $('#parent_student_modal')

        });

        $('#parent_student_id').select2({
            dropdownParent: $('#parent_student_modal')

        });








});

let selected = []; // dynamic container for table row_id's
// for multiple selection
row_select($('.subject_DT tbody'));
row_select($('.student_DT tbody'));
row_select($('.teacher_DT tbody'));

let average_container = []; // student's grade average

// display admin dashboard

AdminDashBoardDisplayUser();



/** 
 * * <------------ Start Academic Year
 * TODO CRUD Academic Year (Completed)
 */

// create
$('#add_accademic_year').on('click', ()=> {
    $('#accademic_year_modal').modal('show');
    $('#accademic_year_modal_label').html(`<h3 class='text-white'> Add Academic Year </h3>`);
    $('#accademic_year_modal_header').removeClass('bg-primary').addClass('bg-success');
    $('#accademic_year').val('');

});

//store
function createAY()
{
    if(isNotEmpty($('#accademic_year')))
    {
        $.ajax({
            method: 'POST',
            url: route('academic_year.store'),
            dataType:'json',
            data: {academic_year:$('#accademic_year').val()},
            success: response => {
                console.log(response);
                if(response == 'success')
                {
                    toastSuccess("Academic Year Added");
                    $('.academic_year_DT').DataTable().draw();
                    //$('#accademic_year_modal').modal('hide');
                }
            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        })
    }
}


// academic year activation
function activateAY(e)
{
    let ay_id = $('#school_ay').val();

    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "Please double check before activating",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#95a5a6',
        confirmButtonText: 'Yes, activate it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'PUT',
                url: route('academic_year.update', ay_id),
                success: response => {
                      if(response == 'success')
                      {
                        toastSuccess('Academic Activated');
                      }
                },
                error: err => { 
                    toastDanger();
                    console.log(err);
                }
            })
        }
      })
}

//* ---------------> End Academic Year


/** 
 * * <------------------ START SCHOOL MANAGEMENT
 * TODO CRUD School (Completed)
 */


// index
function displaySchools() {

    $.ajax({
        url:route('school.index'),
        dataType: 'json',
        success: school => {
            // display school's information
           
            let output = `<table class="table table-borderless" style='width:65%;margin-left:auto;'>
                                <tbody>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>School</th>
                                    <td>${school[0].school_name}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>DepEd No</th>
                                    <td>${school[0].depEd_no}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>${school[0].city}</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th>Province</th>
                                    <td>${school[0].province}</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th>Country</th>
                                    <td>${school[0].country}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>${school[0].address}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Contact</th>
                                    <td>${school[0].contact}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>${school[0].email}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Website</th>
                                    <td>${school[0].website}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Facebook</th>
                                    <td>${school[0].facebook}</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th>No of Months</th>
                                    <td>${school[0].months_no}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            
                                </tbody>
                            </table>`;



            $('#school_img').attr('src', '/storage/uploads/school/' + school[0].school_logo);
            $('#school_details').html(output);

            //display all available academic year
            let ay_output = `<option> </option>`;
            school[1].forEach(ay => {
                ay_output+= `<option value='${ay.id}'>${ay.academic_year} </option>`;
            });
            $('#school_ay').html(ay_output);

            // display current academic year

            $('#school_display_ay').text(school[2].academic_year);
        },
        error : err => {
            console.log(err);
        }
    })

}


// create
$('#add_school').on('click', ()=> {

    $('#school_modal').modal('show');
    $('#school_modal').show();
    $('#school_modal_label').html(`Add School <i class="fas fa-school"></i> `);
    $('#school_name').attr('value', '');
    $('#depEd_no').attr('value', '');
    $('#city').attr('value', '');
    $('#province').attr('value', '');
    $('#country').attr('value', '');
    $('#address').attr('value', '');
    $('#contact').attr('value', '');
    $('#email').attr('value', '');
    $('#website').attr('value', '');
    $('#facebook').attr('value', '');
    $('#school_logo').attr('value', '');
    $('#btn_add_school').css('display', 'block');
    $('#btn_update_school').css('display', 'none');
    $('#preview_img').css('display','none');
});
    

// edit
function editSchool(id) {
    $.ajax({
        url: route('school.edit', id),
        dataType:'json',
        data: {id:id},
        cache: false,
        success: school => {
           $('#school_modal').modal('show');
           $('#school_modal_label').html(`<h4 class='text-white'> Edit School <i class="fas fa-edit"></i> </h4> `);
           $('#months_no').attr('value', school.months_no);
           $('#date_started').attr('value', school.date_started);
           $('#school_name').attr('value', school.school_name);
           $('#depEd_no').attr('value', school.depEd_no);
           $('#city').attr('value', school.city);
           $('#province').attr('value', school.province);
           $('#country').attr('value', school.country);
           $('#address').attr('value', school.address);
           $('#contact').attr('value', school.contact);
           $('#email').attr('value', school.email);
           $('#facebook').attr('value', school.facebook);
           $('#website').attr('value', school.website);
           $('#school_logo').attr('value', school.school_logo);
           $('#preview_school_img').css('display','block').attr('src', '/storage/uploads/school/'+ school.school_logo);
           $('#btn_add_school').css('display', 'none');
           $('#btn_update_school').css('display', 'block').attr('data-id', school.id);
           $('#school_modal_header').removeClass('bg-primary').addClass('bg-success');

        },
        error: err => {

            toastDanger();
        }
    })
}


// update
function updateSchool() {


    let form = $('#school_form')[0];
    let update_form_data = new FormData(form);
    update_form_data.append('_method', 'PATCH');

    

    let id = $('#btn_update_school').attr('data-id');
    let school_name = $('#school_name');
    let depEd_no = $('#depEd_no');
    let city = $('#city');
    let province = $('#province');
    let country = $('#country');
    let address = $('#address');
    let contact = $('#contact');
    let email = $('#email');
    let facebook = $('#facebook');
    let website = $('#website');
    let school_logo = $('#school_logo');

    if(isNotEmpty(school_name) && isNotEmpty(depEd_no) && isNotEmpty(city) && isNotEmpty(province) && isNotEmpty(country) && isNotEmpty(address) && isNotEmpty(contact) && isNotEmpty(email)) 
    {
        $.ajax({
            method:'POST',
            url:route('school.update', id),
            data: update_form_data,
            processData: false,
            contentType: false,
            success: response => {
                console.log(response);
                toastSuccess('School Updated')
                $('#school_DT').DataTable().draw();
                $('#school_modal').modal('hide');
                $('#school_div_err').css('display', 'none');
                $('#school_err').html('');
            },
            error: err => {
                let err_msg = '';
                $.each(err.responseJSON.errors,function(field_name,error){
                   err_msg += `<li class='text-secondary'> ${error} </li>`;
                }) 
                $('#school_div_err').css('display', 'block');
                $('#school_err').html(err_msg);
            }
        })
    }
}

// * --------> End School()


/** 
 * * <------------ Start Teacher
 * TODO CRUD Teacher (Completed)
 */


// create
$('#add_teacher').on('click', ()=> {
    $('#teacher_modal').modal('show');
    $('#teacher_modal_label').html(`<h4 class='text-white'> Add Teacher <i class="fas fa-user-plus"></i> </h4>`);
    $('#teacher_first_name').attr('value', '');
    $('#teacher_middle_name').attr('value', '');
    $('#teacher_last_name').attr('value', '');
    $('#teacher_birth_date').attr('value', '');
    $('#teacher_gender').attr('value', '');
    $('#teacher_city').attr('value', '');
    $('#teacher_province').attr('value', '');
    // $('#teacher_country').attr('value', '');
    $('#teacher_address').attr('value', '');
    $('#teacher_contact').attr('value', '');
    $('#teacher_facebook').attr('value', '');
    $('#teacher_email').attr('value', '');
    $('#teacher_avatar').attr('value', '');
    $('#btn_add_teacher').css('display', 'block');
    $('#btn_update_teacher').css('display', 'none');
    $('#preview_teacher_img').css('display','none');
    $('#teacher_modal_header').removeClass('bg-success').addClass('bg-primary');

});
    // end teacher Modal
    $('#teacher_assign_subject_section').on('click', ()=> {
        $('#teacher_assign_subject_section_modal').modal('show');
        $('#teacher_assign_subject_section_label').html(`<h4 class='text-white'> Assign Subjects to Section </h4>`);
        $('#teacher_assign_subject_section_header').addClass('bg-primary');
        $.ajax({
            url:route('teacher.teacher_assign_subject_to_student_display_teachers'),//Route Display All teacher
            dataType:'json',
            success:teachers =>{
               // res(teachers);
                 let output = `<option></option>`;

                 teachers.forEach(teacher => {
                    output += `<option value='${teacher.id}'> ${teacher.id} - ${teacher.first_name} ${teacher.last_name} </option>`
                });
                $('#teacher_assign_subject_section_teacher_id').html(output);
            },
            error:err=>{
                res(err)
            }

        })


    });
    //Display section by teacher id
    function display_section_by_teacher(){
        let teacher_id = $('#teacher_assign_subject_section_teacher_id').val();

        if(teacher_id > 0)
        {
            $.ajax({
                url:route('teacher.display_section_by_teacher',teacher_id),
                dataType:'json',
                success:sections => {
                    let output = `<option></option>`;
                    sections.forEach(section => {
                        output += `<option value='${section.id}'> ${section.id} - ${section.name} </option>`
                    });
                    $('#teacher_assign_subject_section_section_id').html(output);
                },
                error:err => {
                    res(err)
                }
    
            })
        }
        else
        {
            $('#teacher_assign_subject_section_section_id').html(``); 
        }
       
    }
    //


    //Display subjects by grade level
    function display_subject_by_grade_level(){
        let section_id = $('#teacher_assign_subject_section_section_id').val();

        if(section_id > 0)
        {
            $.ajax({
                url:route('teacher.display_subjects_by_grade_level_id',section_id),
                dataType:'json',
                success:subjects => {
                   // res(subjects);
                    let output = `<option></option>`;
                    subjects.forEach(subject => {
                        output += `<option value='${subject.id}'>${subject.name} </option>`
                    });
                    $('#teacher_assign_subject_section_subject_id').html(output);
                },
                error:err => {
                    res(err)
                }
    
            })
        }
        else
        {
            $('#teacher_assign_subject_section_subject_id').html(``);

        }
        
       
    }

    function store_subjects_by_grade_level_id(){
        let teacher_id = $('#teacher_assign_subject_section_teacher_id').val();
        let section_id = $('#teacher_assign_subject_section_section_id').val();
        let subject_id = $('#teacher_assign_subject_section_subject_id').val();
        let form = $('#teacher_assign_subject_section_form');
        

        if(teacher_id > 0 || section_id > 0 || subject_id >0){
          $.ajax({
            method: 'POST',
            url: route('teacher.store_subjects_by_grade_level_id'),
            dataType: 'json',
            data:form.serialize(),
            success:response => {
                res(response);
                if(response == 'success')
                {
                    toastSuccess("Subjects Assigned");
                }
                if(response == 'error'){
                    toastr.warning("Subject already assigned");
                }
            },
            error:err => {
                res(err);
            }
          })  
           
              
        }
        else{
            toastWarning();
        }


    }




// store
function createTeacher()  {

    let form = $('#teacher_form')[0];
    let form_data = new FormData(form);

    let first_name = $('#teacher_first_name');
    let middle_name = $('#teacher_middle_name');
    let last_name = $('#teacher_last_name');
    let birth_date = $('#teacher_birth_date');
    let gender = $('#teacher_gender');
    let city = $('#teacher_city');
    let province = $('#teacher_province');
    let country = $('#teacher_country');
    let address = $('#teacher_address');
    let contact = $('#teacher_contact');
    let facebook = $('#teacher_facebook');
    let email = $('#teacher_email');
    let avatar = $('#teacher_avatar');



    // checking for an empty field
    if(isNotEmpty(first_name) && isNotEmpty(middle_name) && isNotEmpty(last_name) && isNotEmpty(birth_date) && isNotEmpty(gender) && isNotEmpty(city) && isNotEmpty(province) && isNotEmpty(country) && isNotEmpty(address) && isNotEmpty(contact) && isNotEmpty(facebook) && isNotEmpty(email)) 
    {
        $.ajax({
            method:'POST',
            url:route('teacher.store'),
            data: form_data,
            processData: false,
            contentType: false,
            success: response => {
                
                toastSuccess('Teacher Added')
                $('#teacher_DT').DataTable().draw();
                form.reset();
                $('#teacher_modal').modal('hide');
                $('#teacher_div_err').css('display', 'none');
                $('#teacher_err').html('');
            },
            error: err => {
                let err_msg = '';
                $.each(err.responseJSON.errors,function(field_name,error){
                   err_msg += `<li class='text-secondary'> ${error} </li>`;
                }) 
                $('#teacher_div_err').css('display', 'block');
                $('#teacher_err').html(err_msg);
            }
        })
    }
}


// show 
 function showTeacher(id) {
    $('#teacher_addSubject_modal').modal('hide');
    $('#teacher_addStudent_modal').modal('hide');

    $.ajax({
        url: route('teacher.show', id),
        dataType:'json',
        data: {id:id},
        success: teacher => {
          // res(teacher[1]);
           let teacher_avatar = img_catch(teacher[0].teacher_avatar,`storage/uploads/teacher/${teacher[0].teacher_avatar}`, 250);
           $('#show_teacher_modal').modal('show');
           $('#show_teacher_modal_header').addClass('bg-info');
           let output = `<ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="teacherinfo-tab" data-bs-toggle="tab" data-bs-target="#teacherinfo" type="button" role="tab" aria-controls="teacherinfo" aria-selected="true">Teacher Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="subjects-tab" data-bs-toggle="tab" data-bs-target="#subjects" type="button" role="tab" aria-controls="subjects" aria-selected="false">Subject</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="section-tab" data-bs-toggle="tab" data-bs-target="#sections" type="button" role="tab" aria-controls="sections" aria-selected="false">Section</button>
                        </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">`;

            output += `     <div class="tab-pane fade show active" id="teacherinfo" role="tabpanel" aria-labelledby="home-tab"> <br>
                                <div class='row'>
                                    <div class='col-md-6 mb-5'>
                                        <br>
                                        <center>${teacher_avatar}</center>
                                    </div>

                                    <div class='col-md-6'>
                                        <div class='row'>
                                            <div class='col-md-8'>
                                                    <p class='text-muted lead'> Basic Info  <i class="fas fa-info-circle"></i> </p> <br>
                                                    <div class='d-flex justify-content-between'>
                                                        <div>
                                                            <p class='text-muted text-capitalize'> Name: </p>
                                                            <p class='text-muted text-capitalize'> Birth Date:  </p>
                                                            <p class='text-muted text-capitalize'> Gender </p>
                                                            <p class='text-muted text-capitalize'> City: </p>
                                                            <p class='text-muted text-capitalize'> Province: </p>
                                                            <p class='text-muted text-capitalize'> Country: </p>
                                                            <p class='text-muted text-capitalize'> Address: </p>
                                                            <p class='text-muted text-capitalize'> Contact:  </p>
                                                            <p class='text-muted text-capitalize'> Facebook: </p>
                                                            <p class='text-muted text-capitalize'> Email:  </p>
                                                        </div>
                                                
                                                        <div>
                                                            <p class='text-capitalize'> ${teacher[0].first_name} ${teacher[0].last_name}  </p>
                                                            <p class='text-capitalize'>  ${teacher[0].birth_date} </p>
                                                            <p class='text-capitalize'>  ${teacher[0].gender} </p>
                                                            <p class='text-capitalize'>  ${teacher[0].city} </p>
                                                            <p class='text-capitalize'>  ${teacher[0].province} </p>
                                                            <p class='text-capitalize'>  ${teacher[0].country} </p>
                                                            <p class='text-capitalize'> ${teacher[0].address} </p>
                                                            <p class='text-capitalize'>  ${teacher[0].contact} </p>
                                                            <p class='text-capitalize'> ${teacher[0].facebook} </p>
                                                            <p class='text-capitalize'> ${teacher[0].email} </p>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class='col-md-4'></div>
                                        </div>
                                    </div>
                                </div>
                             </div>

                         <div class="tab-pane fade" id="subjects" role="tabpanel" aria-labelledby="profile-tab">
                            <ul class='list-group'><br><br>
                                <h3 class='text-muted text-center'> Assigned Subjects </h3> <br>
                                <div class='table-responsive'>
                                <table class='table table-hover'> 
                                <thead> 
                                    <tr> 
                                        <th> Subject </th>
                                        <th> Description </th>
                                        <th> Section </th>
                                        <th>  </th>
                                    </tr>
                                </thead>
                                <tbody>
                            `;
                            // Teacher Subject Table

                        teacher[2].forEach(subject => {
                     
                    output += ` 
                                <tr id='subject-${subject.id}'>
                                    <td>${subject.name}</td>
                                    <td>${subject.description}</td>
                                    <td>${subject.section}</td>
                                    <td><a class='text-danger' href='javascript:void(0)' onclick='teacher_destroy_section_subject(${teacher[0].id}, ${subject.id}, ${subject.section_id})'> <i class="fas fa-times fa-lg"></i></a> </td>
                                </tr>`;

                                       
                        }); // loop closer
              
             
                    output += `    
                                </tbody>
                                </table>
                                </div>
                                </ul>
                            </div>`;


                    // Teacher Section
                    output += `<div class="tab-pane fade" id="sections" role="tabpanel" aria-labelledby="section-tab">
                                <div class="accordion py-5" id="accordionExample">`;


                            teacher[1].forEach(section => {
                          
                    output += `
                                    <div class="accordion-item" id='section-${section.id}'>
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${section.id}" aria-expanded="true" aria-controls="collapseOne" onclick='teacher_display_students_by_section_id(${section.id})'>
                                            Section: <span class='ms-2 text-primary fw-bold text-uppercase'> ${section.name} </section>
                                            </button>
                                            <a class='btn btn-sm text-danger float-end mt-2 me-3 mb-2' href='javascript:void(0)' onclick='teacher_destroy_section(${section.id},${teacher[0].id})' title='delete section'> <i class="fas fa-times fa-lg"></i> </a>

                                        </h2>
                                        <div id="collapse-${section.id}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body" id='display_students-${section.id}'>
                                            
                                            </div>
                                        </div>
                                    </div>`;

                                }) // foreach closer


                output += `    </div>    
                        </div>`; // closer tab

            $('#show_teacher_info').html(output);

        },
        error: err => {

        }
    })
}


// Teacher Delete Assigned subjects to Section

function teacher_destroy_section_subject(teacher,subject,section) 
{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method:'PUT',
                url:route('teacher.teacher_destroy_section_subject',[teacher,subject,section]),
                success: response => {
                    res(response);
                    toastSuccess("Section Deleted")
                    $('#subject-'+subject).remove().fadeOut('slow');
                },
                error: err => {
                    res(err);
                    toastDanger();
                }

            })
        }
    });
}



// Teacher Delete Assigned SECTION

function teacher_destroy_section(section, teacher)
{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method:'DELETE',
                url:route('teacher.teacher_destroy_section',[teacher,section]),
                success: response => {
                    res(response);
                    toastSuccess("Section Deleted")
                    $('#section-'+section).remove().fadeOut('slow');
                },
                error: err => {
                    res(err);
                    toastDanger();
                }

            })
        }
    });
}


function teacher_display_students_by_section_id(id) 
{
   $.ajax({
      url: route('teacher.teacher_display_students_by_section_id',id),
      dataType:'json',
      success: students => {
          res(students);
          let output = `<table class='table table-hover table-bordered'>
                            <thead>
                                <tr> 
                                    <th> Student Name </th>
                                    <th> Gender </th>
                                </tr>
                            </thead>
                            <tbody>
                        `;
            students.forEach(student => {
                output += `<tr>
                            <td><img class='rounded-circle me-2' src='/storage/uploads/student/${student.student_avatar}' width='35'>${student.first_name} ${student.last_name} </td>
                            <td> ${student.gender} </td>
                          </tr>`
            }) // loop closure

            output += `</tbody>
                     </table>`; // table closure
 
                $('#display_students-'+ id).html(output); // dynamic id + elemt id

      },
      error: err => {
          res(err);
          toastDanger();
      }
   })
}

// teacher student 

    function teacher_createStudent(id) {
        $('#show_teacher_modal').modal('hide');
        $('#teacher_addStudent_modal').modal('show');

        $.ajax({
            url: route('teacher.show', id),
            data: {id:id},
            dataType:'json',
            success: students => {
                let output= ` `;
                students[4].forEach(student => {
                    output += ` 
                            <div class='form-check'>
                            <input class="form-check-input" type="checkbox" name='student_id[]' value="${student.id}" id="student_id-${student.id}">
                            <h4 class="form-check-label text-muted" for="flexCheckDefault">
                            ${student.first_name} ${student.last_name}
                            </h4>
                            </div>`;
                    $('#_teacher_id').attr('value', id);
                    $('#teacher_student').html(output);
                })
            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        })
    }

    // Teacher Store Student

    function teacher_storeStudent(event) {
        event.preventDefault();
        let add_student_form = $('#teacher_add_student_form');

        $.ajax({
            method: 'POST',
            url : route('teacher.teacher_store_student'),
            data: add_student_form.serialize(),
            success: response => {
                console.log(response);
                if(response == 'success') 
                {
                return toastSuccess('Student Added');
                }

                if(response == 'error') {
                return  toastr.warning('Some of the student is already assigned to your class');
                    
                }

                if(response == 'not enrolled') {
                    return  toastr.warning('Some of the student/s are not yet enrolled');
                    
                }

            
            },
            error: err => {
                toastDanger();
                console.log(err);
            }
        }) 
    }

// Teacher Delete Student

    function teacher_destroyStudent(id, teacher_id) {
        if(confirm("Do you want to delete?"))
        {
            $.ajax({
                method: 'DELETE',
                url: route('teacher.teacher_destroy_student',[ id, teacher_id]),
                data: {
                    student_id: id,
                    teacher_id : teacher_id
                },
                success: response => {
                    console.log(response);
                    toastSuccess('Student Deleted')
                    showTeacher(teacher_id);
                },
                error: err => {
                    toastDanger();
                    console.log(err);
                }
            })
        }
    }
// Teacher Subject
function teacher_createSubject(id) 
{
    $('#show_teacher_modal').modal('hide');
    $('#teacher_addSubject_modal').modal('show');

    $.ajax({
        url: route('teacher.show', id),
        data: {id:id},
        dataType:'json',
        success: subjects => {
            // console.log(subjects);
            let output=' <option></option>';
            subjects[2].forEach(subject => {
                // output += `<option value='${subject.id}'>  ${subject.name}  </option>`;
                // $('#teacher_subject').html(output);

                output += ` 
                        <div class='form-check'>
                        <input class="form-check-input" type="checkbox" name='subject_id[]' value="${subject.id}" id="student_id-${subject.id}">
                        <h4 class="form-check-label text-muted" for="flexCheckDefault">
                         ${subject.name}
                        </h4>
                        </div>`;
                         $('#teacher_subject').html(output);
            })
        },
        error: err => {
            toastDanger();
            console.log(err);
        }
    })

    $('#teacher_id').attr('value', id);

}

function teacher_storeSubject(event)
{   
   event.preventDefault();
   let teacher_add_subject_form = $('#teacher_add_subject_form');
   $.ajax({
       method:'POST',
       url: route('teacher.teacher_store_subject'),
       data: teacher_add_subject_form.serialize(),
       success: response => {
           if(response == 'success')
           {
                toastSuccess('Subject Added');
           }
           else 
           {
               return toastr.warning('You already have this subject');
           }

       },
       error: err => {
         console.log(err);
       }

   })
}

function teacher_destroySubject(id) {
    let teacher_id = $('#subject_teacher_id').attr('data-id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'DELETE',
                url: route('teacher.teacher_destroy_subject', [teacher_id , id]),
                success: response => {
                      toastSuccess('Subject Deleted');
                      showTeacher(teacher_id);
                },
                error: err => { 
                    toastDanger();
                    console.log(err);
                }
            })
        }
      })
    
}

function back() {
    let teacher_id = $('#teacher_id').attr('value');
    showTeacher(teacher_id);
}
 
// end teacher subject


// edit
 function editTeacher(id) {
    $.ajax({
        url: route('teacher.edit', id),
        dataType:'json',
        data: {id:id},
        cache: false,
        success: teacher => {
           $('#teacher_modal').modal('show');
           $('#teacher_modal_label').html(`<h4 class='text-white'>Edit Teacher <i class="fas fa-user-plus"></i> </h4> `);
           $('#teacher_first_name').attr('value', teacher.first_name);
           $('#teacher_middle_name').attr('value', teacher.middle_name);
           $('#teacher_last_name').attr('value', teacher.last_name);
           $('#teacher_birth_date').attr('value', teacher.birth_date);
           $('#teacher_gender').attr('value', teacher.gender);
           $('#teacher_city').attr('value', teacher.city);
           $('#teacher_province').attr('value', teacher.province);
           $('#teacher_country').attr('value', teacher.country);
           $('#teacher_address').attr('value', teacher.address);
           $('#teacher_contact').attr('value', teacher.contact);
           $('#teacher_facebook').attr('value', teacher.facebook);
           $('#teacher_email').attr('value', teacher.email);
           $('#teacher_avatar').attr('value', teacher.teacher_avatar);
           $('#preview_teacher_img').css('display','block').attr('src', "/storage/uploads/teacher/" + teacher.teacher_avatar);
           $('#btn_add_teacher').css('display', 'none');
           $('#btn_update_teacher').css('display', 'block').attr('data-id', teacher.id);
           $('#teacher_modal_header').removeClass('bg-primary').addClass('bg-success');
        
        },
        error: err => {
            toastDanger();
        }
    })
}



// update
 function updateTeacher() {

    //form data
    let form = $('#teacher_form')[0];
    let teacher_update_form_data = new FormData(form);
    teacher_update_form_data.append('_method', 'PATCH');

    // form entities
    let id = $('#btn_update_teacher').attr('data-id');
    let first_name = $('#teacher_first_name');
    let middle_name = $('#teacher_middle_name');
    let last_name = $('#teacher_last_name');
    let birth_date = $('#teacher_birth_date');
    let gender = $('#teacher_gender');
    let city = $('#teacher_city');
    let province = $('#teacher_province');
    let country = $('#teacher_country');
    let address = $('#teacher_address');
    let contact = $('#teacher_contact');
    let facebook = $('#teacher_facebook');
    let email = $('#teacher_email');
    let avatar = $('#teacher_avatar');


    //validation
    if(isNotEmpty(first_name) && isNotEmpty(middle_name) && isNotEmpty(last_name) && isNotEmpty(birth_date) && isNotEmpty(gender) && isNotEmpty(city) && isNotEmpty(province) && isNotEmpty(country) && isNotEmpty(address) && isNotEmpty(contact) && isNotEmpty(facebook) && isNotEmpty(email)) 
    {
        $.ajax({
            method:'POST',
            url:route('teacher.update', id),
            data: teacher_update_form_data,
            processData: false,
            contentType: false,
            success: response => {
               
                toastSuccess('Teacher Updated')
                $('#teacher_DT').DataTable().draw();
                $('#teacher_modal').modal('hide');
            },
            error: err => {
                let err_msg = '';
                $.each(err.responseJSON.errors,function(field_name,error){
                   err_msg += `<li class='text-secondary'> ${error} </li>`;
                }) 
                $('#teacher_div_err').css('display', 'block');
                $('#teacher_err').html(err_msg);
            }
        })
    }
}


// delete
 function deleteTeacher(id) {
    
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method:'DELETE',
                url:route('teacher.destroy', id),
                data:{id:selected},
                success: response => {
                   toastSuccess('Teacher Deleted');
                   $('#teacher_DT').DataTable().draw();
                },
                error: err => {
                    toastDanger();
                    console.log(err);
                }
        
            })
        }
      })

}


// Teacher Add subject II
$('#teacher_add_subject2').on('click', ()=> {
    $('#teacher_subject2_modal').modal('show');
    $('#teacher_subject2_modal_label').html(`<h4 class='text-white'> Teacher · Add Subject </h4>`);
    $('#teacher_subject2_teacher').attr('value', "");
    $('#teacher_subject2_grade_level_id').attr('value', "");
    $('#teacher_subject2_subject').html("");
    $('#teacher_add_subject2_modal_header').removeClass('bg-success').addClass('bg-primary');


  //  
    $.ajax({
        url: route('teacher.teacher_create_subject_2'),
        dataType:'json',
        success: teachers => {
           // return console.log(teachers);

           //display teachers
            let output = `<option> </option>`;
                teachers[0].forEach(teacher => {
                    output += `<option value='${teacher.id}'> ${teacher.id} - ${teacher.first_name} ${teacher.last_name} </option>`
                });
                $('#teacher_subject2_teacher').html(output);

            //  //Display grade levels
            //  let gl = `<option> </option>`;
            //     teachers[1].forEach(grade_level => {
            //         gl += `<option value='${grade_level.id}'> ${grade_level.name} </option>`
            //     });
            //     $('#teacher_subject2_grade_level').html(gl);

        },
        error: err => {
            console.log(err);
            toastDanger();
        }
    })

}); 

// display teacher's grade level by ID 6/18/21

function teacher_teacher_display_grade_level_by_teacher_id() 
{
    let teacher_id = $('#teacher_subject2_teacher').val();

    $.ajax({
        url: route('teacher.teacher_teacher_display_grade_level_by_teacher_id', teacher_id),
        dataType:'json',
        success: grade_levels => {
          // res(grade_levels);

          

          //const uniqueArr = [... new Set(grade_levels.map(data => data.name))] 

          // res(uniqueArr); 
           
           let output = `<option> </option>`;
        
        //    function removeDups(array) {
        //     let unique = {};
        //     grade_levels.forEach(function(i) {
        //       if(!unique[i]) {
        //         unique[i] = true;
        //       }
        //     });
        //     return Object.keys(unique);
        //   }

        //   


        const distinct_grade_levels = Array.from(new Set(grade_levels.map(s => s.id)))
                            .map(id => {
                                return {
                                    id:id,
                                    name: grade_levels.find(s => s.id === id).name
                                };
                            });
                           // res(distinct_grade_levels);


           distinct_grade_levels.forEach(grade_level => {

               output += `<option value='${grade_level.id}'>${grade_level.name} </option>`
          
            });
           $('#teacher_subject2_grade_level').html(output);
        },
        error: err => {
            console.log(err);
        }
    })

}



//Display subjects by grade level
function teacher_subject2_display_subjects_by_grade_level(){
  let gl =  $('#teacher_subject2_grade_level').val();
    teacher_subject2_display_subjects_by_teacher_grade_level_id(gl);
}

// display subjects by grade level id
function teacher_subject2_display_subjects_by_teacher_grade_level_id(id) {

    if(id > 0)
    {
        $.ajax({
            url: route('teacher.teacher_subject2_display_subjects_by_teacher_grade_level_id', id),
            dataType:'json',
            success: subjects => {
               // return console.log(subjects);
                let output= ` `;
                subjects.forEach(subject => {
                    output += ` 
                            <div class='form-check'>
                            <input class="form-check-input" type="checkbox" name='subject_id[]' value="${subject.id}" id="subject_id-${subject.id}">
                            <h4 class="form-check-label text-muted" for="flexCheckDefault">
                             ${subject.name}
                            </h4>
                            </div>`;
                    $('#teacher_subject2_subject').html(output);
                })
            },
            error: err => {
                console.log(err);
            }
        })
    }
    else
    {
        $('#teacher_subject2_teacher').attr('value', "");
        $('#teacher_subject2_grade_level_id').attr('value', "");
        $('#teacher_subject2_subject').html("");
    }

}

    //display all subject by teacher's grade_level
    function teacher_subject2_display_grade_level() {
        let teacher_id = $('#teacher_subject2_teacher').val();
      
        if(parseInt(teacher_id) > 0)
        {
            $.ajax({
                url: route('teacher.teacher_display_by_teacher_id', teacher_id),
                dataType:'json',
                success: teacher => {
                    //res(teacher);
                    $('#teacher_subject2_grade_level_id').attr('value', teacher);//Grade Level ID
      
                    teacher_subject2_display_subjects_by_teacher_grade_level_id( $('#teacher_subject2_grade_level_id').attr('value') );
                },
                error: err => {
                    console.log(err);
                    toastDanger();
                }
            })
        }
        else
        {
          $('#teacher_subject2_teacher').attr('value', "");
          $('#teacher_subject2_grade_level_id').attr('value', "");
          $('#teacher_subject2_subject').html("");
        }
        
      }
      



function teacher_subject_2_store_teacher_subject() {
   let teacher_subject2_form = $('#teacher_subject2_form');
   $.ajax({
       method: 'POST',
       url: route('teacher.teacher_store_subject2'),
       dataType:'json',
       data:teacher_subject2_form.serialize(),
       success: response => {
          // return res(response);
            if(response == 'success')
            {
                toastSuccess('Subject Added');
            }
            else 
            {
                return toastr.warning('You already have this subject or some subjects selected are already assigned');
            }
       },
       error: err => {
           console.log(err);
           toastDanger();
       }
   })
}

// end teacher add subjectII


// teacher add Student II

// Teacher Add subject II
$('#teacher_add_student2').on('click', ()=> {
    $('#teacher_student2_modal').modal('show');
    $('#teacher_student2_modal_label').html(`<h4 class='text-white'> Teacher · Add Student </h4>`);
    $('#teacher_student2_teacher').attr('value', "");
    $('#teacher_student2_grade_level_id').attr('value', "");
    $('#teacher_student2_subject').html("");
    $('#teacher_add_student2_modal_header').removeClass('bg-success').addClass('bg-primary');


    $.ajax({
        url: route('teacher.teacher_create_subject_2'),
        dataType:'json',
        success: teachers => {
            let output = `<option> </option>`;
                teachers.forEach(teacher => {
                    output += `<option value='${teacher.id}'> ${teacher.id} - ${teacher.first_name} ${teacher.last_name} </option>`
                });
                $('#teacher_student_teacher').html(output);
        },
        error: err => {
            console.log(err);
            toastDanger();
        }
    })

}); 

function teacher_student2_display_grade_level()
{
    let teacher_id = $('#teacher_student_teacher').val();

    if(parseInt(teacher_id) > 0)
    {
        $.ajax({
            url: route('teacher.teacher_display_by_teacher_id', teacher_id),
            dataType:'json',
            success: teacher => {
                $('#teacher_student2_grade_level_id').attr('value', teacher);

                teacher_student2_display_subjects_by_teacher_grade_level_id($('#teacher_student2_grade_level_id').attr('value'));
  
            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        })
    }
    else
    {
      $('#teacher_student2_teacher').attr('value', "");
      $('#teacher_student2_grade_level_id').attr('value', "");
      $('#teacher_student2_subject').html("");
    }
}

function teacher_student2_display_subjects_by_teacher_grade_level_id(id) {

    if(id > 0)
    {
        $.ajax({
            url: route('teacher.teacher_student2_display_subjects_by_teacher_grade_level_id', id),
            dataType:'json',
            success: students => {
                let output= ` `;
                if(students.length > 0)
                {
                    students.forEach(student => {
                        output += ` 
                        <div class='form-check'>
                        <input class="form-check-input" type="checkbox" name='student_id[]' value="${student.id}" id="student_id-${student.id}">
                        <h4 class="form-check-label text-muted" for="flexCheckDefault">
                         ${student.first_name} ${student.last_name}
                        </h4>
                        </div>`;
                    })
                }
                else
                {
                    output += ` 
                        <div class='form-check'>
                        <h4 class="form-check-label text-muted" for="flexCheckDefault">
                           no available student
                        </h4>
                        </div>`;
                }
               
                    $('#teacher_student2_subject').html(output);
               
            },
            error: err => {
                console.log(err);
            }
        })
    }
    else
    {
        $('#teacher_subject2_teacher').attr('value', "");
        $('#teacher_subject2_grade_level_id').attr('value', "");
        $('#teacher_subject2_subject').html("");
    }

}

function teacher_student2_store_teacher_subject() {
    let teacher_student_form = $('#teacher_student2_form');
    $.ajax({
        method: 'POST',
        url: route('teacher.teacher_store_student2'),
        dataType:'json',
        data:teacher_student_form.serialize(),
        success: response => {
            // console.log(response);
            if(response == 'success') 
            {
              return toastSuccess('Student Added');
            }

            if(response == 'error') {
              return  toastr.warning('Some of the student is already assigned to your class');
                
            }

            if(response == 'not enrolled') {
                return  toastr.warning('Some of the student/s are not yet enrolled');
                  
              }
        },
        error: err => {
            console.log(err);
            toastDanger();
        }
    })
 }

 // import teacher data
 $('#imp_teacher').on('click', () => {
    $('#teacher_file').click();
});

 function import_teacher()
{
    let form = $('#teacher_import_form')[0];
    let form_data = new FormData(form);
    // form_data.append('_method', 'PATCH');


    Swal.fire({
        title: 'Do you want to import file?',
        text: "Accepting csv , xls , pdf file only",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, upload it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'POST',
                url: route('teacher.import'),
                dataType: 'json',
                data: form_data,
                processData: false,
                contentType: false,
                success: response => {
                    console.log(response);
                    if(response == 'success')
                    {
                              $('.teacher_DT').DataTable().draw();
                       return toastSuccess('Teacher Data Imported');
                    }
                },
                error: err => {
                    // console.log(err);
                    // return toastDanger();
                    let err_msg = '';
                    $.each(err.responseJSON.errors,function(field_name,error){
                       err_msg += `<li class='text-white'> ${error} </li>`;
                    }) 
                    return toastr.error(`${err_msg}`);
                }
            });
        }
      })
}


// teacher assign section

$('#teacher_assign_section').on('click', ()=> {
    $('#teacher_assign_section_modal').modal('show');
    $('#teacher_assign_section_label').html(`<h3 class='text-white'> Assign Subject - Student </h1>`);
    $('#teacher_assign_section_header').removeClass('bg-success').addClass('bg-primary');
    $('#teacher_assign_section_modal').modal('show');

    $.ajax({
        url: route('teacher.teacher_assign_subject_to_student_display_teachers'),
        dataType:'json',
        success: teachers => {
            let output = `<option> </option>`;
            teachers.forEach(teacher => {
                output += `<option value ='${teacher.id}'> ${teacher.first_name} ${teacher.last_name} </option>`;
            });

            // append all fetch teachers information
            $('#teacher_assign_section_teacher_id').html(output);
            
        },
        error: err => {
            console.log(err);
            toastDanger();
        }
    })
});

// display all section by teacher's id
function teacher_assign_section_display_section()
{
    let teacher_id =  $('#teacher_assign_section_teacher_id').val();

    if(teacher_id > 0)
    {
        $.ajax({
            //url: route('teacher.teacher_assign_subject_to_student_display_sections',teacher_id), removed teacher_id since we need to display all sections
            url: route('teacher.teacher_assign_section_display_sections'),
            dataType:'json',
            success: sections => {
                
                // display sections
                let section_output = `<option> </option>`;
                sections.forEach(section => {
                    section_output += `<option value='${section.id}'> ${section.name} </option>`;
                    $('#section_id').html(section_output);
                })
                $('#teacher_assign_section_section_id').html(section_output);

            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        })
    }
    else
    {
        // if there is no selected teacher then do not display its related subject
        $('#teacher_assign_subject_to_student_section_id').html('');
        $('#teacher_assign_subject_to_student_display_subjects').html('');
        $('#teacher_assign_subject_to_student_student_id').html('');
    }
}

//Assign Subject to student

function teacher_assign_section(){
   // let subject_form = $('#subject_form');

   let teacher_id = $('#teacher_assign_section_teacher_id').val();
   let section_id = $('#teacher_assign_section_section_id').val();

    let teacher_assign_section_form = $('#teacher_assign_section_form');
    // alert(teacher_assign_section_teacher_id.section_id);
    $.ajax({
        method: 'POST',
        url: route('teacher.teacher_assign_section'),
        data: {
            teacher_id: teacher_id,
            section_id: section_id
        },
        success: response => {
            if(response == 'success'){
                return toastSuccess("Teacher Assigned");
            }
            if(response == 'error'){
                return toastr.warning("Section already assigned");
            }    
        },
        error: err => {
           
        }
    })


}


// teacher assign grade to student's subject

$('#teacher_assign_grade_to_student').on('click', () => {
    $('#teacher_assign_grade_to_student_subject_modal').modal('show');
    $('#teacher_assign_grade_to_student_subject_header').addClass('bg-primary');

    // reset
    $('#teacher_assign_grade_to_student_subject_section_id').html(``);
    $('#teacher_assign_grade_to_student_subject_teacher_id').html(``);
    $('#teacher_assign_grade_to_student_subject_display_students').html(``);
    $('#teacher_assign_grade_to_student_display_encoding_of_grade').html(``);

    $.ajax({
        url: route('teacher.teacher_assign_grade_to_subject_display_teachers'),
        dataType:'json',
        success: teachers => {
            // res(teachers[1]);
            let output = `<option> </option>`;
            let output1 = `<option> </option>`;
            
            teachers[0].forEach(grade_level => {
                output += `<option value='${grade_level.id}'> Grade ${grade_level.grade_val} </option>`;
            })
            teachers[1].forEach(quarter => {
               
                output1 += `<option value='${quarter.quarter_val}'> ${quarter.name} </option>`;
            })

            $('#grade_assign_grade_to_student_subject_teacher_id').html(output);//Grade Options
            $('#teacher_assign_grade_to_student_subject_quarter_id').html(output1);//Quarter OPtions
        },
        error: err => {
            res(err);
        }
    })
});

function grade_assign_grade_to_student_subject_display_section()
{
    let grade_id = $('#grade_assign_grade_to_student_subject_teacher_id').val();

    if(grade_id > 0)
    {
        $.ajax({
            url: route('teacher.teacher_assign_grade_to_subject_display_sections_by_teacher_id', grade_id),
            dataType:'json',
            success: sections => {
                 //res(sections);
                let output = `<option> </option>`;
                sections.forEach(section => {
                    output += `<option value='${section.id}'>${section.name}</option>`;
                })
    
                $('#teacher_assign_grade_to_student_subject_section_id').html(output);
            },
            error: err => {
                res(err);
            }
        })
    }
    else
    {
        $('#teacher_assign_grade_to_student_subject_section_id').html(``);
        $('#teacher_assign_grade_to_student_subject_display_students').html(``);
        $('#teacher_assign_grade_to_student_display_encoding_of_grade').html(``);
    }
}

function teacher_assign_grade_to_student_subject_display_students_by_section_id()
{
    let section_id = $('#teacher_assign_grade_to_student_subject_section_id').val();
    //let teacher_id = $('#teacher_assign_grade_to_student_subject_teacher_id').val();
    if(section_id > 0)
    {
        $.ajax({
            url: route('teacher.teacher_assign_grade_to_subject_display_students_by_section_id', section_id),
            dataType:'json',
            success: students => {
                 //res(students);
                let output = `
                            <table class='table table-sm' id='teacher_assign_grade_to_subject_students_DT mt-5'>
                            <caption> List of Students </caption>
                                <thead style='background:none'>
                                    <tr>
                                        <th> Student Name</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                `;

                                students.forEach(student => {
                   output +=        `<tr>
                                        <td> ${student.first_name} ${student.last_name}</td>
                                        <td> <a class='btn btn-sm btn-info' href='javascript:void(0)'
                                         onclick='teacher_assign_grade_to_subject_create_grade(${student.student_id}, ${section_id} , ${student.adviser_id})'> Add Grade </a></td>
                                     </tr>
                                    `;                 
                                })
              
                $('#teacher_assign_grade_to_student_subject_display_students').html(output);

                $('#teacher_assign_grade_to_subject_students_DT').DataTable({
                    pageLength : 3,
                    lengthMenu: [[3, 10, 20, -1], [3, 10, 20]]
                });
            },
            error: err => {
                res(err);
            }
        })
    }
    else
    {
        $('#teacher_assign_grade_to_student_subject_display_students').html(``);
        $('#teacher_assign_grade_to_student_display_encoding_of_grade').html(``);

    }
}

// Create Grade

function teacher_assign_grade_to_subject_create_grade(student,section,adviser)
{
    
    $.ajax({
        url: route('teacher.teacher_assign_grade_to_subject_display_subjects_by_teacher_and_section_id', [section]),
        dataType:'json',
        data:{student_id:student}, // send the student id via get request
        success: student_subjects => {

            let output = `
                           <center><img class='rounded-circle' src='/storage/uploads/student/${student_subjects[0].student_avatar}' alt='student_avatar' width='50'></center>
                           <h5 class='text-muted fw-bold text-center mt-3' id='s_student' data-id='${student_subjects[0].id}'> Student : ${student_subjects[0].first_name} ${student_subjects[0].last_name} </h5>
                           <div class='table-responsive'>
                            <table class="table table-bordered mt-2" border="1" id='table_assign_grade_to_subject_student_grade_table'>
                            <thead style="background: none">
                                <tr class="text-center fw-bold">
                                    <td rowspan="2" style="width:25%">Learning Areas</td>
                                    <td colspan="4" style="width:25%">Quarter</td>
                                    <td rowspan="2" style="width:25%">Final Grade</td>
                                    <td rowspan="2" style="width:25%">Remark</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                            </thead>
                            <tbody>`;

                    student_subjects[1].forEach(subject => {
                        
                         let average = '';
                         let remark = '';

                         if(subject.quarter_1 !== null && subject.quarter_2 !== null &&subject.quarter_3 !== null && subject.quarter_4 !== null)
                         {
                            average = get_average([subject.quarter_1 + subject.quarter_2 + subject.quarter_3 + subject.quarter_4])/4;
                            remark = (average > 74) ? 'Passed': 'Failed';

                         }
                         
                         let result = subject.is_approve.split(',');

                         let q1_color = (result[0] == 1) ? 'warning' : ''; 
                         let q2_color = (result[1] == 2) ? 'warning' : '';
                         let q3_color = (result[2] == 3) ? 'warning' : ''; 
                         let q4_color = (result[3] == 4) ? 'warning' : '';

                         let q1 = (subject.quarter_1 == null) ? '' : subject.quarter_1 ;
                         let q2 = (subject.quarter_2 == null) ? '' : subject.quarter_2 ;
                         let q3 = (subject.quarter_3 == null) ? '' : subject.quarter_3 ;
                         let q4 = (subject.quarter_4 == null) ? '' : subject.quarter_4 ;     

                         average_container.push(average); // insert all average per row on average container[]
                         

                  output += ` <tr class='text-center s_subject' data-grades_id='${subject.id}' data-subject='${subject.subject_id}'>
                                <th >${subject.name}</th>
                                <td class='quarter' data-quarter='1' style='width:7%'><span class='text-${q1_color}'>${q1}</span></td>
                                <td class='quarter' data-quarter='2' style='width:7%'><span class='text-${q1_color}'>${q2}</span></td>
                                <td class='quarter' data-quarter='3' style='width:7%'><span class='text-${q1_color}'>${q3}</span></td>
                                <td class='quarter' data-quarter='4' style='width:7%'><span class='text-${q1_color}'>${q4}</span></td>`;
                                
                   output += `  <td class='average'>${average}</td>
                                <td class='remark'>${remark}</td>
                            </tr>
                      `;
                    });
                   
             output += `
                            <tr class="text-center fw-bold">
                                <td></td>
                                <td colspan="4">General Average</td>
                                <td class='final_grade'>${get_average(average_container)}</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        <form>
                            <input type='number' min='60' name='grade' id='g_grade' data-subject_id='' style='width:100%;display:none'>
                        </form>
                        `;

                        
            output += `<div class="row mt-2" id="descriptors">
                        <div class='table-responsive'>
                        <table class="table table-hover">
                            <thead style="background: none">
                                <tr class="fw-bold">
                                    <th>Descriptors</th>
                                    <th>Grading Scale</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Outstanding</td>
                                    <td>90-100</td>
                                    <td>Passed</td>
                                </tr>
                                <tr>
                                    <td>Very Satisfactory</td>
                                    <td>85-89</td>
                                    <td>Passed</td>
                                </tr>
                                <tr>
                                    <td>Satisfactory</td>
                                    <td>80-84</td>
                                    <td>Passed</td>
                                </tr>
                                <tr>
                                    <td>Fairly Satisfactory</td>
                                    <td>75-79</td>
                                    <td>Passed</td>
                                </tr>
                                <tr>
                                    <td>Did not Meet Expectations</td>
                                    <td>Below 75</td>
                                    <td>Failed</td>
                                </tr>
                            </tbody>
                        </table>
                        </div> `;
                        
                        // Observed Values

            output +=  `  
                        <h3 class="fw-bold text-uppercase text-center mb-5 mt-3"> report on learners observed values</h3>
                            <div class='table-responsive'>
                            <table class="table table-bordered" id='teacher_assign_observed_values_to_student'>
                                <thead style="background: none">
                                    <tr class="fw-bold text-center">
                                        <td rowspan="2">Core Values</td>
                                        <td rowspan="2">Behavior Statements</td>
                                        <td colspan="4">Quarter</td>
                                    </tr>

                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                    </tr>
                                    
                                </thead>
                                <tbody>`;

                                //res(student_subjects);
                                let index = 0; // counter
                                student_subjects[2].forEach(student_values => {

                                    let q1 = (student_values.q1 == null) ? "" : student_values.q1;
                                    let q2 = (student_values.q2 == null) ? "" : student_values.q2;
                                    let q3 = (student_values.q3 == null) ? "" : student_values.q3;
                                    let q4 = (student_values.q4 == null) ? "" : student_values.q4;


            output +=               `<tr class='v_values' data-description_id='${student_values.description_id}' data-values_id='${student_values.values_id}' data-student_id ='${student_subjects[0].id}' data-adviser_id='${adviser}'>`;
                                        if(index === student_values.values_id)
                                        {
            output +=                      `<td style='border-top:1px solid #fff !important'> </td>
                                            <td>${student_values.description}</td>
                                            <td class='values_quarter' data-quarter='1' style='width:7%'>${q1}</td>
                                            <td class='values_quarter' data-quarter='2' style='width:7%'>${q2}</td>
                                            <td class='values_quarter' data-quarter='3' style='width:7%'>${q3}</td>
                                            <td class='values_quarter' data-quarter='4' style='width:7%'>${q4}</td>`;
                                        }
                                        else
                                        {
                                            
            output +=                      `<td class='text-capitalize'>${student_values.title}</td>
                                            <td>${student_values.description}</td>
                                            <td class='values_quarter' data-quarter='1'style='width:7%'>${q1}</td>
                                            <td class='values_quarter' data-quarter='2'style='width:7%'>${q2}</td>
                                            <td class='values_quarter' data-quarter='3'style='width:7%'>${q3}</td>
                                            <td class='values_quarter' data-quarter='4'style='width:7%'>${q4}</td>`;  
                                        }
        
            output +=               `</tr>`; 

                                        index = student_values.values_id;

            
                                }) // closure
            
                                                

              output +=        `</tbody>
                        </table>
                        </div>
                    </div>

                    <div class="row mt-2" id="marking">
                    <div class='table-responsive'>
                    <table class="table ">
                        <thead style="background: none">
                            <tr class="fw-bold">
                                <th>Marking</th>
                                <th>Non-numerical Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>AO</td>
                                <td>Always Observed</td>
                            </tr>
                            <tr>
                                <td>SO</td>
                                <td>Sometimes Observed</td>
                            </tr>
                            <tr>
                                <td>RO</td>
                                <td>Rarely Observed</td>
                            </tr>
                            <tr>
                                <td>NO</td>
                                <td>Not Observed</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>` ;  
        

                         $('#teacher_assign_grade_to_student_display_encoding_of_grade').html(output);
        },
        error: err => {
            res(err);
        }
    })
}
// TODO ADMIN  TEACHER ASSIGN GRADE TO STUDENT
$(document).on('dblclick', '#table_assign_grade_to_subject_student_grade_table .s_subject .quarter', function() {

            $('#g_grade').remove();
            $(this).append(
                $(`<input type='number' min='60' name='grade' id='g_grade' style='width:100%;display:block'>`)
                .attr('data-subject_id',$(this).parent().attr('data-subject'))
                .attr('data-quarter_id', $(this).attr('data-quarter'))
                .attr('data-grades_id',$(this).parent().attr('data-grades_id'))
        
              ); // store subject id  && quarter_id  && grade_id to this input field
        
});

$(document).on('keypress', '#g_grade', function(e) {

    let teacher_id = $('#teacher_assign_grade_to_student_subject_teacher_id').val();
    let section_id = $('#teacher_assign_grade_to_student_subject_section_id').val();
    let student_id = $('#s_student').attr('data-id');
    let subject_id = $('#g_grade').attr('data-subject_id');
    let quarter_id = $('#g_grade').attr('data-quarter_id');
    let grades_id = $('#g_grade').attr('data-grades_id');
    let grades = $('#g_grade').val();
    
    if(e.keyCode == 13){
       console.log(
                    {
                     //  teacher_id: teacher_id, adviser ID
                        section_id: section_id,
                        quarter_id: quarter_id,
                        student_id: student_id,
                        subject_id: subject_id,
                        grades: grades,
                        grades_id: grades_id,


                    }
                  )
        
                  $.ajax({
                    method: 'POST',
                    url: route('grade.teacher_store_student_grade'),
                    dataType:'json',
                    data:{
                        
                        section_id: section_id,
                        quarter_id: quarter_id,
                        student_id: student_id,
                        subject_id:subject_id,
                        grades: grades,
                        grades_id: grades_id,
                    },
                   
                    success: response => {
                        // res(response);

                        let c = $(this).closest('tr').find('td.average');
                        let d = $(this).closest('tr').find('td.remark');
                        let a =  $(this).closest('tr').children('.quarter');
                        let x =  $(this).closest('td').text($(this).val());
                        let remark = '';
                        let average = ''
     
                         var texts = a.map(function() {
                             return $(this).text();
                         });
                     
                        let q1 = Object.values(texts)[0];
                        let q2 = Object.values(texts)[1];
                        let q3 = Object.values(texts)[2];
                        let q4 = Object.values(texts)[3];
                     

                        if(q1 !== '' && q2 !== '' && q3 !=='' && q4 !=='')
                        {
                             average = ( parseFloat(q1) + parseFloat(q2) + parseFloat(q3) + parseFloat(q4) ) / 4; // get the total avg of grades by quarter
                             remark = (average > 74) ? 'Passed': 'Failed'; // check if the grade is passed or failed

                        }

                
                       c.text(average);
                       d.text(remark);

                       
                      $('.final_grade').text(get_average(average_container)); // store the final average_grade
                      toastSuccess("Grade Added");
                        
                    },
                    error: err => {
                        console.log(err);
                    }
                })
                    
                  
                  
    }
})

$(document).on('mouseleave', '#g_grade', function(e) {
    $(this).css('display','none');
})



// TODO ADMIN TEACHER ASSIGN VALUES TO STUDENT

$(document).on('dblclick', '#teacher_assign_observed_values_to_student .v_values .values_quarter', function() {
    $('#v_values').remove();
    $(this).append(
        $(`<input type='text' name='values' id='v_values' style='width:100%;display:block' onkeypress="return /[a-z]/i.test(event.key)">`)
        .attr('data-values_id',$(this).parent().attr('data-values_id'))
        .attr('data-description_id', $(this).parent().attr('data-description_id'))
        .attr('data-student_id',$(this).parent().attr('data-student_id'))
        .attr('data-adviser_id',$(this).parent().attr('data-adviser_id'))
        .attr('data-quarter',$(this).attr('data-quarter'))
      ); // append values id  && description id  && student id to this input field
     
});

$(document).on('keypress', '#v_values', function(e) {

    let student_id = $('#v_values').attr('data-student_id');
    let adviser_id = $('#v_values').attr('data-adviser_id');
    let description_id = $('#v_values').attr('data-description_id');
    let values = $('#v_values').val();
    let quarter = $('#v_values').attr('data-quarter');

    if(e.keyCode == 13)
    {

        console.log({
            student_id:student_id,
            description_id:description_id,
            values:values,
            quarter: quarter,
            adviser_id:adviser_id
        })

        $.ajax({
            method: 'POST',
            url: route('teacher.teacher_assign_values_to_student'),
            dataType:'json',
            data:
            {
                student_id:student_id,
                adviser_id:adviser_id,
                // values_id:values_id,
                description_id:description_id,
                values:values,
                quarter:quarter
            },
            success: response => {
                res(response);
                if(response == 'success')
                {
                    $(this).closest('td').text($(this).val());
                    return toastSuccess("Values assigned ");

                }
                if(response == 'error')
                {
                    toastDanger();
                }
            },
            error: err => {
                res(err);
            }
        })
    }

});


$(document).on('mouseleave', '#v_values', function(e) {
    $(this).css('display','none');
})



//* ---------> END TEACHER MANAGEMENT 





/** 
 * * <------------ Start Subject
 * TODO CRUD Subject (Completed)
 */

// index
function displaySubjects() {


    $('.subject_DT').DataTable({
        processing: false,
        serverSide: true,
        retrieve: true,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                        // test
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll()
            }
        },
        "rowCallback": function( row, data ) {
            if ( $.inArray(data.id, selected) !== -1 ) {
                $(row).addClass('selected');
            }
        },
        autoWidth: false,
        ajax: route('subject.index'),
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'description'},
            {data: 'actions', orderable: false, searchable: false},
        ]
    });
}


// create
$('#add_subject').on('click', ()=> {
$('#subject_modal').modal('show');
$('#subject_modal_label').html(`<h4 class='text-white'> Add Subject <i class="fas fa-book-reader"></i> </h4> `);
$('#subject_name').attr('value', '');
$('#subject_description').attr('value', '');
$('#btn_add_subject').css('display', 'block');
$('#btn_update_subject').css('display', 'none');
$('#subject_modal_header').removeClass('bg-success').addClass('bg-primary');

    $.ajax({
        url: route('subject.create'),
        dataType:'json',
        success: grade_levels => {
            //res(grade_levels);
            let output=' <option></option>';
            grade_levels.forEach(grade_level => {
                output += `<option value='${grade_level.grade_val},${grade_level.id}'>Grade ${grade_level.grade_val}  </option>`;
                $('#grade_val').html(output);
            })
        },
        error: err => {
            console.log(err);
        }
    })

});



// store
function createSubject() {

    let subject_form = $('#subject_form');

    let name = $('#subject_name');
    let description = $('#subject_description');

    if(isNotEmpty(name) && isNotEmpty(description)) 
    {
        $.ajax({
            method: 'POST',
            url: route('subject.store'),
            data: subject_form.serialize(),
            success: response => {
               //res(response);
                toastSuccess('Subject Added');
                $('.subject_DT').DataTable().draw();
                subject_form[0].reset();
                $('#subject_div_err').css('display', 'none');
                $('#subject_err').html('');
            },
            error: err => {
                let err_msg = '';
                $.each(err.responseJSON.errors,function(field_name,error){
                   err_msg += `<li class='text-secondary'> ${error} </li>`;
                }) 
                $('#subject_div_err').css('display', 'block');
                $('#subject_err').html(err_msg);
            }
        })
    }
}


// show
function showSubject(id) 
{
    $.ajax({
        url: route('subject.show', id),
        dataType:'json',
        data: {id:id},
        success: subject => {
           $('#show_subject_modal').modal('show');
           $('#show_subject_modal_header').removeClass('bg-success').addClass('bg-info');
       
           let output = `
                         <ul class='list-group '>
                         <li class='list-group-item'><span class='badge bg-secondary'> Subject Name:</span> ${subject.name} </li>
                         <li class='list-group-item'><span class='badge bg-secondary'>Subject Description:</span> ${subject.description}  </li>
                         </ul>
                        `;
            $('#show_subject_info').html(output);
        },
        error: err => {

        }
    })
}


// edit
 function editSubject(id) {
    $.ajax({
        url: route('subject.edit', id),
        dataType:'json',
        data: {id:id},
        cache: false,
        success: subject => {
           $('#subject_modal').modal('show');

           $('#subject_modal_header').removeClass('bg-primary').addClass('bg-success');

           // display subject by ID
           $('#subject_modal_label').html(`<h4 class='text-white'> Edit Subject <i class="fas fa-edit"></i> </h4> `);
           $('#subject_name').attr('value', subject[0].name);
           $('#subject_description').attr('value', subject[0].description);
           $('#subject_grade_level').attr('value', subject[1].grade_level_id);
           $('#btn_add_subject').css('display', 'none');
           $('#btn_update_subject').css('display', 'block').attr('data-id', subject[0].id);

          // display all fetch Grade levels
          let output=`<option value='${subject[2].grade_val}'>Current [${subject[2].name}]</option>`;
           subject[1].forEach(grade_level => {
                 output += `<option value='${grade_level.id}'> Grade ${grade_level.grade_val} </option>`;
                 $('#grade_val').html(output);
           })
        },
        error: err => {
            toastDanger();
        }
    })
}


// update
function updateSubject()
{
    let subject_form = $('#subject_form');

    let name = $('#subject_name');
    let description = $('#subject_description');
    let id = $('#btn_update_subject').attr('data-id');
    let grade_val = $('#grade_val');

    if(isNotEmpty(name) && isNotEmpty(description)) 
    {
        $.ajax({
            method: 'PUT',
            url: route('subject.update', id),
            data: subject_form.serialize(),
            success: response => {
                console.log(response);
                toastSuccess('Subject Updated')
                $('.subject_DT').DataTable().draw();
                    subject_form[0].reset();
                $('#subject_modal').modal('hide');
            },
            error: err => {
                let err_msg = '';
                $.each(err.responseJSON.errors,function(field_name,error){
                   err_msg += `<li class='text-secondary'> ${error} </li>`;
                }) 
                $('#subject_div_err').css('display', 'block');
                $('#subject_err').html(err_msg);
            }
        })
    }
}



$('#imp_subject').on('click', () => {
    $('#subject_file').click();
});

function import_subject()
{
    let form = $('#subject_import_form')[0];
    let form_data = new FormData(form);
    // form_data.append('_method', 'PATCH');


    Swal.fire({
        title: 'Do you want to import file?',
        text: "Accepting csv , xls , pdf file only",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, upload it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'POST',
                url: route('subject.import'),
                dataType: 'json',
                data: form_data,
                processData: false,
                contentType: false,
                success: response => {
                    console.log(response);
                    if(response == 'success')
                    {
                              $('.subject_DT').DataTable().draw();
                       return toastSuccess('Subject Data Imported');
                    }
                },
                error: err => {
                    // console.log(err);
                    // return toastDanger();
                    let err_msg = '';
                    $.each(err.responseJSON.errors,function(field_name,error){
                       err_msg += `<li class='text-white'> ${error} </li>`;
                    }) 
                    return toastr.error(`${err_msg}`);
                }
            });
        }
      })
}

//* -------> END SUBJECT MANAGEMENT



/** 
 * * <------------ Start Grade Level
 * TODO CRUD Grade Level (Completed)
 */

// create
$('#add_grade_level').on('click', ()=> {
$('#grade_level_modal').modal('show');
$('#grade_level_modal_label').html(`<h4 class='text-white'> Add Grade Level <i class="fas fa-book-reader"></i> </h4> `);
$('#grade_level_name').attr('value', '');
$('#grade_level_description').attr('value', '');
$('#btn_add_grade_level').css('display', 'block');
$('#btn_update_grade_level').css('display', 'none');
$('#grade_level_modal_header').removeClass('bg-success').addClass('bg-primary');

});



// store
function createGradeLevel() {
    let grade_level_form = $('#grade_level_form');

    let name = $('#grade_level_name');
    let description = $('#grade_level_description');
    let grade_val = $('#grade_level_grade_val');

    if(isNotEmpty(name) && isNotEmpty(description) && isNotEmpty(grade_val)) 
    {
        $.ajax({
            method: 'POST',
            url: route('grade_level.store'),
            data: grade_level_form.serialize(),
            success: response => {
                // console.log(response);
                toastSuccess('Grade Level Added');
                $('.grade_level_DT').DataTable().draw();
                grade_level_form[0].reset();
                $('#grade_level_modal').modal('hide');
                $('#grade_level_div_err').css('display', 'none');
                $('#grade_level_err').html('');
            },
            error: err => {
                let err_msg = '';
                $.each(err.responseJSON.errors,function(field_name,error){
                   err_msg += `<li class='text-secondary'> ${error} </li>`;
                }) 
                $('#grade_level_div_err').css('display', 'block');
                $('#grade_level_err').html(err_msg);
            }
        })
    }
}


// show
 function showGradeLevel(id) 
 {
     $.ajax({
         url: route('grade_level.show', id),
         dataType:'json',
         data: {id:id},
         success: grade_level => {
            $('#show_grade_level_modal').modal('show'); 
            $('#show_grade_level_modal_header').removeClass('bg-success').addClass('bg-info');

            let output = `
                          <h4 class='fw-bold text-primary text-uppercase lead'> ${grade_level.name} </h4>
                          <br><br>
                          <table class='table table-hover '>
                          <caption>List of Subjects  </caption>
                             <thead class='bg-info text-white'>
                                <tr> 
                                    <th>Subject Name </th>
                                    <th> Subject Description </th>
                                </tr>
                             </thead>
                             <tbody>
                         `;

                grade_level.subject.forEach(subject => {
                    output += `<tr>
                                <td>${subject.name}</td> 
                                <td>${subject.description}</td> 
                               </tr>`;
                });

                output += `</tbody>
                          </table>`;

             $('#show_grade_level_info').html(output);
 
         },
         error: err => {
 
         }
     })
 }

// edit
 function editGradeLevel(id) {
    $.ajax({
        url: route('grade_level.edit', id),
        dataType:'json',
        data: {id:id},
        cache: false,
        success: grade_level => {
           $('#grade_level_modal').modal('show');
           $('#grade_level_modal_label').html(`<h4 class='text-white'> Edit Grade Level <i class="fas fa-edit"></i> </h4> `);
           $('#grade_level_name').attr('value', grade_level.name);
           $('#grade_level_description').attr('value', grade_level.description);
           $('#grade_level_grade_val').attr('value', grade_level.grade_val);
           $('#btn_add_grade_level').css('display', 'none');
           $('#btn_update_grade_level').css('display', 'block').attr('data-id', grade_level.id);
           $('#grade_level_modal_header').removeClass('bg-primary').addClass('bg-success');

        },
        error: err => {
            console.log(err);
        }
    })
 }

 // update
function updateGradeLevel() {
    let grade_level_form = $('#grade_level_form');

    let name = $('#grade_level_name');
    let description = $('#grade_level_description');
    let id = $('#btn_update_grade_level').attr('data-id');
    let grade_val = $('#grade_level_grade_val');


    if(isNotEmpty(name) && isNotEmpty(description)) 
    {
        $.ajax({
            method: 'PUT',
            url: route('grade_level.update', id),
            data: grade_level_form.serialize(),
            success: response => {
                toastSuccess('Grade Level Updated')
                $('.grade_level_DT').DataTable().draw();
                grade_level_form[0].reset();
                $('#grade_level_modal').modal('hide');
                $('#grade_level_div_err').css('display', 'none');
                $('#grade_level_err').html('');
            },
            error: err => {
                let err_msg = '';
                $.each(err.responseJSON.errors,function(field_name,error){
                   err_msg += `<li class='text-secondary'> ${error} </li>`;
                }) 
                $('#grade_level_div_err').css('display', 'block');
                $('#grade_level_err').html(err_msg);
            }
        })
    }
}

// delete
function deleteGradeLevel(id) {
  
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method:'DELETE',
                url:route('grade_level.destroy', id),
                data:{id:id},
                success: response => {
                    toastSuccess('Grade Level Deleted');
                    $('.grade_level_DT').DataTable().draw();
                },
                error: err => {
                    toastDanger();
                    console.log(err);
                }
    
            })
        }
      })
}

//* <-------- END Grade Level


/** 
 * * <------------ Start Section
 * TODO CRUD Section (Completed)
 */


// create
$('#add_section').on('click', ()=> {
    $('#section_modal').modal('show');
    $('#section_modal_label').html(`<h4 class='text-white'> Add Section </h4>`);
    $('#section_modal_header').removeClass('bg-success').addClass('bg-primary');
    $('#section_grade_level').html(``);
    $('#section_name').attr('value','');
     $('#section_description').attr('value','');
     $('#btn_add_section').css('display', 'block');
     $('#btn_update_section').css('display', 'none');


    $.ajax({
        url: route('section.create'),
        dataType:'json',
        success: grade_levels => {
            let output = `<option> </option>`;
            
            grade_levels.forEach(grade_level => {
                output += `<option value='${grade_level.id}'> ${grade_level.name} </option>`;
            });

            $('#section_grade_level').html(output);
        },
        error: err => {
            console.log(err);
        }
    })

});

// store
function createSection()
{
    let section_form = $('#section_form');
    let name = $('#section_name');
    let description = $('#section_description');

    if(isNotEmpty(name) && isNotEmpty(description))
    {
        $.ajax({
            method: 'POST',
            url: route('section.store'),
            dataType:'json',
            data:section_form.serialize(),
            success: response => {
               // res();
                if(response == 'success')
                {   

                    $('.section_DT').DataTable().draw();
                    return toastSuccess("Section Added");
                }
            },
            error: err => {
                let err_msg = '';
                $.each(err.responseJSON.errors,function(field_name,error){
                   err_msg += `${error}`;
                }) 
                toastr.warning(err_msg);
                
            }
        })
    }
}

function showSection(id)
{
    $('#show_section_modal').modal('show');
    $('#show_section_modal_header').addClass('bg-info');

    $.ajax({
        url: route('section.show',id),
        dataType:'json',
        success: section => {
         //  res(section);

           // display section -> gradelevel , teachers , students .
           let output = `
                        <div class='row'>
                                 <h3 class='text-muted'> Section: <span class='text-primary fw-bold text-uppercase'> ${section.name} </span> </h3>
                                 <h3 class='text-muted'> Grade Level: <span class='text-primary fw-bold text-uppercase'> ${section.grade_level.name} </span> </h3>
                        </div>

                        <div class='row py-5'>
                            <table class='table table-hover table-bordered  caption-top'>
                            <caption># Teachers  </caption>
                            <thead style='background:none'>
                                <tr> 
                                    <th> Teacher </th>
                                    <th>  Avatar </th>
                                </tr>
                            </thead>
                            <tbody>
                        `;

                        // display assigned teachers

                    section.teacher.forEach(teacher => {
                        let teacher_avatar = img_catch(teacher.teacher_avatar, `storage/uploads/teacher/${teacher.teacher_avatar}`);
                        output+= `
                                <tr> 
                                    <td>${teacher.first_name} ${teacher.last_name}</td>
                                    <td> ${teacher_avatar} </td>
                                </tr>
                                  `;
                    });

                output+= `</tbody>
                        </table>`; // closer for teachers table

                output+= ` <div class='row'>
                                <table class='table table-hover table-bordered  caption-top'  id='section_display_students'>
                                <caption># Students  </caption>
                                <thead style='background:none'>
                                    <tr> 
                                        <th> Student </th>
                                        <th>  Avatar </th>
                                    </tr>
                                </thead>
                                <tbody> 
                            `; // start student table


                        section.student.forEach(student => {
                            let student_avatar = img_catch(student.student_avatar, `storage/uploads/student/${student.student_avatar}`);
                            output+= `
                                    <tr> 
                                        <td>${student.first_name} ${student.last_name}</td>
                                        <td>${student_avatar}</td>
                                    </tr>
                                        `;
                        });

                output+= `</tbody>
                        </table>`; // closer for students table



        
                        $('#show_section_info').html(output); // append section info
                        $('#section_display_students').DataTable({
                            pageLength : 5,
                            lengthMenu: [[5, 10, 20, -1], [5, 10, 20]]
                        }); // DT

        },
        error: err => {
            //res(err);
            toastDanger();
        }
    })
}

// edit
function editSection(id)
{
    let section_form = $('#section_form');
    let name = $('#section_name');
    let description = $('#section_description');

    name.attr('value', ``);
    description.attr('value',``); // clear all before selecting 

    $('#section_modal').modal('show');
    $('#section_modal_label').html(`<h4 class='text-white'> Edit Section <i class="fas fa-edit"></i></h4>`);
    $('#section_modal_header').removeClass('bg-primary').addClass('bg-success');

    $.ajax({
        url: route('section.edit', id),
        success : section => {
            // console.log(section);
            $('#btn_add_section').css('display', 'none');
            $('#btn_update_section').css('display', 'block').attr('data-id', section[0].id);

            name.attr('value', section[0].name);
            description.attr('value', section[0].description);
            $('#section_grade_level').attr('value', section[0].grade_level_id);

            let output = `<option value='${section[0].grade_level_id}'> Current [${section[2]}] </option>`;

            section[1].forEach(grade_level => {
                output += `<option value='${grade_level.id}'> ${grade_level.name}</option>`;
            }); 

            $('#section_grade_level').html(output);
        },
        error: err => {
            console.log(err);
        }
    })
}

// update
function updateSection()
{
    let section_form = $('#section_form');
    let name = $('#section_name');
    let description = $('#section_description');
    let id = $('#btn_update_section').attr('data-id');

    if(isNotEmpty(name) && isNotEmpty(description))
    {
        $.ajax({
            method: 'PUT',
            url: route('section.update', id),
            dataType:'json',
            data:section_form.serialize(),
            success: response => {
            //    res(response);
                if(response == 'success')
                {   
                    $('.section_DT').DataTable().draw();
                    $('#section_modal').modal('hide');
                    return toastSuccess("Section Updated");
                }
            },
            error: err => {
                console.log(err);
            }
        })
    }

}

// delete
function deleteSection(id)
{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method:'DELETE',
                url:route('section.destroy', id),
                data:{id:id},
                success: response => {
                    toastSuccess('Section Deleted')
                    $('#section_DT').DataTable().draw();
                },
                error: err => {
                    toastDanger();
                    console.log(err);
                }

            })
        }
      })
}


// Section Add Teacher (Assign Teacher by Section)

$('#section_add_teacher').on('click', ()=> {
    $('#section_teacher_modal').modal('show');
    $('#section_teacher_modal_label').html(`<h4 class='text-white'> Assign Section to Teacher <i class="fas fa-chalkboard-teacher"></i> </h4>`);
    $('#section_teacher_modal_header').removeClass('bg-success').addClass('bg-primary');

    $.ajax({
        url: route('section.section_create_teacher'),
        dataType:'json',
        success: data => {
            let output_section = `<option> </option>`;
            let output_teacher = `<option> </option>`;

            data[0].forEach(section => {
                output_section += `<option value='${section.id}'> ${section.name} </option>`;
            });

            data[1].forEach(teacher => {
                output_teacher += `<option value='${teacher.id}'> ${teacher.first_name} ${teacher.last_name} </option>`;
            });

            $('#section_section_id').html(output_section);
            $('#section_teacher_id').html(output_teacher);
        },
        error: err => {
            console.log(err);
        }
    });

});

function section_store_teacher()
{
    let section_id =  $('#section_section_id').val();
    let teacher_id = $('#section_teacher_id').val();
    let section_adviser = $('#section_adviser').val();

    if(section_id > 0 && teacher_id > 0)
    {
        // first check if  an adviser
        $.ajax({
            method: 'POST',
            url: route('section.section_store_teacher'),
            dataType:'json',
            data:{
                section_id: section_id,
                teacher_id: teacher_id,
                section_adviser: section_adviser,

            },
            success: response => {
                //res(response);
                if(response == "success")
                {
                   return toastSuccess("Teacher Assigned");
                }
                if(response == "error")
                {
                    return toastr.warning("Teacher is already assigned to this section");
                }
                if(response == "section has adviser")
                {
                   // return toastr.warning("Adviser is already assigned to this section");
                }

            },
            error: err => {
               toastDanger();
               res(err);
            }
        })
    }
    else
    {
        toastr.warning("Please select a section and teacher");
    }
}


function select_current_adviser(){
    let section_id =  $('#section_section_id').val();

    if(section_id > 0)
    {
        $.ajax({  
            url: route('section.get_adviser', section_id),
            dataType:'json',
            success: response =>{
                //res(response);
                let output = '';
                let adviser = img_catch(response.teacher_avatar, `storage/uploads/teacher/${response.teacher_avatar}`, 110);

                                if(response !== 'empty_adviser')
                                {
    
                   output +=    ` <center>${adviser} <br> <p class='text-center m-0'> [Current Adviser] </p>
                                <p class='text-center text-info'> ${response.first_name} ${response.last_name} </p> `;
                                }
    
                                else
                                {
    
                   output +=    ` <center><img class='img-thumbnail rounded-cirlce' src='/images/no_photo.png' alt='' width='110'></center> 
                   <br> <p class='text-center m-0'> [No Adviser] </p>
                   `;
    
                                }
                
    
                                $('#section_display_current_adviser').html(output);
            },
            error: err => {
                res(err);
            },
        })
    }
    else
    {
        $('#section_display_current_adviser').html(``);
    }
    
   
}





/** 
 * * <------------ Start Grades
 * TODO CRUD Grades (Completed)
 */

// create ()
$('#assign_grade_to_subject').on('click', ()=> {
    $('#grade_modal').modal('show');
    $('#grade_modal_label').html(`<h4 class='text-white'> Add Grade </h4>`);
    $('#grade_modal_header').removeClass('bg-success').addClass('bg-primary');

    $.ajax({
        url: route('grade.create'),
        dataType:'json',
        success: students => {
           let output = `<option> </option>`;

           students.forEach(student => {
                output += `<option value='${student.id}'> ${student.first_name} ${student.last_name} </option>`;
           });

           $('#grade_student_id').html(output);
        },
        error: err => {
            console.log(err);
            toastDanger();
        }
    })
});

// Display Subjects by Grade Level ID()

function grade_display_subjects_by_student_id()
{
    let student_id = $('#grade_student_id').val();

    if(student_id > 0)
    {
        $.ajax({
            url: route('grade.grade_display_subjects_by_student_id'),
            dataType:'json',
            data:{student_id: student_id},
            success: subjects => {
                let output = ``;

                // check if the teacher has already a subject if it does then do something ..
                 if(subjects[0] == undefined)
                 {
                    $('#grade_display_subjects').html('');
                     return alert('no data');
                 }
                 else
                 {
                    subjects[0].forEach(subject => {
                        output += `<div class='row mt-3'>
                                     <div class='col-md-6 mb-2'>
                                        <div class='form-group'>
                                         <input class='form-control' type='text' name='subject_id[]' data-id='${subject.id}' value='${subject.id}' readonly>
                                        </div>
                                     </div>
                                     <div class='col-md-6 mb-2'>
                                        <div class='form-group'>
                                         <input class='form-control' type='number' name='grade[]' value=''>
                                        </div>
                                     </div>
                                   </div>`
                    }); 
                 }
                    

                // display subjects
                $('#grade_display_subjects').html(output);
            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        })
    }
    else
    {
        $('#grade_display_subjects').html('');
    }
}


// Store

function createGrade()
{
    let student_id = $('#grade_student_id').val();
    
    let grade_form = $('#grade_form');
   



    $.ajax({
        method: 'GET',
        url: route('grade.grade_display_grades_subjects_by_student_id'),
         dataType:'json',
        data:grade_form.serialize(),
        success: response => {
            res(response);
            if(response == 'success')
            {
                toastSuccess('Grade Added');
                return;
            }
        },
        error: err => {
            console.log(err);
            toastDanger();
        }
    })
    
}


//* ----------- > End Grading ()

/** 
 * * <------------ Start Student
 * TODO CRUD Student (Completed)
 */

// create
$('#add_student').on('click', ()=> {
$('#student_modal').modal('show');
$('#student_modal_label').html(`<h4 class='text-white'> Add Student <i class="fas fa-user-plus"></i> </h4>`);
$('#student_first_name').attr('value', '');
$('#student_middle_name').attr('value', '');
$('#student_last_name').attr('value', '');
$('#student_birth_date').attr('value', '');
$('#student_gender').attr('value', '');
$('#student_grade_level').attr('value', '');
$('#student_nationality').attr('value', '');
$('#student_city').attr('value', '');
$('#student_province').attr('value', '');
// $('#student_country').attr('value', '');
$('#student_address').attr('value', '');
$('#student_contact').attr('value', '');
$('#student_facebook').attr('value', '');
$('#student_email').attr('value', '');
$('#student_avatar').attr('value', '');
$('#student_guardian_name').attr('value', '');
$('#student_guardian_contact').attr('value', '');
$('#student_guardian_facebook').attr('value', '');
$('#btn_add_student').css('display', 'block');
$('#btn_update_student').css('display', 'none');
$('#student_modal_header').removeClass('bg-success').addClass('bg-primary');



    $.ajax({
        url: route('student.create'),
        data:'json',
        success: sections => {
            res(sections);
            let output=' <option></option>';
            sections.forEach(section => {
                output += `<option value='${section.id}'> ${section.name} </option>`;
                $('#student_section_id').html(output);
            })
        },
        error: err => {
            console.log(err);
        }
    })
});


// store
function createStudent() {
   let student_form = $('#student_form')[0];
   let student_form_data = new FormData(student_form);
   let student_lrn = $('#student_lrn');
   let student_first_name = $('#student_first_name');
   let student_middle_name = $('#student_middle_name');
   let student_last_name = $('#student_last_name');
   let student_birth_date = $('#student_birth_date');
   let student_gender = $('#student_gender').attr('value', '');
   let student_section = $('#student_section_id');
   let student_nationality = $('#student_nationality');
   let student_city = $('#student_city');
   let student_province = $('#student_province');
   let student_country = $('#student_country');
   let student_address = $('#student_address');
   let student_contact = $('#student_contact');
   let student_facebook = $('#student_facebook');
   let student_email = $('#student_email');
   let student_avatar = $('#student_avatar');
   let student_guardian_name = $('#student_guardian_name');
   let student_guardian_contact = $('#student_guardian_contact');
   let student_guardian_facebook = $('#student_guardian_facebook');

   if(isNotEmpty(student_lrn)&& isNotEmpty(student_first_name) && isNotEmpty(student_middle_name) && isNotEmpty(student_last_name) && isNotEmpty(student_birth_date) && isNotEmpty(student_gender) && isNotEmpty(student_section) && isNotEmpty(student_nationality) && isNotEmpty(student_city) && isNotEmpty(student_city) && isNotEmpty(student_province) && isNotEmpty(student_country) && isNotEmpty(student_address) && isNotEmpty(student_contact) && isNotEmpty(student_facebook) && isNotEmpty(student_email))
   {
        $.ajax({
            method:'POST',
            url: route('student.store'),
            data: student_form_data,
            processData: false,
            contentType: false,
            success: response => {
                console.log(response);
                toastSuccess('Student Added');
                $('#student_DT').DataTable().draw();
                student_form.reset();
                $('#student_modal').modal('hide');
                $('#student_div_err').css('display', 'none');
                $('#student_err').html('');
            },
            error: err => {
                let err_msg = '';
                $.each(err.responseJSON.errors,function(field_name,error){
                   err_msg += `<li class='text-secondary'> ${error} </li>`;
                }) 
                $('#student_div_err').css('display', 'block');
                $('#student_err').html(err_msg);
            }
        })
   }
}


// show
 function showStudent(id) {

    $('#show_student_modal').modal('show');
    $('#show_student_modal_header').addClass('bg-info');

    $.ajax({
        url: route('student.show', id),
        dataType:'json',
        data: {id:id},
        success: student => {
            //res(student);
           let student_avatar = img_catch(student[0].student_avatar,`storage/uploads/student/${student[0].student_avatar}`, 250);

           let output = `<ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="studentinfo-tab" data-bs-toggle="tab" data-bs-target="#student" type="button" role="tab" aria-controls="student" aria-selected="true">Student Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="subjects-tab" data-bs-toggle="tab" data-bs-target="#subjects" type="button" role="tab" aria-controls="subjects" aria-selected="false">Subjects</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="guardians-tab" data-bs-toggle="tab" data-bs-target="#guardians" type="button" role="tab" aria-controls="guardians" aria-selected="false">Guardian</button>
                        </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">`;

            output +=       `
                                <div class="tab-pane fade show active" id="student" role="tabpanel" aria-labelledby="studentinfo-tab"><br>
                                    <div class='row'>
                                        <div class='col-md-6 mb-5'>
                                        <br>
                                            <center>${student_avatar}</center>
                                        </div>

                                        <div class='col-md-6'>
                                            <div class='row'>
                                                <div class='col-md-8'>
                                                <p class='text-muted lead'> Basic Info  <i class="fas fa-info-circle"></i> </p> <br>
                                                    <div class='d-flex justify-content-between'>
                                                        <div>
                                                            <p class='text-muted text-capitalize'> Name: </p>
                                                            <p class='text-muted text-capitalize'> Birth Date:  </p>
                                                            <p class='text-muted text-capitalize'> Grade Level: </p>
                                                            <p class='text-muted text-capitalize'> Section:  </p>
                                                            <p class='text-muted text-capitalize'> Nationality:  </p>
                                                            <p class='text-muted text-capitalize'> City: </p>
                                                            <p class='text-muted text-capitalize'> Province: </p>
                                                            <p class='text-muted text-capitalize'> Address: </p>
                                                            <p class='text-muted text-capitalize'> Contact:  </p>
                                                            <p class='text-muted text-capitalize'> Facebook: </p>
                                                            <p class='text-muted text-capitalize'> Email:  </p>
                                                            <p class='text-muted text-capitalize'> LRN#:  </p>
                                                        </div>
                                                
                                                        <div>
                                                            <p class='text-capitalize'> ${student[0].first_name} ${student[0].last_name}  </p>
                                                            <p class='text-capitalize'>  ${student[0].birth_date} </p>
                                                            <p class='text-capitalize'>  ${student[2].name} </p>
                                                            <p class='text-capitalize'> ${student[1].name} </p>
                                                            <p class='text-capitalize'>  ${student[0].nationality} </p>
                                                            <p class='text-capitalize'>  ${student[0].city} </p>
                                                            <p class='text-capitalize'>  ${student[0].province} </p>
                                                            <p class='text-capitalize'> ${student[0].address} </p>
                                                            <p class='text-capitalize'>  ${student[0].contact} </p>
                                                            <p class='text-capitalize'> ${student[0].facebook} </p>
                                                            <p class='text-capitalize'> ${student[0].email} </p>
                                                            <p class='text-capitalize'> ${student[0].lrn} </p>
                                                        </div>
                                                 </div>
                                              </div>
                                                <div class='col-md-4'></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `
                        
             // display student_subjects

             output += `<div class="tab-pane fade py-5" id="subjects" role="tabpanel" aria-labelledby="subjects-tab">
                                        <div class='table-responsive'>
                                        <table class='table table-hover'>
                                        <caption> List of Subjects </caption>
                                         <thead>
                                            <tr>
                                             <th> Subject </th>
                                             <th> Description </th>
                                             <th> Teacher </th>
                                          </thead>
                                          <tbody>`;

                                    student[3].forEach(student => {
                                        
             output +=  `                     <tr> 
                                                <td>${student.name} </td>
                                                <td>${student.description} </td>
                                                <td>${student.first_name} ${student.last_name}</td> 
                                             </tr>`;

                                         });
                                            
          output += `                     </tbody>
                                        </table>
                                     </div>
                          </div>
                                `;

            // display student_parents
          output +=     `<div class="tab-pane fade py-5" id="guardians" role="tabpanel" aria-labelledby="guardians-tab">
                            <div class='table-responsive'>
                            <table class='table table-hover'>
                              <caption> List of Guardians </caption>
                                <thead>
                                    <tr>
                                    <th> Name </th>
                                    <th> Contact </th>
                                    <th> Email </th>
                                    <th> Facebook </th>
                                </thead>
                                <tbody>`;

                        student[0].parents.forEach(parent => {
                            output += `<tr>
                                            <td>${parent.name} </td> 
                                            <td>${parent.contact} </td> 
                                            <td>${parent.email} </td> 
                                            <td>${parent.facebook} </td> 
                                       </tr>`
                        })                 

         output +=      ` </tbody>
                         </table>
                         </div>
                       </div>
                    </div>`; // closer
              
            $('#show_student_info').html(output);
        },
        error: err => {
            console.log(err);
        }
    })
}


// edit
 function editStudent(id) {
    $.ajax({
        url: route('student.edit', id),
        dataType:'json',
        data: {id:id},
        cache: false,
        success: student => {
            $('#student_modal').modal('show');
            $('#student_modal_label').html(`<h4 class='text-white'> Edit Student <i class="fas fa-user-plus"></i></h4>`);
            $('#student_lrn').attr('value', student[0].lrn);
            $('#student_first_name').attr('value', student[0].first_name);
            $('#student_middle_name').attr('value', student[0].middle_name);
            $('#student_last_name').attr('value', student[0].last_name);
            $('#student_birth_date').attr('value', student[0].birth_date);
            $('#student_gender').attr('value', student[0].gender);
            $('#student_section_id').attr('value', student[0].section_id);
            $('#student_nationality').attr('value', student[0].nationality);
            $('#student_city').attr('value', student[0].city);
            $('#student_province').attr('value', student[0].province);
            $('#student_country').attr('value', student[0].country);
            $('#student_address').attr('value', student[0].address);
            $('#student_contact').attr('value', student[0].contact);
            $('#student_facebook').attr('value', student[0].facebook);
            $('#student_email').attr('value', student[0].email);
            $('#student_avatar').attr('value', student[0].student_avatar);
            $('#student_guardian_name').attr('value', student[0].guardian_name);
            $('#student_guardian_contact').attr('value', student[0].guardian_contact);
            $('#student_guardian_facebook').attr('value', student[0].guardian_facebook);
            $('#btn_add_student').css('display', 'none');
            $('#btn_update_student').css('display', 'block').attr('data-id', student[0].id);
            $('#preview_student_img').css('display','block').attr('src', "/storage/uploads/student/" + student[0].student_avatar);
            $('#student_modal_header').removeClass('bg-primary').addClass('bg-success');


            let output=`<option value='${student[0].section_id}'>Current [${student[0].section.name}]</option>`;
            student[1].forEach(section => {
                  output += `<option value='${section.id}'> ${section.name} </option>`;
                  $('#student_section_id').html(output);
            })
         
        },
        error: err => {
            toastDanger();
        }
    })
}




// update
 function updateStudent() {

   let student_form = $('#student_form')[0];
   let student_update_form_data = new FormData(student_form);
   student_update_form_data.append('_method', 'PATCH');

   let id = $('#btn_update_student').attr('data-id');
   let student_lrn = $('#student_lrn');
   let student_first_name = $('#student_first_name');
   let student_middle_name = $('#student_middle_name');
   let student_last_name = $('#student_last_name');
   let student_birth_date = $('#student_birth_date');
   let student_gender = $('#student_gender');
   let student_grade_level = $('#student_grade_level');
   let student_nationality = $('#student_nationality');
   let student_city = $('#student_city');
   let student_province = $('#student_province');
   let student_country = $('#student_country');
   let student_address = $('#student_address');
   let student_contact = $('#student_contact');
   let student_facebook = $('#student_facebook');
   let student_email = $('#student_email');
   let student_avatar = $('#student_avatar');
   let student_guardian_name = $('#student_guardian_name');
   let student_guardian_contact = $('#student_guardian_contact');
   let student_guardian_facebook = $('#student_guardian_facebook');

   if(isNotEmpty(student_lrn) && isNotEmpty(student_first_name) && isNotEmpty(student_middle_name) && isNotEmpty(student_last_name) && isNotEmpty(student_birth_date) && isNotEmpty(student_gender) && isNotEmpty(student_grade_level) && isNotEmpty(student_nationality) && isNotEmpty(student_city) && isNotEmpty(student_city) && isNotEmpty(student_province) && isNotEmpty(student_country) && isNotEmpty(student_address) && isNotEmpty(student_contact) && isNotEmpty(student_facebook) && isNotEmpty(student_email))
   {
        $.ajax({
            method:'POST',
            url:route('student.update', id),
            data: student_update_form_data,
            processData: false,
            contentType: false,
            success: response => {
                console.log(response);
                toastSuccess('Student Updated')
                $('#student_DT').DataTable().draw();
                $('#student_modal').modal('hide');
                $('#student_div_err').css('display', 'none');
                $('#student_err').html('');
            },
            error: err => {
                let err_msg = '';
                $.each(err.responseJSON.errors,function(field_name,error){
                   err_msg += `<li class='text-secondary'> ${error} </li>`;
                }) 
                $('#student_div_err').css('display', 'block');
                $('#student_err').html(err_msg);
            }
        })
    }
}


// delete
function deleteStudent(id)
{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method:'DELETE',
                url:route('student.destroy', id),
                data:{id:selected},
                success: response => {
                    toastSuccess('Student Deleted')
                    $('#student_DT').DataTable().draw();
                },
                error: err => {
                    toastDanger();
                    console.log(err);
                }
        
            })
        }
      })
}


// import students

$('#imp_student').on('click', () => {
    $('#student_file').click();
});

function import_student()
{
    let form = $('#student_import_form')[0];
    let form_data = new FormData(form);
    // form_data.append('_method', 'PATCH');


    Swal.fire({
        title: 'Do you want to import file?',
        text: "Accepting csv , xls , pdf file only",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, upload it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'POST',
                url: route('student.import'),
                dataType: 'json',
                data: form_data,
                processData: false,
                contentType: false,
                success: response => {
                    console.log(response);
                    if(response == 'success')
                    {
                       $('.student_DT').DataTable().draw();
                       toastSuccess('Student Data Imported');

                       return;
                    }
                },
                error: err => {
                    // console.log(err);
                    // return toastDanger();
                    let err_msg = '';
                    $.each(err.responseJSON.errors,function(field_name,error){
                       err_msg += `<li class='text-white'> ${error} </li>`;
                    }) 
                    return toastr.error(`${err_msg}`);
                }
            });
        }
      })
}


// trunctate students
$('#delete_all_student').on('click', ()=> {

  const pw = prompt("Enter admin secret key *");

  if(pw.toString() == "")
  {

   return alert("Secret key is required");

  }

  $.ajax({
      method:'POST',
      url: route('student.truncate'),
      data:{password:pw},
      success: response => {
          console.log(response);
         if(response == "success")
         {
            $('.student_DT').DataTable().draw();
            return toastSuccess("Students Data Deleted");
         }

         if(response == "error")
         {
             return toastr.error("Invalid Key !");
         }
      },
      error: err => {
          console.log(err);
          toastDanger();
      }
  })
 


});


//* ---------> END Student



/** 
 * * <------------ Start Fee management
 * TODO CRUD Fee management (Completed)
 */

// create
$('#add_fee').on('click', ()=> {
    $('#fee_modal').modal('show');
    $('#fee_modal_label').html(`<h4 class='text-white'>Add Fee Entry <i class="fas fa-plus-circle"></i></h4> `);
    $('#input_fee_row').remove();
    $('#btn_add_fee').css('display', 'block');
    $('#btn_update_fee').css('display', 'none');
    $('#display_sub_fee').html(""); // clear 
    $('#display_total_sub_fees').html("") //clear
    $('#fee_modal_header').removeClass('bg-success').addClass('bg-primary');
    

    $.ajax({
        url: route('fee.create'),
        dataType: 'json',
        success: grade_levels => {
            let output = `<option> </option>`;
            grade_levels.forEach(grade_level => {
                output += `<option value='${grade_level.id}'> ${grade_level.name} </option>`;
            });

            $('#display_fee_grade_levels').html(output);
        },
        error : err => {
            console.log(err);
        }
    })

});
    

// display sub fee by grade level id
function displaySubFeeByGradeLevelID() {
    let grade_level_id = $('#display_fee_grade_levels').val();

    if(grade_level_id > 0) 
    {
        $.ajax({
            url: route('fee.display_sub_fee_by_grade_level_id', grade_level_id ),
            data: {grade_level_id: grade_level_id},
            dataType: 'json',
            success : fees => {
                let output = ``;
                    fees[0].forEach(fee => {
                         output += `<tr> 
                                        <td> ${fee.description} </td>
                                        <td>₱ ${fee.amount.toLocaleString()} </td>
                                        <td> 
                                        <form>
                                         <a class='text-danger' href='javascript:void(0)' onclick='deleteFee(${fee.id})' role='button'> <i class="fas fa-times"></i> </a>
                                        </form>
                                        </td>
                                    </tr>`
                    });
                    $('#display_sub_fee').html(output); // display subfees
                    
                    if(typeof(fees[1][0].total) === "object")
                    {
                        $('#display_total_sub_fees').html("")
                    }
                    else
                    {
                        let total = `<h6 class='text-muted'> ₱ ${fees[1][0].total.toLocaleString()} </h6>` // display total sub fees
                        $('#display_total_sub_fees').html(total)
                    }
            },
            error: err => {
                toastDanger();
                console.log(err);
            }
        })
    }
    $('#display_sub_fee').html(""); // clear 
    $('#display_total_sub_fees').html("") //clear
}

// edit
function editFee(id) {
    $.ajax({
        url: route('fee.edit', id),
        success: fee => {
            $('#fee_modal').modal('show');
            $('#fee_modal_label').html(`<h4 class='text-white'> Edit Fee Entry <i class="fas fa-edit"></i> </h4> `);
            $('#input_fee_row').remove();
            $('#btn_add_fee').css('display', 'none');
            $('#btn_update_fee').css('display', 'block');
            $('#display_fee_grade_levels').html(`<option value='${fee}'>Grade ${fee}</option>`);
            $('#fee_modal_header').removeClass('bg-primary').addClass('bg-success');
            displaySubFeeByGradeLevelID();
        },
        error: err=> {
            console.log(err);
            toastDanger();
        }
    })
}

// add extra sub fee form 

// store sub fee
function add_extra_sub_fee(event) {
    event.preventDefault();
    let sub_fee_forms = `
                        <div class="row p-2" id='input_fee_row'>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fee_description">Fee Type</label>
                                    <input class="form-control" type="text" name="fee_description[]">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <i class="fas fa-minus-circle float-end " id='minus_sub_fee' role='button'></i>
                                    <label class="form-label" for="amount">Amount</label>
                                    <input class="form-control" type="number" min='0'  name="fee_amount[]" oninput="validity.valid||(value='');">
                                </div>
                            </div>
                        </div>
                        `;
    $('#add_sub_fees').append(sub_fee_forms);
}

// min extra sub fee form
$(document).on('click', '#minus_sub_fee', function(e) {
    e.preventDefault();
    $(this).parents('div#input_fee_row').remove();
});

// end


// store
function addFee() {
    let fee_amount = $('#fee_amount');
    let fee_description = $('#fee_description');
    let grade_level_id = $('#display_fee_grade_levels').val();
    let fee_form = $('#fee_form');

    if(isNotEmpty(fee_description) && isNotEmpty(fee_amount))
    {
        $.ajax({
            method: 'POST',
            url: route('fee.store'),
            data: fee_form.serialize(),
            success: response => {
                console.log(response);
                if(response == 'success')
                {
                    console.log(response);
                    toastSuccess('Fee Added');
                    $('#input_fee_row').remove();
                    $('input').attr('name', 'fee_description[]').val("");
                    $('input').attr('name', 'fee_amount[]').val("");
                    displaySubFeeByGradeLevelID();
                    $('.fee_DT').DataTable().draw();
                }
                else if(response == 'error')
                {
                    return toastr.warning('Fee type already exist');
                    
                }
      
            },
            error: err => {
                toastWarning();
                console.log(err);
            }
        })
    }
}


// delete
function deleteFee(id) {
        $.ajax({
            method:'DELETE',
            url: route('fee.destroy', id),
            data: {id:id},
            dataType:'json',
            success: response => {
                if(response == 'success')
                {
                    toastSuccess('Fee Removed')
                    displaySubFeeByGradeLevelID();
                    $('#fee_DT').DataTable().draw();
                }
            },
            error: err=> {
                toastDanger();
                console.log(err);
            }
        })
}



//* ---------------------> End Fee Management



/** 
 * * <------------ Start Student Enrolment Fee / Student Fee
 * TODO CRUD Student Enrolment Fee / Student Fee (Completed)
 */

// create
$('#add_student_fee').on("click", () => {
    $('#student_fee_modal').modal('show');
    $('#student_fee_modal_label').html(`<h4 class='text-white'> Enrol Student  <i class="ms-1 fas fa-user-plus"></i></h4>`);
    $('#student_fee_form')[0].reset();
    $('#student_fee_grade_level_id').attr('placeholder', "").attr('value', '');
    $('#student_fee_fee').attr('placeholder', "").attr('value', '');
    $('#student_fee_modal_header').removeClass('bg-success').addClass('bg-primary');


    $.ajax({
        url: route('studentfee.create'),
        dataType:'json',
        success: students => {
            //console.log(students);
            let output = `<option> </option>`;
            students.forEach(student => {

                if(student.status == 'active')
                {
                    output += `<option class='bg-success text-white' value='${student.id}'> ${student.id} - ${student.first_name} ${student.last_name}  </option>`;


                }
                else if(student.status == 'paid')
                {
                    output += `<option class='bg-primary text-white' value='${student.id}'> ${student.id} - ${student.first_name} ${student.last_name}  </option>`;

                }
                else
                {
                    output += `<option value='${student.id}'> ${student.id} - ${student.first_name} ${student.last_name} </option>`;

                }
            });

            $('#student_fee_student_id').html(output);
        },
        error: err => {
            toastDanger();
            console.log(err);
        }
    });

});

// display grade level by student id
function student_fee_display_grade_level_by_student_id() {
    let student_id = $('#student_fee_student_id').val();
    if(student_id > 0)
    {
        $.ajax({
            url:route('studentfee.display_grade_level_by_student_id', student_id),
            success: grade_level => {
                if(grade_level[1] == undefined)
                {
                    $('#select2-student_fee_student_id-container').attr('style', 'background:#gray;color:#black !important');
                }
                else
                {
                    if(grade_level[1].status == 'active')
                    {
                        $('#select2-student_fee_student_id-container').attr('style', 'background:#28a745;color:#fff !important');
    
                    }
                    else 
                    {
                        $('#select2-student_fee_student_id-container').attr('style', 'background:#5891e2;color:#fff !important');
    
                    }
                }

                $('#student_fee_grade_level_id').attr('placeholder', grade_level[0].name).attr('value', grade_level[0].id); // grade level id (hide)
                $('#student_fee_grade_level_val').attr('value',grade_level[0].grade_val); // display grade level val by grade level id
                $('#student_fee_fee').attr('placeholder','Php ' + grade_level[0].total_amount).attr('value', grade_level[0].total_amount); // grade level total fee
                $('#student_fee_months_no').val(`${grade_level[0].months_no} month/s`);
            },
            error: err => {
                console.log(err);
            }
        })
    }
    else
    {
        $('#student_fee_grade_level_id').attr('placeholder', "").attr('value', '');
        $('#student_fee_fee').attr('placeholder', "").attr('value', '');
        $('#student_fee_months_no').val("");
    }
 

}

// display discounted fee by student id
function student_fee_display_discounted_fee_by_student_id()
{
    let student_fee_discount = $('#student_fee_discount').val(); //discount value
    let student_fee_fee = $('#student_fee_fee').val();  // total fee
    let discounted_amount = parseFloat(student_fee_fee) * parseFloat(student_fee_discount); // the total value that will be discounted
    let total = parseFloat(student_fee_fee) - parseFloat(discounted_amount);

    if(student_fee_discount !== "" && student_fee_fee !== "")
    {
      $('#student_fee_fee').attr('value', roundoff(total));
    }
    

}

// store
function addStudentFee()
{
    let student_id = $('#student_fee_student_id').val();
    let student_grade_level_id = $('#student_fee_grade_level_id').val();
    let student_fee = $('#student_fee_fee').val();
    let student_fee_discount = $('#student_fee_discount').val();

    if(student_id > 0)
    {
        $.ajax({
            method: 'POST',
            url: route('studentfee.store'),
            dataType:'json',
            data:{
                student_id : student_id,
                grade_level_id : student_grade_level_id,
                discount: student_fee_discount,
                total_fee: student_fee
            },
            success: response => {
                if(response == 'success')
                {
                    toastSuccess('Student Fee Added')
                    $('#student_fee_grade_level_id').attr('placeholder', "").attr('value', '');
                    $('#student_fee_fee').attr('placeholder', "").attr('value', '');
                    $('#student_fee_discount').attr('placeholder', "").attr('value', '');
                    $('#student_fee_modal').modal('hide');
                    $('.student_fee_DT').DataTable().draw();
                }
                else
                {
                    return toastr.warning("You already enroled this student");

                }
              
            },
            error: err => {
                toastDanger();
                console.log(err);
            }
        })
    }
    else
    {
        return toastr.warning("Please select a student");
    }
}


// show
function showStudentFee(id)
{
    $.ajax({
        url: route('studentfee.show', id),
        dataType:'json',
        data:{id:id},
        success: studentfee => {
            $('#show_student_fee_modal').modal('show');
            $('#show_student_fee_modal_header').addClass('bg-secondary');


            // student info with grade level
            $('#sf_enrolment_fee_no').text(`${studentfee[0].id}`);
            $('#sf_student_id_no').text(`${studentfee[0].student_id}`);
            $('#sf_student_name').text(`${studentfee[0].first_name} ${studentfee[0].last_name}` );
            $('#sf_grade_level').text(`${studentfee[0].name}` );
            

            //sub fees
            let subfees = ``;
            let amount = ``;
            let total = `₱ ${roundoff(studentfee[2].total)}` || "0";
            studentfee[1].forEach(fee => {
                
                subfees += `<h5 > ${fee.description} </h5>`;           
                amount += `<h5 > ₱ ${roundoff(fee.amount)} </h5>`;
            
            });
      
            // display discount
            let total_discount = Math.round(studentfee[0].discount * 100);
            $('#sf_display_total_discount').text(`${total_discount}%`);

            // display the calculated student fee with a discount (DISCOUNTED AMOUNT)

             $('#sf_display_discounted_total').text(`₱ ${roundoff(studentfee[0].total_fee)}`);


             let discounted_total = `₱ ${roundoff(studentfee[0].total_fee)}`; // THE DISCOUNTED TOTAL ( TOTAL AMOUNT - DISCOUNTED PRICE);

            $('#sf_type').html(subfees);
            $('#sf_amount').html(amount);
            $('#sf_total').html(total);

            //check if the student is discounted 

            if(studentfee[0].discount === null)
            {
                // display the total amount
                $('#sf_total_payable').html(total);
            }
            else
            {
                // display the discounted total amount
                $('#sf_total_payable').html(discounted_total);

            }
          

            // payments

            let payments = ``;
            let dates = ``;

            studentfee[3].forEach(payment => {
                
                const date = new Date(payment.created_at);
                const d = date.toLocaleDateString('default', { month: 'long' });
                payments += `<h5> ₱ ${roundoff(payment.amount)} </h5>`;


                dates += `<h5> ${d} - ${payment.remarks}</h5>`;
            });
            $('#sf_payment').html(payments);
            $('#sf_date').html(dates);

            // display payments total ,  total paid and total balance
            $('#sf_payment_total').text(`₱ ${roundoff(studentfee[4][0].paid)}`)
            $('#sf_total_paid').text(`₱ ${roundoff(studentfee[4][0].paid)}`);
            $('#sf_balance').text(`₱ ${roundoff(studentfee[4][0].total_balance)}`);
            


        },
        error: err => {
            toastDanger();
            console.log(err);
        }
    })
}

// delete
function deleteStudentFee(id) {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'DELETE',
                url: route('studentfee.destroy',id),
                success: response => {
                    toastSuccess("Student Fee");
                    $('.student_fee_DT').DataTable().draw();
        
                },
                error: err => {
                    console.log(err);
                }
            })
        }
      })
}

//* -----------------> END STUDENT ENROLMENT FEE


/** 
 * * <------------ Start Payment 
 * TODO CRUD Payment  (Completed)
 */


// show 
function showPayment(id) {
    $.ajax({
        url: route('payment.show', id),
        success: payment => {
            //  console.log(payment);
             const date = new Date(payment[0].created_at);
             //const d = date.toDateString();
             const d = date.toLocaleDateString();


               // display discount
            let total_discount = Math.round(payment[1].discount * 100);
            $('#payment_sf_total_discount').text(`${total_discount}%`);

            // display the calculated student fee with a discount (DISCOUNTED AMOUNT)

             $('#payment_sf_total_discounted_amount').text(`₱ ${roundoff(payment[1].total_fee)}`);


            let discounted_total = `₱ ${roundoff(payment[1].total_fee)}`; // THE DISCOUNTED TOTAL ( TOTAL AMOUNT - DISCOUNTED PRICE);
       
            //display payment info
            $('#show_payment_modal').modal('show');
            $('#show_payment_modal_header').addClass('bg-secondary');
            $('#payment_date').text(`${d}`);
            $('#payment_official_receipt').text(`${payment[0].official_receipt}`);
            $('#payment_payment_amount').text(`₱ ${roundoff(payment[0].amount)}`);
            $('#payment_payment_remarks').text(`${payment[0].remarks}`);

            // display student info

            $('#payment_enrolment_fee_no').text(`${payment[1].id}`);
            $('#payment_student_id_no').text(`${payment[1].student_id}`);
            $('#payment_student_name').text(`${payment[1].first_name} ${payment[1].last_name}`);$('#payment_grade_level').text(`${payment[1].name}`);


            // PAYMENT SUMMARY display sub fees
            let fee_type = ``;
            let fee_amount = ``;
            payment[2].forEach(subfee => {
                fee_type += `<h5 > ${subfee.description} </h5>`
                fee_amount += `<h5 >₱ ${roundoff(subfee.amount)} </h5>`
            });
        

            $('#payment_sf_type').html(fee_type);
            $('#payment_sf_amount').html(fee_amount);
            $('#payment_sf_total').text(`₱ ${roundoff(payment[4].subtotal)}`)

            // Payment details

            $('#payment_sf_date').html(`<h5> ${d} </h5>`)
            $('#payment_sf_payment').html(`<h5>₱ ${roundoff(payment[0].amount)}</h5>`)
            $('#payment_sf_payment_total').html(`<h5>₱ ${roundoff(payment[0].amount)} </h5>`)

            $('#payment_sf_total_payable').text(`₱ ${roundoff(payment[3][0].amount_payable)}`);
            $('#payment_sf_total_paid').text(`₱ ${roundoff(payment[3].paid)}`);
            $('#payment_sf_balance').text(`₱ ${roundoff(payment[3].total_balance)}`);


        },
        error: err => {
            console.log(err);
        }
    })
}

// enable / disable payment discount select input field
$('#payment_amount').on("input", () => {
   if($('#payment_amount').val() == "")
   {
     $('#payment_discount').attr('disabled', true);
   }
   else
   {
    $('#payment_discount').attr('disabled', false);
   }
});


// * START PAYMENT DISCOUNT FUNCTION ()

function payment_display_discount_input_field()
{
    let payment_discount =  $('#payment_discount').val();
    let output = ``;
    if(payment_discount == "percentage")
    {
        // percentage
        output += `  <div class="form-group">
                        <label class="form-label">Select Percentage Discount</label>
                        <select class="form-select" id="payment_payment_discount_percentage" name="payment_discount" onchange='payment_display_payment_discount()'>
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
                        <label class="form-label">Discounted Amount <span class='text-muted'> <small class='fw-bold text-success' id='amount_to_pay2'>(Amount to pay)</small> </span> </label>
                        <input type='number' class="form-control" name="payment_discounted_amount" id="payment_payment_discounted_amount" readonly>
                     </div>
                     
                     
                     `
        $('#amount_to_pay').html("");
        $('#payment_display_discount_input_field').html(output);
       
    }
    else if(payment_discount == 'cash')
    {
        output += `  <div class="form-group">
                        <label class="form-label">Enter Cash Discount</label>
                        <input type='number' min='0' class="form-control" name="payment_discount" id="payment_payment_discount_cash" onInput="validity.valid||(value='');payment_display_cash_discount();">
                     </div>
                     
                     <div class="form-group">
                        <label class="form-label">Discounted Amount  <span class='text-muted'> <small class='fw-bold text-success' id='amount_to_pay2'>(Amount to pay)</small> </span> </label>
                        <input type='number' class="form-control" name="payment_discounted_amount" id="payment_payment_discounted_amount" readonly>
                     </div>
                     
                     `
        $('#amount_to_pay').html("");
        $('#payment_display_discount_input_field').html(output)

    }
    else
    {
        $('#amount_to_pay2').html("");
        $('#amount_to_pay').html("(Amount to pay)");
        $('#payment_display_discount_input_field').html("");
    }
}


function payment_display_payment_discount() {
    let payment_discount = $('#payment_payment_discount_percentage').val()
    let payment_amount = $('#payment_amount').val();
    let discounted_amount = parseFloat(payment_amount) * parseFloat(payment_discount); //
    let total = parseFloat(payment_amount) - parseFloat(discounted_amount);

    if(payment_discount > 0)
    {
        $('#payment_payment_discounted_amount').attr('value', roundoff(total));

    }
    else
    {
        $('#payment_payment_discounted_amount').attr('value', "");

    }

}

function payment_display_cash_discount() {
   
    let payment_amount = $('#payment_amount').val();
    let payment_discount = $('#payment_payment_discount_cash').val();

    // let discounted_amount = parseFloat(payment_amount) * parseFloat(payment_discount); //
    let total = parseFloat(payment_amount) - parseFloat(payment_discount);

    if(payment_discount > 0)
    {
        $('#payment_payment_discounted_amount').attr('value', total.toFixed());

    }
    else
    {
        $('#payment_payment_discounted_amount').attr('value', "");

    }

}


//* END PAYMENT DISCOUNT FUNCTION 


// create payment for student
$('#add_payment').on('click', ()=> {
    $('#payment_modal').modal('show');
    $('#payment_modal_label').html(`<h4 class='text-white'> Add Payment </h4>`);
    $('#btn_add_payment').css('display', 'block');
    $('#btn_update_payment').css('display', 'none');
    $('#payment_student_fee_id').attr('disabled', false);
    $('#payment_total_balance').attr("value", "");
    $('#payment_amount').val("");
    $('#payment_remarks').val("");
    $('#payment_id').attr('data-id', ""); // payment_id
    $('#payment_monthly_payment').attr("value", "");
    $('#payment_payment_discounted_amount').attr("value", "");
    $('#payment_display_payment_ledger').html("");
    $('#payment_modal_header').removeClass('bg-success').addClass('bg-primary');


    $.ajax({
        url: route('payment.create'),
        dataType:'json',
        success: students => {
            // console.log(students);
            let output = `<option> </option>`;
            students.forEach(student => {
                if(student.status == 'active' && student.has_downpayment == 1)
                {
                    output += `<option class='bg-secondary text-white' value='${student.id}'> ${student.id} - ${student.first_name} ${student.last_name} </option>`;
                }
                else if(student.status == 'active' && student.has_downpayment == 0)
                {
                    output += `<option value='${student.id}'> ${student.id} - ${student.first_name} ${student.last_name} </option>`;
                }
                else
                {
                    output += `<option class='bg-primary text-white' value='${student.id}'> ${student.id} - ${student.first_name} ${student.last_name} </option>`;
                }
            });

            $('#payment_student_fee_id').html(output);
        },
        error: err => {
            toastDanger();
            console.log(err);
        }
    });

}); // end payment for student()

// edit Payment for student()
function editPayment(id) {
    $.ajax({
        url: route('payment.edit',id),
        success: payment => {
            // console.log(payment);
            $('#payment_modal').modal('show');
            $('#payment_modal_label').html(`<h4 class='text-white'> Edit Payment <i class="fas fa-edit"></i> </h4>`);
            $('#btn_add_payment').css('display', 'none');
            $('#btn_update_payment').css('display', 'block');
            $('#payment_student_fee_id').html(`<option value='${payment[0].student_fee_id}'>${payment[0].student_fee_id} - ${payment[1].first_name} ${payment[1].last_name} </option>`).attr('disabled', true);
            payment_display_balance_by_student_id();
            // $('#payment_amount').attr('value',payment[0].amount);
            // $('#payment_remarks').attr('value',payment[0].remarks);
            $('#payment_amount').val(payment[0].amount);
            $('#payment_remarks').val(payment[0].remarks);
            $('#payment_id').attr('data-id', payment[0].id); // payment_id
            $('#payment_payment_official_receipt').attr('value', payment[0].official_receipt);
            $('#payment_payment_official_receipt').val( payment[0].official_receipt);
            $('#payment_modal_header').removeClass('bg-primary').addClass('bg-success');


        },
        error: err => {
            console.log(err);
            toastDanger();
        }
    })
}

// update
function updatePayment() {
    let payment_id = $('#payment_id').attr('data-id');
    let payment_student_fee_id =  $('#payment_student_fee_id').val();
    let payment_amount =  $('#payment_amount');
    let payment_remarks = $('#payment_remarks');
    let payment_official_receipt = $('#payment_payment_official_receipt');
    let payment_type = ``;

    if( isNotEmpty(payment_official_receipt) &&  isNotEmpty(payment_amount) && isNotEmpty(payment_remarks))
    {
        if(payment_remarks.val() == 'Down Payment')
        {
            payment_type += 'dp';
        }
        else if(payment_remarks.val() == 'Monthly Payment')
        {
            payment_type += 'mo';
        }
        else 
        {
            payment_type += 'ot';
        }

        $.ajax({
            method:'PUT',
            url: route('payment.update', payment_id ),
            dataType: 'json',
            data: {
                student_fee_id : payment_student_fee_id,
                amount: payment_amount.val(),
                remarks: payment_remarks.val(),
                official_receipt: payment_official_receipt.val(),
                payment_type: payment_type
            },
            success: response => {
                console.log(response);
                if(response == 'success')
                {
                    toastSuccess('Payment Updated');
                    $('.payment_DT').DataTable().draw();
                    $('#payment_modal').modal('hide');
                }
            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        })
    }

}



// display student total balance by student_id()

function payment_display_balance_by_student_id() {
    let student_fee_id = $('#payment_student_fee_id').val();
    if(student_fee_id > 0)
    {
        $.ajax({
            url:route('payment.display_total_balance_by_student_id', student_fee_id),
            success: student_total_balance => {
                // console.log(student_total_balance);

                 // fully paid
                 if(student_total_balance[0].status === 'paid' && student_total_balance[0].has_downpayment == 1)
                {
                    $('.select2-selection__rendered').attr('style', 'background:#6297e4;color:#fff !important');
                }

                else if(student_total_balance[0].status === 'active' && student_total_balance[0].has_downpayment == 1 )
                {
                   $('.select2-selection__rendered').attr('style', 'background:#28a745;color:#fff !important');
                }

                else
                {
                    $('.select2-selection__rendered').attr('style', 'background:#black;color:#black !important');
                }

               
                //check if the total balance is 0 (FULLY PAID) then disable the submit button
                if(student_total_balance[0].total_balance == 0)
                {
                    $('#btn_add_payment').attr('disabled', true);
                    $('#payment_total_balance').attr('value', 0);
                    $('#payment_monthly_payment').attr('value', 0);
            

                }
                else
                {
                    $('#payment_total_balance').attr('value', student_total_balance[0].total_balance) // grade level total fee
                    $('#btn_add_payment').attr('disabled', false);
                }

                if(student_total_balance[2] != undefined)
                {
                    $('#payment_monthly_payment').attr('value', student_total_balance[2].balance) // school monthly payment

                }

                // check if the payment_ledger for this student is empty / undefined if it does then do not display
                if(student_total_balance[1] != undefined)
                {
                    let payment_ledger = ` <div class='table-responsive'> 
                                                <table class="table table-sm table-hover caption-top table-bordered" style='font-family:monospace;font-weight:bold'>
                                                    <caption>Payment Schedule <i class="far fa-calendar-alt"></i> </caption>
                                                    <thead>
                                                        <tr class='bg-info text-white'>
                                                            <th>Month</th>
                                                            <th>Monthly Payment</th>
                                                            <th>Official Receipt #</th>
                                                            <th>Amount Paid</th>
                                                            <th>Remark</th>
                                                            <th>Balance</th>
                                                            <th>Change</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>`;

                    student_total_balance[1].forEach(payment_payment_ledger => {
                                    const month = new Date(payment_payment_ledger.month); // date format

                                    const payment_official_receipt = (payment_payment_ledger.payment_official_receipt != undefined ? payment_payment_ledger.payment_official_receipt : "");
                                    const payment_transaction_no = (payment_payment_ledger.payment_transaction_no != undefined ? payment_payment_ledger.payment_transaction_no : "");
                                    const payment_amount = (payment_payment_ledger.payment_amount != undefined ? payment_payment_ledger.payment_amount : "") ;
                                    const payment_remark = (payment_payment_ledger.payment_remark != undefined ? payment_payment_ledger.payment_remark : "");
                                    const payment_change = (payment_payment_ledger.payment_change != undefined ? payment_payment_ledger.payment_change : "");

                    
                                    payment_ledger += `  <tr> 
                                                            `;

                                                            if(payment_payment_ledger.status == 'unpaid')
                                                            {
                                    payment_ledger +=       `
                                                            <td>${month.toLocaleString('default', { month: 'long' })}</td>
                                                            <td>₱ ${payment_payment_ledger.amount.toLocaleString()}</td>
                                                            <td>${payment_official_receipt}</td>
                                                            <td>${payment_amount.toLocaleString()}</td>
                                                            <td>${payment_remark}</td>
                                                            <td>₱ ${payment_payment_ledger.balance.toLocaleString()}</td>
                                                            <td>₱ ${payment_change}</td>
                                                            <td><span class='badge bg-warning text-uppercase'>${payment_payment_ledger.status} </span></td>`;
                                                            }
                                                            else
                                                            {
                                    payment_ledger +=       `
                                                            <td class='text-decoration-line-through text-muted'>${month.toLocaleString('default', { month: 'long' })}</td>  
                                                            <td class='text-decoration-line-through text-muted'>₱ ${payment_payment_ledger.amount.toLocaleString()}</td>
                                                            <td>${payment_official_receipt}</td>
                                                            <td>₱ ${payment_amount.toLocaleString()}</td>
                                                            <td> ${payment_remark}</td>    
                                                            <td class='text-decoration-line-through text-muted'>₱ ${payment_payment_ledger.balance.toLocaleString()}</td>
                                                            <td>₱ ${payment_change}</td>
                                                            <td><span class='badge bg-success text-uppercase'>${payment_payment_ledger.status} </span></td>`;
                                                            }

                                    payment_ledger +=    `</tr>`;

                    });

                    payment_ledger += `                 </tbody>
                                                     </table>
                                                    </div>`;

                    $('#payment_display_payment_ledger').html(payment_ledger);       
                }
            
            },
            error: err => {
                console.log(err);
            }
        })
    }
    else
    {
        $('#payment_total_balance').attr('value', '');
        $('#payment_amount').attr('value', '').text('');
        $('#payment_monthly_payment').attr('value', '').text('');
        $('#payment_display_payment_ledger').html("");      
    }
}

// end 

// store
function addPayment() {
    let payment_total_balance = $('#payment_total_balance');
    let student_fee_id = $('#payment_student_fee_id').val();
    let payment_amount = $('#payment_amount');
    let payment_remarks = $('#payment_remarks');
    let payment_official_receipt = $('#payment_payment_official_receipt');
    let payment_type = ``;

    let discounted_percentage = $('#payment_payment_discount_percentage').val();
    let discounted_cash =       $('#payment_payment_discount_cash').val();

    if(isNotEmpty(payment_official_receipt) &&  isNotEmpty(payment_amount) && isNotEmpty(payment_remarks) )
    {
        if(parseFloat(payment_amount.val()) > parseFloat(payment_total_balance.val()))
        {
           return toastr.warning("Amount must not be greather than the total balance");
        }
        else
        {
            if(payment_remarks.val() == 'Down Payment')
            {
                payment_type += 'dp';
            }
            else if(payment_remarks.val() == 'Monthly Payment')
            {
                payment_type += 'mo';
            }
            else 
            {
                payment_type += 'ot';
            }
       
            $.ajax({
                method: 'POST',
                url: route('payment.store'),
                dataType:'json',
                data: {
                    student_fee_id: student_fee_id,
                    amount: payment_amount.val(),
                    remarks: payment_remarks.val(),
                    official_receipt: payment_official_receipt.val(),
                    payment_type: payment_type,
                    discounted_percentage: discounted_percentage,
                    discounted_cash: discounted_cash,
                    discounted_amount:  $('#payment_payment_discounted_amount').val()
                    
                },
                success: response => {
                    // console.log(response);
                    if(response == 'success')
                    {
                        toastSuccess('Payment Added')
                        $('.payment_DT').DataTable().draw();
                        payment_amount.val('');
                        payment_official_receipt.val('');
    
                        payment_display_balance_by_student_id();

                        return;
    
    
                    }

                     if(response == 'error')
                    {
                       return toastr.warning("Already have a downpayment, please select monthly payment or others")
                    }

                    if(response == 'no downpayment')
                    {
                        return toastr.warning("This student don't have a down payment. Add first a down payment");
                    }
                },
                error: err => {
                    toastDanger();
                    // console.log(err);
                    let err_msg = '';
                    $.each(err.responseJSON.errors,function(field_name,error){
                       err_msg += `<li class='text-secondary'> ${error} </li>`;
                    }) 
                    $('#payment_div_err').css('display', 'block');
                    $('#payment_err').html(err_msg);
                }
            })
        }
       
    }
}

// delete
function deletePayment(id) {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'DELETE',
                url: route('payment.destroy', id),
                success: response => {
                    console.log(response);
                    if(response == 'success') {
                        toastSuccess("Payment Deleted");
                        $('.payment_DT').DataTable().draw();
                    }
        
                },
                error: err => {
                    console.log(err);
                    toastDanger();
                }
            })
        }
      })
}

//* ---------------> End Payment ()


/** 
 * * <------------ Start Payment Report
 * TODO CRUD Payment Report (Completed)
 */

// index
function displayPaymentReport() {
 
    $('#payment_report_DT').DataTable({
        processing: false,
        serverSide: true,
        retrieve: true,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                        // test
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll()
            }
        },
        autoWidth: false,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        ajax: route('payment_report.index'),
        columns: [
            {data: 'payment_id'},
            {data: 'enrolment_id'},
            {data: 'student_id'},
            {data: 'first_name'},
            {data: 'last_name'},
            {data: 'amount'},
            {data: 'remarks'},
            {data: 'official_receipt'},
            // {data: 'status'},
            {data: 'created_at', render(data) {
                const date =  new Date(data);
                return date.toLocaleDateString();
               
            },},

        ]
    });
}



//* --------------> End Payment Report



/** 
 * * <------------ Start Parent Module
 * TODO CRUD Parent Module (Completed)
 */

// create
$('#add_parent').on('click', ()=> {
    $('#parent_modal').modal('show');
    $('#parent_modal_label').html(`<h4 class='text-white'>Register Parent <i class="fas fa-plus-circle"></i> </h4> `);
    $('#parent_name').attr('value', '');
    $('#parent_email').attr('value', '');
    $('#parent_contact').attr('value', '');
    $('#parent_facebook').attr('value', '');
    $('#btn_add_parent').css('display', 'block');
    $('#btn_update_parent').css('display', 'none');
    $('#parent_modal_header').removeClass('bg-success').addClass('bg-primary');

    
});

// store
function createParent()
{
    let name = $('#parent_name');
    let email = $('#parent_email');
    let contact = $('#parent_contact');
    let facebook = $('#parent_facebook');

    if(isNotEmpty(name)  && isNotEmpty(email) && isNotEmpty(contact) && isNotEmpty(facebook))
    {

        $.ajax({
            method: 'POST',
            url: route('parent.store'),
            dataType:'json',
            data:{
                name: name.val(),
                email: email.val(),
                contact: contact.val(),
                facebook: facebook.val()
            },
            success: response => {
                (response == 'success') ? toastSuccess("Parent Created") : toastDanger();
                $('.parent_DT').DataTable().draw();
                $('#parent_form')[0].reset();
            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        });
    }
}

// show
function showParent(id)
{
    $('#show_parent_modal_label').html(`<h4 class='text-white'>Parent Info <i class="fas fa-info-circle"></i></h4>`);
    $('#show_parent_modal').modal('show');
    $('#show_parent_modal_header').addClass('bg-primary');

    $.ajax({
        url: route('parent.show',id),
        dataType:'json',
        success: parent => {
            res(parent);
            let student_info = ``;
            let parent_info = `<ul class='list-group'>
                                    <center><img class='round-circle' src='/images/guardian.png' width='160'></center>
                                    <p class='text-center lead'> Parent </p>
                                    <li class="list-group-item"> <span class='badge bg-info'> Name:</span> ${parent[0].name}</li>
                                    <li class="list-group-item"> <span class='badge bg-info'> Email:</span> ${parent[0].email}</li>
                                    <li class="list-group-item"> <span class='badge bg-info'> Contact:</span> ${parent[0].contact}</li>
                                    <li class="list-group-item"> <span class='badge bg-info'> Facebook:</span> ${parent[0].facebook}</li>
                               </ul> `;

                parent[1].forEach(student => {
                    student_info += `<tr>
                                        <td>${student.first_name} ${student.last_name}</td>
                                        <td> ${student.section.name}</td>
                                        <td> | <a href='javascript:void(0)' class='btn btn-sm btn-danger' onclick='parent_destroy_student(${parent[0].id})'> <i class="fas fa-trash-alt"></i> </a> </td>
                                        <input type='hidden' id='p_student_id' data-id = ${student.id}>
                                     </tr>`;
                });

                $('.parent_info').html(parent_info); // display fetch parent by id
                $('#parent_student_info').html(student_info); //display fetch students to parent's student_table

        },
        error: err => {
            console.log(err);
        }
    });
}

// parent delete student by id
function parent_destroy_student(id)
{
    let parent_id = id;
    let student_id = $('#p_student_id').attr('data-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'DELETE',
                url: route('parent.parent_destroy_student', [parent_id,student_id]),
                dataType:'json',
                data:{
                    parent_id:parent_id,
                    student_id:student_id
                },
                success: response => {
                    // console.log(response);
                    if(response == 'success') {
                        toastSuccess("Student Deleted");
                        showParent(parent_id);
                    } 
        
                },
                error: err => {
                    console.log(err);
                    toastDanger();
                }
            })
        }
      })


}

// edit
function editParent(id)
{
    $('#parent_modal').modal('show');
    $('#parent_modal_label').html(`<h4 class='text-white'>Edit Parent <i class="fas fa-edit"></i></h1> `);
    $('#parent_name').attr('value', '');
    $('#parent_email').attr('value', '');
    $('#parent_contact').attr('value', '');
    $('#parent_facebook').attr('value', '');
    $('#btn_add_parent').css('display', 'none');
    $('#btn_update_parent').css('display', 'block');
    $('#parent_modal_header').removeClass('bg-primary').addClass('bg-success');

    $.ajax({
        url: route('parent.edit', id),
        dataType: 'json',
        success: parent => {
            //console.log(parent);
            $('#parent_name').attr('value', `${parent.name}`);
            $('#parent_email').attr('value', `${parent.email}`);
            $('#parent_contact').attr('value', `${parent.contact}`);
            $('#parent_facebook').attr('value', `${parent.facebook}`);
            $('#btn_update_parent').attr('data-id', `${parent.id}`);
        },
        error: err => {
            console.log(err);
            toastDanger();
        }
    });
}

// update
function updateParent()
{
    let parent_id = $('#btn_update_parent').attr('data-id');
    let name = $('#parent_name');
    let email = $('#parent_email');
    let contact = $('#parent_contact');
    let facebook = $('#parent_facebook');

    if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(contact) && isNotEmpty(facebook))
    {
        $.ajax({
            method: 'PUT',
            url: route('parent.update', parent_id),
            dataType:'json',
            data:
            {
                name: name.val(),
                email: email.val(),
                contact: contact.val(),
                facebook:facebook.val()
            },
            success: response => {
                (response =='success') ? toastSuccess("Parent Updated") : toastDanger();
                $('.parent_DT').DataTable().draw();

            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        });
    }
}

// delete
function deleteParent(id)
{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'DELETE',
                url: route('parent.destroy', id),
                success: response => {
                    // console.log(response);
                    if(response == 'success') {
                        toastSuccess("Parent Deleted");
                        $('.parent_DT').DataTable().draw();
                    } 
        
                },
                error: err => {
                    console.log(err);
                    toastDanger();
                }
            })
        }
      })
}




/** 
 * * <------------ Start Student Parent
 * TODO CRUD Student Parent (Completed)
 */

// create
$('#student_add_parent').on('click', () => {

    $('#parent_parent_id').attr('value', '');
    $('#parent_student_id').attr('value', '');
    $('#parent_student_modal').modal('show');
    $('#parent_student_modal_label').html(`Assign Student to Parent <i class="fas fa-user-friends"></i>`);
    $('#parent_student_modal_header').addClass('bg-info');

    $.ajax({
        url: route('parent.parent_display_student'),
        dataType:'json',
        success: data => {
            // console.log(data);
            let parent_data = `<option> </option>`;
            let student_data = `<option> </option>`;

            // parent
            data[0].forEach(parent => {
                parent_data += `<option value='${parent.id}'> ${parent.name}</option>`;
            });

            // student

              // parent
              data[1].forEach(student => {
                student_data += `<option value='${student.id}'> ${student.first_name} ${student.last_name}</option>`;
            });


            $('#parent_parent_id').html(parent_data);
            $('#parent_student_id').html(student_data);
        },
        error: err => {
            console.log(err);
        }
    });
});

// store
function parent_student_store()
{

    
    

    let parent_id = $('#parent_parent_id').val();
    let student_id = $('#parent_student_id').val();


    if(parent_id != "" && student_id != "")
    {
        $.ajax({
            method: 'POST',
            url: route('parent.parent_student_store'),
            dataType: 'json',
            data: {
                parent_id : parent_id,
                student_id: student_id
            },
            success: response => {
                // console.log(response);
                if(response == 'error')
                {
                    return toastr.warning("Parent already have this student");
                }
                toastSuccess('Student Assigned');
            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        })
    }
    else
    {
        alert("All fields are required");
    }

    
}

//* --------> End Student Parent()


/** 
 * * <------------ Start Admin Dashboard
 * TODO CRUD Admin Dashboard (Completed)
 */

// index
function AdminDashBoardDisplayUser()
{
    $.ajax({
        url: route('home.index'),
        dataType:'json',
        success: users => {

            // display users
            let output = ``;
            users[0].forEach(user => {
            let date = new Date(user.created_at);

                output += `<tr><td>${user.id} </td>
                          <td>${user.name} </td>
                          <td>${user.role.name} </td>`;

                          if(user.status == 1)
                          {
                output +=   `<td><span class='badge bg-success'> Online </span></td>`;
                          }
                          else
                          {
               output +=   `<td><span class='badge bg-warning'> Offline </span></td>`;
                          }

                output += `<td>${date.toLocaleDateString()}</td></tr>                
                `
            });

            $('#dashboard_display_user').html(output);


            //display activity logs
            let output2 = ``;
            users[1].forEach(activity => {
                
                let name = ``;
                let date = new Date(activity.created_at);

                if(activity.properties.hasOwnProperty("attributes"))
                {
                   if(activity.properties.attributes.name != undefined)
                   {
                     name += activity.properties.attributes.name;
                   }
                   else if(activity.properties.attributes.first_name != undefined)
                   {
                    name += activity.properties.attributes.first_name;
                   }
                   else
                   {
                       name += ``;
                   }
                }
                else
                {
                    name += activity.properties.old.name;
                }
            
                output2 += `
                            <div class='border-start border-3 border-secondary'>
                                <p class="m-0 ps-2">${activity.description} - <span class="text-primary"> ${name}</span> </p>
                                <p class='ps-2'> ${activity.created_at} </p>
                            </div>`;
        
            });
            $('.activity_log').html(output2);

            // display payment_notification count 

            $('#notification_count').html(`${users[2]}`);
            $('#notification_details').html(`${users[2]} New Notifications`);

            // display parent payment logs

            if(users.length > 3)
            {
                let parent_payment_logs = ``;

                users[3].forEach(payment_log => {

                //   console.log(payment_log);
                    parent_payment_logs += '<a href="'+route('parent_payment_request.edit', [payment_log.parent_id, payment_log.student_id])+'" class="list-group-item">';


                    // check if the notification already seen
                    parent_payment_logs += ` <div class="row g-0 align-items-center">`;

                                        if(payment_log.seen === 0)
                                        {

                    parent_payment_logs += `<div class="col-2">
                                                <i class="fas fa-eye text-muted"></i>
                                            </div>`; 

                                        }
                                        if(payment_log.seen === 1)
                                        {
                    parent_payment_logs += `<div class="col-2">
                                                <i class="fas fa-eye text-primary"></i>
                                            </div>`;

                                        }
                       
                    parent_payment_logs += `       <div class="col-10">
                                                        <div class="text-dark">${payment_log.description}</div>
                                                        <div class="text-muted small mt-1">${payment_log.created_at}</div>
                                                    </div>
                                                </div>
                                            </a>`;
                                 });

                                  

                    $('#list_of_parent_payment_logs').html(parent_payment_logs);
            }
           
        },
        error: err => {
            console.log(err);
        }
    })
   
}

// index parent payment request
function display_parent_payment_request()
{
    $('#parent_payment_request_DT').DataTable({
        responsive: true,
        processing: false,
        serverSide: true,
        retrieve: true,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                        // test
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll()
            }
        },
        autoWidth: false,
        ajax : route('parent_payment_request.index'),
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'first_name'},
            {data: `amount`, render(data) {
                return  `₱ ${data.toLocaleString()}`
            },},
            {data: 'official_receipt'},
            {data: 'receipt_type'},
            {data: 'screenshot', render(data) {
                return `<img id="to_show_receipt" class='img-thumbnail' src='/storage/uploads/receipt/${data}' width='100' alt='${data}'>`;
            }},
            {data: 'remark'},
            {data: 'status'},
            {data: 'actions'},
        ]
    });

    get_payment_approved_payment_request();
    get_payment_declined_payment_request();

}

// display payment approved request
function get_payment_approved_payment_request()
{
    $('#parent_approved_payment_request_DT').DataTable({
        responsive: true,
        processing: false,
        serverSide: true,
        retrieve: true,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                        // test
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll()
            }
        },
        autoWidth: false,
        ajax : route('parent_payment_request.get_payment_approved_payment_request'),
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'first_name'},
            {data: `amount`, render(data) {
                return  `₱ ${data.toLocaleString()}`
            },},
            {data: 'official_receipt'},
            {data: 'remark'},
            {data: 'status', render(data) {
                return `<span class='badge bg-success text-uppercase'> ${data} </span> `;
            }},
        ]
    });

}

// display payment declined request
function get_payment_declined_payment_request()
{
    $('#parent_declined_payment_request_DT').DataTable({
        responsive: true,
        processing: false,
        serverSide: true,
        retrieve: true,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                        // test
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll()
            }
        },
        autoWidth: false,
        ajax : route('parent_payment_request.get_payment_declined_payment_request'),
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'first_name'},
            {data: `amount`, render(data) {
                return  `₱ ${data.toLocaleString()}`
            },},
            {data: 'official_receipt'},
            {data: 'remark'},
            {data: 'comment'},
            {data: 'status', render(data) {
                return `<span class='badge bg-danger text-uppercase'> ${data} </span> `;
            }},
        ]
    }); 
}



// update payment request by parent_payment id

$(document).on('click', 'a.update', function (e) {
    let remark = $(this).attr('data-val');
    let payment_request_id = $(this).attr('data-id');
    
    let new_rm = remark.slice(0,-1);

    if(confirm(`Do you want to ${new_rm} Payment Request ?`))
    {

        if(remark == 'approved')
        {
            $.ajax({
                method: 'PATCH',
                url: route('parent_payment_request.update_parent_payment_request',payment_request_id),
                dataType:'json',
                data:{
                    remark:remark,
                },
                success: response => {
                    console.log(response);
                    if(response == 'success')
                    {
                        // after update replenish all the Data Tables in the Parent Payment Request Page
                      $('#parent_payment_request_DT').DataTable().draw();
                      $('#parent_approved_payment_request_DT').DataTable().draw();
                      $('#parent_declined_payment_request_DT').DataTable().draw();
                      return toastSuccess(`Payment Request ${remark}`);
                    }
                },
                error: err => {
                    console.log(err);
                }
            });
        }
        else
        {
            let comment = prompt("Please add comment *"); // message

            if(comment === null || comment.length == 0)
            {
                return alert("Field is required ⚠");
            }
           
            $.ajax({
                method: 'PATCH',
                url: route('parent_payment_request.update_parent_payment_request',payment_request_id),
                dataType:'json',
                data:{
                    remark:remark,
                    comment: comment
                },
                success: response => {
                    console.log(response);
                    if(response == 'success')
                    {
                        // after update replenish all the Data Tables in the Parent Payment Request Page
                      $('#parent_payment_request_DT').DataTable().draw();
                      $('#parent_approved_payment_request_DT').DataTable().draw();
                      $('#parent_declined_payment_request_DT').DataTable().draw();
                      return toastSuccess(`Payment Request ${remark}`);
                    }
                },
                error: err => {
                    console.log(err);
                }
            });
        }

        
    }
});

// Update parent payment request by student id and parent id()
function parent_update_payment_request(student_id , parent_id) {

    let payment_request_remark = $('#payment_request_remark').val();

    let rm = $('#payment_request_remark :selected').text();

    if(confirm(`Do you want to ${rm} payment request ?`))
    {
        if(payment_request_remark == 'approved')
        {
            $.ajax({
                method:'PUT',
                url: route('parent_payment_request.update', [student_id, parent_id]),
                dataType:'json',
                data:
                {
                    student_id: student_id,
                    parent_id: parent_id,
                    remark: payment_request_remark
                },
                success: response => {
                    if(response == 'success')
                    {
                        toastSuccess(`Payment Request ${payment_request_remark}`);
        
                        setTimeout(() => {
                            window.location.href = route('parent_payment_request.index');
                        },1300)
                    }
                },
                error: err => {
                    console.log(err);
                    toastDanger();
                }
            });
        }
        else
        {
            let comment = prompt("Please add comment *"); // message

            if(comment === null || comment.length == 0)
            {
                return alert("Field is required ⚠");
            }

            $.ajax({
                method:'PUT',
                url: route('parent_payment_request.update', [student_id, parent_id]),
                dataType:'json',
                data:
                {
                    student_id: student_id,
                    parent_id: parent_id,
                    remark: payment_request_remark,
                    comment: comment
                },
                success: response => {
                    if(response == 'success')
                    {
                        toastSuccess(`Payment Request ${payment_request_remark}`);
        
                        setTimeout(() => {
                            window.location.href = route('parent_payment_request.index');
                        },1300)
                    }
                },
                error: err => {
                    console.log(err);
                    toastDanger();
                }
            });

        }
       
    }
   
}
// end

// Show Receipt (IMG)
$(document).on('click', '#to_show_receipt', function() {

    let image = $(this).attr('src');
    Swal.fire({
        title: '',
        width: "35%",
        imageWidth: "400",
        imageHeight: "600",
        padding: '3em',
        imageUrl: `${image}`,
        backdrop: `
          rgba(0,0,123,0.4)
          left top
          no-repeat
        `
      })

});




//* ----------> End Admin User()


/** 
 * * <------------ Start Payment Mode
 * TODO CRUD Payment Mode (Completed)
 */

// create
$('#add_payment_mode').on('click', () => {
    $('.bootstrap-tagsinput').show();
    $('#payment_mode_title').hide();

    $('#payment_mode').modal('show');
    $('#payment_mode_label').html(`<h4 class='text-white'> Add Payment Mode </h4>`);
    $('#payment_mode_title').attr('value', ``);
    $('#payment_mode_title').val('');

    $('#btn_add_payment_mode').css('display', 'block');
    $('#btn_update_payment_mode').css('display', 'none');
    $('#payment_mode_modal_header').removeClass('bg-success').addClass('bg-primary');


});

// store
function createPaymentMode()
{
    let payment_mode = $('#payment_mode_title');

    if(isNotEmpty(payment_mode))
    {
        $.ajax({
            method:'POST',
            url: route('payment_mode.store'),
            dataType:'json',
            data:{title:payment_mode.val()},
            success: response => {
                console.log(response);
                if(response == 'success')
                {
                    toastSuccess("Payment Mode Added");
                    $('.payment_mode_DT').DataTable().draw();
                    payment_mode.val('');
                }
            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        })
    }
}

// edit
function editPaymentMode(id) {

    $('.bootstrap-tagsinput').hide();
    $('#payment_mode_title').show();
    $('#btn_add_payment_mode').css('display', 'none');
    $('#btn_update_payment_mode').css('display', 'block');
    $('#payment_mode').modal('show');
    $('#payment_mode_modal_header').removeClass('bg-primary').addClass('bg-success');
    $('#payment_mode_label').html(`<h4 class='text-white'> Edit Payment Mode </h4>`);
    

    $.ajax({
        url: route('payment_mode.edit', id),
        success: payment_mode => {
            // console.log(payment_mode);
         $('#btn_update_payment_mode').attr('data-id', payment_mode.id);
         $('#payment_mode_title').val( payment_mode.title);

         //$('#payment_mode_title').attr('value', payment_mode.title);

        },
        error: err => {
            console.log(err);
            toastDanger();
        }
    })
}

// update
function updatePaymentMode() {
    let payment_mode = $('#payment_mode_title');
    let payment_mode_id =  $('#btn_update_payment_mode').attr('data-id');

    if(isNotEmpty(payment_mode))
    {
        $.ajax({
            method: 'PUT',
            url: route('payment_mode.update', payment_mode_id),
            dataType:'json',
            data:{title: payment_mode.val()},
            success: response => {
                toastSuccess("Payment Mode Updated");
                $('.payment_mode_DT').DataTable().draw();
            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        });
    }

}

// delete
function deletePaymentMode(id) {


    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'DELETE',
                url: route('payment_mode.destroy',id),
                success: response => {
                    if(response == 'success')
                    {
                        toastSuccess("Payment Mode Deleted");
                        $('.payment_mode_DT').DataTable().draw();
                    }
                },
                error: err => {
                    console.log(err);
                    toastDanger();
                }
            })
        }
      })
}



//* ------------- > End Mode of Payment ()

/** 
 *  * Grade Level Module()
 * TODO Assign Subject (PENDING)
 */

function assign_subject(id) {
    
    $('#grade_level_assign_subject').modal('show');
    $('#grade_level_assign_subject_modal_header').addClass('bg-primary');
    $('#grade_level_assign_subject_modal_label').html(`<h4 class='text-white'> Assign Subjects </h4>`);


    $.ajax({
        url: route('grade_level.display_subjects_for_grade_level',id),
        dataType:'json',
        success: subjects => {
           // res(subjects);
           let output = `<option></option>`;
           subjects.forEach(subject=>{
               output+=`<option value='${subject.id}' data-value='${subject.name}'> ${subject.name}</option>`;
           })

            $('#grade_level_assign_subject_subject_id').html(output);
            $('#grade_level_assign_subject_grade_level_id').attr('value',id); // store the grade_level id to this input hidden 
        }
    })

}
// store
function grade_level_assign_subject_subject_id_store()
{
    let subject_id =  $('#grade_level_assign_subject_subject_id').val();

    if(subject_id.length > 0)
    {
        $.ajax({
            method: 'POST',
            url: route('grade_level.grade_level_assign_subject_subject_id_store'),
            dataType:'json',
            data: $('#grade_level_assign_subject_form').serialize(),
            success: response => {
                res(response);
                if(response == 'success')
                {
                    return toastSuccess('Subject/s Assigned');
                    $('#grade_level_assign_subject').modal('hide');

                }

                if(response == 'error')
                {
                    return toastr.warning("Some of the Subjects are already assigned to this Grade Level");
                }
            },
            error: err => {
               // res(err);
                toastDanger();
            }
        })
    }
    else
    {
        return toastr.warning("Please select a subject");
    }
}


// End Assign Subject


/**
 * * <---------- START ROLE () 
 * TODO Roles CRUD() 
 * 
 */

// create

$('#add_role').on('click', ()=> {
    $('#role_modal').modal('show');
    $('#role_modal_label').html(`<h4 class='text-white'> Add Role <i class="fas fa-users-cog"></i> </h4>`);
    $('#role_modal_header').removeClass('bg-success').addClass('bg-primary');
    $('#role_title').attr('value', '');
    $('#btn_update_role').css('display','none');
    $('#btn_add_role').css('display','block');

});

function createRole()
{
    if(isNotEmpty($('#role_title')))
    {
        $.ajax({
            method: 'POST',
            url: route('role.store'),
            dataType:'json',
            data: $('#role_form').serialize(),
            success: response => {
                console.log(response);
                if(response == "success")
                {
                    $('.role_DT').DataTable().draw();
                    toastSuccess("Role Added");
                }
                if(response == 'error')
                {
                    toastr.warning("Role already exist!");
                }
            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        })
    }
}

function editRole(role)
{
    $('#role_modal').modal('show');
    $('#role_modal_label').html(`<h4 class='text-white'> Edit Role <i class="fas fa-edit"></i> </h4>`);
    $('#role_modal_header').removeClass('bg-primary').addClass('bg-success');
    $('#btn_update_role').css('display','block');
    $('#btn_add_role').css('display','none');
    $('.bootstrap-tagsinput').hide();
    $('#role_title').show();


    $.ajax({
        url: route('role.edit', role),
        dataType:'json',
        success: role => {
           $('#role_title').val(role.name);
           $('#btn_update_role').attr('data-id', role.id);
        },
        error: err => {

        }
    })
}

function updateRole()
{
    let id = $('#btn_update_role').attr('data-id');

    if(isNotEmpty($('#role_title')))
    {
        $.ajax({
            method:'PUT',
            url: route('role.update', id),
            dataType:'json',
            data:{title: $('#role_title').val()},
            success: response => {
                if(response == 'success')
                {
                    $('.role_DT').DataTable().draw();
                    toastSuccess("Role Updated");
                }
            },
            error: err => {
                res(err);
            }
        })
    }
}



// * -------------> END Role()


/** 
 ** <------------ START REPORTING()
 */

 // display students by academic year
 function report_display_students_by_ay()
 {
    let ay = $('#report_ay').val();

    if(ay > 0)
    {
        let output =    `
                        <table class='table table-bordered table-hover mt-5' id='report_student_DT'>
                            <caption>List of Students </caption>
                            <thead>
                                <tr>
                                    <td>LRN</td>
                                    <td> </td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Gender</td>
                                    <td>Section</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                            <div class='row' id='report_display_students_by_ay_id'>

                            </div>
            `;


            $('#report_display_data').html(output);
            $('#report_student_DT').DataTable({
            processing: true,
            serverSide: true,
            retrieve: true,
            responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                        // test
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll()
            }
            },
            autoWidth: false,
            ajax : route('report.display_students_by_ay', ay),
            columns: [
            {data: 'lrn'},
            {data: 'student_avatar', render(data){
                return img_catch(data,`storage/uploads/student/${data}`);
            }},
            {data: 'first_name'},
            {data: 'last_name'},
            {data: 'gender'},
            {data: 'section.name'},
            {data: 'actions'},
            ]
            });

    }
    else
    {
        $('#report_display_data').html(``);
        $('#report_display_students_by_ay_id').html(``);

    }
    
 }

 // display student's grade record by student id
 function report_to_form_138_show_by_student_id(student) 
 {
     $.ajax({
         url: route('report.to_form_138_show_by_student_id', student),
         dataType:'json',
         success: student_form => {
            let output = `
                            <h1 class="fw-bold text-uppercase text-center mb-5"> report on learning progress and achievement</h1>
                            <table class="table table-bordered " border="1">
                                <thead style="background: none">
                                    <tr class="text-center fw-bold">
                                        <td rowspan="2" style="width:25%">Learning Areas</td>
                                        <td colspan="4" style="width:25%">Quarter</td>
                                        <td rowspan="2" style="width:25%">Final Grade</td>
                                        <td rowspan="2" style="width:25%">Remark</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                    </tr>
                                </thead>
                                <tbody>`;

                                res(student_form);

                                // display student subject and assigned grades
                                student_form[0].forEach(student_subject_grade => {

                                let average = '';
                                let remark = '';
       
                                if(student_subject_grade.quarter_1 !== null && student_subject_grade.quarter_2 !== null &&student_subject_grade.quarter_3 !== null && student_subject_grade.quarter_4 !== null)
                                {
                                   average = get_average([student_subject_grade.quarter_1 + student_subject_grade.quarter_2 + student_subject_grade.quarter_3 + student_subject_grade.quarter_4])/4;
                                   remark = (average > 74) ? 'Passed': 'Failed';

       
                                }
                                
                                let q1 = (student_subject_grade.quarter_1 == null) ? '' : student_subject_grade.quarter_1 ;
                                let q2 = (student_subject_grade.quarter_2 == null) ? '' : student_subject_grade.quarter_2 ;
                                let q3 = (student_subject_grade.quarter_3 == null) ? '' : student_subject_grade.quarter_3 ;
                                let q4 = (student_subject_grade.quarter_4 == null) ? '' : student_subject_grade.quarter_4 ;

                                 average_container.push(average); // insert all average per row on average container[]

                output +=           `<tr>
                                        <th >${student_subject_grade.name}</th>
                                        <td class='quarter' data-quarter='1' style='width:7%'>${q1}</td>
                                        <td class='quarter' data-quarter='2' style='width:7%'>${q2}</td>
                                        <td class='quarter ' data-quarter='3' style='width:7%'>${q3}</td>
                                        <td class='quarter ' data-quarter='4' style='width:7%'>${q4}</td>
                                        <td class='average'>${average}</td>
                                        <td class='remark'>${remark}</td>
                                     </tr>`    

                                }); // closure

                  output +=     `</tbody>
                            </table>
                            <div class="row mt-3" id="descriptors">
                                <table class="table table-sm ">
                                    <thead style="background: none">
                                        <tr class="fw-bold">
                                            <th>Descriptors</th>
                                            <th>Grading Scale</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Outstanding</td>
                                            <td>90-100</td>
                                            <td>Passed</td>
                                        </tr>
                                        <tr>
                                            <td>Very Satisfactory</td>
                                            <td>85-89</td>
                                            <td>Passed</td>
                                        </tr>
                                        <tr>
                                            <td>Satisfactory</td>
                                            <td>80-84</td>
                                            <td>Passed</td>
                                        </tr>
                                        <tr>
                                            <td>Fairly Satisfactory</td>
                                            <td>75-79</td>
                                            <td>Passed</td>
                                        </tr>
                                        <tr>
                                            <td>Did not Meet Expectations</td>
                                            <td>Below 75</td>
                                            <td>Failed</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>`;

                            // learner values
              output +=    `<div class="row mt-5" id="obsereved_values">
                                <h1 class="fw-bold text-uppercase text-center mb-5"> report on learner's observed values</h1>
                                <table class="table table-bordered">
                                    <thead style="background: none">
                                        <tr class="fw-bold text-center">
                                            <td rowspan="2">Core Values</td>
                                            <td rowspan="2">Behavior Statements</td>
                                            <td colspan="4">Quarter</td>
                                        </tr>

                                        <tr>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>`;

                                    //display student's assigned values

                             let index = 0; // counter
                             student_form[1].forEach(student_values => {
            output +=                   `<tr>`;

                                    if(index === student_values.values_id)
                                    {
            output +=                  `<td style='border-top:1px solid #fff !important'> </td>
                                        <td>${student_values.description}</td>
                                        <td class='values_quarter' data-quarter='1' style='width:7%'>${student_values.q1}</td>
                                        <td class='values_quarter' data-quarter='2' style='width:7%'>${student_values.q2}</td>
                                        <td class='values_quarter' data-quarter='3' style='width:7%'>${student_values.q3}</td>
                                        <td class='values_quarter' data-quarter='4' style='width:7%'>${student_values.q4}</td>`;
                                    }
                                    else
                                    {
                                        
            output +=                   `<td class='text-capitalize'>${student_values.title}</td>
                                        <td>${student_values.description}</td>
                                        <td class='values_quarter' data-quarter='1'style='width:7%'>${student_values.q1}</td>
                                        <td class='values_quarter' data-quarter='2'style='width:7%'>${student_values.q2}</td>
                                        <td class='values_quarter' data-quarter='3'style='width:7%'>${student_values.q3}</td>
                                        <td class='values_quarter' data-quarter='4'style='width:7%'>${student_values.q4}</td>`;  
                                    }


            output +=                  `</tr>`; 

                                    index = student_values.values_id;

                             }); // closure 
                             
                             

            output +=              `</tbody>
                                </table>
                            </div>

                            <div class="row mt-2" id="marking">
                            <table class="table table-sm ">
                                <thead style="background: none">
                                    <tr class="fw-bold">
                                        <th>Marking</th>
                                        <th>Non-numerical Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>AO</td>
                                        <td>Always Observed</td>
                                    </tr>
                                    <tr>
                                        <td>SO</td>
                                        <td>Sometimes Observed</td>
                                    </tr>
                                    <tr>
                                        <td>RO</td>
                                        <td>Rarely Observed</td>
                                    </tr>
                                    <tr>
                                        <td>NO</td>
                                        <td>Not Observed</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
            
                         `;

                         $('#report_form_138_display_student_record').html(output);

         },
         error: err => {
             res(err);
         }
     })
 }

 function report_display_payments_by_ay()
 {
    let ay = $('#report_ay').val();

    if(ay > 0)
    {
        let output =    `
                                <table class='table table-bordered table-hover mt-5' id='report_payment_DT'>
                                    <caption>List of Payments </caption>
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td> Enrolment No.</td>
                                            <td>Transaction No.</td>
                                            <td>Amount</td>
                                            <td>Remark</td>
                                            <td>Official Receipt</td>
                                            <td>Date</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                 </table>

                    `;


                        $('#report_display_data').html(output);
                        $('#report_payment_DT').DataTable({
                        processing: true,
                        serverSide: true,
                        retrieve: true,
                        dom: 'Bfrtip',
                        buttons: [
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5',
                            'print'
                        ],
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal( {
                                        // test
                                } ),
                                renderer: $.fn.dataTable.Responsive.renderer.tableAll()
                            }
                        },
                        autoWidth: false,
                        ajax : route('report.display_payments_by_ay', ay),
                        columns: [
                            {data: 'id'},
                            {data: 'student_fee_id'},
                            {data: 'transaction_no'},
                            {data: 'amount'},
                            {data: 'remarks'},
                            {data: 'official_receipt'},
                            {data:'created_at', render(data){
                                return format_date(data);
                            }}
                        ]
                        });

    }
 }

 function report_display_teachers_by_ay()
 {
    let ay = $('#report_ay').val();

    if(ay > 0)
    {
        let output =    `
                                <table class='table table-bordered table-hover mt-5' id='report_teacher_DT'>
                                    <caption>List of Teachers </caption>
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td></td>
                                            <td>First Name</td>
                                            <td>Last Name</td>
                                            <td>Gender</td>
                                            <td>Created At</td>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                 </table>

                    `;

                        $('#report_display_data').html(output);
                        $('#report_teacher_DT').DataTable({
                        processing: true,
                        serverSide: true,
                        retrieve: true,
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal( {
                                        // test
                                } ),
                                renderer: $.fn.dataTable.Responsive.renderer.tableAll()
                            }
                        },
                        autoWidth: false,
                        ajax : route('report.display_teachers_by_ay', ay),
                        columns: [
                            {data: 'id'},
                            {data: 'teacher_avatar', render(data) {
                               return img_catch(data,`storage/uploads/teacher/${data}`); // for catching nullable images
                            }},
                            {data: 'first_name'},
                            {data: 'last_name'},
                            {data: 'gender'},
                            {data:'created_at', render(data){
                                return format_date(data);
                            }}
                        ]
                        });

    }
 }

 function report_reset()
 {
     $('#report_display_data').html(``);
     $('#report_form_138_display_student_record').html(``);
 }


 //* ----------> END REPORTING ()



 //** <------------ START VALUES() 
 // TODO CRUD VALUES Management


 //create
 $('#add_values').on('click', ()=> {

    $('#values_modal').modal('show');
    $('#values_modal_header').removeClass('bg-success').addClass('bg-primary');
    $('#values_modal_label').html(`<h4 class='text-white'>Add Values </h4>`)

 });

 //store

 function createValues()
 {
    if(isNotEmpty($('#values_title')))
    {
        $.ajax({
            method: 'POST',
            url: route('values.store'),
            dataType:'json',
            data: $('#values_form').serialize(),
            success: response => {
                //console.log(response);
                if(response == "success")
                {
                    $('#values_form')[0].reset();
                    $('.values_DT').DataTable().draw();
                    toastSuccess("Values Added");
                }
                if(response == 'error')
                {
                    toastr.warning("Values already exist!");
                }
            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        })
    }
 }

 // create description
 function assign_description(id)
 {
     $('#values_statement_modal').modal('show');
     $('#values_statement_modal_header').addClass('bg-primary');
     $('#values_statement_modal_label').html(`<h4 class='text-white'> Assign Description </h4>`);

     $.ajax({
         url:route('values.create'),
         data:{id:id},
         dataType:'json',
         success: value => {
            $('#core_values').html(value.title);
            $('#btn_add_values_statement').attr('data-id', value.id);
         },
         error: err => {
             res(err);
         }
     })
 }

 // store description
 function createDescription()
 {
     let description = $('#values_description');
     let value_id =    $('#btn_add_values_statement').attr('data-id');

     if(isNotEmpty(description))
     {
         $.ajax({
             method: 'POST',
             url: route('values.store_description'),
             dataType:'json',
             data:
             {
                 values_id:value_id,
                 description:description.val()
             },
             success: response => {
                if(response == 'success')
                {
                    description.val('');
                    return toastSuccess("Statement Assigned");
                }
             },
             error: err => {
                toastDanger();
                res(err);
             }
         })
     }
   
 }

 function editValues(id)
 {
     $('#edit_values_statement_modal').modal('show');
     $('#edit_values_statement_modal_header').addClass('bg-success');
     $('#edit_values_statement_modal_label').html(`<h4 class='text-white'> Edit Values </h4>`);

     $.ajax({
         url:route('values.edit', id),
         dataType:'json',
         success: values_description => {
             $('#edit_values_title').attr('value', values_description.title); // populate recent values title to the input field
             $('#btn_update_values_modal').attr('data-id', values_description.id);  

             let output = `
                          <table class='table table-sm table-hover'>
                            <thead style='background:none'>
                                <tr>
                                    <th>Behavior Statements</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                           `;
                    // display behavior statements / descriptions
                    values_description.descriptions.forEach(description => {
                 output += `<tr id='description_row-${description.id}'>
                                <td> ${description.description} </td>
                                <td> <a class='text-danger' href='javascript:void(0)' onclick='values_description_destroy(${description.id})'> <i class="fas fa-times"></i> </a> </td>
                            </tr>`
                    });


             $('#display_assigned_description').html(output);
         },
         error: err => {
             res(err);
         }

     })
 }

 function updateValues()
 {
     let values_id =  $('#btn_update_values_modal').attr('data-id');
     let value_title =  $('#edit_values_title');
    
    if(isNotEmpty(value_title))
    {
        $.ajax({
            method:'PUT',
            url: route('values.update', values_id),
            data:
            {
                title:value_title.val() 
            },
            success: response => {
                $('.values_DT').DataTable().draw();
                return toastSuccess("Values Updated");

            },
            error: err => {
                res(err);
            }
        })
    }
     
 }

 // delete assigned description
 function values_description_destroy(description)
 {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'DELETE',
                    url: route('values.values_description_destroy', description),
                    success: response => {
                        if(response == 'success')
                        {
                            $('.values_DT').DataTable().draw();
                            toastSuccess("Assigned Statement Deleted");
                            $('#description_row-'+description).fadeOut('slow');
                        }
                    },
                    error: err => {
                        console.log(err);
                        toastDanger();
                    }
                })
            }
        })
 }

 // delete values
 function deleteValues(id)
 {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'DELETE',
                    url: route('values.destroy',id),
                    success: response => {
                        if(response == 'success')
                        {
                            $('.values_DT').DataTable().draw();
                            toastSuccess("Values Deleted");

                        }
                    },
                    error: err => {
                        console.log(err);
                        toastDanger();
                    }
                })
            }
        })
 }

 //** -------------> END() */





 /** 
 * * <------------ Start User Management
 * TODO CRUD User Management (Completed)
 */

function display_user_select_box()
{
    let selected_box = $('#select_user :selected').attr('data-val');


    if(selected_box === 'student')
    {
        $('#s_student_div').css('display', 'block');
        $('#p_parent_div').css('display', 'none');
        $('#t_teacher_div').css('display', 'none');
        $('#user_student_id').attr('disabled', false).val('');

    }

    if(selected_box === 'parent' )
    {

        $('#p_parent_div').css('display', 'block');
        $('#s_student_div').css('display', 'none');
        $('#t_teacher_div').css('display', 'none');
        $('#user_parent_id').attr('disabled', false).val('');

        
    }

    if(selected_box === 'teacher')
    {

        $('#t_teacher_div').css('display', 'block');
        $('#s_student_div').css('display', 'none');
        $('#p_parent_div').css('display', 'none');
        $('#user_teacher_id').attr('disabled', false).val('');

    }


    if($('#select_user').val() == "")
    {

        $('#s_student_div').css('display', 'none');
        $('#p_parent_div').css('display', 'none');
        $('#t_teacher_div').css('display', 'none');
        $('#user_full_name').attr('value', '').attr('readonly', false);
        $('#user_email').attr('value', '').attr('readonly', false);
        $('#user_display_user_avatar').css('display', 'none');
    }
}

// create
$('#add_user').on('click', ()=> {

    $('#user_modal_label').html(`<h4 class='text-white'>Create an Account <i class="fas fa-user-plus"></i></h4>`);
    $('#user_full_name').attr('value', '').attr('disabled', false);
    $('#user_email').attr('value', '').attr('disabled', false);
    $('#user_password').attr('value', '');

    $('#btn_add_user').css('display', 'block');
    $('#btn_update_user').css('display', 'none');
    $('#user_modal_header').removeClass('bg-success').addClass('bg-primary');

    $('#user_student_id').attr('disabled', false);
    $('#user_parent_id').attr('disabled', false);
    $('#user_teacher_id').attr('disabled', false);

    // reset
    $('#user_full_name').val('');
    $('#user_email').val('');
    $('#user_password').val('');


    $.ajax({
        url:route('user.create'),
        dataType: 'json',
        success: data => {
           
            let student_data = `<option> </option>`;
            let roles = `<option> </option>`;
            let parent_data = `<option> </option>`;
            let teacher_data = `<option> </option>`;

            data[0].forEach( student => {
                 student_data += `<option value='${student.id}'> ${student.first_name}  ${student.last_name} </option>`;
            });

            data[1].forEach(role => {
                roles += `<option value='${role.id}' data-val='${role.name}'> ${role.name} </option>`;
            })

            data[2].forEach(parent => {
                parent_data += `<option value='${parent.id}'> ${parent.name} </option>`;
            })

            data[3].forEach(teacher => {
                teacher_data += `<option value='${teacher.id}'> ${teacher.first_name} ${teacher.last_name} </option>`;
            })

     
            $('#user_student_id').html(student_data); // display students 
            $('#select_user').html(roles); // display roles
            $('#user_parent_id').html(parent_data); // display parents
            $('#user_teacher_id').html(teacher_data); // display teachers

            $('#user_modal').modal('show');

        },
        error: err => {
            console.log(err);
            toastDanger();
        }
    });

});

// display teacher info on user modal

function display_teacher_info_on_user_modal()
{
    let teacher_id = $('#user_teacher_id').val(); // get teacher_id

    if(teacher_id > 0)
    {
        $.ajax({
            url: route('user.display_teacher_info', teacher_id),
            dataType:'json',
            success: teacher => {
                //res(teacher);
                let teacher_avatar = img_catch(teacher.teacher_avatar, `storage/uploads/student/${student.teacher_avatar}`, 150);

                $('#user_full_name').attr('value', `${teacher.first_name} ${teacher.last_name}` ).attr('readonly', true);
                $('#user_email').attr('value', `${teacher.email}` ).attr('readonly', true);
                $('#teacher_role_div').show();
                $('#user_teacher_role').attr('value', 'Teacher').attr('readonly', true);

                $('#role_div').hide();
                $('#parent_role_div').hide();
                $('#student_role_div').hide();
                $('#user_display_user_avatar').html(`<center>${teacher_avatar}</center>`)


              
        
            },
            error: err => {
                console.log(err);
            }
        });
    }
    else
    {
        $('#user_full_name').attr('value', '').attr('readonly', false);
        $('#user_email').attr('value', '').attr('readonly', false);
        $('#user_password').attr('value', '');
        $('#user_role').attr('value','');
        $('#student_role_div').hide();
        $('#parent_role_div').hide();
        $('#teacher_role_div').hide();
        $('#role_div').show();
        $('#user_display_user_avatar').html(``);
    }
}



// display student info on user modal
function display_student_info_on_user_modal() {
    let student_id = $('#user_student_id').val(); // get student_id 
    $('#user_student_role').attr('value', '');
    $('#user_parent_id').attr('disabled', true);

    if(student_id > 0)
    {
        $.ajax({
            url: route('user.display_student_info', student_id),
            dataType:'json',
            success: student => {
                // console.log(student);
                let student_avatar = img_catch(student.student_avatar, `storage/uploads/student/${student.student_avatar}`, 150);
                $('#user_full_name').attr('value', `${student.first_name} ${student.last_name}` ).attr('readonly', true);
                $('#user_email').attr('value', `${student.email}` ).attr('readonly', true);
                $('#role_div').hide();
                $('#parent_role_div').hide();
                $('#student_role_div').show();
                $('#user_student_role').attr('value', 'Student').attr('readonly', true);
                $('#user_display_user_avatar').html(`<center> ${student_avatar} </center>`)
        
            },
            error: err => {
                console.log(err);
            }
        });
    }
    else
    {
        $('#user_full_name').attr('value', '').attr('readonly', false);
        $('#user_email').attr('value', '').attr('readonly', false);
        $('#user_password').attr('value', '');
        $('#user_role').attr('value','');
        $('#student_role_div').hide();
        $('#parent_role_div').hide();
        $('#role_div').show();
        $('#user_display_user_avatar').html('');
    }
}

// display parent info on user modal
function display_parent_info_on_user_modal() {
    let parent_id = $('#user_parent_id').val(); // get student_id 

    $('#user_student_id').attr('disabled', true);

    if(parent_id > 0)
    {
        $.ajax({
            url: route('user.display_parent_info', parent_id),
            dataType:'json',
            success: parent => {
                //console.log(parent);
                $('#user_full_name').attr('value', `${parent.name}` ).attr('readonly', true);
                $('#user_email').attr('value', `${parent.email}` ).attr('readonly', true);
                $('#role_div').hide();
                $('#student_role_div').hide();
                $('#parent_role_div').show();
                $('#user_parent_role').attr('value', 'Parent').attr('readonly', true);
        
            },
            error: err => {
                console.log(err);
            }
        });
    }
    else
    {
        $('#user_full_name').attr('value', '').attr('readonly', false);
        $('#user_email').attr('value', '').attr('readonly', false);
        $('#user_password').attr('value', '');
        $('#user_role').attr('value','');
        $('#student_role_div').hide();
        $('#parent_role_div').hide();
        $('#role_div').show();
    }
}

// store
function createUser()
{
    let name = $('#user_full_name');
    let email = $('#user_email');
    let password = $('#user_password');

    let student_id = $('#user_student_id').val();
    let parent_id = $('#user_parent_id').val();
    let teacher_id = $('#user_teacher_id').val();

    let selected_role = $('#select_user').val(); // for role selection

    let select_user = $('#select_user');
    
    if(isNotEmpty(select_user) && isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(password))
    {
        if(parseInt(student_id)> 0)
        {
            
            $.ajax({
                method: 'POST',
                url: route('user.store'),
                dataType:'json',
                data:{
                name: name.val(),
                email: email.val(),
                password: password.val(),
                student_id: student_id,
                student_role: selected_role
                },
                success: response => {
                    //console.log(response);
                    if(response == 'error')
                    {
                        return toastr.warning('User already exist') ;
                    }
                       // reset
                    $('#user_full_name').val('');
                    $('#user_email').val('');
                    $('#user_password').val('');

                    $('.user_DT').DataTable().draw();
                    return toastSuccess('User Created')
                },
                error : err => {
                    console.log(err);
                }
            });
        }

        else if(parseInt(parent_id) > 0)
        {

            $.ajax({
                method: 'POST',
                url: route('user.store'),
                dataType:'json',
                data:{
                name: name.val(),
                email: email.val(),
                password: password.val(),
                parent_id: parent_id,
                parent_role: selected_role
                },
                success: response => {
                    if(response == 'error')
                    {
                        return toastr.warning('User already exist') ;
                    }

                    $('.user_DT').DataTable().draw();
                    return toastSuccess('User Created')
                },
                error : err => {
                    console.log(err);
                }
            });
        }
        else if(parseInt(teacher_id) > 0)
        {

            $.ajax({
                method: 'POST',
                url: route('user.store'),
                dataType:'json',
                data:{
                name: name.val(),
                email: email.val(),
                password: password.val(),
                teacher_id: teacher_id,
                teacher_role: selected_role
                },
                success: response => {
                    res(response);
                    if(response == 'error')
                    {
                        return toastr.warning('User already exist') ;
                    }

                    $('.user_DT').DataTable().draw();
                    return toastSuccess('User Created')
                },
                error : err => {
                    console.log(err);
                }
            });
        }
        else
        {
            $.ajax({
                method: 'POST',
                url: route('user.store'),
                dataType:'json',
                data:{
                name: name.val(),
                email: email.val(),
                password: password.val(),
                user_role: selected_role
                },
                success: response => {
                    if(response == 'error')
                    {
                        return toastr.warning('User already exist') ;
                    }

                    $('.user_DT').DataTable().draw();
                    return toastSuccess('User Created')
                },
                error : err => {
                    console.log(err);
                }
            });
        }

    }
}

// edit
function editUser(id)
{
    $('#user_modal_label').html(`<h4>Edit User <i class="fas fa-user-plus"></i></h4>`);
    $('#user_full_name').attr('value', '');
    $('#user_email').attr('value', '');
    $('#user_password').attr('value', '');
    $('#student_role_div').hide();
    $('#user_student_role').attr('value', '');
    $('#btn_add_user').css('display', 'none');
    $('#btn_update_user').css('display', 'block');
    $('#user_modal_header').removeClass('bg-primary').addClass('bg-success');

        $.ajax({
            url: route('user.edit', id),
            dataType: 'json',
            success: user => {

                let student_id = (user.student_id > 0) ? user.name: "";
                let pareint_id = (user.pareint_id > 0) ? user.name: "";

                $('#user_modal').modal('show');
                $('#user_modal_label').html(`Edit User`);
                $('#user_full_name').attr('value', `${user.name}`).attr('disabled', true);
                $('#user_email').attr('value', `${user.email}`).attr('disabled', true);
                $('#user_password').attr('value', `${user.password}`);
                $('#student_role_div').show();
                $('#role_div').hide();
                $('#parent_role_div').hide();

                if(user.role_id == 1)
                {
                    $('#user_student_role').attr('value', 'Admin').attr('disabled', true); 
                    

                }
                else if (user.role_id == 2)
                {
                    $('#user_student_role').val('Student').attr('disabled', true); 

                }
                else
                {
                    $('#user_student_role').val('Parent').attr('disabled', true); 

                }
                
                $('#user_student_id').attr('value', student_id).attr('disabled', true).html(`<option> ${student_id} </option>`);
                $('#user_parent_id').attr('value', pareint_id).attr('disabled', true).html(`<option> ${pareint_id} </option>`);
                $('#btn_update_user').attr('data-id', user.id);
                
            },
            error: err => {
                console.log(err);
            }
        });

}

// update
function updateUser()
{
    let password = $('#user_password');
    let user_id = $('#btn_update_user').attr('data-id');
    if(isNotEmpty(password))
    {
        $.ajax({
            method: 'PUT',
            url: route('user.update', user_id),
            dataType:'json',
            data:{password:password.val()},
            success: response => {
                (response == 'success') ? toastSuccess('Password Updated') : toastDanger() ;
            },
            error: err => {
                console.log(err);
                toastDanger();
            }
        });
    }
    
}

// delete
function deleteUser(id)
{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: 'DELETE',
                url: route('user.destroy', id),
                success: response => {
                    // console.log(response);
                    if(response == 'success') {
                        toastSuccess("User Deleted");
                        $('.user_DT').DataTable().draw();
                    } 
        
                },
                error: err => {
                    console.log(err);
                    toastDanger();
                }
            })
        }
      })
}

//* -------------> END USER()


/**
 * VALIDATE INPUT FIELD
 * @param {*} input 
 * @returns 
 */
function isNotEmpty(input) {
    if(input.val() == "") {
        toastWarning();
        input.addClass('is-invalid');
        return false;
    }
    else {
        input.removeClass('is-invalid');
        return true;    
    }
}
/** END Validation FUNCTION */


function toastSuccess(message)
{
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "showDuration": "400",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    Command: toastr["success"](`${message} Successfully`, "Success")

}

function toastDanger()
{

    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "400",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }
    Command: toastr["error"]("Sorry, there was a problem.", "Error")

}

function toastWarning()
{

    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "400",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }
    Command: toastr["warning"]("Please fill up all required fields ", "Warning")

}

function res(res)
{
  return  console.log(res);

}

// get average
function get_average(array)
{
   let ave = array.reduce((accumulator, currentValue) => accumulator + currentValue) / array.length;
//    return parseFloat(ave.toFixed(2));

   return parseFloat(roundoff(ave));
}

function img_catch(img, directory, width='75')
{
    if(img == null || img == "")
    {
        return `<img class='rounded-circle' src='/images/noimg.jpg' width='${width}'> `;
    }
    else
    {
        return `<img class='rounded-cirle' src='/${directory}' width='${width}'>`;
    }
}

function format_date(date)
{
    let formatted_date = new Date(date);
    
    return formatted_date.toLocaleDateString();
}

function roundoff(data)
{
    let number =  Math.round((data + Number.EPSILON) * 100) / 100;

    return number;
}

// row select for multiple delete
function row_select(val)
{
    let element = val;

    $(element).on('dblclick', 'tr', function () {

        let id = $(this).children(":first").toggleClass("sorting_1");
    
        let selected_id = id.text(); // selected row id
    
        let index = $.inArray(selected_id, selected);
    
    
        if ( index === -1 ) {
            selected.push( selected_id );
            
        } else {
            selected.splice( index, 1 );
        }
    
         $(this).toggleClass('selected');
    } );
}


//delete
function crud_delete(element,route_name,msg,dt)
{
    $(document).on('click', element , function() {
        let id = [$(this).attr('data-id')];
        
        res(id);
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method:'DELETE',
                        url:route(route_name, id),
                        data:{id: selected == "" ?  id  : selected // check if the selected[] is null  get the single  row id
                        },
                        success: response => {
                            toastSuccess(msg)
                            $(dt).DataTable().draw();
                        },
                        error: err => {
                            toastDanger();
                            console.log(err);
                        }
        
                    })
                }
            })
    })
}

// crud index / read / select all
function crud_index(dt,route_name,data, column) {
    
    $(dt).DataTable({
        processing: false,
        serverSide: true,
        retrieve: true,
        autoWidth: false,
        ajax: route(route_name),
        columns:data,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                      header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+ data[column];
                      }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll()
            }
        },
        "rowCallback": function( row, data ) {
            if ( $.inArray(data.id, selected) !== -1 ) {
                $(row).addClass('selected');
            }
        },
        
    });
}


//$2y$10$UPNEWO.3925PqB8KN1tl..IFHJSKBINMWxKZNBWB9hBMfNlayuue6

 // {data: 'created_at', render(data) {
            //     const date =  new Date(data);
            //     return date.toLocaleString();
            // }},
            // {data: 'updated_at', render(data) {
            //     const date =  new Date(data);
            //     return date.toLocaleString();
            // }},
             // return date.toDateString();
               //return date.toLocaleTimeString();
               //return date.toLocaleString();
