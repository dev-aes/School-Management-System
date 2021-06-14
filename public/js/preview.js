function previewImg(event) {
    let preview_school_img = document.querySelector('#preview_school_img');
    let preview_teacher_img = document.querySelector('#preview_teacher_img');
    let preview_payment_screenshot = document.querySelector('#preview_payment_screenshot');
    let preview_down_payment_screenshot = document.querySelector('#preview_down_payment_screenshot');

    if(event.target.files.length > 0) 
    {

        let src = URL.createObjectURL(event.target.files[0]);


         if(preview_school_img) 
        {
            preview_school_img.src = src;
            preview_school_img.style.display = "block";
            preview_school_img.style.border = "1px solid rgba(0,0,0,.125)";

        }

         if (preview_teacher_img) 
        {
            preview_teacher_img.src = src;
            preview_teacher_img.style.display = "block";
            preview_teacher_img.style.border = "1px solid rgba(0,0,0,.125)";


        }

         if (preview_student_img) 
        {
            preview_student_img.src = src;
            preview_student_img.style.display = "block";
            preview_student_img.style.border = "1px solid rgba(0,0,0,.125)";


        }


    }
   

}


