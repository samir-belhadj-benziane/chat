<?php

session_start();
extract($_POST);

require_once("../models/database.class.php");
require_once("../models/user.class.php");
require_once("../models/group.class.php");




$idbtn = intval($_POST['idbtn']);
$idtop = intval($_POST['idtop']);


$getallinfos = $connect->prepare("SELECT * FROM users_coversation WHERE id_user = ? and id_conversation = ?");
$getallinfos->execute(array($idbtn, $idtop));
$getallinfosinfo = $getallinfos->rowCount();


if ($getallinfosinfo == 0) {
    $group = $connect->prepare("INSERT INTO users_coversation (id_user, id_conversation) VALUES (?, ?)");
    $group->execute(array($idbtn, $idtop));

    echo "Cette personne a ete ajoute ! ✅";
} else {
    echo "Cette personne a deja ete ajoute ! ❌";
}
