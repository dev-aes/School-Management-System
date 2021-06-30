
$(() => {
      // Cross Site Protection
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    if(window.location.href == route('teacher.dashboard'))
    {
        displayTeacherStudents()
        // let teacher_student_column_data = [
        //                                     {data:'student_avatar', render(data) {
        //                                         return `<a href='javascript:void(0)' data-bs-toggle="popover" title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?"><img class='rounded-circle img-fluid' src='/storage/uploads/student/${data}' alt='student_avatar' width='60'></a>`;
        //                                     }},
        //                                     {data:'first_name'},
        //                                     {data:'last_name'},
        //                                     {data:'gender'},
        //                                     {data:'section.name'},
        //                                     {data: 'actions', orderable: false, searchable: false}
        //                                   ];

        // crud_index('.teacher_student_DT', 'teacher.dashboard', teacher_student_column_data);

    }




})

let average_container = []; // student's grade average




// Parent DASHBOARD

    function parent_show_payment_ledger(id) {

        $('#show_parent_payment_ledger_modal').modal('show');

        $.ajax({
            url: route('parent.parent_show_payment_ledger', id),
            dataType:'json',
            success: payment_ledgers => {
                // console.log(payment_ledgers.length);
                let pl = ``;

                if(payment_ledgers == 'error')
                {
                    $('.monthly_payment').html(`<h1 class='text-white'> • No records found </h1>`).removeClass('bg-primary').addClass('bg-secondary');
                    $('#next_monthly_payment').text(``); 
                    $('#remaining_balance').html(``);
                    $('#parent_payment_ledger').html(``);
                    return toastr.error("No records found");
                }
                // display only if there is a total balance
            
                if(payment_ledgers.length === 4)
                {
                    payment_ledgers[0].forEach(payment_ledger => {

                        const month = new Date(payment_ledger.month); // date format

                        const payment_date = payment_ledger.payment_date != null ? new Date(payment_ledger.payment_date) : "";

                    
        
                        const payment_official_receipt = (payment_ledger.payment_official_receipt != undefined ? payment_ledger.payment_official_receipt : "");
                        const payment_transaction_no = (payment_ledger.payment_transaction_no != undefined ? payment_ledger.payment_transaction_no : "");
                        const payment_amount = (payment_ledger.payment_amount != undefined ? payment_ledger.payment_amount : "") ;
                        const payment_remark = (payment_ledger.payment_remark != undefined ? payment_ledger.payment_remark : "");
                        const payment_change = (payment_ledger.payment_change != undefined ? payment_ledger.payment_change : "");
        
                        pl += `<tr>
                                <td>${month.toLocaleString('default', { month: 'long' })}</td>
                                <td>₱ ${payment_ledger.amount}</td>
                                <td>${payment_official_receipt}</td>
                                <td>₱ ${payment_amount}</td>
                                <td>${payment_remark}</td>
                                <td>₱ ${payment_ledger.balance}</td>
                                <td>₱ ${payment_change}</td>
                                <td>${payment_date.toLocaleString()}</td>`;

                                if(payment_ledger.status == 'paid')
                                {

                        pl += `   <td class='text-uppercase'> <span class='badge bg-success'>${payment_ledger.status} </span></td>
                                <td> <a href='javascript:void(0)' onclick='parent_showPayment(${payment_ledger.payment_id})'> <i class="fas fa-eye text-muted"></i> </a> </td>
                                `;

                                }

                                else
                                {

                    pl +=     `<td class='text-uppercase'> <span class='badge bg-warning'>${payment_ledger.status} </span></td>
                                <td> </td>
                                `;

                                }
                    pl +=  `</tr>`;

                    })
                    $('#parent_payment_ledger').html(pl);
        
                    
                    let next_monthly_payment = payment_ledgers[1].balance ; // latest monthly payment
                    let total_balance = payment_ledgers[2].total_balance; // get the total balance

                    $('.monthly_payment').html(`
                                                <h1 class="text-white">
                                                •  Next Monthly Payment - ₱ ${next_monthly_payment.toLocaleString()} </span>
                                                </h1>
                                                <h2 class="text-white">
                                                    •  Remaining Balance - ₱ ${total_balance.toLocaleString()} </span>
                                                </h2>
                                            `)
                                            .removeClass('bg-secondary')
                                            .addClass('bg-primary');

                }
                else
                {
                    // if the student is already enroled but dont have a downpayment then display this info
                    $('.monthly_payment').html(`
                                                <h1 class='text-white'>
                                                • Total Balance - ₱ ${payment_ledgers[0]}
                                                </h1>

                                                <h1 class='text-white'> 
                                                • Status - No Downpayment  <i class="fas fa-exclamation-triangle"></i>
                                                </h1>

                                                `)
                                                .removeClass('bg-primary')
                                                .addClass('bg-secondary');

                                                setTimeout(() => {
                                                    Swal.fire({
                                                        icon: 'warning',
                                                        title: 'Oops...',
                                                        text: `Student ${payment_ledgers[1].first_name} ${payment_ledgers[1].last_name} don't have a down payment. You can add down payment below`,
                                                        showConfirmButton:false,
                                                        footer: `<a class="btn btn-info" href="javascript:void(0)" onclick='parent_create_down_payment_to_student(${payment_ledgers[1].id})'> Add Down payment </a> `
                                                    })
                                                },1500)
                                                
                }
                        
                
            },
            error: err => {
                console.log(err);
            }
        })
    }


    function parent_showPayment(id) {

        $('#show_parent_payment_ledger_modal').modal('hide');
        $.ajax({
            url: route('parent.parent_payment_show', id),
            success: payment => {
               // console.log(payment);
                const date = new Date(payment[0].created_at);
                //const d = date.toDateString();
                const d = date.toLocaleDateString();


                // display discount
                let total_discount = Math.round(payment[1].discount * 100);
                $('#payment_sf_total_discount').text(`${total_discount}%`);

                // display the calculated student fee with a discount (DISCOUNTED AMOUNT)

                $('#payment_sf_total_discounted_amount').text(`₱ ${payment[1].total_fee.toLocaleString()}`);


                let discounted_total = `₱ ${payment[1].total_fee.toLocaleString()}`; // THE DISCOUNTED TOTAL ( TOTAL AMOUNT - DISCOUNTED PRICE);
        
                //display payment info
                $('#show_payment_modal').modal('show');
                $('#payment_date').text(`${d}`);
                $('#payment_official_receipt').text(`${payment[0].official_receipt}`);
                $('#payment_payment_amount').text(`₱ ${payment[0].amount.toLocaleString()}`);
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
                    fee_amount += `<h5 >₱ ${subfee.amount.toLocaleString()} </h5>`
                });
            

                $('#payment_sf_type').html(fee_type);
                $('#payment_sf_amount').html(fee_amount);
                $('#payment_sf_total').text(`₱ ${payment[4].subtotal.toLocaleString()}`)

                // Payment details

                $('#payment_sf_date').html(`<h5> ${d} </h5>`)
                $('#payment_sf_payment').html(`<h5>₱ ${payment[0].amount.toLocaleString()}</h5>`)
                $('#payment_sf_payment_total').html(`<h5>₱ ${payment[0].amount.toLocaleString()} </h5>`)

                $('#payment_sf_total_payable').text(`₱ ${payment[3][0].amount_payable.toLocaleString()}`);
                $('#payment_sf_total_paid').text(`₱ ${payment[3].paid.toLocaleString()}`);
                $('#payment_sf_balance').text(`₱ ${payment[3].total_balance.toLocaleString()}`);


            },
            error: err => {
                console.log(err);
            }
        })
    }

    function parent_create_payment_to_student(id)
    {
        $('#parent_add_student_payment_modal').modal('show');
        $('#parent_add_student_payment_modal_label').html(`<h3 class='text-primary text-white'> Add Payment </h3>`);
        $('#parent_add_student_payment_form')[0].reset();
        $('#parent_add_student_payment_modal_header').removeClass('bg-success').addClass('bg-primary');


        $.ajax({
            url: route('parent.parent_show_payment_ledger', id),
            dataType:'json',
            success: student => {
                // console.log(student);
                $('#student_name').val(`${student[3].first_name} ${student[3].last_name}`)
                $('#student_id').attr('value', `${student[3].id}`);
                $('#monthly_payment').attr('value', `${student[1].balance}`);
                $('#total_balance').attr('value', `${student[2].total_balance}`);

            },
            error: err => {
                console.log(err);
            }
        })
    }


    function parent_store_payment_to_student() {
        let student_id = $('#student_id');
        let monthly_payment = $('#monthly_payment');
        let total_balance = $('#total_balance');
        let payment_or = $('#payment_or');
        let payment_amount = $('#payment_amount');
        let receipt_type = $('#payment_receipt_type');

        let form = $('#parent_add_student_payment_form')[0];
        let form_data = new FormData(form);

        if(isNotEmpty(student_id) && isNotEmpty(monthly_payment) && isNotEmpty(total_balance) && isNotEmpty(payment_or) && isNotEmpty(payment_amount) && isNotEmpty(receipt_type))
        {
            $.ajax({
                method: 'POST',
                url: route('parent.parent_store_payment_to_student'),
                processData: false,
                contentType: false,
                dataType:'json',
                data: form_data,
                success: response => {
                    console.log(response);
                    if(response == 'success')
                    {
                        toastSuccess('Payment Sent');
                        form.reset();
                    }
                },
                error: err => {
                    console.log(err);
                }
            })
        }
    }   

    function parent_create_down_payment_to_student(id)
    {
        $('#show_parent_payment_ledger_modal').modal('hide');
        $('#parent_add_student_down_payment_modal').modal('show');
        $('#parent_add_student_down_payment_modal_label').html(`<h3 class='text-primary text-white'> Add Down Payment </h3>`);
        $('#parent_add_student_down_payment_form');
        $('#parent_add_student_down_payment_modal_header').removeClass('bg-success').addClass('bg-primary');


        $.ajax({
            url: route('parent.parent_show_payment_ledger', id),
            dataType:'json',
            success: student => {
                console.log(student);
                $('#dp_student_id').attr('value', `${student[1].id}`);
                $('#dp_student_name').val(`${student[1].first_name} ${student[1].last_name}`)
                $('#dp_total_balance').attr('value', `${student[0]}`);

            },
            error: err => {
                console.log(err);
            }
        })
    }

    function parent_store_down_payment_to_student()
    {
        let student_id = $('#dp_student_id');
        let payment_or = $('#dp_payment_or');
        let payment_amount = $('#dp_payment_amount');
        let receipt_type = $('#dp_payment_receipt_type');


        let form = $('#parent_add_student_down_payment_form')[0];
        let form_data = new FormData(form);

        if(isNotEmpty(student_id) && isNotEmpty(payment_or) && isNotEmpty(payment_amount) && isNotEmpty(receipt_type))
        {
            $.ajax({
                method: 'POST',
                url: route('parent.parent_store_down_payment_to_student'),
                processData: false,
                contentType: false,
                dataType:'json',
                data: form_data,
                success: response => {
                    console.log(response);
                    if(response == 'success')
                    {
                        toastSuccess('Payment Sent');
                        form.reset();
                    }
                },
                error: err => {
                    console.log(err);
                }
            })
        }
    }


    function parent_show_payment_history(student_id , parent_id) {

        $.ajax({
            url: route('parent.parent_show_payment_history', [parent_id, student_id]),
            dataType:'json',
            success: payment_history => {
                // console.log(payment_history);

                let output = `<div class="col-md-12">
                                <div class="card w-100">
                                    <div class="card-header"><h4 class='text-muted'> Payment History </h4> </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr class='bg-light'>
                                                        <th>Student Name</th>
                                                        <th>Amount Paid</th>
                                                        <th>Official Receipt</th>
                                                        <th>MOP</th>
                                                        <th>Remark</th>
                                                        <th>Comment</th>
                                                        <th>Status</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>`;
                                                
                                    payment_history.forEach(history => {
                                        let date = new Date(history.updated_at);
                                        let comment = (history.comment !== null) ? history.comment : "";  // check if the comment is null
                                        output += `<tr>
                                                        <td> ${history.first_name} ${history.last_name} </td>
                                                        <td> ${history.amount.toLocaleString()} </td>
                                                        <td> ${history.official_receipt} </td>
                                                        <td> ${history.receipt_type} </td>
                                                        <td> ${history.remark} </td>
                                                        <td> ${comment} </td>
                                                        <td> ${history.status} </td>
                                                        <td> ${date.toLocaleDateString()} </td>
                                                    </tr>`;
                                    })
                                                
                    output+=                    `</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>`

                    $('#parent_show_payment_history').html(output);
            },
            error: err => {
                console.log(err);
            }
        });
    }

    $('#show_grades').on('click', function() {
        $('.stud_name').html($(this).attr('data-name'));
        $('.grades').toggle();
    });

    
    $('#parent_profile').on('click', ()=> {
        $('.user_parent_modal').modal('show');
        $('#user_parent_modal_header').addClass('bg-info');
        $('#user_parent_modal_label').html(`<h4 class='text-white'> Account <i class="fas fa-user-cog"></i> </h4>`);

    });

