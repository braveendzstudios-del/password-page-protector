<?php
class content_vault_accessor_enqueue_scripts {
    public function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'frontend_enqueue_scripts' ) );
    }

    public function enqueue_admin_scripts() {
        wp_enqueue_style( 'ppp-admin-style', plugin_dir_url( __FILE__ ) . '../assets/css/ppp-admin-style.css' );
        



        wp_enqueue_script( 'ppp-admin-script', plugin_dir_url( __FILE__ ) . '../assets/js/ppp-admin-script.js', array( 'jquery' ), null, true );
        wp_enqueue_script( 'admin-frontend-script', plugin_dir_url( __FILE__ ) . '../assets/js/admin-frontend-script.js', array('jquery'), null, true );

        // Localize the script with new data
        wp_localize_script( 'ppp-admin-script', 'ppp_ajax_object', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'ppp_save_settings_nonce' ),
        ) );

       
   
    }

    public function frontend_enqueue_scripts() {
        wp_enqueue_style( 'ppp-frontend-styles', plugin_dir_url( __FILE__ ) . 
        '../assets/css/ppp-frontend-styles.css' );
        wp_enqueue_script( 'ppp-frontend-password-script', plugin_dir_url( __FILE__ ) . 
        '../assets/js/ppp-frontend-password-script.js', array('jquery'), null, true );

        // Load dashicons
        wp_enqueue_style(
            'dashicons'
        );

        wp_localize_script( 'ppp-frontend-password-script', 'ppp_frontend_object', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'ppp_frontend_password_nonce' ),
        ) );

      
       
    }
    
}