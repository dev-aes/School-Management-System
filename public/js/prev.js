function previewImg(event) {
  
    let preview_payment_screenshot = document.querySelector('#preview_payment_screenshot');
    let preview_down_payment_screenshot = document.querySelector('#preview_down_payment_screenshot');

    if(event.target.files.length > 0) 
    {

        let src = URL.createObjectURL(event.target.files[0]);

        if(preview_down_payment_screenshot)
        {
            preview_down_payment_screenshot.src = src;
            preview_down_payment_screenshot.style.display = "block";
            preview_down_payment_screenshot.style.border = "1px solid rgba(0,0,0,.125)";

        }


        if(preview_payment_screenshot)
        {
            preview_payment_screenshot.src = src;
            preview_payment_screenshot.style.display = "block";
            preview_payment_screenshot.style.border = "1px solid rgba(0,0,0,.125)"; 

        }
    }
}