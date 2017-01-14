<?php
include_once basename(__DIR__) .'ViewDescriptor.php';
include_once basename(__DIR__) . '/../Settings.php';
?>
<!DOCTYPE html>
<!-- 
     pagina master, contiene tutto il layout della applicazione 
     le varie pagine vengono caricate a "pezzi" a seconda della zona
     del layout:
     - logo (header)
     - menu (navigation bar)
     - content (la parte centrale con il contenuto)
     - footer (footer)

      Queste informazioni sono manentute in una struttura dati, chiamata ViewDescriptor
      la classe contiene anche le stringhe per i messaggi di feedback per 
      l'utente (errori e conferme delle operazioni)
-->
<html>
    <head>
        <title>B&B AMM</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <base href="<?= Settings::getApplicationPath() ?>php/"/>
        <meta name="keywords" content="HTML CSS PHP JS" />
        <meta name="author" content="Carta Stefano"/>
        <link href="../css/finalStyle.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body>
        <div id="page">
            <header>
                <!--  header -->
                <?php 
                    $headerImage = $vd->getHeaderImage();
                    require "$headerImage";
                ?>

                <?php
                    $navigationBar = $vd->getNavigationBar();
                    require "$navigationBar";
                ?>
            </header>

            <div id="content"> 
                <?php
                    if($vd->getSottoPagina() == 'servizi'){
                        $servizi = $vd->getServizi();
                        require "$servizi";
                    }
                    else if($vd->getSottoPagina() == 'staff'){
                        $staff = $vd->getStaff();
                        require "$staff";
                    }
                    else if($vd->getSottoPagina() == 'about'){
                        $about = $vd->getAbout();
                        require "$about";
                    }
                    else if($vd->getSottoPagina() == 'prenota'){
                        $prenota = $vd->getBooking();
                        require "$prenota";
                    }
                    else if($vd->getSottoPagina() == 'visualizzaPrenotazione'){
                        $visualizzaPrenotazione = $vd->getViewBooking();
                        require "$visualizzaPrenotazione";
                    }
                    else if($vd->getSottoPagina() == 'visualizzaPrenotazioneAdmin'){
                        $visualizzaPrenotazioneAdmin = $vd->getViewBookingAdmin();
                        require "$visualizzaPrenotazioneAdmin";
                    }
                    else
                    {
                        $content = $vd->getContent();
                        require "$content";
                    }  
                ?>
            </div>
            <div class="clear"></div>
            <!--  footer -->
            <footer>
                <div id="footer">
                    <?php
                        $footer = $vd->getFooter();
                        require "$footer";
                    ?>
                </div>
            </footer>
        </div>
    </body>
</html>