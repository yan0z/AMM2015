<!DOCTYPE html>
<html>
    <?php 
        session_start();
        include ('../master/header.php'); 
        include ('../master/top_menu.php');
        include ('../sql/settings.php');
    ?>



    <?php  if(isset($_POST['prenota'])):
            $errore = true;
            $db = mysql_connect(DB_SERVER,DB_USER , DB_PASS) or die ("Impossibile connettersi al server");
            mysql_select_db(DB_NAME, $db) or die ("Impossibile connettersi al database");

            //Salvataggio dati in input
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $email= $_POST['email'];
            $telefono = $_POST['telefono'];
            $arrivo = $_POST['arrivo'];
            $partenza = $_POST['partenza'];
            $ospiti = $_POST['numOspiti'];
            $doppia= $_POST['doppia'];
            $tripla=$_POST['tripla'];
    ?>
        
    <?php if(trim($nome) == '' || trim($cognome) == ''|| trim($email) == ''|| trim($telefono) == ''|| trim($arrivo) == ''||trim($partenza) == ''|| trim($ospiti) == ''|| trim($doppia) == ''|| trim($tripla) == ''): ?> 
        <div class="messaggi"><img src="../images/stop.png" </a><strong>Attenzione, alcuni campi non sono compilati.</strong>  </div>

        <?php  $errore = false; ?>
        <?php endif;?> 

        <?php 
            if($errore):?>
            <?php
                $query = "INSERT INTO prenotazioni (nome, cognome, email, telefono, dataArrivo, dataPartenza, ospiti, doppia, tripla)
                            VALUES ('$nome','$cognome','$email','$telefono','$arrivo','$partenza','$ospiti','$doppia','$tripla')"; 
                $result = mysql_query($query);  
            ?>
          
        <?php 
            if($result):?>
                <div class="messaggi"><img src="../img/spunta-blu.png" </a><strong>Prenotazione Effettuata</strong></div>;
        <?php else: ?>
            <div class="messaggi"><img src="../img/stop.png" </a><strong>Errore<?=mysql_error();?></strong><br> </div>;
        <?php endif;?>
        <?php endif;?>

        <?php
            mysql_close();
        ?>

       
    <?php endif;?>

    <body>
        <div id="content">
        <?php  include ('../master/sideDx.php');?>
            <div id="contentx">
                <div class="box">
                    <h3>Prenotazione</h3>
                    <form action="booking.php" method="post" id="prenota">
                        <table>
                            <tr>
                                <td><label>Nome <span class="required">*</span></label></td>
                                <td><input type="text" name="nome" id="nome" /></td>
                            </tr>

                            <tr>
                                <td><label>Cognome <span class="required">*</span></label></td>
                                <td><input type="text" name="cognome" id="cognome" /></td>
                            </tr>

                            <tr>
                                <td><label>Email <span class="required">*</span></label></td>
                                <td><input type="text" name="email" id="email" /></td>
                            </tr>

                            <tr>
                                <td><label>Telefono <span class="required">*</span></label></td>
                                <td><input type="text" name="telefono" id="telefono" /></td>
                            </tr>

                            <tr>
                                <td><label>Data Arrivo<span class="required">*</span></label></td>
                                <td><input type="date" name="arrivo" id="arrivo" /></td>
                            </tr>

                            <tr>
                                <td><label>Data Partenza<span class="required">*</span></label></td>
                                <td><input type="date" name="partenza" id="partenza" /></td>
                            </tr>


                            <tr>
                                <td><label>Numero Ospiti<span class="required">*</span></label></td>
                                <td><input type="text" name="numOspiti" id="numOspiti" /></td>
                            </tr>

                            <tr>
                                <td><label>Doppia<span class="required">*</span></label></td>
                                <td><input type="number" name="doppia" id="doppia" /></td>
                            </tr>

                            <tr>
                                <td><label>Tripla<span class="required">*</span></label></td>
                                <td><input type="number" name="tripla" id="tripla" /></td>
                            </tr>

                            <tr>
                                <td><input type="submit" name="prenota" value="prenota" /></td>
                                <td><img src="spinner.gif" id="loading" style="display:none"/></td>
                            </tr>
                        </table>
                        <li> <img src="../images/attenzione.gif" class="campiObbligatori"/>*Campi obbligatori</li> 
                    </form>
                </div>
            </div>
        </div>
        <? include('../master/footer.php');?>
    </body>
</html>