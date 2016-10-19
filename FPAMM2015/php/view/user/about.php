<!DOCTYPE html>
<html>
    <?php 
        session_start(); 
	include ('../master/header.php'); 
	include ('../master/top_menu.php');
    ?>

    <body>
	<div id="content">
            <div id="contentx">
                <div class="box">
                    <h1>About</h1>
                    <div class="box2">
                        <h2> Descrizione dell'applicazione </h2>
                        <p>
                            L’applicazione supporta la prenotazione di camera da un Bad and Breakfast. 
                            Le funzionalità di base prevedono che un cliente possa effettuare una prenotazione 
                            e visualizzare l'elenco delle prenotazioni. 
                            I dati che il cliente dovrà fornire sono:
                        </p>
                        <ul>
                            <li>Nome</li>
                            <li>Cognome</li>
                            <li>Email</li>
                            <li>Data di arrivo</li>
                            <li>Data di partenza (fine soggiorno)</li>
                            <li>Opzione camera (inserire il valore 1 nella camera che si vuole prenotare)</li>
                        </ul>

                        <p>L’applicazione prevede una modalità Administrator con tre funzioni:</p>

                        <ul>
                            <li>Visualizzazione di tutte le prenotazioni effettuate presso il B&B</li>
                            <li>Cancellazione di una prenotazione</li>
                            <li>Cancellazione di tutte le prenotazioni</li>
                        </ul>


                        <h2> Requisiti del progetto </h2>
                        <ul>
                            <li>Utilizzo di HTML e CSS</li>
                            <li>Utilizzo di PHP e MySQL</li>
                            <li>Utilizzo del pattern MVC </li>
                            <li>Due ruoli (user e admin)</li>
                            <li>Transazione per la registrazione degli esami (metodo salvaElenco della classe EsameFactory.php)</li>
                        </ul>
                    </div>
                    <hr/>
                </div>
            </div>
	</div>
	<?php include('../master/footer.php');?>
    </body>
</html>