jQuery(document).ready(function($){
    $('#cva-save-btn').on('click', function (e) {
        e.preventDefault();
        console.log('Save settings clicked');

        $.ajax({
        url: cva_ajax_object.ajax_url,
        type: 'POST',
        data:{
            action: 'cva_save_settings',
            security: cva_ajax_object.nonce,
            password: $('#cva_password_id').val(),
            protection_page_id: $('#cva_protection_page_id').val(),
            page_id: $('#cva_page_id').val(),
            post_id: $('#cva_post_id').val(),
        }, success: function(response) {
            if(response.success) {
                alert('Settings saved successfully!');
            } else {
                alert('Error saving settings: ' + response.data);
            }
        }});
        
    });
});