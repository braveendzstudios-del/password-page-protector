<?php
class cva_enqueue_scripts {
    public function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'frontend_enqueue_scripts' ) );
    }

    public function enqueue_admin_scripts() {
        wp_enqueue_style( 'cva-admin-style', plugin_dir_url( __FILE__ ) . '../assets/css/cva-admin-style.css' );
        



        wp_enqueue_script( 'cva-admin-script', plugin_dir_url( __FILE__ ) . '../assets/js/cva-admin-script.js', 
        array( 'jquery' ), null, true );
        wp_enqueue_script( 'cva-admin-frontend-script', plugin_dir_url( __FILE__ ) . '../assets/js/cva-admin-frontend-script.js',
         array('jquery'), null, true );

        // Localize the script with new data
        wp_localize_script( 'cva-admin-script', 'cva_ajax_object', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce('cva_save_settings_nonce' ),
        ) );
   
    }

    public function frontend_enqueue_scripts() {
        wp_enqueue_style( 'cva-frontend-styles', plugin_dir_url( __FILE__ ) . 
        '../assets/css/cva-frontend-styles.css' );
        wp_enqueue_script( 'cva-frontend-password-script', plugin_dir_url( __FILE__ ) . 
        '../assets/js/cva-frontend-password-script.js', array('jquery'), null, true );

        // Load dashicons
        wp_enqueue_style(
            'dashicons'
        );

        wp_localize_script( 'cva-frontend-password-script', 'cva_frontend_object', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'cva_frontend_password_nonce' ),
        ) );

      
       
    }
    
}