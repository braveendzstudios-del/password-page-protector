jQuery(document).ready(function($){
    $('#ppp-show-password').on('click', function () {
        var passwordField = $('#ppp_password_id');
        var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
        passwordField.attr('type', type);
        $(this).text(type === 'password' ? 'Show Password' : 'Hide Password');
        console.log('Show/Hide password toggled');
    });
});