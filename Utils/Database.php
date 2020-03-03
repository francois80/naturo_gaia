<?php
class Database {
    private static $instance = null;

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new PDO(DSN, USER, PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        return self::$instance;
    }
}