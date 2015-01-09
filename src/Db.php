<?php

class Db
{
    private static $instance;
    
    private $connection;
    
    private function __construct() {
        $this->connection = new \mysqli('localhost', 'root', 'root', 'db_name');
    }
    
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    public function query($query)
    {
        return $this->connection->query($query);
    }
    
    public function escape($string)
    {
        return $this->connection->real_escape_string($string);
    }
}