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
                    <h2>Tariffario</h2>
                    <table>
                        <tr>
                            <td>Camera singola</td>
                            <td>&euro; 20,00</td>
        		</tr>
                        
                        <tr>
                            <td>Camera doppia</td>
                            <td>&euro; 35,00</td>
                        </tr>
        		
                        <tr>
                            <td >Camera tripla</td>
                            <td>&euro; 50,00</td>
        		</tr>
                    </table>
                    
                    <li>Gli arrivi sono previsti dalle ore 12.00 alle ore 15.00 e non oltre. 
                        Pagamento in contanti</li>
                </div>
            </div>
        </div>
        <?php include('../master/footer.php');?>
    </body>
</html>
