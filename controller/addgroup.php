<?php

session_start();
extract($_POST);

require_once("../models/database.class.php");
require_once("../models/user.class.php");
require_once("../models/group.class.php");




$namegroup = htmlspecialchars(trim($_POST['namegroup']));

if (isset($namegroup)) {

    $namegrouplenght = strlen($namegroup);

    if ($namegrouplenght >= 2 && $namegrouplenght <= 18) {
        $namegroupaccess = 1;
    } else {
        $namegroupaccess = 0;
    }

    if ($namegroupaccess == 1) {
        $group = $connect->prepare("INSERT INTO conversation (name, id_user) VALUES (?, ?)");
        $group->execute(array($namegroup, $_SESSION['accord_id_user']));

        $stmt = $connect->query("SELECT LAST_INSERT_ID()");
        $lastId = $stmt->fetchColumn();

        $group = $connect->prepare("INSERT INTO users_coversation (id_user, id_conversation) VALUES (?, ?)");
        $group->execute(array($_SESSION['accord_id_user'], $lastId));

        echo "Votre Groupe a ete creer ! ✅";
    } else {
        echo "Le nom de groupe doit contenir 2 a 18 caractères ! ❌";
    }
} else {
    echo "Veuillez remplir le champ ! ❌";
}
