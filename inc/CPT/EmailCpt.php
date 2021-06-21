<?php

namespace Inc\CPT;

class EmailCpt
{
    public const CPT_NAME = 'email';

    public function register()
    {
        add_action('init', array( $this, 'custom_post_type' ) );
    }

    /**
     * Create CPT
     */
    public function custom_post_type()
    {
        register_post_type(self::CPT_NAME, ['public' => true, 'label' => ucfirst(self::CPT_NAME) ] );
    }
}