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
                    <div class="box2">
                        <table class="tblstaff">
                            <tr>
                                <td><img src="../images/boss.jpg" class="staff" alt="boss"></td>
                                <td><img src="../images/cuoco.jpg" class="staff" alt="cuoco"></td>
                                <td><img src="../images/cameriera.jpg" class="staff" alt="cameriera"></td>
                                <td><img src="../images/giardiniere.jpg" class="staff" alt="giardiniere"></td>
                                <td><img src="../images/reception.png" class="staff" alt="receptionist"></td>
                            </tr>
                            <tr class="ruolistaff">
                                <td><strong>Il boss</strong></td>
                                <td><strong>Il cuoco</strong></td>
                                <td><strong>La governante</strong></td>
                                <td><strong>Il giardiniere</strong></td>
                                <td><strong>La receptionist</strong></td>
                            </tr>
                            <tr class="nomistaff">
                                <td>Stefano</td>
                                <td>Pippo</td>
                                <td>Gina</td>
                                <td>Rocco</td>
                                <td>Lina</td>
                            </tr>
                        </table>
                        <h3>Contatti</h3></br>
                        <ul>
                            <li>Via: Bellissima n. 100</li>
                            <li>Tel: 1234567890</li>
                            <li>Cell: 3401234567</li>
                            <li>Email: emailbebAmm@hotmail.it</li>
                        </ul>
                    </div>
		</div>
            </div>
	</div>
	<?php include('../master/footer.php');?>
    </body>
</html>