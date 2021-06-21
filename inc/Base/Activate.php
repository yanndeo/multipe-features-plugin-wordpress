<?php
/**
 * @package Newsletter_Homemade
 */
namespace Inc\Base;

class Activate
{
    public static function handle()
    {
        flush_rewrite_rules();
    }
}