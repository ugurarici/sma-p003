<?php

//  Singleton

class DBProvider
{
    protected static $pdoInstance;

    public static function getInstance()
    {
        if (self::$pdoInstance == null) {
            self::$pdoInstance = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4;",
                DB_USER,
                DB_PASS
            );
        }

        return self::$pdoInstance;
    }
}
