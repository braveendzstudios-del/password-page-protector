jQuery(document).ready(function ($) {
   
    $('#ppp-password-submit').on('click', function (e) {
        e.preventDefault();
   
        var password = $('#password').val();
        $.ajax({
            url: ppp_frontend_object.ajax_url,
            type: 'POST',
            data: {
                action: 'ppp_check_password',
                password: password,
                nonce: ppp_frontend_object.nonce
            },
            success: function (response) {
                if (response.success) {
                    window.location.href = response.data.redirect_url;
                } else {
                    alert(response.data.message);
                }
            },
            error: function () {
                alert("An error occurred. Please try again.");
            }
        });
    });

    $('#ppp-password-toggle').on('click', function () {
        var passwordField = $('#password');
        var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
        passwordField.attr('type', type);
        $(this).find('.dashicons').toggleClass('dashicons-visibility dashicons-hidden');

        console.log('Password visibility toggled');
    });
     
});      