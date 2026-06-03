<?php

/**
 * Plugin Name:  Content Vault Accessor
 * Description: This Help You To Make Custom Plugin For Your Password Page
 * Version: 1.0.0
 * slug: content-vault-accessor
 * Aurthor: kulwindersingh5555
 * License: GPL2 or later
 * Text Domain: content-vault-accessor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once plugin_dir_path( __FILE__ ) . 'Includes/content_vault_accessor_autoloader.php';

new content_vault_accessor_autoloader();
new content_vault_accessor_enqueue_scripts();
new content_vault_accessor_shortcode();
new content_vault_accessor_admin_menu();
new content_vault_accessor_settings();
new content_vault_accessor_redirector();


