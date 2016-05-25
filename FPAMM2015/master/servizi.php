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
                    <div id='camere'>
                        <img src="../images/casa.jpg" class="camere" alt="singola">
                        <li>
                            <ul>
                                Camera doppia - uso singolo    
                            </ul>
                            <ul>
                                &euro; 20,00
                            </ul>
                        </li>
                    </div>
                    
                    <div id='camere'>
                        <img src="../images/casa.jpg" class="camere" alt="singola">
                        <li>
                            <ul>
                                Camera doppia    
                            </ul>
                            <ul>
                                &euro; 35,00
                            </ul>
                        </li>
                    </div>
                    
                    <div id='camere'>
                        <img src="../images/casa.jpg" class="camere" alt="singola">
                        <li>
                            <ul>
                                Camera tripla    
                            </ul>
                            <ul>
                                &euro; 50,00
                            </ul>
                        </li>
                    </div>
                          
                    
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
