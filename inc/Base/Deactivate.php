<?php
/**
 * @package Homemade
 */
namespace Inc\Base;

class Deactivate
{

    public static function handle()
    {
        // Flush rewrite rules
        flush_rewrite_rules();
    }

}