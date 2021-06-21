<?php
/**
 * @package Homemade
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\callback\AdminCallbacks;


class Admin extends BaseController
{

    private const CAPABILITY_USER = 'manage_options';
    /**
     * @var SettingsApi
     */
    private SettingsApi $settings;
    public array $pages = [];
    public array $sub_pages = [];
    /**
     * @var AdminCallbacks
     */
    public AdminCallbacks $callbacks;


    /**
     * Return just slug of main page admin
     * Combine plugin title + key 'plugin'
     *
     * @return string
     */
    private function getSlugPageAdmin(): string
    {
        return strtolower( str_replace( ' ', '_', PLUGIN_NAME . '_plugin' ) );
    }

    /**
     * Define Page admin
     *
     * @return array
     */
    public function setPages(): array
    {
        $this->pages = [
            array(
                'page_title' => PLUGIN_NAME,
                'menu_title' => 'Homemade',
                'capability' => self::CAPABILITY_USER,
                'menu_slug' => $this->getSlugPageAdmin(),
                'callback' => array($this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-email-alt2',
                'position' => 110
            ),
        ];

        return $this->pages;
    }

    /**
     * Define all sub page admin
     *
     * @return array|array[]
     */
    public function setSubPages(): array
    {
       return $this->sub_pages = [
            array(
                'parent_slug' => $this->getSlugPageAdmin(),
                'page_title' => 'Custom Post Type',
                'menu_title' => 'CPT',
                'capability' => self::CAPABILITY_USER,
                'menu_slug' => $this->getSlugPageAdmin() . '_cpt',
                'callback' => function() { echo '<h1> Custom Post Type Manager</h1>'; },
            ),
            array(
                'parent_slug' => $this->getSlugPageAdmin(),
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => self::CAPABILITY_USER,
                'menu_slug' => $this->getSlugPageAdmin() . '_taxonomies',
                'callback' => function() { echo '<h1> Taxonomies Manager</h1>'; },
            ),
            array(
                'parent_slug' => $this->getSlugPageAdmin(),
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => self::CAPABILITY_USER,
                'menu_slug' => $this->getSlugPageAdmin() . '_widgets',
                'callback' => function() { echo '<h1> Widgets Manager</h1>'; },
            ),
        ];

    }


    /**
     *
     */
    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();

        $this->setPages();
        $this->setSubPages();

        $this->settings
            ->addPages( $this->pages )
            ->withSubpage('Dashboard' )
            ->addSubPages( $this->sub_pages )
            ->register();
    }









}