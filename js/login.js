/*
THIS SCRIPT IS FOR DISABLING CERTAIN FIELDS
$('#').attr("readonly", "readonly");
*/
$(document).ready(function()
{
    $('#login').on('click', function()
    {
        var EmailFilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var PassFilter=  /^[A-Za-z]\w{7,14}$/;
        var email = $('#email');
        var password = $('#password');

        if (email.val() == "" && password.val() == "")
        {
            swal("Oops!", "Email and Password Fields cannot be empty.", "error");
            return false;
        }
        else if(!EmailFilter.test(email.value))
        {
            swal("Oops!", "Please provide a valid email address.", "error");
            return false;
        }
        else if(!PassFilter.test(password.value))
        {
            swal("Oops!", "Password you entered was invalid.", "error");
            return false;
        }
        else
        {
            return true;
        }
    });
});


