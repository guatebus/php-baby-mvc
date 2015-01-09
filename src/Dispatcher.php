<?php

/**
 * Description of Dispatcher
 *
 * @author odin
 */
class Dispatcher {
    
    public function dispatch()
    {
        $uri = ltrim($_SERVER['REQUEST_URI'], '/');
        $uri_parts = explode('?', $uri);
        $uri = reset($uri_parts);
        $controller_name = $uri ?: 'Index';
        $controller_class = 'Controller\\' . str_replace('/', '\\', $controller_name);
                        
        if (class_exists($controller_class, true)) {
            $controller = new $controller_class($controller_name);
            $controller->execute();
        } else {
            header('HTTP/1.0 404 Not Found');
            echo '404 not found'; // it must be a template...
        }
    }
}
