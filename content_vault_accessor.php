<?php

/**
 * Plugin Name:  Content Vault Accessor
 * Description: This Help You To Make Custom Plugin For Your Password Page
 * Version: 1.0.0
 * slug: content-vault-accessor
 * Aurthor: kulwindersingh5555
 * License: GPL2 or later
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once plugin_dir_path( __FILE__ ) . 'Includes/cva_autoloader.php';

new cva_autoloader();
new cva_enqueue_scripts();
new cva_shortcode();
new cva_admin_menu();
new cva_settings();
new cva_redirector();


