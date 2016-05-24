<?php
    include ('../master/top_menu.php');
    include ('../sql/settings.php');
?>

<?php
    if (isset($_POST['delete'])) 
    eliminaPrenotazioni();
    /*
     * Funzione che cancella tutte le prenotazioni effettuate 
     */
    function eliminaPrenotazioni()
    {
        $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	/*
	 * Inizio la transazione
	*/
	$mysqli->autocommit(false);	
        if(!$mysqli->query("DELETE FROM prenotazioni"))
            $mysqli->rollback();
	
	$mysqli->commit();
	$mysqli->autocommit(true); 
	/*
        * Fine transazione
	*/
	$mysqli->close();
    }
?>
