<?php
require "init.php";

redirectIfNotLoggedIn();

session_destroy();
header("Location: index.php");
die();
