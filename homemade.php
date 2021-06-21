<?php
/**
 * @package Homemade
 * @version 1.0.0
 */
/*
Plugin Name: Homemade
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Best custom plugin homemade receipe
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

define('PLUGIN_NAME' ,'Homemade');

function activate_homemade_plugin() {
    \Inc\Base\Activate::handle();
}
register_activation_hook(__FILE__ , 'activate_homemade_plugin');

function deactivate_homemade_plugin() {
    \Inc\Base\Deactivate::handle();
}
register_deactivation_hook( __FILE__ , 'deactivate_homemade_plugin');

if (class_exists(\Inc\Init::class) ) {
    \Inc\Init::register_services();
}

