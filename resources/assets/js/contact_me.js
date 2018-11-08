$(function() {
    if (!String.prototype.includes) {
        Object.defineProperty(String.prototype, 'includes', {
            value: function(search, start) {
                if (typeof start !== 'number') {
                    start = 0;
                }

                if (start + search.length > this.length) {
                    return false;
                } else {
                    return this.indexOf(search, start) !== -1;
                }
            }
        });
    }

    var contactForm = $('#contactForm');
    var button = $('#contact-submit-button');

    $('#contactForm > input,textarea').jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault();

            var name = $('input#name').val();
            var email = $('input#email').val();
            var phone = $('input#phone').val();
            var message = $('textarea#message').val();
            if (
                (message.toLowerCase().includes('cancel') ||
                    message.toLowerCase().includes('reschedule')) &&
                window.confirm(
                    'We suggest sending an email directly to your tutor or contacting via phone when you want to cancel or reschedule a session.  Do you want to send this message anyway?'
                )
            ) {
                button.prop('disabled', true).text('Sending message...');
                var firstName = name; // For Success/Failure Message
                // Check for white space in name for Success/Fail message
                if (firstName.indexOf(' ') >= 0) {
                    firstName = name
                        .split(' ')
                        .slice(0, -1)
                        .join(' ');
                }
                $.ajax({
                    url: contactForm.attr('action'),
                    type: 'POST',
                    data: {
                        name: name,
                        phone: phone,
                        email: email,
                        message: message,
                        _token: $('input[name="_token"]').val(),
                        'g-recaptcha-response': $('[name="g-recaptcha-response"]').val()
                    },
                    cache: false,
                    success: function() {
                        // Success message
                        button.hide();

                        $('#success').html("<div class='alert alert-success'>");
                        $('#success > .alert-success')
                            .html(
                                "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                            )
                            .append('</button>');
                        $('#success > .alert-success').append(
                            '<strong>Your message has been sent. </strong>'
                        );
                        $('#success > .alert-success').append('</div>');

                        //clear all fields
                        $('#contactForm').trigger('reset');
                    },
                    error: function(XMLHttpRequestObject, errorMessage, exceptionObject) {
                        $('#success').html("<div class='alert alert-danger'>");
                        $('#success > .alert-danger')
                            .html(
                                "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                            )
                            .append('</button>');
                        $('#success > .alert-danger').append(
                            '<strong>Sorry ' +
                                firstName +
                                ', it seems that my mail server is not responding. Please try again later!'
                        );
                        $('#success > .alert-danger').append('</div>');
                        //clear all fields
                        $('#contactForm').trigger('reset');
                    }
                });
            }
        },
        filter: function() {
            return $(this).is(':visible');
        }
    });

    $('a[data-toggle="tab"]').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
});

/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});
