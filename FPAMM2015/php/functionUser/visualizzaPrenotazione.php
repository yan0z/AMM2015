<!DOCTYPE html>
<?php
include_once basename(__DIR__) . '/../controller/UserController.php';
?>

<html>
    <body>
 	<div id="contentx">
            <div class="box">
                <ul class="intestazioni">
                    <li>Nome</li>
                    <li class="licognome">Cognome</li>
                    <li class="liemail">Email</li>
                    <li>Arrivo</li>
                    <li class="lipartenza">Partenza</li>  
                </ul>
                <div class="box2">
                    <div class="visulizza">  
                        <?php
                        //conto quante occorrenze sono presenti nell'array $prenotazioni
                        $num = count($prenotazioni);
                        //se sono presenti prenotazioni allora procediamo a stamparla
                        if(count($prenotazioni)>0){ ?>
                        <table class="tblprenotazione">
                            <?php
                            for($i=0; $i<$num; $i++){  ?>
                                <tr> 
                                <?php 
                                for($j=1; $j<6; $j++){ ?>
                                    <td><?php echo $prenotazioni[$i][$j];?></td>
                                <?php } ?>
                                    <td><a href="index.php?page=user&subpage=visualizzaPrenotazione&cmd=cancellaPrenotazione&id=<?= $idPre=$prenotazioni[$i][0] ?><?= $vd->scriviToken('&') ?>" title="cancella prenotazione">
                                            <img src="../images/no.png" class="comando" alt="Elimina" >
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <?php
                        //non sono presenti prenotazioni
                        }
                        else
                        {?> 
                            <div>Non è presente nessuna prenotazione.</div>
                        <?php

                        }
                        ?>
                     </div>
                </div>
            </div>
	</div>
    </body>
</html>
