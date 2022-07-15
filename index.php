<?php

session_start();
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);

require("./models/database.class.php");
require("./models/user.class.php");
require("./models/group.class.php");

if (isset($_SESSION['accord_id_user'])) {
    $user = new User();
    $userinfos = $user->getAllInfos($_SESSION['accord_id_user']);
}

$params = explode('/', $_GET['p']);
$servername = explode('/', $_SERVER['SCRIPT_NAME']);


?>


<?php
if (!file_exists("views/" . $params[0] . ".php") && $params[0] != "") {
    $title = 'Page introuvable | Accord';
} elseif ($params[0] == "") {
    $title = 'Accord | Bienvenue sur Accord, Vous pouvez discuter et se retrouver';
} elseif ($params[0] == "register") {
    $title = 'Accord | S\'inscrire';
} elseif ($params[0] == "login") {
    $title = 'Accord | S\'identifier';
} elseif ($params[0] == "chat") {
    $title = 'Accord | Accueil';
} else {
    $title = 'Page introuvable | Accord';
}

?>


<!DOCTYPE html>
<html lang="fr-fr">

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <script src="views/assets/jquery-3.6.0.js"></script>
    <script src="views/assets/script.js"></script>
    <link rel="stylesheet" href="views/assets/style.css">
    <link rel="icon" href="views/assets/fav.png">
    <title><?= $title ?></title>
</head>

<body>
    <?php
    if ($params[0] == "") {
        $filename = "views/index.php";
        if (file_exists($filename)) {
            require_once($filename);
        } else {
            if (file_exists("views/error404.php")) {
                require_once("views/error404.php");
            } else {
                require_once("views/index.php");
            }
        }
    } else {

        $filename = "views/" . $params[0] . ".php";
        if (file_exists($filename)) {
            require_once($filename);
        } else {
            if (file_exists("views/error404.php")) {
                require_once("views/error404.php");
            } else {
                require_once("views/index.php");
            }
        }
    } ?>
</body>

</html>