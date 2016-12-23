$=jQuery;
$.getScript('https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js', function()
{ 
    
    $('#contact-form').bootstrapValidator({
	//        live: 'disabled',
			message: 'This value is not valid',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				Name: {
					validators: {
						notEmpty: {
							message: 'The Name is required and cannot be empty'
						}
					}
				},
				email: {
					validators: {
						notEmpty: {
							message: 'The email address is required'
						},
						emailAddress: {
							message: 'The email address is not valid'
						}
					}
				},
				Message: {
					validators: {
						notEmpty: {
							message: 'The Message is required and cannot be empty'
						}
					}
				}
			}
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
        _ajax_nonce: $('#my_email_ajax_nonce').data('nonce'),
    };
    //window.location.origin +
    $.post( "/wp-admin/admin-ajax.php", data, function(response) {
        $("#EmailSent").show();
        //$('#contact-form').trigger('reset');
        $("#contact-form").bootstrapValidator('resetForm', true);
        console.log('Got this from the server: ' + response);
    });

    });
$('.form-control').focus(function(event) {
    $("#EmailSent").hide();
});