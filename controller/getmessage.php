<?php

session_start();
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);

require_once("../models/database.class.php");
require_once("../models/user.class.php");
require_once("../models/group.class.php");

if (isset($_SESSION['accord_id_user'])) {
    $user = new User();
    $userinfos = $user->getAllInfos($_SESSION['accord_id_user']);
}


$params = $_REQUEST['idgotoother'];

?>

<?php $allmessageinfos = $group->getAllMessagesById($params); ?>

<?php foreach ($allmessageinfos as $allmessageinfo) { ?>
    <?php $usermessagesinfos = $user->getAllInfos($allmessageinfo['id_user']); ?>
    
    <div class="container-message">
        <div class="infos-messages">
            <h3 class="margin-one"><?= $usermessagesinfos['username'] ?></h3>
            <p><?= $allmessageinfo['date'] ?></p>
        </div>
        <div class="text-messages">
            <p class="text-in-message"><?= $allmessageinfo['text'] ?></p>
        </div>
    </div>
<?php } ?>