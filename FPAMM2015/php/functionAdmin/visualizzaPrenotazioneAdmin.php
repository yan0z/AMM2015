<!DOCTYPE html>
<?php
include_once basename(__DIR__) . '/../controller/UserController.php';
?>

<html>
    <body>
 	<div id="contentx">
            <div class="box">
                <?php
                $num = count($prenotazioni);
                if(count($prenotazioni)>0){ ?>
                <table class="tblprenotazione">
                    <tr>
                        <td>Nome</td>
                        <td>Cognome</td>
                        <td>Email</td>
                        <td>Arrivo</td>
                        <td>Partenza</td>
                        <td>Cliente</td>
                        <td></td>
                    </tr>
                </table>
                <?php 
                } 
                ?>
                <div class="box2">
                <?php
                if(count($prenotazioni)>0){ ?>
                <table class="tblprenotazione">
                    <?php
                    for($i=0; $i<$num; $i++){  ?>
                        <tr> 
                        <?php 
                        for($j=1; $j<6; $j++){ ?>
                            <td><?php echo $prenotazioni[$i][$j];?></td>
                        <?php } ?>
                            <td><?php echo $prenotazioni[$i][9];?></td>
                            <td><a href="index.php?page=admin&subpage=visualizzaPrenotazioneAdmin&cmd=cancellaPrenotazioneAdmin&id=<?= $idPre=$prenotazioni[$i][0] ?><?= $vd->scriviToken('&') ?>" title="cancella prenotazione">
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
                <ul id="navigation3">
                <?php
                if(count($prenotazioni)>0){ ?>
                    <li>
                        <a href="index.php?page=admin&subpage=visualizzaPrenotazioneAdmin&cmd=cancellaTuttoAdmin<?= $vd->scriviToken('&') ?>" title="cancella tutto" class="comando"><strong>Cancella tutto</strong></a>
                    </li>
                <?php
                }
                ?>
                </ul>
            </div>
	</div>
    </body>
</html>
