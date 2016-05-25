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
                        <ul>
                            <li>
                                Camera doppia - uso singolo    
                            </li>
                            <li>
                                &euro; 20,00
                            </li>
                        </ul>
                    </div>
                    
                    <div id='camere'>
                        <img src="../images/casa.jpg" class="camere" alt="singola">
                        <ul>
                            <li>
                                Camera doppia    
                            </li>
                            <li>
                                &euro; 35,00
                            </li>
                        </ul>
                    </div>
                    
                    <div id='camere'>
                        <img src="../images/casa.jpg" class="camere" alt="singola">
                        <ul>
                            <li>
                                Camera tripla    
                            </li>
                            <li>
                                &euro; 50,00
                            </li>
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
                        La colazione verrà servita a partire dalle ore 9.00.
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
