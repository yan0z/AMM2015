<!DOCTYPE html>
<html>
    <?php
        session_start();
        include ('../master/header.php'); 
        include ('../master/top_menu.php');
    ?>
    
    <body>
        <div id="content">
	<?php include ('../master/sideDx.php');?>
            <div id="contentx">
                <div class="box">
                    <h2>Tariffe</h2>
                    <table>
                        <tbody>
                            <img src="../images/casa.jpg" class="camere" alt="singola">
                            <tr>
                                <td>Camera singola</td>
                                <td>&euro; 20,00</td>
                            </tr>
                            <img src="../images/casa.jpg" class="camere" alt="doppia">
                            <tr>
                                <td>Camera doppia</td>
                                <td>&euro; 35,00</td>
                            </tr>
                            <img src="../images/casa.jpg" class="camere" alt="tripla">  
                            <tr>
                                <td>Camera tripla</td>
                                <td>&euro; 50,00</td>
                            </tr>
                        </tbody>   
                    </table>
                    
                    <li>
                        Gli arrivi sono previsti dalle ore 12.00 alle ore 15.00 e non oltre. 
                    </li>
                    <li>
                        Si prega di lasciare libera la camera per le pulizie dalle ore 11.00 alle ore 12.00.
                    </li>
                    <li>
                        Pagamento in contanti.
                    </li>
                </div>
            </div>
        </div>
        <?php include('../master/footer.php');?>
    </body>
</html>
