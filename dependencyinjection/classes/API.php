<?php

class API
{
    public $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function connect()
    {
        return "Connected to API with key: " . $this->key;
    }
}
