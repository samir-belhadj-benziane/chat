<?php

session_start();
extract($_POST);

require_once("../models/database.class.php");
require_once("../models/user.class.php");
require_once("../models/group.class.php");




$idbtn = htmlspecialchars(trim($_POST['idbtn']));

$delete0 = $connect->prepare('DELETE FROM message WHERE id_conversation = ?');
$delete0->execute(array($idbtn));

$delete1 = $connect->prepare('DELETE FROM users_coversation WHERE id_conversation = ?');
$delete1->execute(array($idbtn));

$delete2 = $connect->prepare('DELETE FROM conversation WHERE id = ?');
$delete2->execute(array($idbtn));
