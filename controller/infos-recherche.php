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


$search = $_REQUEST['search'];
$iddd = $_REQUEST['idpt'];


$getallinfos = $connect->prepare("SELECT * FROM users WHERE username LIKE ? LIMIT 5");
$getallinfos->execute(array("$search%"));
$getallinfosinfo = $getallinfos->fetchAll();
$count1 = $getallinfos->rowCount();



?>
<?php if ($count1 > 0) { ?>
    <?php foreach ($getallinfosinfo as $getallinfosusers) { ?>
        <div class="listset">
            <button type="button" class="btn-type-list"><?= $getallinfosusers['username']  ?></button>
            <button type="button" class="button-round button-addypeople" data-id="<?= $getallinfosusers['id'] ?>" data-test="<?= $iddd ?>">
                <img src="/views/assets/add.png" alt="" class="img-add-people">
            </button>

        </div>
        <div class="field listing" data-id="<?= $getallinfosusers['id'] ?>"></div>
    <?php } ?>
<?php } else { ?>
    <div class="listset">Personne introuvable ...</div>
<?php } ?>


<script>
    $(".button-addypeople").click(function() {
        let idbtn = $(".button-addypeople").attr("data-id");
        let idtop = $(".button-addypeople").attr("data-test");

        $.post(
            "/controller/addpeople.php", {
                idbtn: idbtn,
                idtop: idtop,
            },
            function(data) {
                if (data != "") {
                    $(".field").removeClass("success");
                    $(".field").removeClass("error");

                    if (data.includes("✅")) {
                        $(".field").addClass("success");
                        $(".field.listing.success").empty();
                        $(".field.listing.success").append(data);
                    } else {
                        $(".field").addClass("error");
                        $(".field.listing.error").empty();
                        $(".field.listing.listing.error").append(data);
                    }
                }
            }
        );
    });
</script>