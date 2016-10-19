<!DOCTYPE html>
<?php
    include_once 'UserController.php';
?>

<html>
    <body>
 	<div id="contentx">
            <div class="box">
                <p>In questa sezione puoi vedere la lista di tutte le prenotazioni. E' permessa la cancellazione.</p>
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
                        <td>S</td>
                        <td>D</td>
                        <td>T</td>
                        <td>IdCliente</td>
                        <td>Cancella</td>
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
                        for($j=1; $j<10; $j++){ ?>
                            <td><?php echo $prenotazioni[$i][$j];?></td>
                        <?php } ?>
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
                <?php
                if(count($prenotazioni)>0){ ?>
                    <a href="index.php?page=admin&subpage=visualizzaPrenotazioneAdmin&cmd=cancellaTuttoAdmin<?= $vd->scriviToken('&') ?>" title="cancella tutto" class="comando">Cancella tutto</a>
                <?php
                }
                ?>
            </div>
	</div>
    </body>
</html>
