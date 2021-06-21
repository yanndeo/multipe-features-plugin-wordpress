<?php
/**
 * @package Newsletter_Homemade
 */
namespace Inc\Base;

class BaseController
{
    public string $plugin_path;
    public string $plugin_url;
    public string $plugin_basename;

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__ , 2) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__ , 2) );
        $this->plugin_basename = plugin_basename( dirname( __FILE__ , 3) ) . '/newsletter-homemade.php';
    }
}

