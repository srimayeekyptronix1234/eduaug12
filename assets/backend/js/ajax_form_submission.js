
//Form Submition
function ajaxSubmit(e, form, callBackFunction,baseUrl =null,type =null) {

    if(form.valid()) {
        e.preventDefault();
        var action = form.attr('action');
        var form2 = e.target;
        var data = new FormData(form2);

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

                    if (response.type == 'complaintsactions') {
                        window.location.href = (type === 'admin') ? baseUrl + 'admin/complaintsactions' :  baseUrl + 'teacher/complaintsactions';
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
