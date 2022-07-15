<?php

session_start();
extract($_POST);

require_once("../models/database.class.php");
require_once("../models/user.class.php");
require_once("../models/group.class.php");




$sendmessage = htmlspecialchars($_POST['sendmessage']);
$idbtn = intval($_POST['idbtn']);

$group = $connect->prepare("INSERT INTO message (text, id_user, id_conversation) VALUES (?, ?, ?)");
$group->execute(array($sendmessage, $_SESSION['accord_id_user'], $idbtn));

