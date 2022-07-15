<?php if (isset($_SESSION['accord_id_user'])) { ?>
    <main id="chat">
        <nav class="navigation-main">
            <div class="user-and-add">
                <?php $groupinfos = $group->getAllGroupById(); ?>
                <?php foreach ($groupinfos as $groupinfo) { ?>
                    <?php
                    $getgroupinfos = $connect->prepare("SELECT * FROM conversation WHERE id = ?");
                    $getgroupinfos->execute(array($groupinfo['id_conversation']));
                    $groupinfoonly = $getgroupinfos->fetch();
                    ?>
                    <button type="button" class="button-round margin-one button-gogroup" data-id="<?= $groupinfoonly['id'] ?>" title="<?= ucfirst($groupinfoonly['name']); ?>">
                        <?php if ($groupinfoonly['img'] != NULL) { ?>
                            <img src="/views/assets/img_group/<?= $groupinfoonly['img'] ?>" alt="" class="img-user">
                        <?php } else { ?>
                            <h3 class="letter-group"><?= ucfirst($groupinfoonly['name'][0]); ?></h3>
                        <?php }  ?>
                    </button>
                <?php }  ?>
            </div>
            <div class="lign-grey-one"></div>
            <?php if ($userinfos['admin'] == 1) { ?>
                <div class="add-and-edit">
                    <button type="button" class="button-round margin-one add" data-id="">
                        <img src="/views/assets/add.png" alt="" class="img-user">
                    </button>
                    <div class="add-container">
                        <div class="close-container">
                            <img src="/views/assets/cross.png" alt="" class="img-close">
                        </div>
                        <div class="add-container-input">
                            <h2 class="margin-one">Ajouter un groupe</h2>
                            <fieldset class="login-field">
                                <legend>Nom de groupe</legend>
                                <input type="text" name="namegroup" class="namegroup">
                            </fieldset>
                            <div class="field"></div>
                            <div class="login-submit">
                                <button type="button" name="submit-send-group" class="button-one box-shadow-one button-group">Creer</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="button-round margin-one edit" data-id="">
                        <img src="/views/assets/edit.png" alt="" class="img-user">
                    </button>
                </div>
            <?php } ?>
            <div class="lign-grey-one"></div>
            <div class="setting">
                <button type="button" class="button-round edit-profil">
                    <img src="/views/assets/setting.png" alt="" class="img-setting">
                </button>
                <div class="edit-container">
                    <div class="close-container">
                        <img src="/views/assets/cross.png" alt="" class="img-close">
                    </div>
                    <div class="edit-container-input">
                        <h2 class="margin-one">Editer le profil</h2>

                        <fieldset class="login-field">
                            <legend>E-mail</legend>
                            <input type="text" name="mail" class="mail">
                        </fieldset>
                        <div class="field-mail"></div>

                        <fieldset class="login-field">
                            <legend>Nom d'utilisateur</legend>
                            <input type="text" name="username" class="username">
                        </fieldset>
                        <div class="field-username"></div>

                        <fieldset class="login-field">
                            <legend>Mot de Passe</legend>
                            <input type="password" name="password" class="password">
                            <svg alt="" color="#cacaca" role="img" transform="" version="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="button-password">
                                <path d="M1.393 4.222l1.415-1.414 18.384 18.384-1.414 1.415-3.496-3.497c-1.33.547-2.773.89-4.282.89-6.627 0-12-6.625-12-8 0-.752 1.607-3.074 4.147-5.024L1.393 4.222zM12 4c6.627 0 12 6.625 12 8 0 .752-1.607 3.074-4.147 5.024l-3.198-3.196a5 5 0 0 0-6.483-6.483L7.718 4.89C9.048 4.343 10.49 4 12 4zm-4.656 6.173a5 5 0 0 0 6.483 6.483l-1.661-1.66L12 15a3 3 0 0 1-3-3l.005-.166-1.66-1.66zM12 9a3 3 0 0 1 3 3l-.005.166-3.162-3.161L12 9z" class="path-pass"></path>
                            </svg>
                        </fieldset>
                        <div class="field-password"></div>

                        <fieldset class="login-field">
                            <legend>Numero de telephone</legend>
                            <input type="number" name="phone" class="phone">
                        </fieldset>
                        <div class="field-phone"></div>


                        <div class="field"></div>

                        <div class="login-submit">
                            <button type="button" name="submit-edit-profil" class="button-one box-shadow-one button-profil">Modifier</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="button-round deco">
                    <img src="/views/assets/deco.png" alt="" class="img-setting">
                </button>
            </div>
        </nav>
        <section class="view-main">

            <?php $allgroupinfos = $group->getAllGroupInfosById($params[1]); ?>

            <?php if ($allgroupinfos == true) { ?>
                <div class="topviewmain">
                    <h2 class="title-top-left margin-one"><?= $allgroupinfos['name'] ?></h2>
                    <?php if ($userinfos['admin'] == 1) { ?>
                        <div class="space-add-people">
                            <button type="button" class="button-round margin-one button-add-people" data-id="<?= $params[1] ?>">Ajouter une personne</button>
                            <button type="button" class="button-round margin-one error button-delete-group" data-id="<?= $params[1] ?>">Supprimer le groupe</button>
                        </div>
                        <div class="add-thepeople-container">
                            <div class="close-container">
                                <img src="/views/assets/cross.png" alt="" class="img-close">
                            </div>
                            <div class="add-container-people">
                                <h2 class="margin-one">Ajouter un personne</h2>
                                <div class="login-input">
                                    <input type="text" name="addpeopleinput" class="add-people-input">
                                    <div class="listsearch"></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>


                <div class="bodyviewmain" id="message"></div>
                <div class="footerviewmain">
                    <input type="text" name="sendmessage" id="sendmessage" class="input-one" placeholder="Envoyer un message">
                    <button type="button" class="button-round button-send-message" data-id="<?= $params[1] ?>">
                        <img src="/views/assets/send.png" alt="" class="img-send">
                    </button>
                </div>
            <?php } else { ?>
                <h2 class="margin-one">Vous n'avez selectionne aucune conversation.</h2>
            <?php } ?>
        </section>
    </main>

    <script>
        setInterval('load_messages()', 500);

        function load_messages() {
            $("#message").load('/controller/getmessage.php', {
                'idgotoother': '<?= $params[1] ?>'
            });
        }

        $(".add-people-input").on("input", function() {
            var search = $(this).val();
            if (search != "") {
                $(".listsearch").load('/controller/infos-recherche.php', {
                    'search': search,
                    'idpt': <?= $params[1] ?>,
                });

            } else {
                $(".listsearch").empty();
            }
        });
    </script>
<?php } else { ?>

    <?php header("Refresh:0; url= .."); ?>

<?php } ?>