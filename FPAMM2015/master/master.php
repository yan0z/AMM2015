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
            <div id="contenuti">
                <div class="box">
                    <h2>Cosa offriamo</h2>
                    
                    <h3>Giardino</h3>
                    <img src="../img/giardino.jpg" class="illustrazione" alt="Giardino Villa Serena">
                    <p>Immerso nel verde alterna gli spazi pensati per il relax agli spazi produttivi della tenuta.<br/>
                        Il boschetto di pini è collegato, con un sentiero che passa di fronte al grazioso laghetto dei papiri, all'accogliente terrazzino.
			Altri angoli di giardino richiamano in modo volutamente casuale alle attività produttive, dalla vecchia macina all'erpice posato
			 nei pressi delle siepi di fichi d'india.</p>
                </div>
		
                <div class="box">
                <h3>Camere</h3>
			 <img src="../img/camera_rosa2.jpg" class="illustrazione" alt="Camera Rosa Villa Serena">
			 <p>Tutte accoglienti e dotate di servizi e riscaldamento autonomo, ricordano negli oggetti che le arredano, le tipiche case
			  campidanesi: il grande camino delle case padronali, lo scranno smaltato, il lavamani, la testiera in ferro battuto.
			Dalle ampie finestre lo sguardo spazia dal profilo del Monte Arci fino a tuffarsi nelle acque del golfo di Oristano a oltre 50
			 km di distanza.</p>
		</div>
		<div class="box">
			 <h3>Servizi</h3>
			 <img src="../img/sala_ingresso.jpg" class="illustrazione" alt="Sala di Ingresso Villa Serena">
			 <p>La sala d'ingresso ampia e accogliente, corredata di una ricca libreria, è il luogo ideale per un po' di riposo 
			 	dopo una giornata intensa. Nei pomeriggi estivi lo spazio relax si estende al terrazino esterno e al boschetto di pini,
			 	 dove i più piccoli possono giocare mentre i più grandi si distendono sulle amache.</p>
		</div>
            </div>
	</div>
	<? include('../master/footer.php');?>
    </body>
</html>