// -------> ENd Parent()



// Student DashBoard


    $('#student_avatar').hide();

    $('#upload_profile').on('click', ()=> {
        $('#student_avatar').click();
    });

    function user_change_profile(id, user_form_data, route_name) {
        let form = $(user_form_data)[0];
        let form_data = new FormData(form);
        form_data.append('_method', 'PATCH');

        Swal.fire({
            title: 'Do you want to upload profile?',
            text: "Please choose your best profile picture 😃!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#4085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, upload it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'POST',
                    url: route(route_name, id),
                    dataType: 'json',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: response => {
                        console.log(response);
                        if(response == 'success')
                        {
                        location.reload();
                        toastSuccess('Profile Uploaded');

                        return;
                        }
                    },
                    error: err => {
                        console.log(err);
                        return toastDanger();
                    }
                });
            }
        })
    }


// End Student Dashboard



// Teacher Dashboard

function displayTeacherStudents()
{
    $.ajax({
        url: route('teacher.dashboard'),
        dataType:'json',
        success: sections => {
            //res(sections);

            let output = ``;

                // Teacher Section
                output += `
                                <div class="accordion" id="accordionExample">`;

                                sections.forEach(section => {
                output += `
                                    <div class="accordion-item" id='section-${section.id}'>
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sectioncollapse-${section.id}" aria-expanded="true" aria-controls="collapseOne" onclick='t_display_students_by_section_id(${section.id})'>
                                            Section: <span class='ms-2 text-primary fw-bold text-uppercase'> ${section.name} </section>
                                            </button>
                                        </h2>
                                        <div id="sectioncollapse-${section.id}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body" id='t_display_students-${section.id}'>
                                            
                                            </div>
                                        </div>
                                    </div>`;

                                }) // foreach closer


            output += `    </div>    
                   `; // closer tab

                    $('#teacher_display_sections_with_students').html(output);
        },
        error: err => {
            res(err);
        }
    })
}

