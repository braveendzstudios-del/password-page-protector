<?php

/**
 * Plugin Name: Password Page Protector
 * Description: This Help You To Make Custom Plugin For Your Password Page
 * Version: 1.0.0
 * Aurthor:Kulwinder Singh
 * License: GPL2 or later
 * Text Domain: password-page-protector
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once plugin_dir_path( __FILE__ ) . 'Includes/autoloader.php';

new autoloader();
new enqueue_scripts();
new shortcode();
new ppp_admin_menu();
new ppp_save_settings();
new ppp_redirector();


