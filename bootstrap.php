<?php
/**
 * 
 * Bootstrap file.
 */
error_reporting(E_ALL);
ini_set('display_errors', 'stdout');

define('ROOT_DIR', dirname(__FILE__));

spl_autoload_register(function ($className) 
{
    $path = ROOT_DIR . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    
    if (file_exists($path)) {
        require_once $path;
    }
});
