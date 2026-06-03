<?php

class content_vault_accessor_autoloader{
    public function __construct() {
        spl_autoload_register( array( $this, 'autoload' ) );
    }

    public function autoload( $class_name ) {
         
        $base = plugin_dir_path(__DIR__); // go one level up (plugin root)

        $paths = [
            $base. $class_name . '.php',
            $base . 'includes/' . $class_name . '.php',
            $base . 'includes/integration/' . $class_name . '.php',
            $base . 'template/' . $class_name . '.php',  
            $base . 'template/admin/' . $class_name . '.php',
            
        ];

        foreach ( $paths as $file ) {
            if ( file_exists( $file ) ) {
                require_once $file;
                return;
            }
           
        }



       
    }
}