function t_display_students_by_section_id(section)
{
    $.ajax({
        url: route('teacher.t_display_students', section),
        dataType:'json',
        success: section_student => {
            res(section_student);
           
            let output = `<table class='table table-hover table-bordered' id='user_teacher_display_students'>
                            <thead>
                                <tr> 
                                    <th> Student Name </th>
                                    <th> Gender </th>
                                    <th>  </th>
                                </tr>
                            </thead>
                            <tbody>
                            `;
                    section_student.forEach(student => {

               output +=        `<tr>
                                    <td> ${student.first_name} ${student.last_name} </td>
                                    <td> ${student.gender} </td>
                                    <td> <a class='btn btn-sm btn-info' href='javascript:void(0)' onclick='t_assign_grade(${student.section_id}, ${student.student_id})'> Add Grade </a> </td>
                                </tr>`
                    }) // loop closure

                output += `</tbody>
                            </table>`; // table closure

                    $('#t_display_students-'+ section).html(output); // dynamic id + elemt id
                    $('#user_teacher_display_students').DataTable();
        },
        error: err => {
            res(err);
        }
    })
}

// create



function t_assign_grade(section , student)
{
    let i = 0;
    $('#t_assign_grade_to_students_subject').modal('show');
    $('#t_assign_grade_to_students_subject_header').addClass('bg-primary');
    $.ajax({
        url: route('teacher.assign_grade', [section,student]),
        dataType:'json',
        success: section_student => {
           
            document.cookie = ""+section_student[3];

            $('#t_grade_level_id').attr('value',section_student[0].grade_level_id); // add grade level id 
            $('#t_grade_level_name').attr('placeholder', section_student[0].grade_level.name).attr('readonly', true); // display grade level name

            $('#t_section_id').attr('value',section_student[0].id); // add section id
            $('#t_section_name').attr('placeholder', section_student[0].name).attr('readonly', true); // display section name

            // display student by student id
            let student_output = `
                            <table class='table table-sm' id='t_assign_grade_to_subject_students_DT'>
                                <caption> List of Students </caption>
                                    <thead style='background:none'>
                                        <tr>
                                            <th>  </th>
                                            <th> Name </th>
                                            <th> Gender </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                `;

                    student_output +=        `  <tr>
                                            <td><img class='rounded-circle img-fluid' src='/storage/uploads/student/${section_student[1].student_avatar}' alt='student_avatar' width='30'> </td>
                                            <td> ${section_student[1].first_name}  ${section_student[1].last_name} </td>
                                            <td>  ${section_student[1].gender} </td>

                                        </tr>
                                    `;                 

                $('#t_assign_grade_to_student_subject_display_students').html(student_output); // append output to the user's teacher modal

                $('#t_assign_grade_to_subject_students_DT').DataTable({
                    pageLength : 3,
                    lengthMenu: [[3, 10, 20, -1], [3, 10, 20]]
                }); // convert to dt

                

                

                let output = `
                                <center><img class='rounded-circle' src='/storage/uploads/student/${section_student[1].student_avatar}' alt='student_avatar' width='50'></center>
                                <h5 class='text-muted fw-bold text-center mt-3' id='s_student' data-id='${section_student[1].id}'> Student : ${section_student[1].first_name} ${section_student[1].last_name} </h5>

                                <table class="table table-bordered mt-2 " border="1" id='table_assign_grade_to_subject_student_grade_table'>
                                <thead style="background: none">
                                    <tr class="text-center fw-bold">
                                        <td rowspan="2" style="width:25%">Learning Areas</td>
                                        <td colspan="4" style="width:25%">Quarter</td>
                                        <td rowspan="2" style="width:25%">Final Grade</td>
                                        <td rowspan="2" style="width:25%">Remark</td>`;

                                        if(section_student[0].adviser_id == section_student[3])
                                        
                                        {
                    output +=          `<td rowspan="2" style="width:25%">Action</td>`;
                                        }
                    output +=      `</tr>
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                    </tr>
                                </thead>
                                <tbody>`;

                             

                                // display student's subjects[]
                                section_student[2].forEach(subject => {

                                    let average = '';
                                    let remark = '';
           
                                    if(subject.quarter_1 !== null && subject.quarter_2 !== null &&subject.quarter_3 !== null && subject.quarter_4 !== null)
                                    {
                                       remark = (average > 74) ? 'Passed': 'Failed';
                                       average = get_average([subject.quarter_1 + subject.quarter_2 + subject.quarter_3 + subject.quarter_4])/4;
           
                                    }
                                    
                                    
                                    let result = subject.is_approve.split(',');

                                    let q1_color = (result[0] == 1) ? 'bg-warning' : ''; 
                                    let q2_color = (result[1] == 2) ? 'bg-warning' : '';
                                    let q3_color = (result[2] == 3) ? 'bg-warning' : ''; 
                                    let q4_color = (result[3] == 4) ? 'bg-warning' : '';
                                    let q1 = (subject.quarter_1 == null) ? '' : subject.quarter_1 ;
                                    let q2 = (subject.quarter_2 == null) ? '' : subject.quarter_2 ;
                                    let q3 = (subject.quarter_3 == null) ? '' : subject.quarter_3 ;
                                    let q4 = (subject.quarter_4 == null) ? '' : subject.quarter_4 ;

                                    average_container.push(average); // insert all average per row on average container[]


                    output += `<tr class='text-center s_subject' data-grades_id='${subject.id}' data-subject_teacher_id=${subject.subject_teacher_id}  
                     data-subject='${subject.subject_id}'>
                                        <th >${subject.name}</th>
                                        <td class='quarter ${q1_color}' data-quarter='1' style='width:7%'>${q1}</td>
                                        <td class='quarter ${q2_color}' data-quarter='2' style='width:7%'>${q2}</td>
                                        <td class='quarter ${q3_color}' data-quarter='3' style='width:7%'>${q3}</td>
                                        <td class='quarter ${q4_color}' data-quarter='4' style='width:7%'>${q4}</td>
                                        <td class='average'>${average}</td>
                                        <td class='remark'>${remark}</td>`;

                                            if(section_student[0].adviser_id == section_student[3])//Check if the login teacher is the adviser
                                            {
                                                
                                               
                                              
                   output +=            `<td>
                                            <a class='btn  btn-primary' href='javascript:void(0)' onclick='adviser_approve_grade(${subject.id})'> <i class="fas fa-check"></i> </a>
                                        </td>
                                    </tr>
                            `;      
                                            }

                            })

                            
                    output += `
                                    <tr class="text-center fw-bold">
                                        <td></td>
                                        <td colspan="4">General Average</td>
                                        <td class='final_grade'>${get_average(average_container)}</td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                               
                                `;

             
                    output += `<div class="row mt-2" id="descriptors">
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
                            </div> `;   


                                // learner values

                                res(section_student[4])
                    if(section_student[0].adviser_id == section_student[3])//Check if the login teacher is the adviser
                    {
            

                        output += `  
                                   <div class='mt-2 row'>
                                        <h1 class="fw-bold text-uppercase text-center mb-5 mt-5"> report on learners observed values</h1>
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


                                                let index = 0;
                                                section_student[4].forEach(values_description => { // loop core values


                       output +=                     `<tr class='v_values' data-description_id='${values_description.description_id}' data-values_id='${values_description.values_id}' data-student_id ='${section_student[1].id}' data-adviser_id='${section_student[0].adviser_id}'>`;        
                       
                                                        if(index === values_description.values_id)
                                                        {
                       output +=                           `<td style='border-top:1px solid #fff !important'> </td>
                                                            <td>${values_description.description}</td>
                                                            <td class='values_quarter' data-quarter='1' style='width:7%'>${values_description.q1}</td>
                                                            <td class='values_quarter' data-quarter='2' style='width:7%'>${values_description.q2}</td>
                                                            <td class='values_quarter' data-quarter='3' style='width:7%'>${values_description.q3}</td>
                                                            <td class='values_quarter' data-quarter='4' style='width:7%'>${values_description.q4}</td>`;
                                                        }
                                                        else
                                                        {
                                                            
                       output +=                           `<td class='text-capitalize'>${values_description.title}</td>
                                                            <td>${values_description.description}</td>
                                                            <td class='values_quarter' data-quarter='1'style='width:7%'>${values_description.q1}</td>
                                                            <td class='values_quarter' data-quarter='2'style='width:7%'>${values_description.q2}</td>
                                                            <td class='values_quarter' data-quarter='3'style='width:7%'>${values_description.q3}</td>
                                                            <td class='values_quarter' data-quarter='4'style='width:7%'>${values_description.q4}</td>`;  
                                                        }
                       
                      output +=                       `</tr>
                                             `;

                                                        index = values_description.values_id;


                                            }); // closure
                                             

                   output +=        `
                                            </tbody>
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
                                    </div>`;

                    }
                        $('#t_assign_grade_to_student_display_encoding_of_grade').html(output);
   

        },
        error: err => {
            res(err);
        }
    })

}

// TODO INSERT GRADE

$(document).on('dblclick', '#table_assign_grade_to_subject_student_grade_table .s_subject td', function() {
    
    $('#g_grade').remove();
    $(this).append(
        $(`<input type='number' min='60' name='grade' id='g_grade' style='width:100%;display:block'>`)
        .attr('data-subject_id',$(this).parent().attr('data-subject'))
        .attr('data-quarter_id', $(this).attr('data-quarter'))
        .attr('data-grades_id',$(this).parent().attr('data-grades_id'))
        .attr('data-subject_teacher_id',$(this).parent().attr('data-subject_teacher_id'))
        
      ); // store subject id  && quarter_id  && grade_id to this input field
        
     
});

$(document).on('keypress', '#g_grade', function(e) {

    //let teacher_id = $('#teacher_assign_grade_to_student_subject_teacher_id').val();
    let section_id = $('#t_section_id').attr('value');
    let student_id = $('#s_student').attr('data-id');
    let subject_id = $('#g_grade').attr('data-subject_id');
    let quarter_id = $('#g_grade').attr('data-quarter_id');
    let grades_id = $('#g_grade').attr('data-grades_id');
    let subject_teacher_id = $('#g_grade').attr('data-subject_teacher_id');
    let grades = $('#g_grade').val();
   
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    
    if(e.keyCode == 13)
    {
        if(subject_teacher_id !== ca[0]){
            return toastr.error("You are not authorized to edit the grade. Please ask permission to the subject teacher.");  
        }
        console.log(
                            {
                                // teacher_id: teacher_id,
                                section_id: section_id,
                                quarter_id: quarter_id,
                                student_id: student_id,
                                subject_id: subject_id,
                                grades: grades,
                                grades_id: grades_id,
        
        
                            }
                          );

                  $.ajax({
                    method: 'POST',
                    url: route('teacher.store_assigned_grade_to_student'),
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

                        res(response);
                       let c = $(this).closest('tr').find('td.average');
                       let d = $(this).closest('tr').find('td.remark');
                       let a =  $(this).closest('tr').children('.quarter');
                       let x =  $(this).closest('td').text($(this).val());
                       let remark = '';
                       let average = '';
    
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

                //     console.log(
                //     {
                //       teacher_id: teacher_id, adviser ID
                //         section_id: section_id,
                //         quarter_id: quarter_id,
                //         student_id: student_id,
                //         subject_id: subject_id,
                //         grades: grades,
                //         grades_id: grades_id,


                //     }
                //   )
        
                    
    }
})

$(document).on('mouseleave', '#g_grade', function(e) {
    $(this).css('display','none');
})

// END

// TODO INSERT OBSERVED VALUES

$(document).on('dblclick', '#teacher_assign_observed_values_to_student .v_values .values_quarter', function() {
    $('#v_values').remove();
    $(this).append(
        $(`<input type='text' name='values' id='v_values' style='width:100%;display:block'>`)
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
    // let values_id = $('#v_values').attr('data-values_id');
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







// for grade approval ( ADMIN & ADVISER ONLY );
function adviser_approve_grade(grade_id)
{
    Swal.fire({
        title: 'Do you want to approve grade(s)?',
        text: "Please double check the grades before approval",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#4085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, approved it!'
    }).then((result) => {
        if (result.isConfirmed) {
           $.ajax({
                method: 'PUT',
                url: route('teacher.approve_grade',grade_id),
                success: response => {
                    
                    if(response == 'success')
                    {
                        toastSuccess("Grade(s) Approved");
                    }
                },
                error: err => {
                    res(err);
                }
           })
        }
    })
}

// End Teacher Dashboard



// GLOBAL FUNCTIONS

function get_average(array)
{
   let ave = array.reduce((accumulator, currentValue) => accumulator + currentValue) / array.length;
   return parseFloat(ave.toFixed(2));
}

function editProfile()
{
    $('.end_user_modal').modal('show');
    $('#end_user_modal_header').addClass('bg-info');
    $('#end_user_modal_label').html(`<h4 class='text-white'> Account <i class="fas fa-user-cog"></i> </h4>`);
}
function update_password(user, inputfield)
{
    if(isNotEmpty($(inputfield)))
    {
        Swal.fire({
            title: 'Do you want to update password?',
            text: "You won't be able to revert this !",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#4085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'PUT',
                    url: route('user.update', user),
                    dataType:'json',
                    data:{password:$(inputfield).val()},
                    success: response => {

                        $('.end_user_modal').modal('hide');
                        (response == 'success') 
                        ? toastSuccess('Password Updated') 
                        : toastDanger() ;
                    },
                    error: err => {
                        console.log(err);
                        toastDanger();
                    }
                });
            }
        })
    }
    
}



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


function getUnique(array){
    var uniqueArray = [];
    
    // Loop through array values
    for(var value of array){
        if(uniqueArray.indexOf(value) === -1){
            uniqueArray.push(value);
        }
    }
    return uniqueArray;
}



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

// crud index / read / select all
function crud_index(dt,route_name,data) {
    
    $(dt).DataTable({
        processing: false,
        serverSide: true,
        retrieve: true,
        autoWidth: false,
        ajax: route(route_name),
        columns:data
    });
}