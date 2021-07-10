<?php

class A
{
    protected $api;
    protected $database;

    public function __construct(API $api, PDO $pdo = null)
    {
        $this->api = $api;

        if ($pdo) {
            $this->database = $pdo;
        } else {
            $this->database = DBProvider::getInstance();
        }
    }

    public function hey()
    {
        return "Hey. Your API key is: " . $this->api->key;
    }

    public function lastArticleId()
    {
        return $this->database->query("SELECT id FROM articles ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_COLUMN);
    }
}
