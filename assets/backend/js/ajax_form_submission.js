document.addEventListener('DOMContentLoaded', function() {
        CKEDITOR.replace('assignment_content');
        CKEDITOR.replace('assignment_answer');
    });

//Form Submition
function ajaxSubmit(e, form, callBackFunction) {

    if(form.valid()) {
        e.preventDefault();
        CKEDITOR.replace('assignment_content');
        CKEDITOR.replace('assignment_answer');
        var action = form.attr('action');
        var form2 = e.target;
        var data = new FormData(form2);
        // Check if CKEditor instance exists before accessing it
        if (CKEDITOR.instances.assignment_content) {
            var assignmentContent = CKEDITOR.instances.assignment_content.getData();
            data.append('assignment_content', assignmentContent);
        } else if(CKEDITOR.instances.assignment_answer) {
            var assignmentAnswer = CKEDITOR.instances.assignment_answer.getData();
            data.append('assignment_answer', assignmentAnswer);
        } else {
            console.error('CKEditor instance does not exist.');
            return; // Optionally handle this case
        }

        $.ajax({
            type: "POST",
            url: action,
            processData: false,
            contentType: false,
            dataType: 'json',
            data: data,
            success: function(response)
            {
                console.log(response);
                if (response.status) {
                    success_notify(response.notification);
                    if(form.attr('class') === 'ajaxDeleteForm'){
                        $('#alert-modal').modal('toggle')
                    }else{
                        $('#right-modal').modal('hide');
                    }
                    callBackFunction();
                }else{
                    error_notify(response.notification);
                }
            }
        });
    }else {
        error_required_field();
    }
}
