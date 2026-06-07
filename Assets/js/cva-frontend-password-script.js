jQuery(document).ready(function ($) {
   
    $('#cva-password-submit').on('click', function (e) {
        e.preventDefault();
   
        var password = $('#cva_password_id').val();
        $.ajax({
            url: cva_frontend_object.ajax_url,
            type: 'POST',
            data: {
                action: 'cva_check_password',
                password: password,
                nonce: cva_frontend_object.nonce
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

    $('#cva-password-toggle').on('click', function () {
        var passwordField = $('#cva_password_id');
        var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
        passwordField.attr('type', type);
        $(this).find('.dashicons').toggleClass('dashicons-visibility dashicons-hidden');

        console.log('Password visibility toggled');
    });
     
});      