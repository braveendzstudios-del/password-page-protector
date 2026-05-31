<?php
class ppp_admin_menu {
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    }

    public function add_plugin_page() {
        add_menu_page(
            'Password Page Protector', // page title
            'Password PageProtector', // menu title
            'manage_options', // capability
            'password-page-protector', // menu slug
            array( $this, 'create_admin_page' ), // callback function
            'dashicons-lock' ,// icon
            

        );
    }

    
    public function create_admin_page() {
      
        $selector = new password_page_selector();
        echo $selector->render();
    }
}