<!DOCTYPE html>
<?php
    include_once 'UserController.php';
?>
<body>
    <div id="contentx">
        <div class="box">
            <h3>Prenotazione</h3>
            <table id="tblprenota">
                <tr>
                    <td class="formprenota">
                        <form style="margin:20px 0 20px 0;" method="post" action="index.php?page=user&subpage=prenota">
                        <input type="hidden" name="cmd" value="prenota">
                        <table class="tblattributi">
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
                                <td><label>Data Arrivo<span class="required">*</span></label></td>
                                <td><input type="date" name="dataArrivo" id="dataArrivo" /></td>
                            </tr>

                            <tr>
                                <td><label>Data Partenza<span class="required">*</span></label></td>
                                <td><input type="date" name="dataPartenza" id="dataPartenza" /></td>
                            </tr>


                            <tr>
                                <td><label>Singola<span class="required">*</span></label></td>
                                <td><input type="number" name="singola" id="singola" /></td>
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
                                <td><input type="submit" value="prenota"/></td>
                            </tr>
                        </table>
                        <li class="avviso"><span>*</span>Campi obbligatori</li>
                    </td>
                    <td class="visualizzaEmessaggi">
                        <ul>
                            <li class="consigliutili"><div>Inserire i dati personali per procedere alla prenotazione.</br>
                                                         A seconda della stanza scelta inserire:</br> 
                                                         1 (selezione)</br>
                                                         0 (deselezione)</br>
                                                      </div>
                            </li>
                            <li class="<?= $vd->getSottoPagina() == 'visualizzaPrenotazione' ? 'current_page_item' : '' ?>"><a href="index.php?page=user&subpage=visualizzaPrenotazione<?= $vd->scriviToken('?')?>"><strong>Le mie Prenotazioni</strong></a></li>
                            <li>
                            <?php
                            if ($vd->getMessaggioErrore() != null || $vd->getMessaggioConferma() != null)
                            {?>
                                <div class="error">
                                    <div><?=$vd->getMessaggioErrore();?></div>
                                    <div><?=$vd->getMessaggioConferma();?></div>
                                </div>
                            <?php
                            }
                            ?>
                            </li>
                        </ul>
                    </td>
                </tr> 
            </table> 
            </form>                  
        </div>
    </div>
</body>