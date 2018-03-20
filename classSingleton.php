<?php

class ConexaoSingleton {
    
    private static $instance;
    
    private function __construct() {
    }
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO("mysql:host=localhost;dbname=academia", "root", "admin");
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$instance;
    }
    
}//Fecha classe ConexaoSingleton
