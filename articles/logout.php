<?php
require "init.php";

session_destroy();
header("Location: index.php");
die();
