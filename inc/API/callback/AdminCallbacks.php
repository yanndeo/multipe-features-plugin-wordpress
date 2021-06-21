<?php
/**
 * @package Homemade
 */
namespace Inc\Api\callback;

class AdminCallbacks extends \Inc\Base\BaseController
{

    /**
     *
     * @return mixed
     */
    public function adminDashboard()
    {
       return  require_once $this->plugin_path . 'templates/admin.view.php';
    }
}