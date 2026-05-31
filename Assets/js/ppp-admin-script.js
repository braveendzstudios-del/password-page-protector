jQuery(document).ready(function($){
    $('#ppp-save-btn').on('click', function (e) {
        e.preventDefault();
        console.log('Save settings clicked');

        $.ajax({
        url: ppp_ajax_object.ajax_url,
        type: 'POST',
        data: {
            action: 'ppp_save_settings',
            security: ppp_ajax_object.nonce,
            password: $('#ppp_password_id').val(),
            protection_page_id: $('#ppp_protection_page_id').val(),
            page_id: $('#ppp_page_id').val(),
            post_id: $('#ppp_post_id').val(),
        }, success: function(response) {
            if(response.success) {
                alert('Settings saved successfully!');
            } else {
                alert('Error saving settings: ' + response.data);
            }
        }});
        
    });
});