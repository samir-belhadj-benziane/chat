<?php

session_start();
extract($_POST);

require_once("../models/database.class.php");
require_once("../models/user.class.php");


$user = new User();


$mail = htmlspecialchars($_POST['mail']);
$username = htmlspecialchars($_POST['username']);
$username = intval(trim($_POST['username']));

echo $user->update($mail, $username, $_POST['password'], $phone);