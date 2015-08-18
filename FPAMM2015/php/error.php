
<?php
    /**
     *  @Author Stefano Carta 
     *  Gestione errori di pagina e login
     */
    include_once 'settings.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Error</title>
    </head>
    
    <body>
        <h1><?= $titolo ?></h1>
        <p>
            <?=
                $msg
            ?>           
        </p>
        <?php
            if(isset($login)){ ?>
                <p>
                    Puoi effettuare l'autenticazione a questo<a href='../homepage.php'>LINK</a>
                </p>
        <?php } ?>
    </body>
</html>
    
    
