<?php
/**
 * @package Homemade
 */
namespace Inc\Base;

class SettingsLinks extends BaseController
{

    private const ADMIN_PAGE_URL = 'admin.php';

    /**
     * Load all methods initialized on boot plugin
     */
    public function register(): void
    {
        add_filter("plugin_action_links_".$this->plugin_basename, array( $this, 'settings_link') );
    }

    /**
     * Settings link in plugin
     *
     * @param $links
     *
     * @return mixed
     */
     public function settings_link($links)
    {
        $settings_link = '<a href='. self::ADMIN_PAGE_URL . '?page=homemade_plugin>Settings</a>' ;
        array_push($links, $settings_link);

        return $links;
    }
}