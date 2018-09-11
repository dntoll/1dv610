<?php

require_once("Controller/SayHello.php");
require_once("View/HelloView.php");
require_once("Model/User.php");
require_once("Model/UserStorage.php");


$storage = new \Model\UserStorage();

$user = $storage->loadUser();//new \Model\User();
$c = new \Controller\SayHello($user);
$storage->saveUser($user);

echo $c->doHello();