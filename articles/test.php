<?php

require "inc/init.php";

$user = new User;

var_dump($user);

$user->name = "ugurarici";
$user->email = "emailimi@vermem.ki";
$user->password = md5("uNgeizoo7Ahr3");

var_dump($user);

$user->save();

var_dump($user);

var_dump(User::all());

$u2 = User::find(2);
$u2->name = "bu2imis";
$u2->save();

$u3 = User::find(3);
$u3->delete();
