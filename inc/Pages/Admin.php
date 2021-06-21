<?php
/**
 * @package Homemade
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

class Admin extends BaseController
{


    private const CAPABILITY_USER = 'manage_options';
    /**
     * @var SettingsApi
     */
    private SettingsApi $settings;
    private array $pages = [];

    public function __construct()
    {
        parent::__construct();
        $this->settings = new SettingsApi();
        $this->pages = [
            array(
                'page_title' => PLUGIN_NAME,
                'menu_title' => 'Homemade',
                'capability' => self::CAPABILITY_USER,
                'menu_slug' => strtolower( str_replace( ' ', '_', PLUGIN_NAME . '_plugin' ) ),
                'callback' => function() { echo '<h1>Admin Plugin</h1>'; },
                'icon_url' => 'dashicons-email-alt2',
                'position' => 110
            ),
            array(
                'page_title' => 'Test Pug',
                'menu_title' => 'Test',
                'capability' => self::CAPABILITY_USER,
                'menu_slug' => strtolower( str_replace( ' ', '_', PLUGIN_NAME . '_test_plugin' ) ),
                'callback' => function() { echo '<h1> Feature Plugin Test</h1>'; },
                'icon_url' => 'dashicons-email-alt2',
                'position' => 111
            ),
        ];
    }

    /**
     *
     */
    public function register()
    {
        //add new pages on admin to handle our plugin(dashboard)
        $this->settings->addPages( $this->pages )->register();
    }



    /**
     * Admin Page View
     */
    public function admin_index(): void
    {
        require_once $this->plugin_path . 'templates/admin.view.php';
    }





}