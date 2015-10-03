<?php

    /**
    *  @Author Stefano Carta 
    *  Pagina master
    */


    include_once 'ViewDescriptor.php';
    include_once basename(__DIR__) . '/../Settings.php';
    if (!$vd->isJson()) {
?>
<!DOCTYPE html>
    <!--
        Pagina master suddivisa in sezioni che contiene il layout del sito.
        Le sezioni vengono caricate separatamente
    -->
    <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <title><?= $vd->getTitolo() ?></title>
            <base href="<?= Settings::getApplicationPath() ?>php/"/>
            <meta name="keywords" content="B&B AMM"/>
            <meta name="description" content="B&B"/>
            <link href="../css/responsive.css" rel="stylesheet" type="text/css" media="screen" />
            <?php
                foreach ($vd->getScripts() as $script) {
            ?>
                <script type="text/javascript" src="<?= $script ?>"></script>
            <?php
                }
            ?>
        </head>
        
        <body>
            <div id="allPage">
                <header>
                    <div class="social">
                        <ul>
                            <li id="facebook"><a href="www.facebook.com">facebook</a></li>
                            <li id="twitter"><a href="https://twitter.com/">twitter</a></li>
                            <li id="linkedin"><a href="http://www.linkedin.com/">linkedin</a></li>
                        </ul>
                    </div>
                    <!--  header -->
                    <div id="header">
                        <div id="title">
                            <h1>B & B AMM</h1>
                        </div>

                        <!-- select per la versione del menu mobile -->
                        <select class="sfondo">
                            <?php
                            $mini_menu = $vd->getFileHeader();
                            require "$mini_menu";
                            ?>

                        </select>
                        <!-- tabs -->
                        <div id="sfondo">
                            <?php
                            $menu = $vd->getFileHeader();
                            require "$menu";
                            ?>
                        </div>
                    </div>
                </header>
                <!-- start page -->
                <!--  sidebar 1 -->
                <div id="sideSX">
                    <ul>
                        <li id="serch">
                            <?php
                            $left = $vd->getSideBarSX();
                            require "$SX";
                            ?>
                        </li>
                    </ul>
                </div>

                <div id="sideDX">
                    <?php
                    $right = $vd->getSideBarDX();
                    require "$DX";
                    ?>
                </div>

                <!-- contenuto -->
                <div id="center">
                    <?php
                    if ($vd->getMessaggioErrore() != null) {
                        ?>
                        <div class="error">
                            <div>
                                <?=
                                $vd->getMessaggioErrore();
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($vd->getMessaggioConferma() != null) {
                        ?>
                        <div class="confirm">
                            <div>
                                <?=
                                $vd->getMessaggioConferma();
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    $content = $vd->getContentFile();
                    require "$center";
                    ?>
                </div>

                <!--  footer -->
                <footer>
                    <div id="footer">
                        <p>
                            Progetto finale AMM
                        </p>
                    </div>
                    <div class="validator">
                        <p>
                            <a href="http://validator.w3.org/check/referer" class="xhtml" title="Questa pagina contiene HTML valido">
                                <abbr title="eXtensible HyperText Markup Language">HTML</abbr> Valido</a>
                            <a href="http://jigsaw.w3.org/css-validator/check/referer" class="css" title="Questa pagina ha CSS validi">
                                <abbr title="Cascading Style Sheets">CSS</abbr> Valido</a>
                        </p>
                    </div>
                </footer>
            </div>
        </body>
    </html>
    <?php
} else {
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    
    $content = $vd->getContentFile();
    require "$center";
}
?>

        
        