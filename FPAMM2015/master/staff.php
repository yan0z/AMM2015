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
                    <h2>Staff B&B - AMM</h2>
                    <img src="../images/boss.jpg" class="staff" alt="boss">                    
                    <img src="../images/cuoco.jpg" class="staff" alt="cuoco">
                    <img src="../images/cameriera.jpg" class="staff" alt="cameriera">
                    <img src="../images/giardiniere.jpg" class="staff" alt="giardiniere">
                    <img src="../images/reception.png" class="staff" alt="receptionist">
                    <ul id="staff" >
                        <li><strong>Il boss-Stefano</strong></li>
                        <li><strong>Il cuoco-Pippo</strong></li>
                        <li><strong>La governante-Gina</strong></li>
                        <li><strong>Il giardiniere-Rocco</strong></li>
                        <li><strong>La receptionist-Lina</strong></li>
                    </ul>
                    <h3>Contatti</h3></br>
                    <ul>
                        <li>
                            Via: Bellissima n. 100
                        </li>
                        <li>
                            Tel: 1234567890
                        </li>
                        <li>
                            Cel: 3401234567
                        </li>
                        <li>
                            Email: emailbebAmm@hotmail.it
                        </li>
                    </ul>
		</div>
            </div>
	</div>
	<?php include('../master/footer.php');?>
    </body>
</html>