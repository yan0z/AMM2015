<!DOCTYPE html>
<html>
    <?php
        session_start(); 
        include ('../master/header.php'); 
	include ('../master/top_menu.php');
    ?>
    <body>
        <div id="content">
            <? include ('../master/sideDx.php'); ?>
            <div id="contentx">
                <div class="box">
                    <h2>Il B&B - AMM</h2>
                    <img src="../images/casa.jpg" class="illustrazione" alt="Giardino Villa Serena">
                    <p>Situato in uno dei migliori quartieri di Cagliari ma lontano dal frastuono cittadino.<br/>
                       La villa, in stile moderno/rustico, offre tutto quello che un visitatore può sperare.
                       Anche se risulta vicino al centro, e' in una zona tranquilla dove i nostri visitatori possono godersi il sole e il cielo di Cagliari magari a bordo piscina.
                       Completa di tutti i confort (Piscina, sdraio, aria condizionata, wi-fi, lavatrice) a prezzi vantaggiosi gode di un ottimo staff pronto a soddisfare le vostre esigente.
                       Venite a trovarci.
                    </p>
                </div>
            </div>
	</div>
	<?php include('../master/footer.php');?>
    </body>
</html>