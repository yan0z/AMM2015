<!DOCTYPE html>
<html>
    <?php 
        session_start();
        include ('../master/header.php'); 
        include ('../master/top_menu.php');
        include ('../sql/settings.php');

        $db = mysql_connect(DB_SERVER,DB_USER , DB_PASS) or die ("Impossibile connettersi al server");
        mysql_select_db(DB_NAME, $db) or die ("Impossibile connettersi al database");

        $query="SELECT * FROM prenotazioni";
	$risultati=mysql_query($query);
        $num=mysql_num_rows($risultati);

        mysql_close();
    ?>

    <body>
 	<div id="content">
            <?php include ('../master/sideDx.php'); ?> 
            <?php if( $num == 0 ):?>
 		<div id="contentx">		
                    <div class="box">
                        <p> <img src="../images/stop.png" </a><strong>Nessuna prenotazione</strong> </p>
                    </div>
		</div>
            <?php endif;?>

            <?php
                $i=0;
                while($i < $num)
                {
                    $nome=mysql_result($risultati,$i,"Nome");
                    $cognome=mysql_result($risultati,$i,"Cognome");
                    $email=mysql_result($risultati,$i,"email");
                    $telefono=mysql_result($risultati,$i,"telefono");
                    $dataArrivo=mysql_result($risultati,$i,"dataArrivo");
                    $dataPartenza=mysql_result($risultati,$i,"dataPartenza");
                    $numOspiti=mysql_result($risultati,$i,"ospiti");
                    $doppia=mysql_result($risultati,$i,"doppia");
                    $tripla=mysql_result($risultati,$i,"tripla");
            ?>
 
            <div id="contentx">		
                <div class="box">
                    <h1> Prenotazione n° <?php echo $i+1 ?> </h1>
                    <div id="prenotazioni">
                        <table>
                            <tr>
                                <th><font face="Arial, Helvetica, sans-serif">Telefono</font></th>
                                <td><font face="Arial, Helvetica, sans-serif"><?echo  $telefono?></font></td>
                            </tr>
                            
                            <tr>
                                <th><font face="Arial, Helvetica, sans-serif">Data Arrivo</font></th>
                                <td><font face="Arial, Helvetica, sans-serif"><?echo  $dataArrivo?></font></td>
                            </tr>
                            
                            <tr>
                                <th><font face="Arial, Helvetica, sans-serif">Data Partenza</font></th>
                                <td><font face="Arial, Helvetica, sans-serif"><?echo  $dataPartenza?></font></td>
                            </tr>
                            
                            <tr>
                                <th><font face="Arial, Helvetica, sans-serif">Numero Ospiti</font></th>
                                <td><font face="Arial, Helvetica, sans-serif"><?echo  $ospiti?></font></td>
                            </tr>
                            
                            <tr>
                                <th><font face="Arial, Helvetica, sans-serif">Stanza Doppia</font></th>
                                <td><font face="Arial, Helvetica, sans-serif"><?echo  $doppia?></font></td>
                            </tr>
                            
                            <tr>
                                <th><font face="Arial, Helvetica, sans-serif">Stanza Tripla</font></th>
                                <td><font face="Arial, Helvetica, sans-serif"><?echo  $tripla?></font></td>
                            </tr>
                        </table>
                    </div>
                </div>
		<?php $i++; }?> 
            </div>
	</div>
        <?php include('../master/footer.php');?>
    </body>
</html>