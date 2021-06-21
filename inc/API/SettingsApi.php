<?php
/**
 * @package Homemade
 */
namespace Inc\Api;

class SettingsApi
{
    private const CAPABILITY_USER = 'manage_options';
    /**
     * @var array
     */
    public array $admin_pages = [] ;
    /**
     * @var array[]
     */
    public array $admin_sub_pages = [];


    public function register(): void
    {
        if ( ! empty( $this->admin_pages ) ) {
            add_action( 'admin_menu', array( $this, 'addAdminMenu') );
        }
    }

    /**
     * @param array $pages
     *
     * @return $this
     */
    public function addPages(array $pages)
    {
        $this->admin_pages = $pages;

        return $this;
    }


    /**
     * @param array $pages
     *
     * @return $this
     */
    public function addSubPages(array $pages): self
    {
        $this->admin_sub_pages = array_merge($this->admin_sub_pages, $pages);

        return $this;
    }

    /**
     * @param string|null $title
     *
     * @return $this
     */
    public function withSubpage( string $title = null): self
    {
        if ( empty( $this->admin_pages ) ) {
            return $this;
        }

        $admin_page = $this->admin_pages[0];

        $sub_page = [
            array(
                'parent_slug' => $admin_page['menu_slug'],
                'page_title' => $admin_page['page_title'],
                'menu_title' => $title ?? $admin_page['menu_title'] ,
                'capability' => $admin_page['capability'],
                'menu_slug' => $admin_page['menu_slug'],
                'callback' => $admin_page['callback']
            ),
        ];

        $this->admin_sub_pages = $sub_page;
        
        return $this;
    }


    /**
     * Loop all page define as admin pages
     */
    public function addAdminMenu()
    {
        //pages admin
       foreach ( $this->admin_pages as $page ) {
           add_menu_page(
               $page['page_title'],
               $page['menu_title'],
               $page['capability'],
               $page['menu_slug'],
               $page['callback'],
               $page['icon_url'],
               $page['position'],
           );
       }
       //sub Page into admin pages
        foreach ( $this->admin_sub_pages as $page ) {
            add_submenu_page(
                $page['parent_slug'],
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callback'],
            );
        }
    }
}