<!DOCTYPE html>
<html>
    <?php 
        session_start(); 
	include ('../master/header.php'); 
	include ('../master/top_menu.php');
    ?>

    <body>
	<div id="content">
            <?php include ('../master/sideDx.php'); ?>
            <div id="contentx">
                <div class="box">
                    <h1>Informazioni sul progetto</h1>
        	<p>Url progetto : <a href="http://spano.sc.unica.it/amm2015/mallociFrancesca/servizi/index.php" target="_blank" onclick="window.open(this.href);return false;">B&B Villa Serena</a></br></p>
            <p> Il progetto permette la prenotazione di una o piu' stanze presso il B&B Villa Serena </br></p>
            <p>Sono presenti due ruoli: utente e amministratore</br></p>
            <p><strong>Utente</strong></br></p>
            <p>l'utente è in grado di prenotare una o piu' stanze e visualizzare le proprie prenotazioni</br></p>
            <p><strong>Amministratore</strong></br></p>
            <p>l'amministratore è in grado di visualizzare le prenotazioni effettuate presso il B&B Villa Serena secondo tre criteri di ricerca:</br> Nome, Cognome, Data di Arrivo
            </br>E' possibile inoltre cancellare tutte le prenotazioni effettuate presso il B&B Villa Serena</p>

            <p><strong> Requisiti soddisfatti: </strong>
                <ul>
                    <li>Utilizzo di HTML e CSS</li>
                    <li>Utilizzo di PHP e MySQL</li>
                    <li>Due ruoli (amministratore ed utente)</li>
                    <li>Caricamento ajax dei risultati della ricerca delle prenotazioni(ruolo amministratore)</li>
                    <li>Transazione: la funzione eliminaPrenotazioni cancella tutte le prenotazioni dal database</li>
                    <li>Credenziali di autenticazione e link alla homepage</li>
                </ul>
            </p>

			</div>
			</div>
		</div>
		<?php include('../master/footer.php');?>
	</body>

</html>