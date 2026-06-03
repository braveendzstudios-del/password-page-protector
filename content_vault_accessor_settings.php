<?php
// Handle the AJAX request to save settings

class content_vault_accessor_settings {

    public function __construct() {
        add_action( 'wp_ajax_ppp_save_settings', array( $this, 'save_settings' ) );
    }

    public function save_settings() {
        // Check nonce for security
        check_ajax_referer( 'ppp_save_settings_nonce', 'security' );

        // Get the posted data
        $password = isset( $_POST['password'] ) ? sanitize_text_field( $_POST['password'] ) : '';
        $protection_page_id = isset( $_POST['protection_page_id'] ) ? intval( $_POST['protection_page_id'] ) : 0;
        $page_id = isset( $_POST['page_id'] ) ? intval( $_POST['page_id'] ) : 0;
        $post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0;

        // Save the settings (you can use update_option or a custom table)
        update_option( 'ppp_password_id', $password );
        update_option( 'ppp_protection_page_id', $protection_page_id );
        update_option( 'ppp_page_id', $page_id );
        update_option( 'ppp_post_id', $post_id );

        // Send a success response
        wp_send_json_success( array( 'message' => 'Settings saved successfully.' ) );
    }
}