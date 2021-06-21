<?php
/**
 * @package Newsletter_Homemade
 * @version 1.0.0
 */
/*
Plugin Name: Newsletter Homemade
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Best custom newsletter plugin homemade
Author: Yann Deo Sambou
Version: 1.0.0
Author URI: http://ma.tt/
*/

if ( !defined('ABSPATH')) {
    die;
}

if (file_exists(dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once  dirname( __FILE__ ) . '/vendor/autoload.php' ;
}

define('PLUGIN_NAME' ,'Newsletter Homemade');

function activate_newsletter_plugin() {
    \Inc\Base\Activate::handle();
}
register_activation_hook(__FILE__ , 'activate_newsletter_plugin');

function deactivate_newsletter_plugin() {
    \Inc\Base\Deactivate::handle();
}
register_deactivation_hook( __FILE__ , 'deactivate_newsletter_plugin');

if (class_exists(\Inc\Init::class) ) {
    \Inc\Init::register_services();
}

