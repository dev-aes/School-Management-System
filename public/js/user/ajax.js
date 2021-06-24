
$(() => {
      // Cross Site Protection
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });






})



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
                                                        footer: `<a class="btn btn-info" href="javascript:void(0)" onclick='parent_create_down_payment_to_student(${payment_ledgers[1].id})'> + Down payment <i class="fas fa-chevron-left"></i></a> `
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
                                                        <th>Status</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>`;
                                                
                                    payment_history.forEach(history => {
                                        let date = new Date(history.updated_at);
                                        output += `<tr>
                                                        <td> ${history.first_name} ${history.last_name} </td>
                                                        <td> ${history.amount.toLocaleString()} </td>
                                                        <td> ${history.official_receipt} </td>
                                                        <td> ${history.receipt_type} </td>
                                                        <td> ${history.remark} </td>
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

// -------> ENd Parent()



// Student DashBoard


    $('#student_avatar').hide();

    $('#upload_profile').on('click', ()=> {
        $('#student_avatar').click();
    });

    function student_change_profile(id) {
        let form = $('#student_form')[0];
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
                    url: route('student.student_update', id),
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