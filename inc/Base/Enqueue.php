<?php
/**
 *
 */
namespace Inc\Base;


class Enqueue extends BaseController
{
    public function register()
    {
        //add all assets files - admin
        add_action('admin_enqueue_scripts',  array( $this, 'enqueue_admin_side' ) );
        //add all assets files - front
        add_action('wp_enqueue_scripts',  array( $this, 'enqueue_front_side' ) );
    }

    /**
     * Load files css/js
     */
    public function enqueue_admin_side()
    {
        wp_enqueue_style('my_plugin_style',$this->plugin_url . 'assets/css/mypluginstyle.css' );
        wp_enqueue_script('my_plugin_script',$this->plugin_url . 'assets/js/mypluginscript.js' );
    }

    /**
     * Load files css/js
     */
    public function enqueue_front_side()
    {
    }
}