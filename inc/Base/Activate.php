<?php
/**
 * @package Homemade
 */
namespace Inc\Base;

class Activate
{
    public static function handle()
    {
        flush_rewrite_rules();
    }
}