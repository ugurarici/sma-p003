<?php

//  Singleton

class DBProvider
{
    protected static $pdoInstance;

    public static function getInstance()
    {
        if (self::$pdoInstance == null) {
            self::$pdoInstance = new PDO("mysql:host=localhost;dbname=sma_p003_hello;charset=utf8mb4;", "root", "root");
        }

        return self::$pdoInstance;
    }
}
