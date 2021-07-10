<?php

class B
{
    protected $api;
    protected $db;

    public function __construct(API $api, PDO $pdo)
    {
        $this->api = $api;
        $this->db = $pdo;
    }

    public function getData()
    {
        $connection = $this->api->connect();
        return "Got data from api with connection result: " . $connection;
    }

    public function getColumns()
    {
        return $this->db
            ->query("DESCRIBE articles")
            ->fetchAll(PDO::FETCH_COLUMN);
    }
}
