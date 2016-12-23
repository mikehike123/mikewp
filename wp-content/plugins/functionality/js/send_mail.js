$=jQuery;
$(document).ready(function() {
    $.getScript('https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.8/validator.min.js', function()
    {
        $('#contact-form').validator({
                custom: {
                    equals: function($el) {
                        var matchValue = $el.data("equals") // foo
                            //empty string test
                        if (!$el.val())
                            return;
                        if ($el.val() != matchValue) {
                            return "Hey, that's not valid! It's gotta be " + matchValue
                        }
                    }
                }
        });
    });
});


//handle contact form;
$("#EmailSent").hide();
$('#contact-form').submit(function(event) {

    event.preventDefault();

    // send email to client before moving onto worldpay payment form
    var data = {
        action: 'mail_before_submit',
        email_address: $('#email').val(), // change this to the email field on your form
        message: $('#Message').val(),
        Name: $('#Name').val(),
        _ajax_nonce: $('#my_email_ajax_nonce').data('nonce'),
    };
    //window.location.origin 
    $.post( "/wp-admin/admin-ajax.php", data, function(response) {
        $("#EmailSent").show();
        //$('#contact-form').trigger('reset');
        //$(form).data('formValidation').resetForm(); //for later version
        //$("#contact-form").bootstrapValidator('resetForm', true);
        
        $('#contact-form')[0].reset()
        $('#contact-form').validator('destroy').validator()

        console.log('Got this from the server: ' + response);
    });

    });
$('.form-control').focus(function(event) {
    $("#EmailSent").hide();
});