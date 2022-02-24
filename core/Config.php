<?php

/**User: Celio Natti... */

namespace natoxCore;

/**
 * Class Config
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package natoxCore
 */

 class Config
 {
    private static $config = [
        'version'               => '1.0.0',
        'default_controller'    => 'Blog', // The default home controller
        'default_site_title'    => 'Natox', // Default Site title
    ];

    public static function get($key)
    {
        if (array_key_exists($key, $_ENV)) return $_ENV[$key];
        return array_key_exists($key, self::$config) ? self::$config[$key] : NULL;
    }
 }