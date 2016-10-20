<?php
include_once 'Settings.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <base href="<?= Settings::getApplicationPath() ?>"/>
        <title>Errore</title>
    </head>
    <body>
        <h1><?= $titolo ?></h1>
        <p>
            <?=
            $messaggio
            ?>
        </p>
        <?php if (isset($login)) { ?>
            <p>Puoi autenticarti alla pagina di login,<a href="../FPAMM2015/php/index.php?page=login">Clicca qui</a></p>
        <?php } ?>
    </body>
</html>

