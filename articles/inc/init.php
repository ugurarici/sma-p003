<?php
//  bu dosya içinde, proje işlemleri esnasında her sayfada ihtiyaç duyacağımız tanımlamaları ve atamaları yapacağız
session_start();
require_once "config.php";
require_once "functions.php";
require_once "data.php";
require_once "classes/DBProvider.php";
require_once "models/Model.php";
require_once "models/Article.php";
require_once "models/User.php";
