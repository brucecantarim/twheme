<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/***********************************
 *       Autoloading Scripts       *
 ***********************************/

spl_autoload_register( 'twhemeLoadClass' );

public static function twhemeLoadClass($class)
{
    $files = array(
        $class . '.php',
        str_replace('_', '/', $class) . '.php',
    );
    foreach (explode(PATH_SEPARATOR, ini_get('include_path')) as $base_path)
    {
        foreach ($files as $file)
        {
            $path = "$base_path/$file";
            if (file_exists($path) && is_readable($path))
            {
                include_once $path;
                return;
            }
        }
    }
}