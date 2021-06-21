<?php
/**
 * @package Newsletter_Homemade
 */
namespace Inc\Pages;

use Inc\Base\BaseController;

class Admin extends  BaseController
{

    public const MENU_PAGE_POSITION = 110;
    private const MENU_TITLE = 'Newsletter';
    private const MENU_ICON = 'dashicons-email-alt2';
    private const CAPABILITY_USER = 'manage_options';

    /**
     *
     */
    public function register(): void
    {
        //add new menu on admin to handle our plugin(dashboard)
        add_action('admin_menu', array( $this, 'add_admin_pages') );
    }

    /**
     * Add Admin page of plugin
     * define view - position of menu - role to be access
     */
    public function add_admin_pages(): void
    {
        add_menu_page(
            PLUGIN_NAME.' Plugin',
            self::MENU_TITLE,
            self::CAPABILITY_USER,
            strtolower( str_replace( ' ', '_', PLUGIN_NAME . '_plugin' ) ),
            array($this, 'admin_index'),
            self::MENU_ICON,
            self::MENU_PAGE_POSITION
        );
    }


    /**
     * Admin Page View
     */
    public function admin_index(): void
    {
        require_once $this->plugin_path .'templates/admin.view.php';
    }





}