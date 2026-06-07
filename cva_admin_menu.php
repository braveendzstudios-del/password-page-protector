<?php
class cva_admin_menu {

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    }

    public function add_plugin_page() {
        add_menu_page(
            'Content Vault Protector', // page title
            'Content Vault Protector', // menu title
            'manage_options', // capability
            'content-vault-protector', // menu slug
            array( $this, 'create_admin_page' ), // callback function
            'dashicons-lock' ,// icon
            

        );
    }

    
    public function create_admin_page() {
      
        $selector = new cva_admin_selector();
        echo $selector->render();
    }
}