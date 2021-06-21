<?php
/**
 * @package Homemade
 */
namespace Inc;

final class Init
{
    /**
     * Store all the classes inside an array
     *
     * @return array Full list of classes[]
     */
    public static function get_services(): array
    {
        return [
            Api\SettingsApi::class,
            Base\SettingsLinks::class,
            Pages\Admin::class,
            Base\Enqueue::class,
            CPT\EmailCpt::class,
        ];
    }

    /**
     * Loop thought the classes, initialize them,
     * and call the register() method if it exists
     *
     * @return void
     */
    public static function register_services(): void
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($class, 'register')) {
                $service->register();
            }
        }
    }


    /**
     * Initialize the classes
     *
     * @param string $class
     * @return object instance new instance of the class
     */
    private static function instantiate(string $class): object
    {
        return (new $class());
    }

}



