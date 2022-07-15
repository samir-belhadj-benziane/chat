<?php if (isset($_SESSION['accord_id_user'])) { ?>

    <?php header("Refresh:0; url= chat/@me"); ?>

<?php } else { ?>

    <header>
        <nav class="box-shadow-one">
            <button type="button" class="button-one box-shadow-one RegisterLink">S'inscrire</button>
            <div class="logo-container">
                <div class="logo"></div>
            </div>
            <button type="button" class="button-one box-shadow-one LoginLink">Se Connecter</button>
        </nav>
    </header>
    <main>
        <h1>S'inscrire</h1>
        <div id="sign-up">

            <fieldset class="login-field">
                <legend>E-mail ou numero de telephone</legend>
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
            <div class="field-pass"></div>

            <fieldset class="login-field space-around">
                <legend>Date de naissance</legend>

                <select name="day" class="select-one">
                    <option hidden>Sélectionner</option>
                    <?php for ($i = 1; $i < 31; $i++) { ?>
                        <option value="<?= $i ?>" class="option-one"><?= $i ?></option>
                    <?php } ?>

                </select>
                <select name="month" class="select-one">
                    <option hidden>Sélectionner</option>
                    <option value="01" class="option-one">Janvier</option>
                    <option value="02" class="option-one">Février</option>
                    <option value="03" class="option-one">Mars</option>
                    <option value="04" class="option-one">Avril</option>
                    <option value="05" class="option-one">Mai</option>
                    <option value="06" class="option-one">Juin</option>
                    <option value="07" class="option-one">Juillet</option>
                    <option value="08" class="option-one">Août</option>
                    <option value="09" class="option-one">Septembre</option>
                    <option value="10" class="option-one">Octobre</option>
                    <option value="11" class="option-one">Novembre</option>
                    <option value="12" class="option-one">Décembre</option>
                </select>
                <select name="year" class="select-one">
                    <option hidden>Sélectionner</option>
                    <?php for ($y = date("Y"); $y >= 1870; $y--) { ?>
                        <option value="<?= $y ?>" class="option-one"><?= $y ?></option>
                    <?php } ?>

                </select>

            </fieldset>
            <div class="field-born"></div>

            <div class="field"></div>

            <div class="login-submit">
                <button type="button" name="submit-sign-up" class="button-one box-shadow-one button-reg">Se Connecter</button>
            </div>
        </div>
    </main>

<?php } ?>