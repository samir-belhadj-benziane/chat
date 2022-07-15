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
        <h1>Bienvenue sur Accord</h1>
        
    </main>
<?php } ?>