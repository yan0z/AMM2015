<!DOCTYPE html>
<html>
    <?php
        session_start();
        include ('../master/header.php'); 
        include ('../master/top_menu.php');
    ?>
    
    <body>
        <div id="content">
            <div id="contentx">
                <div class="box">
                    <h2>Tariffe</h2>
                    <div class="box2">
                        <table class="tblservizi">
                            <tr>
                                <td><img src="../images/singola.jpg" class="camere" alt="singola"></td>
                                <td><img src="../images/doppia.jpg" class="camere" alt="doppia"></td>
                                <td><img src="../images/tripla.jpg" class="camere" alt="tripla"></td>
                            </tr>
                            <tr class="room">
                                <td>Camera doppia - uso singola</td>
                                <td>Camera doppia</td>
                                <td>Camera tripla</td>
                            </tr>
                            <tr class="prezzi">
                                <td>&euro; 20,00</td>
                                <td>&euro; 35,00</td>
                                <td>&euro; 50,00</td>
                            </tr>
                        </table>
                                
                    </div>
                    </br>
                </div>
            </div>
        </div>
        <?php include('../master/footer.php');?>
    </body>
</html>
